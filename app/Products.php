<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $primaryKey='product_id';
    protected $fillable = [
        'product_id','seller_id'
        ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function products_detail(){
        return $this->hasOne('App\products_detail');
    }
    public function Product_image(){
        return $this->hasMany('App\Products_image');
    }
}
