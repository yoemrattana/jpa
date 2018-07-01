{!! Form::label($student_property_id, $student_property_name) !!}

@if ( $template == 'text' )
    {!! Form::text('add\\' . $student_property_id, null, ['class'=>'form-control', $is_require == 1 ? 'required' : '']) !!}
@endif

@if ( $template == 'email' )
    {!! Form::email('add\\' . $student_property_id, null, ['class'=>'form-control', $is_require == 1 ? 'required': '']) !!}
@endif

@if ( $template == 'text_area' )
    {!! Form::textarea('add\\' . $student_property_id, null, ['class'=>'form-control', $is_require == 1 ? 'required': '']) !!}
@endif

@if ( $template == 'select' )
    <?php $select_elements = $student_form_property->studentProperty->propertyType->propertyTypeValues ?>
    {!! Form::select('selectAdd\\' . $student_property_id, [''=>'Choose Option'] + $select_elements->pluck('value', 'id')->all(), null, ['class'=>'form-control', $is_require == 1 ? 'required': '']) !!}
@endif

@if ( $template == 'date' )
    {!! Form::date('add\\' . $student_property_id, null, ['class'=>'form-control', $is_require == 1 ? 'required': '']) !!}
@endif

@if ( $template == 'file' )
    {!! Form::file('photoAdd\\' . $student_property_id, null, ['class'=>'form-control', $is_require == 1 ? 'required': '']) !!}
@endif

@if ( $template == 'year' )
    {!! Form::text('add\\' . $student_property_id, '', ['class'=>'form-control','id' => 'datepicker', $is_require == 1 ? 'required': '']) !!}
@endif

@if( $template == 'status_autocomplete')
    {!! Form::text('add\\' . $student_property_id, '', ['class'=>'form-control auto-complete-status', $is_require == 1 ? 'required': '' ]) !!}
@endif

@if( $template == 'visa_autocomplete')
    {!! Form::text('add\\' . $student_property_id, '', ['class'=>'form-control auto-complete-visa-type-class', $is_require == 1 ? 'required': '' ]) !!}
@endif