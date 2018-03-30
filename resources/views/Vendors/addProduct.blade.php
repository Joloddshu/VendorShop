@extends('Vendors.index')

@section('css')
       <style>
        input:not([type]), input[type=text], input[type=password], input[type=email], input[type=url], input[type=time], input[type=date], input[type=datetime], input[type=datetime-local], input[type=tel], input[type=number], input[type=search], textarea.materialize-textarea {
            border-bottom: none !important;
            border:1px solid #efefef !important;
        }
           #product_short_descrition{
               height:150px;
               resize: none;
               border:1px solid #efefef !important;
           }
           #label_Size{
               font-size: 20px;
           }
            #product_long_description{
                min-height: 200px;
                border:1px solid #efefef !important;
                resize: none;
            }
            .product_extra{
                margin-left: 20%;
                border:1px solid #efefef;
            }

           .product_categories>h6{
               padding-left: 30px;
               font-size: 20px;
               border-bottom: 1px solid #efefef;
           }
        .category_show {
            padding-left: 30px;
        }

       </style>
@endsection

@section('maincontent')
    <div class="add-product">
        <div class="row">
            <div class="col s12">
                <div class="addproduct_top">
                    <h3>Add Product</h3>
                </div>
            </div>
        </div>

        <form method="post">
        <div class="product-add-left">
            <div class="col s7 product-field-left">
                <div class="row">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="product_name" type="text" class="validate">
                            <label id="label_Size" for="product_name">Product Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea name="product_short_descrition" id="product_short_descrition" maxlength="300"></textarea>
                            <label id="label_Size" for="product_short_descrition">Product Short Description</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea name="product_long_description" id="product_long_description" ></textarea>
                            <label id="label_Size" for="product_long_description">Product Long Description</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="price" type="number" class="validate" min="0">
                        <label for="price">Product Price</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="quantity" type="number" class="validate" min="0">
                        <label for="quantity">Product Quantity</label>
                    </div>
                </div>

            </div>
        </div>
        <div class="product-add-right">
                <div class="col s5">
                       <div class="product_extra">

                           <div class="product_categories row">
                               <h6>Product Categories</h6>
                               <div class="category_show">
                                  <p>
                                      <label>
                                          <input type="checkbox" class="filled-in"  />
                                          <span>Cloth</span>
                                      </label>
                                  </p>
                                   <p>
                                       <label>
                                           <input type="checkbox" class="filled-in"  />
                                           <span>Cloth</span>
                                       </label>
                                   </p>
                                   <p>
                                       <label>
                                           <input type="checkbox" class="filled-in"  />
                                           <span>Cloth</span>
                                       </label>
                                   </p>
                                   <p>
                                       <label>
                                           <input type="checkbox" class="filled-in"  />
                                           <span>Cloth</span>
                                       </label>
                                   </p>

                               </div>

                           </div>
                       </div>
                </div>
            </div>
        </form>
    </div>
    @endsection

@section('js')

    @endsection