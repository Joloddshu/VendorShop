<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products_image extends Model
{
    protected $primaryKey='products_images_id';
    protected $fillable=([
        'product_table_id','product_image'
    ]);
    public function products_details(){
        return $this->belongsTo('App\Products');
    }

}
