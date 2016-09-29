<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
    	'user_id',
    	'title',
    	'content',
    	'slug',
    	'status',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function notifications()
    {
    	return $this->hasMany(Notification::class);
    }
}
