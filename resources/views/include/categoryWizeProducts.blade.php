@extends('layouts.homepage')


@section('css')
    <style>
        @media (min-width: 992px) {
            .content {
                width: 94%;
                margin-left: 65px;
            }

        }

    </style>
@endsection
@section('leftsidebar')


@endsection

@section('content')

    <div class="row">
        @if(count($products>'0'))
            @foreach($products as $product)
                <div class="col-md-3 eachproduct">
                    <div class="item">
                        <div class="main">
                            <img class="img-responsive" src="/uploads/products/thumbnails/{{$product->product_thumbnail}}" alt="">
                            <div class="overlay">
                                <div class="text">
                                    <form method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="product_id" value="{{$product->product_foreign_id}}" class="product_cart_id">
                                        <input type="hidden" name="product_name" value="{{$product->product_name}}">
                                        <input type="hidden" name="product_qty" value="1">
                                        <input type="hidden" name="product_price" value="{{$product->product_price}}">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i></button>
                                        <a  href="{{route('productController.singleProducts',$product->product_foreign_id)}}" class="btn btn-primary"><i class="fa fa-external-link"></i></a>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="product-details">
                            <p class="text-center">{{$product->product_name}}</p>
                            <ul class="ratings_tab">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                            <p class="text-center">Price : {{$product->product_price}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            @endif
        @if(count($products)<'1')
                <div class="alert alert-success" role="alert">
                  <h2> No Product In This Category</h2>
                </div>
            @endif
    </div>
        @endsection
@section('rightsidebar')



@endsection


@section('scripts')
    <script>

    </script>
@endsection