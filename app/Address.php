<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{   
    protected $fillable = ['address', 'sub_district_id', 'postal_id'];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function postal_code()
    {
        return $this->belongsTo(PostalCode::class, 'postal_id', 'id');
    }

    public function sub_district()
    {
        return $this->belongsTo(SubDistrict::class, 'sub_district_id', 'sub_district_id');
    }
}
