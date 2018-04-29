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
        $user = User::find($id);
        return view('user.editprofile')->with('users',$user);
    }

    public function show($id){
        $user = User::find($id);
        return view('user.viewProfile')->with('users',$user);
    }
    

}
