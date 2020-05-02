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
}
