<?php namespace App;

/**
 * Eloquent class to describe the property_types table
 *
 * automatically generated by ModelGenerator.php
 */
class PropertyTypes extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'property_types';

    public $timestamps = false;

    protected $fillable = array('base_type', 'validation_rules', 'enum_order', 'template');

    public function propertyTypeTranslations()
    {
        return $this->hasMany('App\PropertyTypeTranslations', 'property_type_id', 'id');
    }

    public function propertyTypeValues()
    {
        return $this->hasMany('App\PropertyTypeValues', 'property_type_id', 'id');
    }

    public function studentProperties()
    {
        return $this->hasMany('App\StudentProperties', 'property_type_id', 'id');
    }
}
