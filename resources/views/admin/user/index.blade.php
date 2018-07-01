@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="bg-title-search">
                <p style="margin-left: 0px" class="pageheading homeTitle">User Management</p>
            </div>
        </div>

        @include( 'includes.notification' )

        <div class="col-sm-12">
            <a class="btn btn-primary btn-sm buttonLink bottom-space" href="{{route('users.create')}}"><span class="glyphicon glyphicon-plus"></span> Create New User</a>
        </div>

        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        Users
                        <span class="glyphicon glyphicon-user"></span>
                    </h4>
                </div> <!--./panel-heading-->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table data-toggle="table" data-classes="table table-hover">
                            <thead>
                                <tr>
                                    <th data-field="id" data-sortable="true">ID</th>
                                    <th data-field="user" data-sortable="true">User</th>
                                    <th data-field="email" data-sortable="true">Email</th>
                                    <th data-field="role" data-sortable="true">Role</th>
                                    <th data-field="status" data-sortable="true">Status</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach( $users as $user )
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td><a class="btn btn-link bold" href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->roles()->orderBy('name')->get()->first()->name}}</td>
                                    <td>{{$user->is_active == 0 ? 'Not Active' : 'Active'}}</td>
                                    <td>{{$user->created_at->diffForHumans()}}</td>
                                    <td>{{$user->updated_at->diffForHumans()}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div> <!-- table-responsive -->
                </div> <!--./panel-body-->
            </div> <!--end panel -->
        </div> <!-- ./col-sm-12 -->

    </div> <!-- ./row -->

@stop