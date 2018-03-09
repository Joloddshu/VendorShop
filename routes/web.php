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
})->name('home.index');




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
        Route::get('/showuser','UserController@index')->name('admin.showuser');
        Route::get('/manageuser','UserController@manageuser')->name('admin.manageuser');
        Route::get('/admin/viewuser/{id}','UserController@show')->name('admin.show');
        Route::post('delete','UserController@destroy')->name('admin.delete');
        Route::get('edit/{id}','UserController@edit')->name('admin.edit.get');
        Route::post('edit/{id}','UserController@edit')->name('admin.edit');
    });

    /*
     * Route Group For Vendors
     */
    Route::group(['middleware' => ['auth','vendors']],function (){

       Route::get('/vendors','vendorController@index')->name('vendors.index');
    });
});
