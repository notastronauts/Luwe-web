<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{   
    protected $fillable = ['address'];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
