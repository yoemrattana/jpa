<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $property_type_id
 * @property integer $order
 * @property string $value
 * @property PropertyType $propertyType
 * @property PropertyTypeValueTranslation[] $propertyTypeValueTranslations
 * @property StudentPropertyValue[] $studentPropertyValues
 */
class PropertyTypeValue extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['name'];
    /**
     * @var array
     */
    protected $fillable = ['property_type_id', 'order', 'value'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function propertyType()
    {
        return $this->belongsTo('App\PropertyType');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function propertyTypeValueTranslations()
    {
        return $this->hasMany('App\PropertyTypeValueTranslation');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studentPropertyValues()
    {
        return $this->hasMany('App\StudentPropertyValue');
    }
}
