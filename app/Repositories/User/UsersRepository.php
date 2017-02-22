<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use App\Models\User;
use Auth;
use File;
use Hash;

class UsersRepository extends BaseRepository
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function updateInfo($request)
    {
        $userUpdate = $request->only(['name']);
        $oldImage = Auth::user()->avatar;
        $image = $this->uploadAvatar($request);
        $this->deleteImage($oldImage);

        if ($request->hasFile('avatar')) {
            $userUpdate['avatar'] = $image;
        }

        $user = Auth::user()->update($userUpdate);

        if (!$user) {
            return ['error' => trans('message.updating_error')];
        }

        return $user;
    }

    public function uploadAvatar($request)
    {
        $imagePath = public_path(config('common.user.avatar_path'));
        $image = $request->file('avatar');
        $extenstion = $image->getClientOriginalExtension();
        $fileName = time() . '.' . $extenstion;
        $image->move($imagePath, $fileName);
        $userData = [
            'avatar' => $fileName,
        ];

        return config('common.user.avatar_path') . $fileName;
    }

    public function deleteImage($pathImage = [])
    {
        if (!empty($pathImage) && file_exists($pathImage)) {
            File::delete($pathImage);
        }
    }

    public function changePassword($request)
    {
        $user = Auth::user();

        if (!empty($user->password) && (Hash::check($request->password, $user->password))) {
            $user->update([
                'password' => $request->newPassword,
            ]);

            return $user;
        }

        return ['error' => trans('message.change_password_fail')];
    }
}
