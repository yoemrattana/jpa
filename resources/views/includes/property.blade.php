@foreach( $student_form_properties as $student_form_property )

        <?php $template = $student_form_property->studentProperty->propertyType->template ?>

        {{--@if( $template == 'select')
            <div class="col-sm-3 bold">{{$student_form_property->studentProperty->name}}:</div>
        @endif

        @if ( $template == 'text' || $template == 'date' || $template == 'email'|| $template == 'text_area' || $template == 'year' || $template == 'status_autocomplete' || $template == 'visa_autocomplete')
            <div class="col-sm-3 bold">{{$student_form_property->studentProperty->name}}:</div>
        @endif--}}

        <?php $student_property_values = $student_form_property->studentProperty->studentPropertyValues->where( 'student_id', $id ) ?>

        @if (count($student_property_values))
            @foreach( $student_property_values as $value )

                @if( $template == 'select')
                    <div class="col-sm-3 bold">{{$student_form_property->studentProperty->name}}:</div>
                    <div class="col-sm-3">{{isset($value->property_type_value_id) ? $value->propertyTypeValue->value : '&nbsp;'}}</div>
                @endif

                @if ( $template == 'text' || $template == 'date' || $template == 'email' || $template == 'text_area' || $template == 'year' )
                    <div class="col-sm-3 bold">{{$student_form_property->studentProperty->name}}:</div>
                    <div class="col-sm-3">{{isset($value->property_value) ? $value->property_value : '&nbsp;'}}</div>
                @endif

                @if ( $template == 'status_autocomplete' )
                    <div class="col-sm-3 bold">{{$student_form_property->studentProperty->name}}:</div>
                    <div class="col-sm-3">{{isset($value->property_value) ? $value->property_value : '&nbsp;'}}</div>
                @endif

                @if ( $template == 'visa_autocomplete' )
                    <div class="col-sm-3 bold">{{$student_form_property->studentProperty->name}}:</div>
                    <div class="col-sm-3">{{isset($value->property_value) ? $value->property_value : '&nbsp;'}}</div>
                @endif

            @endforeach
        @else
            @if ($student_form_property->studentProperty->name != 'Student Photo')
                <div class="col-sm-3 bold">{{$student_form_property->studentProperty->name}}:</div>
                <div class="col-sm-3">&nbsp;</div>
            @endif
        @endif
@endforeach
