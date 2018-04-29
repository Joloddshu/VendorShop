@extends('admin.dashboard')
@section('css')
    <style>
        .table > tbody > tr > td{
            vertical-align: middle;
            text-align: justify;
        }
        .actionbutton {
            font-size: 19px;
            border: 1px solid #efefef;
            padding: 3px;
            border-radius: 3px;
        }
        .fa-eye{
            color: #1f648b;
        }
        .fa-edit{
            color: #1e88e5;
        }
        .fa-trash{
            color: red;
        }
        .fa-check{
            color: #2ab27b;
        }
        .pagination{
            position: relative;
            left:36%;
        }
        .modalbtn{
            background: none;
            border:none;
        }
        .modal-content{
            width: 850px;
        }
        .empty-space{
                margin-bottom: 20px;
        }
    </style>
    @endsection

@section('mainpage')
    <div id="page-wrapper" style="margin: 0 0 0 0em;">
        <div class="main-page">
            <div class="tables">

                <div class="panel-body widget-shadow">
                    <h4>Manage Products</h4>
                    <table class="table table-bordered">
                        <thead>
                        <tr>

                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Product Vendor</th>
                            <th>Product Image</th>
                            <th>Status</th>
                            <th>Action</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($productsList as $products)
                            <tr>

                                <td>{{$products->product_name}}</td>
                                <td>{{$products->product_price}}</td>
                                <td>{{$products->product_quantity}}</td>
                                <td style="text-align: center">{{$products->firstname}}</td>
                                <td>
                                    <img style="width: 100px;height: 100px;" class="img-reponsive" src="/uploads/products/thumbnails/{{$products->product_thumbnail}}" alt="">
                                </td>
                                <td>
                                   @if($products->status=='1')
                                       <span class="label label-success">Approved</span>
                                       @elseif($products->status=='0')
                                        <span class="label label-danger">Not Approved</span>
                                       @endif
                                </td>
                                <td style="text-align: center">
                                    <button type="button" class="modalbtn" data-toggle="modal" data-target="#quickViewModal"
                                    data-content="{{$products->product_name}}" data-price="{{$products->product_price}}"
                                            data-quantity="{{$products->product_quantity}}" data-pimage="{{$products->product_thumbnail}}"
                                            data-pdescription="{{$products->product_short_description}}"
                                    >
                                        <i class="fa fa-eye actionbutton"></i>
                                    </button>
                                    <button type="button" class="modalbtn" data-toggle="modal" data-target="#deleteModal" data-content="{{$products->product_id}}">
                                        <i class="fa fa-trash actionbutton"></i>
                                    </button>
                                    <button type="button" class="modalbtn" data-toggle="modal" data-target="#approveModal">
                                        <i class="fa fa-check actionbutton"></i>
                                    </button>
                                </td>

                            </tr>

                        @endforeach

                        </tbody>

                    </table>
                    <div class="pagination">
                        {{ $productsList->fragment('products')->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Area -->
    <!--Quick View Modal Area -->
    <div class="modal fade" id="quickViewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="modal-title" id="product_title"></h5>
                    <div class="row">
                        <div class="col-md-4 ">
                            <img class="img-responsive productImage" src="" alt="">
                        </div>
                        <div class="col-md-8">
                            <div class="product-info">
                                <h2 id="product_title"></h2>
                                <div class="empty-space"></div>
                                <p id="productShortDescription"></p>
                                <div class="empty-space"></div>
                                <p id="pPrice"></p>
                                <div class="empty-space"></div>
                                <p id="pQuantity"></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel">Delete Products</h4>
                </div>
                <form action="{{route('admin.deleteProduct')}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <p class="text-center">
                            Are you sure you want to delete this?
                        </p>
                        <input type="hidden" name="product_id" id="deleteProduct" value="">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
                        <input type="submit" value="Delete" class="btn btn-warning" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Approve Modal -->
    <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!--End Modal Area -->

@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            //quick View modal
            $('#quickViewModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var productName = button.data('content');
                var productPrice = button.data('price');
                var productQuantity = button.data('quantity');
                var productImage = button.data('pimage');
                var shortDescription = button.data('pdescription');

                var modal = $(this);
                modal.find('.modal-body .productImage').attr('src', "/uploads/products/thumbnails/"+productImage);
                modal.find('.modal-body #product_title').html(productName);
                modal.find('.modal-body #productShortDescription').html('<strong>Short Description</strong>'+ ' : '+shortDescription);
                modal.find('.modal-body #pPrice').html("<strong>Price</strong>"+ ' : '+productPrice);
                modal.find('.modal-body #pQuantity').html("<strong>Quantity</strong>"+ ' : '+productQuantity);

               // console.log(productName);
               // console.log(productPrice);
               // console.log(shortDescription);


            });
            //delete Modal
            $('#deleteModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var productId = button.data('content');
                var modal = $(this);
                modal.find('.modal-body #deleteProduct').val(productId);
               // console.log(productId)
            });
            //Approve modal
            $('#approveModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var categoryid = button.data('categoryid');
                var catName = button.data('content');
                var icon = button.data('icon');
                //console.log(catName);
                var modal = $(this);
                modal.find('.modal-body #categoryId').val(categoryid);
                modal.find('.modal-body #categoryName').val(catName);
                modal.find('.modal-body #categoryIcon').val(icon);

            });
        });
    </script>
    @endsection
