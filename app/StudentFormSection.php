<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $parent_student_form_section_id
 * @property integer $order
 * @property StudentFormSection $studentFormSection
 * @property StudentFormProperty[] $studentFormProperties
 * @property StudentFormSectionTranslation[] $studentFormSectionTranslations
 */
class StudentFormSection extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['name'];
    
    /**
     * @var array
     */
    protected $fillable = ['parent_student_form_section_id', 'order'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studentFormSection()
    {
        return $this->belongsTo('App\StudentFormSection', 'parent_student_form_section_id');
    }

    public function parent(){
        return $this->belongsToOne('App\StudentFormSection', 'parent_student_form_section_id');
    }

    public function children(){
        return $this->hasMany('App\StudentFormSection', 'parent_student_form_section_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studentFormProperties()
    {
        return $this->hasMany('App\StudentFormProperty');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studentFormSectionTranslations()
    {
        return $this->hasMany('App\StudentFormSectionTranslation');
    }
}
