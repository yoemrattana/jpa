<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $base_type
 * @property string $validation_rules
 * @property string $enum_order
 * @property string $template
 * @property PropertyTypeTranslation[] $propertyTypeTranslations
 * @property PropertyTypeValue[] $propertyTypeValues
 * @property StudentProperty[] $studentProperties
 */
class PropertyType extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['name'];
    /**
     * @var array
     */
    protected $fillable = ['base_type', 'validation_rules', 'enum_order', 'template'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function propertyTypeTranslations()
    {
        return $this->hasMany('App\PropertyTypeTranslation');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function propertyTypeValues()
    {
        return $this->hasMany('App\PropertyTypeValue');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studentProperties()
    {
        return $this->hasMany('App\StudentProperty');
    }
}
