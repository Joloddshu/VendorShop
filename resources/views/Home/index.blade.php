@extends('layouts.homepage')

@section('slider')
@include('include.slider')
    @endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    @endsection
@section('leftsidebar')
    <div id="categoriesbtn" style="background: transparent !important">
        <button id="btnCategoryOpen" class="btn btn-primary dropdown-toggle" type="button" >
            <i class="fa fa-bars" aria-hidden="true"></i> All Categories
        </button>
    </div>
    <div class="product-categories">
        <ul class="list-group">
            @foreach($categories as $category)
            <li class="list-group-item"><a href="{{route('Category.getProducts',$category->category_id)}}">
                    <i class="{{$category->category_icon}} " aria-hidden="true"></i>
                      {{$category->category_name}}
                           <span class="badge badge-primary badge-pill pull-right">
                                 {{\App\Products_detail::where('Product_categories','=',$category->category_name)->count()}}
                           </span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

    @endsection

@section('content')
    <div id="policy">

            <div class="row" >
                <div class="col-md-3 support" style="display: inline-flex">
                    <span class="lnr lnr-rocket policyicon"></span>
                    <a class="support-link" href="#"><div class="policy_text">
                            <p>Free Shipping</p>
                            <p>Free Shipping On All Order</p>
                        </div></a>
                </div>
                <div class="col-md-3 support" style="display: inline-flex">
                    <span class="lnr lnr-sync policyicon"></span>
                    <a class="support-link" href=""><div class="policy_text">
                            <p>Money Guaranty</p>
                            <p>100% Money Back Guaranty</p>
                        </div></a>
                </div>
                <div class="col-md-3 support" style="display: inline-flex">
                    <span class="lnr lnr-bubble policyicon"></span>
                    <a class="support-link" href=""><div class="policy_text">
                            <p>Free Shipping</p>
                            <p>Free Shipping On All Order</p>
                        </div></a>
                </div>
                <div class="col-md-3 support" style="display: inline-flex">
                    <i class="fa fa-rocket policyicon"></i>
                    <a class="support-link" href=""><div class="policy_text">
                            <p>Free Shipping</p>
                            <p>Free Shipping On All Order</p>
                        </div></a>
                </div>
            </div>
        </div>

<!-- Latest Products-->
    <div class="row">
  <div class="latest-products">
      <h3 class="text-center">Latest Products</h3>

      <div id="owl-demo" class="owl-carousel owl-theme">
          @foreach($productDetails as $product)
              <div class="item">
                  <div class="main">
                      <img class="img-responsive" src="/uploads/products/thumbnails/{{$product->product_thumbnail}}" alt="">
                      <div class="overlay">
                          <div class="text">
                              <form method="post">
                                  {{csrf_field()}}
                              <input type="hidden" name="product_id" value="{{$product->product_id}}" class="product_cart_id">
                              <input type="hidden" name="product_name" value="{{$product->product_name}}">
                              <input type="hidden" name="product_qty" value="1">
                              <input type="hidden" name="product_price" value="{{$product->product_price}}">
                                  <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i></button>
                                  <a  href="{{route('productController.singleProducts',$product->product_id)}}" class="btn btn-primary"><i class="fa fa-external-link"></i></a>
                                  <button type="submit" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button>
                              </form>
                          </div>

                      </div>
                  </div>
                  <div class="product-details">
                      <p class="text-center">{{$product->product_name}}</p>
                      <ul class="ratings">
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                      </ul>
                      <p class="text-center">Price : {{$product->product_price}}</p>
                    </div>
                  </div>

          @endforeach
              </div>
  </div>
    </div>
    @endsection
@section('rightsidebar')

    Hello Right

    @endsection

@section('Products_tab')
    <!-- Products Tab-->

    <div class="row">
        <div class="border-tab">
            <div style="background: linear-gradient(to bottom, #fafafa 0%, #e7e7e7 100%);height: 10px"></div>
        <div class="container ">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#featuredProduct">Featured Products</a></li>
                <li><a data-toggle="tab" href="#BestSellingProducts">Best Selling products</a></li>
                <li><a data-toggle="tab" href="#SpecialProducts">Special products</a></li>
            </ul>
        </div>
        </div>
        <div style="background: linear-gradient(to bottom, #fafafa 0%, #e7e7e7 100%);height: 10px"></div>
        <div class="empty-space"></div>
  <section id="tabproducts">
            @include('include.productTab')
  </section>

    </div>
    @endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $("#btnCategoryOpen").click(function(){
                $(".product-categories").slideToggle("slow");

            });
            $('#owl-demo').owlCarousel({
                loop:false,
                margin:10,
                nav:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2
                    },
                    1000:{
                        items:3
                    }
                }
            });

        $('.addToCart').on('click',function(event){
            var product = $(this).parent().find('.product_cart_id').val();
            alert(product);
            event.preventDefault();
        });
            $('#home-tab').tab('show');
        });

    </script>
    @endsection