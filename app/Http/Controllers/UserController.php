<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Profile;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
     * show  All user
     * pagination 20
     */
    public function index()
    {
        $userdetails = DB::table('users')->orderBy('id', 'desc')->paginate(20);

        return view('admin.showuser')->with('Showuser',$userdetails);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /*
     * open the manage user page From the admin panel
     */
    public function manageuser(){
        $manageuser = DB::table('users')->orderBy('id', 'desc')->paginate(20);
        return view('admin.manageuser')->with('manageuser',$manageuser);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /*
     * trying to show the user edit page in the admin area
     * can modify only the user role and monitor the user activity
     */
    public function edit($id)
    {

        $edituser =User::with('profile')->find($id);


        return view('admin.edituser')->with('edituser',$edituser);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = User::where('id',$id)->update(['role'=>$request->role_name,'userStatus'=>$request->status,'updated_at'=>Carbon::now()]);
        return redirect()->route('admin.manageuser')->with('message','User Role Changed Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *Remove the use from the database using the Request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*
     * Grab the id from the request using ajax and jquery and trying to delete the user using there id
     * Further Development that move to another table called trash user
     */
    public function destroy(Request $request)
    {
        User::where('id', $request->id)->delete();



    }
}
