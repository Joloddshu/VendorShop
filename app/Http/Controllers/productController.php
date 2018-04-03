<?php

namespace App\Http\Controllers;

use App\product_category;
use App\Products;
use App\Products_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vendors.addproduct');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     *
     * Get input from them form data and Send that data
     * to the database after validating that those
     * are correct
     */
    public function store(Request $request)
    {
        $product = Products::create([
            'seller_id' =>Auth::user()->id
        ]);
        //grab the thumnail file from the input field and store it in the /public/products folder
        if($request->hasFile('product_thumbnail'))
        {
            $file = $request->file('product_thumbnail');
            $filename= Auth::user()->id.'-'.rand(1000,9999).'.'.$file->getClientOriginalExtension();;
            $file->move('uploads/products/thumnails', $filename);
        }
        $product_details = Products_detail::create([
            'product_foreign_id'          =>$product->product_id,
            'product_name'                =>$request->product_name,
            'product_price'               =>$request->product_price,
            'product_quantity'            =>$request->product_quantity,
            'product_short_description'   =>$request->product_quantity,
            'product_long_description'    =>$request->product_long_description,
            'product_thumbnail'           =>$filename,
            'Product_categories'          =>$request->product_categories,
        ]);

        return $request->all();
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
}
