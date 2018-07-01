<?php
/**
 * Created by PhpStorm.
 * User: rattana
 * Date: 5/8/17
 * Time: 1:41 PM
 */

namespace App\Http;
use App\StudentProperty;
use App\Student;

class StudentAttribute
{
    public $given_name;
    public $family_name;
    public $jpa_student_number;
    public $student_photo;
    public $jpa_graduation_year;
    public $student_status;

    public function set_attribute( $id )
    {
        $_student = Student::find( $id );
        $student = new StudentAttribute();
        $studentProperties = StudentProperty::all();
        $student->student_id = $id;
        $student->student_status = $_student->status;

        foreach( $studentProperties as $property ){
            if( count($property->studentPropertyValues) ){
                $values = $property->studentPropertyValues->where( 'student_id', $id );
                if(count($values)){
                    foreach( $values as $value ){
                        $key    = $value->studentProperty->student_property_name;
                        $value  = $value->property_value;
                    }
                    $student->$key = $value;
                }
            }
        }
        return $student;
    }
}