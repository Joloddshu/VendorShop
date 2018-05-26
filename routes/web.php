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
    return view('Home.index');
})->name('home.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/verifyEmailFirst','Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');
Route::get('/verify/{email}/{verifyToken}','Auth\RegisterController@sendEmailDone')->name('sendEmailDone');
Route::post('/checkemail','Auth\RegisterController@checkemail')->name('Register.checkemail');  //laravel ajax call to check if the Email available or not
Route::get('/search','SearchController@search')->name('searchproduct');
Route::get('/categories/{id}','productCategoryController@getProduct')->name('Category.getProducts');
Route::get('/cart/add/{id}','cartController@addToCart')->name('cart.add');
Route::get('/products/view  /{id}','cartController@addToCart')->name('product.view');
Route::get('/user/{id}','ProfileController@show')->name('user.show'); //Retrieve the User profile Using the id
Route::get('/product/{id}','productController@singleProducts')->name('productController.singleProducts');

//cart add

Route::post('/cart','cartController@store')->name('cart.add');

/*
 * check user have session or not
*/
Route::group(['middleware' => ['auth']],function (){

    Route::get('/log','HomeController@loggeduser'); //test the Middleware Works or Not

    Route::get('/edit/{id}','ProfileController@getEditProfile')->name('user.editprofile'); //Retrieve the User profile Using the id

    /*
    * Route group for admin
    */
    Route::group(['middleware' => ['auth','admin']],function (){

        //User Route Group For the Admin
        //To handle the specific request
        Route::get('/admin','adminController@index')->name('admin.index'); // show the admin main page
        Route::get('/showuser','UserController@index')->name('admin.showuser');//show the admin show user pages
        Route::get('/manageuser','UserController@manageuser')->name('admin.manageuser');//show the admin manage user page
        Route::post('delete','UserController@destroy')->name('admin.delete'); //open the delete modal
        Route::get('edit/user/{id}','UserController@edit')->name('admin.edit.get'); //trying to get the user details and admin can modify them
        Route::post('/edit/user/{id}','UserController@update')->name('admin.update.user_role'); //change the user role using the post information
        Route::get('/manage/product','admin\product\productController@index')->name('admin.manageProduct');
        Route::post('/product/delete','admin\product\productController@deleteProduct')->name('admin.deleteProduct');
        Route::post('/product/approve','admin\product\productController@approve')->name('admin.approve');
        Route::post('/product/block','admin\product\productController@block')->name('admin.block');
        //Product Route Group For the Admin
        //To handle the specific request

        Route::get('products/Category','productCategoryController@index')->name('productCategory.index');//show the category page
        Route::post('/products/category/addCategory','productCategoryController@addcategory')->name('Category.addCategory');
        Route::post('/products/category/editCategory','productCategoryController@editCategory')->name('Category.editCategory');
        Route::post('products/category/delete','productCategoryController@deleteCategory')->name('Category.deleteCategory');


    });

    /*
     * Route Group For Vendors
     */
    Route::group(['middleware' => ['auth','vendors']],function (){

        Route::get('/vendors','vendorController@index')->name('vendors.dashboard');
        Route::get('vendors/addproduct','productController@index')->name('addproduct.index');
        Route::post('vendors/addproduct','productController@store')->name('addproduct.store');
        Route::get('/vendors/manageproducts','productController@getProductList')->name('manageProduct.getProductList');
        Route::get('/products/edit/{id}','productController@edit')->name('editProducts.edit');
        Route::get('/products/view/{id}','productController@show')->name('ViewProducts.show');

    });
});
