@extends('Vendors.index')

@section('css')
       <style>
        input:not([type]), input[type=text], input[type=password], input[type=email], input[type=url], input[type=time], input[type=date], input[type=datetime], input[type=datetime-local], input[type=tel], input[type=number], input[type=search], textarea.materialize-textarea {
            border-bottom: none !important;
            border:1px solid #efefef !important;
        }
        [type="checkbox"].filled-in:checked+span:not(.lever):after{
            border: 2px solid #EE6E73;
            background-color: #EE6E73;
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
        .empty_space{
            margin-bottom: 30px;
        }
           .product_gallery,.product_image{
               border-top: 1px solid #efefef;
           }
           .publish_products{
               margin-left: 40%;
           }
           .hidden_attr{
               display: none !important;

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
            {{csrf_field()}}
        <div class="product-add-left">
            <div class="col s7 product-field-left">
                <div class="row">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="product_name" type="text" class="validate" name="product_name">
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
                        <input id="price" type="number" class="validate" min="0" name="product_price">
                        <label for="price">Product Price</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="quantity" type="number" class="validate" min="0" name="product_quantity">
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
                                          <input type="checkbox" class="filled-in" name="product_categories"  />
                                          <span>Cloth</span>
                                      </label>
                                  </p>
                                   <p>
                                       <label>
                                           <input type="checkbox" class="filled-in"name="product_categories"  />
                                           <span>Cloth</span>
                                       </label>
                                   </p>
                                   <p>
                                       <label>
                                           <input type="checkbox" class="filled-in" name="product_categories" />
                                           <span>Cloth</span>
                                       </label>
                                   </p>
                                   <p>
                                       <label>
                                           <input type="checkbox" class="filled-in" name="product_categories" />
                                           <span>Cloth</span>
                                       </label>
                                   </p>

                               </div>

                           </div>
                           <div class="empty_space"></div>

                           <div class="product_image">
                               <h6>Product Image</h6>
                               <div class="file-field input-field">
                                   <div class="btn">
                                       <span>Product Image</span>
                                       <input type="file" name="product_thumbnail">
                                   </div>
                                   <div class="file-path-wrapper">
                                       <input class="file-path validate" type="text" placeholder="Upload one files"name="product_thumbnail">
                                   </div>
                               </div>
                           </div>

                           <div class="empty_space"></div>

                           <div class="product_gallery">
                               <h6>Product Gallery image</h6>
                               <div class="file-field input-field">
                                   <div class="btn">
                                       <span>Product Gallery</span>
                                       <input type="file" multiple name="product_gallery" id="product_gallery">
                                   </div>
                                   <div class="file-path-wrapper">
                                       <input class="file-path validate" type="text" placeholder="Upload one or more files" name="product_gallery" id="product_gallery">
                                       <span class="helper-text" data-error="wrong" data-success="right">Upload max 5 images</span>
                                        <span class="helper-text maxsizecheck hidden_attr">Your Can Add Only 5 Images</span>
                                   </div>
                               </div>
                           </div>

                       </div>
                    <div class="empty_space"></div>
                    <div class="publish_products">
                        <button class="btn waves-effect waves-light"  id="product_submit" type="submit" name="action">Publish Product
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>
    @endsection

@section('js')
    <script>
        $(document).ready(function(){

            $('#product_gallery').blur(function(){
                if(this.files.length>=5){
                    $('.maxsizecheck').removeClass('hidden_attr');
                    $('#product_submit').attr('disabled','disabled');
                }
            });
        });
    </script>
    @endsection