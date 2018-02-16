<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

class SearchController extends Controller
{
    public  function search(Request $request){
        $search = $request->term;
        $products = Products::where('product_name','LIKE','%'.$search.'%')->get();
        if (count($products)==0){
            $noProduct []= "No Item Found";
            return $noProduct;
        }
       else{
            foreach ($products as $key => $value){
                $searchResult [] = $value->product_name;
           }

       }
        return $searchResult;

    }
}
