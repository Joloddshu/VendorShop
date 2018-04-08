<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products_detail extends Model
{
    protected $fillable=([
        'product_foreign_id','product_name','product_price','product_quantity',
        'product_thumbnail','product_long_description','product_short_description','Product_categories'
    ]);
    public function products(){
        return $this->belongsTo('App\Products');
    }

}
