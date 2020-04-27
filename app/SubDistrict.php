<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubDistrict extends Model
{
    protected $fillable = [
        'sub_district_id',
        'sub_district_name'
    ];

    //$postal = PostalCode::where('id', 1)->firstOrFail();
    //$district = SubDistrict::where('sub_district_id', 1101010)->firstOrFail();
    //$district->postal_code()->attach($postal);
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'city_id');
    }

    public function village()
    {
        return $this->hasMany(Village::class, 'sub_district_id', 'sub_district_id');
    }

    public function postal_code()
    {
        return $this->belongsToMany(PostalCode::class, 'sub_district_postal_codes', 'sub_district_id', 'postal_id');
    }
}
