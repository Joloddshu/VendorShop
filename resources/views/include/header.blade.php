<!--Header Top  -->

<div class="container-fluid header-top">
    <div class="row" >
        <div class="col-md-8">
            <div class="header-top-content">
                <ul>
                    <li>
                        Welcome Our Online Store!</li>
                    <li>
                        <i class="far fa-envelope"></i> Email : nsmajm@gmail.com</li>
                    <li>
                        <i class="fas fa-phone"></i> Hotline : Rabby Joloddshu (Maid Of the shop)
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-4">
            <ul>


               @guest
                <li style="padding-right: 4px">
                    <a class="vendor-button" href="{{route('password.request')}}">Want To Become Vendor</a>
                </li>
                    @else
                    @if(Auth::user()->role=="admin")
                        <li >
                            <a class="admin_button" href="{{route('admin.index')}}">Go To Admin Dashboard</a>
                        </li>

                    @endif
                @endguest
            </ul>
        </div>
    </div>
</div>


<div class="empty-space"></div>


<!--Header Bottom  -->
<div class="container-fluid">
    <div class="row">
        <div class="left_header col-md-3">
            <a href="{{route('home.index')}}"> <img src="{{asset('images/logo.png')}}" class="img-responsive" style="height: 55px;"></a>
        </div>
        <div class="searcharea col-md-5">
            <form class="form-inline" >

                <div class="form-group">
                    <label for="search" ></label>
                    <input type="text" class="form-control search-bar" name="searchitem" id="searchitem" placeholder="Search Product here">
                </div>
                <button type="submit" class="btn btn-info search-button"><i class="fa fa-search"></i></button>
            </form>
        </div>

        <div class="right_header col-md-4">
            <ul>
                @guest
                <li class="header_right_first">
                    <img src="{{asset('/images/loginbutton.png')}}" alt="">
                    <div class="login_area">
                        <span class="guest_text">Hello Guest</span>
                        <a href="{{route('login')}}">Login</a> ||
                        <a href="{{route('register')}}">Register</a>
                    </div>

                </li>
                @else

                    <li class="header_right_first">  <li style="float:left;">
                        <img src="{{asset('/images/loginbutton.png')}}" alt="">

                        <div class="dropdown account_button">
                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                {{Auth::user()->firstname}}
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu account_dropdown" aria-labelledby="dropdownMenu1">
                                <li><a href="{{route('user.editprofile',Auth::user()->id)}}"><i class="fa fa-cog"></i>   edit Profile</a></li>
                                <li><a href="#"><i class="fa fa-user"></i>   Update Profile</a></li>
                                <li><a href="#"><i class="fas fa-history"></i>   Order History</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i>   Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>

                                </li>
                            </ul>
                        </div>
                    </li>

                    @endguest

                    <li class="header_right_last" style="float: left">
                        <div class="cart_area">
                            <a class="top_login" href="#"><img src="{{asset('/images/cart.png')}}" alt=""></a>
                            <div class="sub_cart">
                                <span class="cart_text">Your Cart</span>
                                <span class="cart_price">$0.00</span>
                            </div>
                        </div>
                    </li>
            </ul>
        </div>

    </div>
</div>