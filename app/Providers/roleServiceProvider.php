<?php

namespace App\Providers;

use App\User_role;
use Illuminate\Support\ServiceProvider;

class roleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $user_role = User_role::all();
        view()->share('user_role',$user_role);


    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
