<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home.index');
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/verifyEmailFirst','Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');
Route::get('/verify/{email}/{verifyToken}','Auth\RegisterController@sendEmailDone')->name('sendEmailDone');
Route::get('/search','SearchController@search');

/*
 * check user have session or not
*/
Route::group(['middleware' => ['auth']],function (){

    Route::get('/log','HomeController@loggeduser');

/*
* Route group for admin
*/
    Route::group(['middleware' => ['auth','admin']],function (){

        Route::get('/admin','adminController@index')->name('admin.index');
        Route::get('/showuser','usercontroller@index')->name('admin.showuser');
    });

    /*
     * Route Group For Vendors
     */
    Route::group(['middleware' => ['auth','vendors']],function (){

       Route::get('/vendors','vendorController@index')->name('vendors.index');
    });
});
