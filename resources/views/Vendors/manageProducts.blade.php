@extends('Vendors.index')

@section('css')
    <style>
        .badge-pending{
            position: relative;
            top:0 !important;
            left:0;
            background: #EE6E73!important;
        }
        .badge-approved{
            position: relative;
            top: 0 !important;
            left:0;
            background: green !important;
        }
        table{
            border: 1px solid #efefef;
        }
    </style>
@endsection

@section('maincontent')
    <div class="row">
        <div class="col s12">
            <div class="product_table">
                <h3 style="text-align: center">Manage Products</h3>
                <table class="responsive-table highlight" >
                    <thead>
                    <tr>
                        <th>Product Status</th>
                        <th >Product Name</th>
                        <th>Product Quantity</th>
                        <th>Product Price</th>
                        <th>Product Categories</th>
                        <th>Product Thumbnail</th>
                        <th>Created Date</th>
                        <th>Action </th>

                    </tr>
                    </thead>
                    @foreach($manageProducts as $product)
                    <tbody>
                        <td>
                            @if($product->status==0)
                                <span class="new badge badge-pending" data-badge-caption="">Pending</span>
                                @else
                                <span class="new badge badge-approved" data-badge-caption="">Approved</span>
                                @endif

                        </td>
                        <td ><a href="{{route('ViewProducts.show',$product->product_id)}}">{{$product->product_name}}</a></td>
                        <td>{{$product->product_quantity}}</td>
                        <td>{{$product->product_price}}</td>
                        <td>{{$product->Product_categories}}</td>
                        <td><img src="{{asset('uploads/products/thumbnails').'/'.$product->product_thumbnail}}" style="width: 50px"></td>
                        <td>{{$product->created_at}}</td>
                        <td>
                            <a href="{{route('editProducts.edit',$product->product_id)}}" >Edit</a> |
                            <a href="{{route('editProducts.edit',$product->product_id)}}" >Delete</a>
                        </td>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    @endsection
@section('js')
    <script>
        $(document).ready(function(){

        });
    </script>
    @endsection