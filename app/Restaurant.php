<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'restaurant_name', 'restaurant_description'
    ];

    public function address()
    {
        return $this->hasOne(Address::class);
    }
}
