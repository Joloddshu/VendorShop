<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products_image extends Model
{
    public function products_details(){
        return $this->belongsTo('App\Products_details');
    }
}
