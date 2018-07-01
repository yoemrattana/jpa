<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $student_property_values_id
 * @property string $locale
 * @property string $name
 * @property string $description
 * @property StudentPropertyValue $studentPropertyValue
 */
class StudentPropertyValueTranslation extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['student_property_values_id', 'locale', 'name', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studentPropertyValue()
    {
        return $this->belongsTo('App\StudentPropertyValue', 'student_property_values_id');
    }
}
