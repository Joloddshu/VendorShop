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

           #label_Size{
               font-size: 20px;
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
           #product_short_description{
               resize:none;
               overflow:auto;
           }
       </style>
       <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=odwwdcg71lz8xl030fcjuot4w2yk16dunkpvb1lz613tcz8r"></script>


       <script>
           tinymce.init({
               selector: '#product_short_description,#product_long_description',
               menubar:    false,
               resize :false,
               height:400

           });
       </script>
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

        <form method="post" enctype="multipart/form-data">
            {{csrf_field()}}
        <div class="product-add-left">
            <div class="col s7 product-field-left">
                <div class="row">
                    <div class="row">
                        <h6>Product Name</h6>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="product_name" type="text" class="validate" name="product_name">
                        </div>
                    </div>
                    <div class="row">
                        <h6>Product Short Description</h6>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea name="product_short_description" id="product_short_description" maxlength="300"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <h6>Product Long Description</h6>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea name="product_long_description" id="product_long_description" ></textarea>
                        </div>
                    </div>
                </div>



            </div>
        </div>
        <div class="product-add-right">
                <div class="col s5">
                       <div class="product_extra">
                           <div class="row">
                               <div class="input-field col s12">
                                   <h6>Product Price</h6>
                                   <input id="product_price" type="number" class="validate" min="0" name="product_price">
                               </div>
                               <div class="input-field col s12">
                                   <h6>Product Quantity</h6>
                                   <input id="product_quantity" type="number" class="validate" min="0" name="product_quantity">
                               </div>
                           </div>
                           <div class="product_categories row">
                               <h6>Product Categories</h6>
                               <div class="category_show">
                                   <div class="input-field col s12">
                                       <select name="product_categories" id="categories">
                                           <option value="" disabled selected>Choose Category</option>
                                            @foreach($categories as $category)
                                               <option >
                                                   {{$category->category_name}}
                                               </option>
                                                @endforeach
                                       </select>

                                   </div>


                               </div>

                           </div>
                           <div class="empty_space"></div>

                           <div class="product_image">
                               <h6>Product Image</h6>
                               <div class="file-field input-field">
                                   <div class="btn">
                                       <span>Product Image</span>
                                       <input type="file" id="product_thumbnail" name="product_thumbnail">
                                   </div>
                                   <div class="file-path-wrapper">
                                       <input id="product_thumbnail" class="file-path validate" type="text" placeholder="Upload one files"name="product_thumbnail">
                                   </div>
                               </div>
                           </div>

                           <div class="empty_space"></div>
k8
                           <div class="product_gallery">
                               <h6>Product Gallery image</h6>
                               <div class="file-field input-field">
                                   <div class="btn">
                                       <span>Product Gallery</span>
                                       <input type="file"  name="product_gallery" id="product_gallery" multiple>
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
            $('select').formSelect();
//max file 5
            $('#product_gallery').blur(function(){
                if(this.files.length>=5){
                    $('.maxsizecheck').removeClass('hidden_attr');
                    $('#product_submit').attr('disabled','disabled');
                }
            });
            //form validation front end
            $('#product_submit').click(function(event){

                var product_name = $('#product_name').val();
                var product_short_description = $('#product_short_description').val();
                var product_long_description = $('#product_long_description').val();
                var product_price = $('#product_price').val();
                var product_quantity = $('#product_quantity').val();
                var product_categories = $('#product_categories').val();
                var product_thumbnail = $('#product_thumbnail').val();
                var product_gallery = $('#product_gallery').val();

                if(product_name==''){
                    event.preventDefault();
                    M.toast({html: 'Product Name Needed'})
                }

                if(product_price==''){
                    event.preventDefault();
                    M.toast({html: 'Product Price Needed'})

                }
                if(product_quantity==''){
                    event.preventDefault();
                    M.toast({html: 'Product Quantity Needed'})
                }
                if(product_categories==''){
                    event.preventDefault();
                    M.toast({html: 'Product Categories Must'})
                }
                if(product_thumbnail==''){
                    event.preventDefault();
                    M.toast({html: 'Need A ThumbNail image f'})
                }
            });
        //    var quill = new Quill('#product_long_description', {
              //  theme: 'snow'
        //    });
        });
    </script>
    @endsection