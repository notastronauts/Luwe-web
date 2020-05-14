<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostalCode extends Model
{
    protected $fillable = [
        'urban',
        'sub_district',
        'postal_code',
    ];

    public function sub_district()
    {
        return $this->belongsToMany(SubDistrict::class, 'sub_district_postal_codes', 'postal_id', 'sub_district_id', 'id', 'sub_district_id');
    }

    public function address()
    {
        $this->hasOne(Address::class);
    }
}
