<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /*
     * Relation To the user model
     */
    protected $fillable = [
        'user_id',
        'created_at',
        'updated_at'
    ];

    public function  user(){
        return $this->belongsTo('App\User');
    }
}
