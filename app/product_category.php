<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_category extends Model
{
    public $table="product_categories";
    protected $primaryKey ='category_id';
    protected $fillable =[
      'category_name','category_icon'
    ];
}
