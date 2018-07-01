@extends('layouts.admin')


@section('content')

    @include('includes.notification')

    <div class="round-content">
        <div class="bg-title-search">
            <div class="col-sm-12">
                <h4>Insert New Student</h4>
            </div>
        </div>

        <br>
        {{--<div class="container">--}}
            <div class="row">
                <div class="col-sm-12">
                <?php $i = 0 ?>
                @foreach( $student_form_sections as $parent_form_section )
                    <!--SECTION 2 STUDENT CONTACT INFORMATION -->
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$i}}" aria-expanded="false" class="collapsed"><span class="glyphicon {{$parent_form_section->glyphicon}}"> </span>{{$parent_form_section->name }}</a> </h4>
                                </div>

                                <div id="collapse{{$i}}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">

                                    <div class="panel-body">

                                        <!-- BLUE PANEL 1  TBA-->
                                        <!--<label>To be added</label><button type="button" class="btn btn-primary btn-sm submitattach">Update</button>-->
                                        @if( $parent_form_section->children->count() )
                                            {!! Form::open(['method'=>'POST', 'action'=> 'AdminStudentsController@store', 'files'=>true]) !!}

                                            @foreach( $parent_form_section->children as $child_form_section )
                                                <div class="well well-sm well-primary">
                                                    <label class="subheadOnBlue">{{ $child_form_section->name }}</label>
                                                    <div class="row">

                                                        <?php $student_form_properties = collect( $child_form_section->studentFormProperties )->sortBy( 'order' ); ?>
                                                        @foreach( $student_form_properties as $student_form_property )
                                                            <?php $student_property_name = $student_form_property->studentProperty->name; ?>
                                                            <?php $template = $student_form_property->studentProperty->propertyType->template; ?>
                                                            <?php $is_require = $student_form_property->studentProperty->is_require ?>

                                                            <div class="col-sm-6 bold">
                                                                @include('includes.form-add', array( 'student_property_id' => $student_form_property->studentProperty->id ) )
                                                            </div>
                                                        @endforeach

                                                    </div>

                                                    <div class="row">
                                                        @foreach( $child_form_section->children as $sub_child_form_section )
                                                            <div class="col-sm-12">
                                                                <label class="subheadOnBlue">{{$sub_child_form_section->name}}</label>
                                                            </div>
                                                            <?php $student_form_properties = collect( $sub_child_form_section->studentFormProperties )->sortBy( 'order' ) ?>
                                                                @foreach( $student_form_properties as $student_form_property )
                                                                    <?php $student_property_name = $student_form_property->studentProperty->name; ?>
                                                                    <?php $template = $student_form_property->studentProperty->propertyType->template; ?>
                                                                    <?php $is_require = $student_form_property->studentProperty->is_require ?>

                                                                    <div class="col-sm-6 bold">
                                                                        @include('includes.form-add', array( 'student_property_id' => $student_form_property->studentProperty->id ) )
                                                                    </div>
                                                                @endforeach
                                                        @endforeach
                                                    </div>
                                                </div> <!-- ./end well  -->
                                            @endforeach
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    {!! Form::submit('Save', ['class'=>'btn btn-success pull-right']) !!}
                                                </div>
                                            </div>
                                            {!! Form::close() !!}
                                        @endif
                                    </div><!-- PANEL BODY CLOSE  -->
                                </div><!-- PANEL COLLAPSE CLOSE  -->
                            </div><!-- PANEL PANEL DEFAULT CLOSE  -->
                        </div> <!-- PANEL GROUP ACCORDIAN CLOSE  -->
                        <?php $i++ ?>
                    @endforeach
                </div><!-- PANEL GROUP ACCORDIAN CLOSE  -->
            </div> {{--./ end row--}}
        {{--</div> --}}{{--./ end content--}}
    </div> {{--./ round-content close--}}

@stop