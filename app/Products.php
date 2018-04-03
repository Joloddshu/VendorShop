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
    public function product_details(){
        return $this->hasOne('App\product_detail');
    }
}
