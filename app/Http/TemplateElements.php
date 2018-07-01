<?php
/**
 * Created by PhpStorm.
 * User: rattana
 * Date: 4/22/17
 * Time: 10:04 PM
 */

namespace App\Http;
use App\StudentProperty;

class TemplateElements
{
    public $language = 'en';

    public function set_element(){

        $the_object = new TemplateElements();

        $student_properties = StudentProperty::all();

        foreach($student_properties as $property){
            $object_name = $property->student_property_name;
            $the_object->$object_name = $property->translate( $this->language )->name;

        }
        
        return $the_object;
    }
}