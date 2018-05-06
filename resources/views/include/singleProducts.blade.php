@extends('layouts.homepage')


@section('css')
    <style>
        .nav-tabs{
            left:0% !important;
            border: 1px solid #efefef;
            border-bottom: 1px solid #efefef!important;
        }
        .nav-tabs>li>a{
            padding: 20px 80px ;
        }
        .product-long-description{
            border:1px solid #efefef;
        }
    </style>
@endsection
@section('leftsidebar')


@endsection

@section('content')
<div class="row">
        <div class="alert alert-info" role="alert">
            <h4 style="color: #000"> Products > {{$product->Product_categories}} > {{$product->product_name}}</h4>
        </div>
</div>
    <!-- Single Products-->
    <div class="row">
            <div class="col-md-4 singleimage">
                <img class="img-responsive" src="/uploads/products/thumbnails/{{$product->product_thumbnail}}" alt="">
            </div>
            <div class="col-md-8 singleImageDetails">
                <h2>{{$product->product_name}}</h2>
                <p>{!! $product->product_short_description !!}</p>
                <h3 style="color: #156192 ;">Price : {{$product->product_price}}</h3>
                <div class="row">
                    <div class="col-md-3">
                        <form action="#">
                            <div class="form-group">
                                <input type="number" class="form-control" id="productQuantitys"
                                       aria-describedby="productQuantity" placeholder="1" min="1">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-9">
                        <button class="btn btn-primary">Add To Cart</button>
                    </div>
                </div>
            </div>

    </div>
    <div style="height: 60px;"></div>
    <div class="row singleTab">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#Description">Description</a></li>
            <li><a data-toggle="tab" href="#Reviews">Reviews</a></li>
        </ul>
        <div style="height: 30px;"></div>
        <div class="tab-content">
            <div id="Description" class="tab-pane fade in active">
                    <h3>Details Of {{$product->product_name}}</h3>
                    <div style="height: 10px;"></div>
                    <p>
                        {!! $product->product_long_description !!}
                    </p>
            </div>
            <div id="Reviews" class="tab-pane fade">
                Product Review Page
            </div>
        </div>
    </div>

@endsection
@section('rightsidebar')



@endsection


@section('scripts')
    <script>

    </script>
@endsection