<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'city_id',
        'city_name',
    ];
    
    public function province()
    {
        return $this->belongsTo(StateAndProvince::class, 'province_id', 'province_id');
    }

    public function sub_district()
    {
        return $this->hasMany(SubDistrict::class, 'city_id', 'city_id');
    }
}
