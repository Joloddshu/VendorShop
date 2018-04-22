<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\DB;

class featuredProductProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $featuredProduct = DB::table('products_details')
            ->join('products', 'products_details.product_foreign_id', '=', 'products.product_id')
            ->select('products_details.*', 'products_details.product_foreign_id', 'products.product_id')
            ->where('status','=','1')->limit(6)->orderBy('product_id', 'desc')
            ->get();
        view()->share('featuredProducts',$featuredProduct);
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
