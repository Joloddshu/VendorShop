<!DOCTYPE html>
<html>
<head>
    <title>Vendors Dashboard</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link rel="stylesheet" href="{{asset('css/vendor.style.css')}}">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

@yield('css')
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body >
<!-- Modal Structure -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>You Have Some Issues With Your Account..</h4>
        <p>Please Confirm Your Mail Address Or Contact Us for Support</p>
        <p>Please Provide Full Details Of your Shop</p>
        <p>Safety is the Main Issue</p>
        <h5>Thanks</h5>
        <p>NRB GRoup</p>

    </div>
    <div class="modal-footer" style="border-top: 1px solid #efefef">
        <a href="{{route('home.index')}}" class="waves-effect waves-green btn-flat">Go To Home</a>
        <a href="#" class="waves-effect waves-green btn-flat">Contact Us</a>
    </div>

</div>

<!-- Vendors Top Main Menu -->

    <div class="vendors-main-menu">
            <div class="col s12">
                <nav>
                    <div class="nav-wrapper">
                        <a href="{{route('vendors.dashboard')}}" class="brand-logo">Vendor Dashboard</a>
                        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>


                        <ul class="right hide-on-med-and-down navigation_menu">
                            <li>
                                <a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown">
                                    <i class="material-icons nav_icon_color">public
                                    </i>

                                </a>
                            </li>
                            <li><span class="badge">1</span></li>
                            <li>
                                <!-- Dropdown Trigger -->
                                <a class='dropdown-trigger' href='#' data-target='dropdown1'><i  class="material-icons nav_icon_color">account_circle</i></a>

                                <!-- Dropdown Structure -->
                                <ul id='dropdown1' class='dropdown-content dropdownfixposition'>
                                    <li><a href="#">Edit Profile</a></li>
                                    <li><a href="#!">two</a></li>
                                    <li class="divider" tabindex="-1"></li>
                                    <li><a href="#!">three</a></li>
                                    <li><a href="#!"><i class="material-icons">view_module</i>four</a></li>
                                    <li><a href="#!"><i class="material-icons">cloud</i>five</a></li>
                                </ul>
                            </li>
                        </ul>

                    </div>
                </nav>

                <ul class="sidenav" id="mobile-demo">
                    <li><a href="sass.html">Sass</a></li>
                    <li><a href="badges.html">Components</a></li>
                    <li><a href="collapsible.html">Javascript</a></li>
                    <li><a href="mobile.html">Mobile</a></li>

                </ul>
            </div>


    </div>

    <!--End  Vendors Top Main Menu -->


    <!--Main Content Area -->
    <!--Left Sidebar-->
    <div class="vendor-main-area">
        <div class="row">
            <div class="col s2 leftsidebar">
                <ul class="collapsible sidebar_design">
                    <li>
                        <div class="collapsible-header"><i class="material-icons">dashboard</i><a  class="vendor-link-text" href="{{route('vendors.dashboard')}}"><span class="vendor-link-text">Dashboard</span></a></div>

                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">account_circle</i><a class="vendor-link-text" href="{{route('home.index')}}"><span class="vendor-link-text">Vendor Profile</span></a></div>

                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">add</i><a class="vendor-link-text" href="{{route('addproduct.index')}}"><span class="vendor-link-text">Add New Product</span></a></div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">settings</i><a class="vendor-link-text" href="{{route('manageProduct.getProductList')}}"><span class="vendor-link-text">Manage Product</span></a></div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">redeem</i><a class="vendor-link-text" href="#"><span class="vendor-link-text">Order</span></a></div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">credit_card</i><a class="vendor-link-text" href="#"><span class="vendor-link-text">Transaction</span></a></div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">print</i><a class="vendor-link-text" href="#"><span class="vendor-link-text">Report</span></a></div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">open_in_new</i><a class="vendor-link-text" href="{{route('home.index')}}"><span class="vendor-link-text">Go TO Shop</span></a></div>
                    </li>
                </ul>

            </div>

            <!-- main Content Area -->
            <div class="col s10 maincontentarea">
               <div class="maincontent">
                   @yield('maincontent')
               </div>
            </div>
            <!-- End main Content Area -->
        </div>
    </div>

    <footer class="page-footer">


        <div class="footer-copyright">
            <div class="container">
                © 2018 Copyright NbrShop
                <a class="grey-text text-lighten-4 right" href="#!">Go To HomePage</a>
            </div>
        </div>
    </footer>
    <!-- Compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    @yield('js')

    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
            $('.collapsible').collapsible();
            $('.dropdown-trigger').dropdown();

            //check user status and if disable left sidebar for the inactive member
            if('{{\Illuminate\Support\Facades\Auth::user()->checkstatus()=='0'}}') {
                $('.modal').modal({
                    dismissible: false
                });

            //call the Modal 1 For Inactive Members
                $('#modal1').modal('open');
            }
        });

    </script>
</body>
</html>
        