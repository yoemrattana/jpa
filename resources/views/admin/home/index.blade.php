@extends('layouts.admin')

@section('content')
    @if(Auth::user()->isActive())
        <div class="row">
    <div class="round-content">
        <div class="bg-title-search">
            <p class="pageheading homeTitle">{{ Auth::user()->name }} - YOU ARE NOW LOGGED IN</p>
        </div>
    </div>
        </div>

    @if ( ! Auth::user()->hasRole('admin') )
        <div class="row homeButtons">
            <div class="col-sm-4">
                <a href="{{Auth::user()->hasRole( 'visitor' ) ? route('read-student') : route('students.index')}}" class="btn btn-primary btn-sm col-sm-12 buttonLink">{{__('label.students')}}</a>
            </div>
            <div class="col-sm-4 description">View a <span class="textBold">student</span> record.</div>
        </div>
    @endif

    @role('admin')
        <div class="row homeButtons">
            <div class="col-sm-4">
                <a href="{{route('users.index')}}"><button type="button" class="btn btn-primary btn-sm col-sm-12 buttonLink">Users Management</button></a>
            </div>
            <div class="col-sm-5 description">View a <span class="textBold">Manage User in System</span> record.</div>
        </div>

        <div class="row homeButtons">
            <div class="col-sm-4">
                <a href="{{route('students.index')}}" class="btn btn-primary btn-sm col-sm-12 buttonLink">{{__('label.students')}}</a>
            </div>
            <div class="col-sm-4 description">View a <span class="textBold">student</span> record.</div>
        </div>

    @endrole

    {{--<div class="row homeButtons">--}}
        {{--<div class="col-md-3">--}}
            {{--<a href="{{route('schools.index')}}"><button type="button" class="btn btn-primary btn-sm col-xs-12 buttonLink">School</button></a>--}}
        {{--</div>--}}
        {{--<div class="col-md-4 homeText">View a <span class="textBold">school</span> record.</div>--}}
    {{--</div>--}}

    {{--<div class="row homeButtons">--}}
        {{--<div class="col-md-3">--}}
            {{--<a href="tracking-home.html"><button type="button" class="btn btn-primary btn-sm col-xs-12 buttonLink">Tracking</button></a>--}}
        {{--</div>--}}
        {{--<div class="col-md-4 homeText">View a <span class="textBold">tracked</span> record. This is includes Application, Accepted, Ongoing, and Scholarship records.</div>--}}
    {{--</div>--}}

    {{--<div class="row homeButtons">--}}
        {{--<div class="col-md-3">--}}
            {{--<a href="finance-home.html"><button type="button" class="btn btn-primary btn-sm col-xs-12 buttonLink">Finance</button></a>--}}
        {{--</div>--}}
        {{--<div class="col-md-4 homeText">View a <span class="textBold">financial</span> record.</div>--}}
    {{--</div>--}}

    {{--<div class="row homeButtons">--}}
        {{--<div class="col-md-3">--}}
            {{--<a href="search-home.html"><button type="button" class="btn btn-primary btn-sm col-xs-12 buttonLink">Search/Report</button></a>--}}
        {{--</div>--}}
        {{--<div class="col-md-4 homeText"> <span class="textBold">search</span>  any record and generate a  <span class="textBold">report</span> .</div>--}}
    {{--</div>--}}

    {{--<div class="row homeButtons">--}}
        {{--<div class="col-md-3">--}}
            {{--<a href="{{route('dataentry.index')}}"><button type="button" class="btn btn-primary btn-sm col-xs-12 buttonLink">Data Entry</button></a>--}}
        {{--</div>--}}
        {{--<div class="col-md-4 homeText"> <span class="textBold">Enter Data</span>  into any record.</div>--}}
    {{--</div>--}}

    {{--<div class="row homeButtons">--}}
        {{--<div class="col-md-3">--}}
            {{--<a href="help-home.html"><button type="button" class="btn btn-primary btn-sm col-xs-12 buttonLink">Help</button></a>--}}
        {{--</div>--}}
        {{--<div class="col-md-4 homeText">View the  <span class="textBold">help</span>  menu.</div>--}}
    {{--</div>--}}

    <div class="row homeButtons">
        <div class="col-sm-12">&nbsp;</div>
    </div>
    @endif

@stop

