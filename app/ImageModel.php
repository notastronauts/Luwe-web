<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageModel extends Model
{
    protected $fillable = ['name'];

    public function restaurant()
    {
        return $this->belongsToMany(Restaurant::class, 'restaurant_images', 'restaurant_id', 'image_id', 'id', 'id');
    }
}
