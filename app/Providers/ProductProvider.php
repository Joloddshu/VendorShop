<?php

namespace App\Providers;

use App\Products;
use App\Products_detail;
use App\User;
use App\Products_image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
class ProductProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     * Count the product of Seller
     */
    public function boot()
    {
        $productDetail = DB::table('products_details')
            ->join('products', 'products_details.product_foreign_id', '=', 'products.product_id')
            ->select('products_details.*', 'products_details.product_foreign_id', 'products.product_id')
            ->where('status','=','1')->limit(6)->orderBy('product_id', 'desc')
            ->get();
        view()->share('productDetails',$productDetail);
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
