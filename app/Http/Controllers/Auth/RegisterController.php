<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;
use App\Profile;
use App\Mail\verifyEmail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phonenumber' => 'required|string|min:6|max:11',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        Session::flash('status', "Successfully Registered !! Please Verify Your Email Address");
        $user = User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phonenumber' => $data['phonenumber'],
            'verifyToken' => Str::random(40),

        ]);
        Profile::create([
            'user_id' =>$user->id
        ]);
        $thisUser = User::findorFail($user->id);
        $this->sendEmail($thisUser);
        return $user;
    }


    /**
     * Send Email to the user
     *
     * 
     * 
     */

    public function sendEmail($thisUser)
    {
        Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
    }



    public function verifyEmailFirst()
    {
        return view('email.verifyEmailFirst');
    }

 /**
     * Create a new user instance after a valid registration.
     *
     * then send mail to the user using the function
     * 
     */

    public function sendEmailDone($email, $verifyToken)
    {
        $user = User::where(['email' => $email, 'verifyToken' => $verifyToken])->first();
        if ($user) {
            user::where(['email' => $email, 'verifyToken' => $verifyToken])->update(['status' => '1', 'verifyToken' => null]);
            return redirect()->route('login')->with('status', 'You can now login with your email and password !');

        } else {
            return redirect()->route('login')->with('status', 'User Token Expired Or You Already Confirm Your Registration');
        }
    }


     /**
     * Create a new user instance after a valid registration.
     *
     * Check the email is available or not when some one fill the email field in the register
     * 
     */

    public  function  checkemail(Request $request){
        $user = DB::table('users')->where('email',$request->email)->count();
        if($request->ajax())
        {
            if($user=='0'){
                return response()->json('available');
            }
            return response()->json('Not available');
        }
    }
}
