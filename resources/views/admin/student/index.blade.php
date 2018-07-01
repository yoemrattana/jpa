@extends('layouts.admin')

@section('content')

    @include('includes.notification')
    {{--<div class="row">--}}
        {{--<div class="col-md-10">--}}
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-search"> </span>{{__('label.search')}} - {{__('label.student')}}</a> <span class="glyphicon glyphicon-user"> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="row">
                            {!! Form::open(['method'=>'POST', 'action'=> 'AdminStudentsController@search']) !!}
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        {!! Form::label('first_name',  __('label.first name') ) !!}
                                        {{--{!! Form::text('first_name', old('first_name'), ['class'=>'form-control',  'id'=>'monitor']) !!}--}}
                                        <input  type="text" class="form-control" name="first_name" {{Session::has('first_name') ? "value=" .session('first_name'). "" : ''}} required autofocus>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        {!! Form::label('last_name',  __('label.last name') ) !!}
                                        {!! Form::text('last_name', Session::has('last_name') ? session('last_name') : null, ['class'=>'form-control',  'id'=>'monitor']) !!}
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        {!! Form::label('student_number',  __('label.student number') ) !!}
                                        {!! Form::text('student_number', Session::has('student_number') ? session('student_number'): null, ['class'=>'form-control',  'id'=>'monitor']) !!}
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        {{--<p>&nbsp;<br />&nbsp;</p><a href="student-home-selected.html"><button type="button" class="btn btn-primary btn-sm searchChoice buttonLink">&nbsp;&nbsp;&nbsp;&nbsp;{{__('label.select')}}&nbsp;&nbsp;&nbsp;&nbsp;</button></a>--}}
                                        {!! Form::submit(__('label.search'), ['class'=>'btn btn-primary btn-sm searchChoice buttonLink']) !!}
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div><!-- ./ row-->
                    </div> <!-- ./panel-body-->
                </div> <!--./panel-collapse -->
            </div> <!--./panel-default -->

            @if( ! Auth::user()->hasRole('visitor'))
                <div class="row">
                    <div class="col-sm-12 bottom-space">
                        <a href="{{'students/create'}}" class="btn btn-primary btn-sm">{{__('label.add new student')}}</a>
                    </div>
                </div>
            @endif

            @if(isset($students_by_year) && count($students_by_year))
                @foreach( $students_by_year as $jpa_graduation_year => $students )
                    <div class="panel panel-default col-sm-12">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseCO{{$jpa_graduation_year}}">{{__('label.class of')}} {{$jpa_graduation_year}}</a>
                                <span class="glyphicon glyphicon-user"></span>
                                <p class="pull-right">({{count($students)}})</p>
                            </h4>
                        </div>
                        <div id="collapseCO{{$jpa_graduation_year}}" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table data-toggle="table" data-classes="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>&nbsp;</th>
                                                <th data-field="first_name" data-sortable="true">{{ __('label.first name') }}</th>
                                                <th data-field="last_name" data-sortable="true">{{ __('label.last name') }}</th>
                                                <th data-field="student_number" data-sortable="true">{{ __('label.student number') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($students as $student)
                                                <tr>
                                                    <td scope="row"><a href="{{Auth::user()->hasRole( 'visitor' ) ? route('show-student', $student->student_id) : route('student-detail', $student->student_id)}}"><img src="{{isset($student->student_photo) ? $app->make('url')->to('/images/students/'.$student->student_photo) : $app->make('url')->to('/images/no_photo.png') }}" class="classOfImage"></a></td>
                                                    <td>{{ $student->given_name}}</td>
                                                    <td>{{ $student->family_name}}</td>
                                                    <td>{{ $student->jpa_student_number}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table> <!-- table table-hover -->
                                </div>
                            </div> <!-- panel-body -->
                        </div> <!--./ panel-collapse collapse -->
                    </div> <!-- ./panel-default col-md-12 -->
                @endforeach
            @else
                <div class="col-sm-12">
                    <div id="info" class="alert alert-info" > The result not found! </div>
                </div>
            @endif
        {{--</div> <!-- ./md-10 -->--}}
    {{--</div> <!-- ./row -->--}}

@stop