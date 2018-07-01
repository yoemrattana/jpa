@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="bg-title-search">
                <p style="margin-left: 0px" class="pageheading homeTitle">Create New User</p>
            </div>
        </div>

        @include('includes.notification')

        <div class="col-sm-12">
            <div class="well well-sm well-default">

                {!! Form::open(['method'=>'POST', 'action'=> 'AdminUsersController@store', 'files'=>true]) !!}
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
                    {!! Form::select('role_id', [''=>'Select Option'] + $roles, null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('is_active', 'Status:') !!}
                    {!! Form::select('is_active', array( 0=>'not active', 1=>'active' ), null, ['class'=>'form-control']) !!}
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
                    {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}

            </div>
        </div> <!--./ end col-xs-10-->
    </div>

    <div class="row">
        <div class="col-sm-12">
            @include('includes.form-error')
        </div>
    </div>


@stop