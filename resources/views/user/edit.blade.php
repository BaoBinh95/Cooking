@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading">{{ $user->name.trans('label.edit_profile') }}</div>

                <div class="panel-body">
                    @include('errors.errors')
                    {!! Form::open([
                        'method' => 'PUT',
                        'action' => ['User\UserController@update', $user->id],
                        'class' => 'form-horizontal frmUpdateUser',
                        'files' => true,
                    ]) !!}
                        <div class="form-group">
                            {!! Form::label('name', trans('label.name'), ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('name', isset($user['name']) ? $user['name'] : '', ['class' => 'form-control', 'id' => 'name']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('avatar', trans('label.avatar'), ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::file('avatar', ['id' => 'image']) !!}
                            </div>
                            <div class="col-md-6">
                                <img src="{{ url($user['avatar']) }}" class="img-thumbnail img-row" id="image-url">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-3">
                                {!! Form::submit(trans('label.save'), ['class' => 'btn btn-info']) !!}
                                {!! Form::reset(trans('label.reset'), ['class' => 'btn btn-default']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()
