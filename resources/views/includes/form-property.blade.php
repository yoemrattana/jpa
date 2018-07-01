@foreach( $student_form_properties as $student_form_property )

    <?php $student_property_name = $student_form_property->studentProperty->name; ?>
    <?php $template = $student_form_property->studentProperty->propertyType->template; ?>
    <?php $student_property_values = $student_form_property->studentProperty->studentPropertyValues->where( 'student_id', $id ); ?>
    <?php $is_require = $student_form_property->studentProperty->is_require ?>

    <?php $student_properties = $student_form_property->studentProperty->with('children')->whereNull('parent_student_property_id')->get() ?>
    {{--{{$student_form_property->studentProperty->find(47)->parent->name}}--}}
    @if( ! count( $student_property_values ) )
        <div class="col-sm-6 bold">
            @include('includes.form-add', array( 'student_property_id' => $student_form_property->studentProperty->id ) )
        </div>
    @endif

    @foreach( $student_property_values as $student_property_value )
        <div class="col-sm-6 bold">
            @include('includes.form-edit', array( 'student_property_value' =>$student_property_value, 'student_property_value_id' => $student_property_value->id, 'property_value' => $student_property_value->property_value ) )
        </div>
    @endforeach

@endforeach