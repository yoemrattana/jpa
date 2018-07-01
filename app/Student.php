<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $graduation_year
 * @property integer $student_number
 * @property integer $school_id
 * @property StudentPropertyValue[] $studentPropertyValues
 */
class Student extends Model
{
    public $timestamps = false;
    /**
     * @var array
     */
    protected $fillable = ['status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studentPropertyValues()
    {
        return $this->hasMany('App\StudentPropertyValue');
    }
}
