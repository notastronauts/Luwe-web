<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StateAndProvince extends Model
{
    protected $fillable = [
        'province_id',
        'province_name',
        'province_name_en'
    ];


    public function city()
    {
        return $this->hasMany(City::class, 'province_id', 'province_id');
    }
}
