@extends('layouts.homepage')

@section('slider')
@include('include.slider')
    @endsection
@section('css')
    <style>
        #owl-demo .item{
            background: #efefef;
            padding-bottom: 10px;
            margin: 10px;
            color: #FFF;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            text-align: center;
        }
        .customNavigation{
            text-align: center;
        }
          .customNavigation a{
              -webkit-user-select: none;
              -khtml-user-select: none;
              -moz-user-select: none;
              -ms-user-select: none;
              user-select: none;
              -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
          }
          .latest-products{
              border: 1px solid #efefef;
          }
        .ratings{
            display: inline-flex;
            color: gold;
            margin-right: 11%;
        }
        .details>p{
            color: #000;
            font-size: 18px;
        }
        .more-options{
            display: inline-flex;
            margin-right: 11%;
        }
        .more-options>li{
            padding:10px;
        }
        .more-details{
            visibility: hidden;
            height: 0px;
        }
        .item:hover .more-details{
            position: relative;
            bottom: 265px;
            visibility: visible;

        }
    </style>
    @endsection
@section('leftsidebar')

    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Product Categories
        </li>
        @foreach($categories as $category)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{route('Category.getProducts',$category->category_id)}}">
                {{$category->category_name}}
            </a>
            <span class="badge badge-primary badge-pill">
                {{\App\Products_detail::where('Product_categories','=',$category->category_name)->count()}}
            </span>
        </li>
        @endforeach
    </ul>

    @endsection
@section('content')
  <div class="latest-products">
      <h3 class="text-center">Latest Products</h3>

      <div id="owl-demo" class="owl-carousel owl-theme">
          @foreach($productDetails as $product)
              <div class="item">
                  <img class="img-reponsive" src="/uploads/products/thumbnails/{{$product->product_thumbnail}}" alt="">
                  <div class="details">
                      <p>{{$product->product_name}}</p>
                      <ul class="ratings">
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                      </ul>
                      <p class="text-center">Price : {{$product->product_price}}</p>
                      <div class="more-details">
                          <div class="view-product">
                              <a class="btn btn-info" href="#">View Details <i class="fa fa-external-link"></i></a>
                          </div>
                          <div class="add-to-cart" style="padding-top: 10px">
                              <a class="btn btn-info " href="#">Add To Cart <i class="fa fa-shopping-bag"></i></a>
                          </div>

                      </div>
                  </div>
              </div>
          @endforeach

      </div>

  </div>
    @endsection
@section('rightsidebar')

    Hello Right

    @endsection
@section('scripts')
    <script>
        $(document).ready(function() {

            var owl = $("#owl-demo");

            owl.owlCarousel();
        });
    </script>
    @endsection