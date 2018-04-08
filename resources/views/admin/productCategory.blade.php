@extends('admin.dashboard')
@section('css')
    <style>
        .editmodal{
            font-size: 20px;

        }
        .deletemodal{
            font-size: 20px;
        }
    </style>

    @endsection

@section('mainpage')
    <div class="product_categories" style="background-color: #fff;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="cat_header">
                    <h1 style="text-align: center;">Product Categories</h1>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addmodal">
                        Add New Category
                    </button>
                </div>


                <div class="category_table">
                    <table class="table table-bordered table-responsive">
                        <thead>
                        <tr>
                            <th scope="col">Category Id</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Categories as $category)
                        <tr>
                            <th scope="row">{{$category->category_id}}</th>
                            <td>{{$category->category_name}}</td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" data-categoryId="{{$category->category_id}}"
                                        data-content="{{$category->category_name}}" class="btn btn-primary"
                                        data-toggle="modal" data-target="#editmodal">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" data-categoryId="{{$category->category_id}}"
                                        data-content="{{$category->category_name}}" class="btn btn-danger"
                                        data-toggle="modal" data-target="#deletemodal" style="margin-left: 20%">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-2 empty-separator">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        </div>

    <!--Edit Modal -->

    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Categories</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('Category.editCategory')}}" method="post">
                    {{csrf_field()}}
                <div class="modal-body">
                        <div class="form-group">
                            <label for="categoryId">Category Id</label>
                            <input type="hidden" class="form-control" name="category_id" id="categoryId" value="">
                            <input type="text" class="form-control" name="category_id" id="categoryId" value="" disabled>
                        </div>
                        <div class="form-group">
                            <label for="categoryName">Category Name</label>
                            <input type="text" class="form-control" name="category_name" id="categoryName" value="" aria-describedby="emailHelp">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" value="Save" class="btn btn-warning" />
                  </div>
                </form>
            </div>
        </div>
    </div>
    <!--Delete Modal -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel">Delete Categories</h4>
                </div>
                <form action="{{route('Category.deleteCategory')}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <p class="text-center">
                            Are you sure you want to delete this?
                        </p>
                        <input type="hidden" name="category_id" id="categoryId" value="">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
                        <input type="submit" value="Delete" class="btn btn-warning" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Add Category Modal  -->
    <div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('Category.addCategory')}}" method="post">
                    {{csrf_field()}}
                <div class="modal-body">

                        <div class="form-group">
                            <label for="category">Category Name</label>
                            <input type="text" class="form-control" name="categoryName" id="category" placeholder="Enter Category Name">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" value="Add Category" class="btn btn-success">
                  </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        //edit modal
        $('#editmodal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var categoryid = button.data('categoryid');
            var catName = button.data('content');
            //console.log(catName);
            var modal = $(this);
            modal.find('.modal-body #categoryId').val(categoryid);
            modal.find('.modal-body #categoryName').val(catName);

        });
        //delete Modal
        $('#deletemodal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var categoryid = button.data('categoryid');
            var catName = button.data('content');
            var modal = $(this);
            modal.find('.modal-body #categoryId').val(categoryid);
            console.log(catName)
        })


    </script>
    @endsection