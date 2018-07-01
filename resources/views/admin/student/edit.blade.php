@extends('layouts.admin')

@section('content')

    @include('includes.notification')

    <div class="row">
        @foreach( $student_form_sections as $parent_form_section )

            <div class="col-sm-12">
                <h3>Edit {{$parent_form_section->name }}</h3>
            </div>

            @if( $parent_form_section->children->count() )
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            {!! Form::model($student_form_sections, ['method'=>'PATCH', 'action'=> ['AdminStudentsController@update', $id], 'files'=>true]) !!}

                                @foreach( $parent_form_section->children as $child_form_section )
                                    <div class="well well-sm well-primary bottom-space">
                                        <label class="subheadOnBlue">{{$child_form_section->name}}</label>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <?php $student_form_properties = collect( $child_form_section->studentFormProperties )->sortBy( 'order' ); ?>
                                                @include('includes.form-property')

                                                @foreach( $child_form_section->children as $sub_child_form_section )

                                                    <div class="col-sm-12">
                                                        <label class="subheadOnBlue">{{$sub_child_form_section->name}}</label>
                                                    </div>

                                                    <?php $student_form_properties = collect( $sub_child_form_section->studentFormProperties )->sortBy( 'order' ); ?>
                                                    @include('includes.form-property')

                                                @endforeach
                                            </div>{{--./end col-xs-12--}}
                                        </div>{{--./end row--}}
                                    </div>{{--./end well --}}
                                @endforeach
                                    <input type="hidden" name="parent_form_id" value="{{$parent_form_id}}">
                                <div class="col-sm-12 btn-update">
                                    <div class="form-group">
                                        {!! Form::submit('Update', ['class'=>'btn btn-success pull-right']) !!}
                                    </div>
                                </div>
                        </div>{{--./end panel body--}}
                    </div>{{--./end of panel--}}
                </div>{{--./end of col-xs-10--}}
                        {!! Form::close() !!}
            @endif
        @endforeach
    </div>{{--./end of row--}}

@stop