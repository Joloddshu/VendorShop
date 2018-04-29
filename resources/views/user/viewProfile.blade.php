@extends('layouts.homepage')
@section('Products_tab')
<section id="UserMain">
    <div class="container">
        <div class="row">

            @if($users->id==Auth::id())
                <div class="bg-success"><h3 class="text-center" style="padding:20px;color: #156192 ;">Welcome <strong> {{$users->username}} </strong>To User Portal</h3></div>
            <div class="col-md-3 wrap-sidebar">

                <ul class="user-sidebar">
                    <li><a class="User-button" href="{{route('user.show',$users->id)}}"><i class="fa fa-eye"></i>   Dashboard</a></li>
                    <li><a class="User-button" href="{{route('user.editprofile',$users->id)}}"><i class="fa fa-edit"></i> update Profile</a></li>
                    <li><a class="User-button" href=""><i class="fa fa-shopping-cart"></i> Order History</a></li>
                    <li><a class="User-button" href="#">Account Details</a></li>
                    <li><a class="User-button" href="#">Addresses</a></li>
                </ul>
            </div>
            @else
                <div class="bg-success"><h3 class="text-center" style="padding:20px;color: #156192 ;">Welcome To <strong> {{$users->username}} </strong>Profile</h3></div>
                <div class="col-md-3"></div>
            @endif
            <div class="col-md-6">
                    <div class="alert-user">
                        <p class="top-text-user">Hello {{$users->username}} </p>
                        <br>
                    <p class="top-text-user">From your account dashboard you can view your recent orders,
                        manage your  addresses and account details.</p>
                    </div>
                <div class="empty-space"></div>
                <div class="user-top-details">

                    <table class="table table-responsive ">
                        <tbody>
                        <tr>
                            <th><p class="top-text-user userdetails">Full Name</p></th>
                            <td><p class="top-text-user userdetails">{{$users->firstname}} {{$users->lastname}}</p></td>
                        </tr>
                        <tr>
                            <th><p class="top-text-user userdetails">user name</p></th>
                            <td><p class="top-text-user ">{{$users->username}}</p></td>
                        </tr>
                        <tr>
                            <th><p class="top-text-user userdetails">email</p></th>
                            <td><p class="top-text-user ">{{$users->email}}</p></td>
                        </tr>
                        <tr>
                            <th><p class="top-text-user userdetails">phone number</p></th>
                            <td><p class="top-text-user ">0{{$users->phonenumber}}</p></td>
                        </tr>
                        <tr>
                            <th><p class="top-text-user userdetails">role</p></th>
                            <td><p class="top-text-user ">{{$users->role}}</p></td>
                        </tr>
                        <tr>
                            <th><p class="top-text-user userdetails">Country</p></th>
                            <td><p class="top-text-user ">{{$users->profile->country}}</p></td>
                        </tr>
                        <tr>
                            <th><p class="top-text-user userdetails">City</p></th>
                            <td><p class="top-text-user ">{{$users->profile->city}}</p></td>
                        </tr>
                        <tr>
                            <th><p class="top-text-user userdetails">Zip Code</p></th>
                            <td><p class="top-text-user ">{{$users->profile->zipcode}}</p></td>
                        </tr>
                        <tr>
                            <th><p class="top-text-user userdetails">street address</p></th>
                            <td><p class="top-text-user ">{{$users->profile->streetaddress}}</p></td>
                        </tr>
                        <tr>
                            <th><p class="top-text-user userdetails">date of birth</p></th>
                            <td><p class="top-text-user ">{{$users->profile->dateofbirth}}</p></td>
                        </tr>


                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>

    @endsection