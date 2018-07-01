<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $property_type_value_id
 * @property integer $student_property_id
 * @property integer $student_id
 * @property integer $order
 * @property string $property_value
 * @property PropertyTypeValue $propertyTypeValue
 * @property StudentProperty $studentProperty
 * @property Student $student
 * @property StudentPropertyValueTranslation[] $studentPropertyValueTranslations
 */
class StudentPropertyValue extends Model
{
    public $timestamps = false;
    /**
     * @var array
     */
    protected $fillable = ['property_type_value_id', 'parent_student_property_value_id', 'student_property_id', 'student_id', 'order', 'property_value'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function propertyTypeValue()
    {
        return $this->belongsTo('App\PropertyTypeValue');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studentProperty()
    {
        return $this->belongsTo('App\StudentProperty');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studentPropertyValueTranslations()
    {
        return $this->hasMany('App\StudentPropertyValueTranslation', 'student_property_values_id');
    }

    public function parent(){
        return $this->belongsToOne('App\StudentPropertyValue', 'parent_student_property_value_id');
    }

    public function children(){
        return $this->hasMany('App\StudentPropertyValue', 'parent_student_property_value_id');
    }
}
