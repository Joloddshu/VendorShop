<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- Required meta tags -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <title>Vendor Shop</title>
</head>
<body>

<!-- Header Top -->

<section id="header-top">
  <div class="container-fluid header-top">
      <div class="row" >
            <div class="col-md-10">
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
          <div class="col-md-2">
              <a class="vendor-button" href="#">Want To Become Vendor</a>
              </div>
          </div>
         </div>
  </div>
</section>
<div class="empty-space"></div>

<div class="empty-space"></div>

<div class="container-fluid">
    <div class="row">
        <div class="left_header col-md-3">
            <img src="{{asset('images/logo.png')}}" class="img-responsive" style="height: 55px;">
        </div>
        <div class="searcharea col-md-6">
            <form class="form-inline" method="post">

                <div class="form-group">
                    <label for="inputPassword2" ></label>
                    <input type="password" class="form-control search-bar" id="inputPassword2" placeholder="Search Product here">
                </div>
                <button type="submit" class="btn btn-info search-button"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="right_header colo-md-3">
            <ul>

                <li>
                    <a href="{{route('login')}}"><img src="{{asset('images/loginbutton.png')}}" alt=""></a>
                </li>
                <li>
                    <img src="{{asset('/images/cart.png')}}" alt="">
                </li>
            </ul>
        </div>

    </div>
</div>










<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>