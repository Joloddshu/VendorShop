@extends('admin.dashboard')

@section('mainpage')
    <div id="page-wrapper" style="margin: 0 0 0 0em;">
        <div class="main-page">
            <div class="tables  ">

                <div class="panel-body widget-shadow">
                    <h4>USER TABLE</h4>
                    <table class="table table-bordered userdata">
                        <thead >
                        <tr>
                            <th>USER ID</th>
                            <th>Full Name</th>
                            <th>User Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody  >
                        @foreach($manageuser as $user)
                                <th  scope="row">{{$user->id}}</th>
                                <td>
                                    <input type="hidden" id="itemid" value="{{$user->id}}">
                                    {{$user->firstname}} {{$user->lastname}}
                                </td>
                                <td >
                                    @if($user->role == 'admin')
                                        <span class="label label-danger">{{$user->role}}</span>

                                    @elseif($user->role=='vendors')
                                        <span class="label label-primary">{{$user->role}}</span>
                                    @else
                                        <span class="label label-info">{{$user->role}}</span>
                                    @endif
                                </td>
                                <td>
                                    @if($user->status=='1')
                                        Activated
                                    @else
                                        Not Activate
                                    @endif
                                </td>
                                <td>
                                    <!-- Button trigger modal -->
                                    @if($user->role=='admin')
                                        <button id="adminwarning" type="button" class="btn btn-lg btn-danger">
                                                        <i class="fa fa-trash"></i>

                                        </button>

                                    @else
                                        <button type="button" id="viewid" class="btn btn-danger viewuser pull-left" data-toggle="modal" data-target="#exampleModal" data-dismiss="modal">
                                            <i class="fa fa-trash"></i>
                                            <input type="hidden" id="itemid" value="{{$user->id}}">

                                        </button>
                                        <a class="btn btn-primary pull-right" href="{{route('admin.edit.get',$user->id)}}"><i class="fa fa-edit"></i></a>
                                        @endif
                                </td>

                            </tr>

                        @endforeach

                        </tbody>
                        <!--Delete Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                                        <button type="button" class="close btn btn-default" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" id="id">

                                    </div>
                                    <div class="modal-footer">
                                        <button id="delete" type="button" class="btn btn-danger ml-auto" data-dismiss="modal">delete</button>

                                    </div>
                                </div>
                            </div>
                        </div>



                    </table>
                    <div class="pagination-manageuser" style="position:relative;left: 35%;">

                       {{ $manageuser->fragment('user')->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $( '.viewuser').each(function() {
                $(document).on('click','.viewuser',function(event){
                    var id = $(this).find('#itemid').val();
                    $('#id').val(id);

                })
            });
            $('#delete').click(function(event){
               var id =$('#id').val();
                $.post('delete',{'id':id,'_token':$('input[name=_token]').val()},function(data){
                    $('.userdata').load(location.href +' .userdata');
                    toastr.success("User Delete Successfully");
                });
            });

        });
        $(document).on('click','#adminwarning',function(event){
            toastr.error("You Don't Have Enough Permission");
        });


    </script>
@endsection