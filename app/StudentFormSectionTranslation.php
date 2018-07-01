<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $student_form_section_id
 * @property string $locale
 * @property string $name
 * @property string $description
 * @property StudentFormSection $studentFormSection
 */
class StudentFormSectionTranslation extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['student_form_section_id', 'locale', 'name', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studentFormSection()
    {
        return $this->belongsTo('App\StudentFormSection');
    }
}
