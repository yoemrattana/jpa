<?php namespace App;

/**
 * Eloquent class to describe the student_form_sections table
 *
 * automatically generated by ModelGenerator.php
 */
class StudentFormSections extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'student_form_sections';

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = array('order');

    public function studentFormSections()
    {
        return $this->belongsTo('App\StudentFormSections', 'parent_student_form_section_id', 'id');
    }

    public function studentFormProperties()
    {
        return $this->hasMany('App\StudentFormProperties', 'student_form_section_id', 'id');
    }

    public function studentFormSectionTranslations()
    {
        return $this->hasMany('App\StudentFormSectionTranslations', 'student_form_section_id', 'id');
    }

    public function studentFormSections()
    {
        return $this->hasMany('App\StudentFormSections', 'parent_student_form_section_id', 'id');
    }
}