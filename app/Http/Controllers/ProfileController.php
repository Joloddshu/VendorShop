<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

/*
 * Not Done yet
 */
class ProfileController extends Controller
{
   //get the profile details
    public function getEditProfile($id){
        $user = DB::table('users')->where('id',$id)->first();
        return view('user.editprofile')->with('user',$user);
    }


    

}
