<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $property_type_value_id
 * @property string $locale
 * @property string $name
 * @property PropertyTypeValue $propertyTypeValue
 */
class PropertyTypeValueTranslation extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['property_type_value_id', 'locale', 'name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function propertyTypeValue()
    {
        return $this->belongsTo('App\PropertyTypeValue');
    }
}
