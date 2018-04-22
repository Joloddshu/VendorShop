<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\product_category;
use App\Products_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productCategoryController extends Controller
{
    /*
     * get Category From the db and send them to the admin categories area
     */
    public  function index(){
        $productCategory = product_category::all();
        return view('admin.productCategory')->with('Categories',$productCategory);
    }
    /*
     * check the category that is exists or not
     * take the input from the field
     * save them to database

     */
    public function addCategory(CategoryRequest $request){
        product_category::create([
            'category_name' =>$request->categoryName,
            'category_icon' =>$request->categoryIcon
        ]);
        return back();
    }
/*
 * get the category id
 * from the hidden field
 * using bootstrap remote data pass from button to modal
 * update the filed
 */
    public function editCategory (Request $request){
        $category = product_category::findOrFail($request->category_id);
        $category->update($request->all());
        return back();
    }

    /*
     * getting the admin request
     * delete them from the database
     */
    public function deleteCategory(Request $request){
        $category =product_category::findorfail($request->category_id);
        $category->delete();
        return back();
    }
    /*
     * Get Product according to the Category
     *
     */
     public function getProduct($id)
        {
            $getCategoryId = product_category::find($id);
            $getProductList = Products_detail::where('Product_categories','=',$getCategoryId->category_name)->get();
            return response()->json($getProductList);
        }


}
