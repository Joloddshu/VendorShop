<?php

namespace App\Http\Controllers\admin\product;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function deleteProduct(Request $request){
            $products_details = DB::table('products_details')->where('product_foreign_id','=',$request->product_id)->delete();
            $products = DB::table('products')->where('product_id','=',$request->product_id)->delete();
            return back();

    }
}
