@extends('layouts.admin')

@section('content')

    <div class="round-content">
        <div class="bg-title-search">
            <p class="pageheading homeTitle">{{ Auth::user()->name }} - YOU ARE NOW LOGGED IN</p>
        </div>
    </div>

    <div class="row homeButtons">
        <div class="col-md-3">
            <a href="{{route('students.index')}}"><button type="button" class="btn btn-primary btn-sm col-xs-12 buttonLink">Student</button></a>
        </div>
        <div class="col-md-4 homeText">View a <span class="textBold">student</span> record.</div>

    </div>
    <div class="row homeButtons">
        <div class="col-md-3">
            <a href="{{route('schools.index')}}"><button type="button" class="btn btn-primary btn-sm col-xs-12 buttonLink">School</button></a>
        </div>
        <div class="col-md-4 homeText">View a <span class="textBold">school</span> record.</div>
    </div>
    <div class="row homeButtons">
        <div class="col-md-3">
            <a href="tracking-home.html"><button type="button" class="btn btn-primary btn-sm col-xs-12 buttonLink">Tracking</button></a>
        </div>
        <div class="col-md-4 homeText">View a <span class="textBold">tracked</span> record. This is includes Application, Accepted, Ongoing, and Scholarship records.</div>
    </div>

    <div class="row homeButtons">
        <div class="col-md-3">
            <a href="finance-home.html"><button type="button" class="btn btn-primary btn-sm col-xs-12 buttonLink">Finance</button></a>
        </div>
        <div class="col-md-4 homeText">View a <span class="textBold">financial</span> record.</div>
    </div>
    <div class="row homeButtons">
        <div class="col-md-3">
            <a href="search-home.html"><button type="button" class="btn btn-primary btn-sm col-xs-12 buttonLink">Search/Report</button></a>
        </div>
        <div class="col-md-4 homeText"> <span class="textBold">search</span>  any record and generate a  <span class="textBold">report</span> .</div>
    </div>
    <div class="row homeButtons">
        <div class="col-md-3">
            <a href="{{route('dataentry.index')}}"><button type="button" class="btn btn-primary btn-sm col-xs-12 buttonLink">Data Entry</button></a>
        </div>
        <div class="col-md-4 homeText"> <span class="textBold">Enter Data</span>  into any record.</div>
    </div>
    <div class="row homeButtons">
        <div class="col-md-3">
            <a href="help-home.html"><button type="button" class="btn btn-primary btn-sm col-xs-12 buttonLink">Help</button></a>
        </div>
        <div class="col-md-4 homeText">View the  <span class="textBold">help</span>  menu.</div>
    </div>

    <div class="row homeButtons">
        <div class="col-xs-12">&nbsp;</div>
    </div>


@stop

