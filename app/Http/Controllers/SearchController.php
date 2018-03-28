<?php

namespace App\Http\Controllers;

use App\Products;
use App\User;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

class SearchController extends Controller
{
    public  function search(Request $request){
        $search = $request->term;
        $products = User::where('username','LIKE','%'.$search.'%')->get();
        if (count($products)==0){
            $noProduct []= "No Item Found";
            return $noProduct;
        }
       else{
            foreach ($products as $key => $value){
                $searchResult [] = $value->username;
           }

       }
        return $searchResult;

    }
}
