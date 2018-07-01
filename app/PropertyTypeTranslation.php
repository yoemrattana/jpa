<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $property_type_id
 * @property string $locale
 * @property string $name
 * @property string $description
 * @property PropertyType $propertyType
 */
class PropertyTypeTranslation extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['property_type_id', 'locale', 'name', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function propertyType()
    {
        return $this->belongsTo('App\PropertyType');
    }
}
