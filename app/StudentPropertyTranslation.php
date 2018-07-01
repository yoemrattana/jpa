<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $student_property_id
 * @property string $locale
 * @property string $name
 * @property string $description
 * @property StudentProperty $studentProperty
 */
class StudentPropertyTranslation extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['student_property_id', 'locale', 'name', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studentProperty()
    {
        return $this->belongsTo('App\StudentProperty');
    }
}
