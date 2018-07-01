{!! Form::label($student_property_value_id, $student_property_name) !!}

@if ( $template == 'text' )
    {!! Form::text($student_property_value_id, $property_value, ['class'=>'form-control', $is_require == 1 ? 'required': '' ]) !!}
@endif

@if ( $template == 'email' )
    {!! Form::email($student_property_value_id, $property_value, ['class'=>'form-control', $is_require == 1 ? 'required': '']) !!}
@endif

@if ( $template == 'text_area' )
    {!! Form::textarea($student_property_value_id, $property_value, ['class'=>'form-control', $is_require == 1 ? 'required': '']) !!}
@endif

@if ( $template == 'select' )

    <?php $select_elements = $student_property_value->propertyTypeValue->where('property_type_id', $student_property_value->propertyTypeValue->property_type_id)->get() ?>
    {!! Form::select('editSelect\\' . $student_property_value_id, $select_elements->pluck('value', 'id'), $student_property_value->propertyTypeValue->id, ['class'=>'form-control', $is_require == 1 ? 'required': '']) !!}

@endif

@if ( $template == 'date' )
    {!! Form::date($student_property_value_id, $property_value, ['class'=>'form-control', $is_require == 1 ? 'required': '']) !!}
@endif

@if ( $template == 'file' )
    {!! Form::file($student_property_value_id, null, ['class'=>'form-control bottom-space', $is_require == 1 ? 'required': '']) !!}
    <img class="img-student" height="100"  src="{{$app->make('url')->to('/images/students/'.$student_property_value->property_value)}}" alt="{{$student_property_value->property_value}}">
@endif

@if ( $template == 'year' )
    {!! Form::text($student_property_value_id, $property_value, ['class'=>'form-control','id' => 'datepicker', $is_require == 1 ? 'required': '']) !!}
@endif

@if( $template == 'status_autocomplete')
    {!! Form::text($student_property_value_id, $property_value, ['class'=>'form-control auto-complete-status', $is_require == 1 ? 'required': '' ]) !!}
@endif

@if( $template == 'visa_autocomplete')
    {!! Form::text($student_property_value_id, $property_value, ['class'=>'form-control auto-complete-visa-type-class', $is_require == 1 ? 'required': '']) !!}
@endif

