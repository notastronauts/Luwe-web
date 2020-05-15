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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->belongsToMany(ImageModel::class, 'restaurant_images', 'restaurant_id', 'image_id', 'id', 'id');
    }

    public function meja()
    {
        return $this->hasMany(Meja::class, 'restaurant_id');
    }
}
