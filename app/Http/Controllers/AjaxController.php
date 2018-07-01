<?php

namespace App\Http\Controllers;

use App\StudentPropertyValues;
use Illuminate\Http\Request;
use App\StudentProperty;
use App\StudentPropertyValue;
class AjaxController extends Controller
{
    public function getStatus()
    {
        $status = [];
        $student_property_id =StudentProperty::where('student_property_name', '=', 'status')->get(['id'])[0]->id;

        $student_properties = StudentPropertyValue::whereRaw('student_property_id = ? and property_value IS NOT NULL', [$student_property_id])->groupBy('property_value')->get(['property_value']);
        //print_r($student_properties);
        foreach( $student_properties as $student_property ) {
            //foreach($student_property->studentPropertyValues as $student_property_value) {
                //if ($student_property_value->property_value != null) {
                    $status[] = $student_property->property_value;
                //}

            //}
        }
        //$_status = collect($status)
        return response()->json($status, 200);
    }

    public function getVisaTypeClass() 
    {
        $visa_type_classes = [];
        //$student_properties = StudentProperty::with( 'studentPropertyValues' )->where( 'student_property_name', 'visa_type_class' )->get();
        $student_property_id =StudentProperty::where('student_property_name', '=', 'visa_type_class')->get(['id'])[0]->id;

        $student_properties = StudentPropertyValue::whereRaw('student_property_id = ? and property_value IS NOT NULL', [$student_property_id])->groupBy('property_value')->get(['property_value']);
        //print_r($student_properties);
        foreach( $student_properties as $student_property ) {
            $visa_type_classes[] = $student_property->property_value;
        }

        return response()->json($visa_type_classes, 200);
    }
}
