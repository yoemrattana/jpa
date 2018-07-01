<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $student_form_section_id
 * @property integer $student_properties_id
 * @property integer $order
 * @property StudentFormSection $studentFormSection
 * @property StudentProperty $studentProperty
 */
class StudentFormProperty extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['student_form_section_id', 'student_properties_id', 'order'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studentFormSection()
    {
        return $this->belongsTo('App\StudentFormSection');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studentProperty()
    {
        return $this->belongsTo('App\StudentProperty', 'student_properties_id');
    }
}
