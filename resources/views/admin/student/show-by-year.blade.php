@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        {{--<a data-toggle="collapse" data-parent="#accordion" href="#collapseCO{{$year}}" aria-expanded="true">{{__('label.class of')}} {{$year}}</a>--}}
                        {{__('label.class of')}} {{$year}}
                        <p class="pull-right">({{count($students)}})</p>
                        <span class="glyphicon glyphicon-user"></span>
                    </h4>
                </div> <!--./panel-heading-->

                {{--<div id="collapseCO{{$year}}" class="panel-collapse collapse">--}}
                    <div class="panel-body">
                        @if ( count($students) )
                            <div class="table-responsive">
                                <table data-toggle="table" data-classes="table table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th data-field="first_name" data-sortable="true">{{__('label.first name')}}</th>
                                            <th data-field="last_name" data-sortable="true">{{__('label.last name')}}</th>
                                            <th data-field="student_number" data-sortable="true">{{__('label.student number')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($students as $student)
                                            <tr>
                                                <td scope="row"><a href="{{Auth::user()->hasRole( 'visitor' ) ? route('show-student', $student->student_id) : route('student-detail', $student->student_id)}}"><img src="{{isset($student->student_photo) ? $app->make('url')->to('/images/students/'.$student->student_photo) : $app->make('url')->to('/images/no_photo.png') }}" class="classOfImage"></a></td>
                                                <td>{{$student->given_name}}</td>
                                                <td>{{$student->family_name}}</td>
                                                <td>{{$student->jpa_student_number}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> <!-- table-responsive-->
                        @else
                            <p>Students Not found</p>
                        @endif
                    </div> <!--./panel-body-->
                {{--</div>--}} <!--./panel-collapse-->
            </div> <!--end panel -->
        </div> <!--end col-xs-10-->
    </div> <!--end row-->

@stop