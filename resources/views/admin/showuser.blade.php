@extends('admin.dashboard')

@section('mainpage')
    <div id="page-wrapper" style="margin: 0 0 0 0em;">
        <div class="main-page">
            <div class="tables">

                <div class="panel-body widget-shadow">
                    <h4>USER TABLE</h4>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>USER ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>User Role</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Updated at</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Showuser as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->firstname}} {{$user->lastname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phonenumber}}</td>
                            <td>
                                @if($user->role == 'admin')
                                    <span class="label label-primary">{{$user->role}}</span>

                                    @elseif($user->role=='vendors')
                                    <span class="label label-primary">{{$user->role}}</span>
                                    @else
                                    <span class="label label-info">{{$user->role}}</span>
                                @endif
                            </td>
                            <td>
                                @if($user->userStatus=='1')
                                    Activated
                                    @else
                                    Not Activate
                                    @endif
                            </td>
                            <td>{{$user->created_at}}</td>
                            <td>{{$user->updated_at }}</td>


                        </tr>

                        @endforeach

                        </tbody>

                    </table>
                    <div class="pagination">
                        {{ $Showuser->fragment('user')->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

@section('scripts')
