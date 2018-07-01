<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $property_type_id
 * @property integer $parent_student_property_id
 * @property string $student_property_name
 * @property integer $order
 * @property boolean $allow_multiple
 * @property PropertyType $propertyType
 * @property StudentProperty $studentProperty
 * @property StudentFormProperty[] $studentFormProperties
 * @property StudentPropertyTranslation[] $studentPropertyTranslations
 * @property StudentPropertyValue[] $studentPropertyValues
 */
class StudentProperty extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['name'];
    /**
     * @var array
     */
    protected $fillable = ['property_type_id', 'parent_student_property_id', 'student_property_name', 'order', 'allow_multiple'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function propertyType()
    {
        return $this->belongsTo('App\PropertyType');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studentProperty()
    {
        return $this->belongsTo('App\StudentProperty', 'parent_student_property_id');
    }

    public function parent(){
        return $this->belongsTo('App\StudentProperty', 'parent_student_property_id');
    }

    public function children(){
        return $this->hasMany('App\StudentProperty', 'parent_student_property_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studentFormProperties()
    {
        return $this->hasMany('App\StudentFormProperty', 'student_properties_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studentPropertyTranslations()
    {
        return $this->hasMany('App\StudentPropertyTranslation');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studentPropertyValues()
    {
        return $this->hasMany('App\StudentPropertyValue');
    }
}
