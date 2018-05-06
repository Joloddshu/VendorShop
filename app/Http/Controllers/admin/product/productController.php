<?php

namespace App\Http\Controllers\admin\product;

use App\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /* $productList = DB::table('products_details')
           ->join('products', 'products_details.product_foreign_id', '=', 'products.product_id')
           ->select('products_details.*', 'products_details.product_foreign_id', 'products.*')
           ->get(); */
       $productList = DB::table('products')
           ->join('products_details', 'products.product_id', '=', 'products_details.product_foreign_id')
           ->join('users', 'products.seller_id', '=', 'users.id')
           ->select('products.*', 'products.seller_id', 'users.*','products.product_id', 'products_details.*')
           ->paginate(5);
       return view('admin.manageProduct')->with('productsList',$productList);
    }


    public function deleteProduct(Request $request){
            $products_details = DB::table('products_details')->where('product_foreign_id','=',$request->product_id)->delete();
            $products = DB::table('products')->where('product_id','=',$request->product_id)->delete();
            return back();

    }

    public function approve(Request $request){
            $product = Products::find($request->approve_id);
            $product->status='1';
            $product->save();
            return back()->with('approveMessage',"Product Approved");
    }

    public  function  block(Request $request){
        $product = Products::find($request->blockId);
        $product->status='0';
        $product->save();
        return back()->with('blockMessage',"Product Blocked");
    }
}
