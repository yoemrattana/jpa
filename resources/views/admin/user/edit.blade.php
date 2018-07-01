@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="bg-title-search">
                <p style="margin-left: 0px" class="pageheading homeTitle">Edit User</p>
            </div>
        </div>

        @include('includes.notification')

        <div class="col-sm-12">
            <div class="well well-sm well-default well-form">
                {!! Form::model($user, ['method'=>'PATCH', 'action'=> ['AdminUsersController@update', $user->id], 'files'=>true]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email:') !!}
                    {!! Form::email('email', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('role_id', 'Role:') !!}
                    {!! Form::select('role_id', $roles, $user->roles()->get()->first()->id, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('is_active', 'Status:') !!}
                    {!! Form::select('is_active', array(1=>'active', 0=>'not active'), null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password:') !!}
                    {!! Form::password('password', ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {{ Form::label('password_confirmation', 'Password confirmation') }}
                    {{ Form::password('password_confirmation', ['class'=>'form-control']) }}
                </div>

                <div class="form-group">
                    {!! Form::submit('Update User', ['class'=>'btn btn-primary col-xs-6']) !!}
                </div>

                {!! Form::close() !!}

                {!! Form::open(['method'=>'DELETE', 'class' => 'delete', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}

                <div class="form-group">
                    {!! Form::submit('Delete User', ['class'=>'btn btn-danger col-xs-6']) !!}
                </div>

                {!! Form::close() !!}

                <div class="bottom-space"></div>

            </div> <!-./end well-->
        </div> <!--./ end col-xs-10-->
    </div> <!-- end row -->

    <div class="row">
        <div class="col-sm-12">
            @include('includes.form-error')
        </div>
    </div>
@stop