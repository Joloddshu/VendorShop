<div class="container-fluid ">
    <div class="tab-content">
        <div id="featuredProduct" class="tab-pane fade in active">
            <div class="row">
                @foreach($featuredProducts as $featuredProduct)
                    <div class="col-md-3 eachproduct">
                        <div class="item">
                            <div class="main">
                                <img class="img-responsive" src="/uploads/products/thumbnails/{{$featuredProduct->product_thumbnail}}" alt="">
                                <div class="overlay">
                                    <div class="text">
                                        <form method="post" action="{{route('cart.add')}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="product_id" value="{{$featuredProduct->product_id}}" class="product_cart_id">
                                            <input type="hidden" name="product_name" value="{{$featuredProduct->product_name}}">
                                            <input type="hidden" name="product_qty" value="1">
                                            <input type="hidden" name="product_price" value="{{$featuredProduct->product_price}}">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i></button>
                                            <a  href="{{route('productController.singleProducts',$featuredProduct->product_id)}}" class="btn btn-primary"><i class="fa fa-external-link"></i></a>
                                        </form>
                                    </div>

                                </div>
                            </div>
                            <div class="product-details">
                                <p class="text-center">{{$featuredProduct->product_name}}</p>
                                <ul class="ratings_tab">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                                <p class="text-center">Price : {{$featuredProduct->product_price}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <div id="BestSellingProducts" class="tab-pane fade">
            <div class="row">
                @foreach($featuredProducts as $featuredProduct)
                    <div class="col-md-3 eachproduct">
                        <div class="item">
                            <div class="main">
                                <img class="img-responsive" src="/uploads/products/thumbnails/{{$featuredProduct->product_thumbnail}}" alt="">
                                <div class="overlay">
                                    <div class="text">
                                        <form method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="product_id" value="{{$product->product_id}}" class="product_cart_id">
                                            <input type="hidden" name="product_name" value="{{$product->product_name}}">
                                            <input type="hidden" name="product_qty" value="1">
                                            <input type="hidden" name="product_price" value="{{$product->product_price}}">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i></button>
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-external-link"></i></button>
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                            <div class="product-details">
                                <p class="text-center">{{$featuredProduct->product_name}}</p>
                                <ul class="ratings_tab">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                                <p class="text-center">Price : {{$featuredProduct->product_price}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <div id="SpecialProducts" class="tab-pane fade">
            <div class="row">
                @foreach($featuredProducts as $featuredProduct)
                    <div class="col-md-3 eachproduct">
                        <div class="item">
                            <div class="main">
                                <img class="img-responsive" src="/uploads/products/thumbnails/{{$featuredProduct->product_thumbnail}}" alt="">
                                <div class="overlay">
                                    <div class="text">
                                        <form method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="product_id" value="{{$featuredProduct->product_id}}" class="product_cart_id">
                                            <input type="hidden" name="product_name" value="{{$featuredProduct->product_name}}">
                                            <input type="hidden" name="product_qty" value="1">
                                            <input type="hidden" name="product_price" value="{{$featuredProduct->product_price}}">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i></button>
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-external-link"></i></button>
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                            <div class="product-details">
                                <p class="text-center">{{$featuredProduct->product_name}}</p>
                                <ul class="ratings_tab">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                                <p class="text-center">Price : {{$featuredProduct->product_price}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>