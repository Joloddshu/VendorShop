<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Smart Shop</title>

</head>
<body style="width: 600px">
<div class="alert alert-primary" role="alert">
    <h1 style="background:#4485EB;text-align: left;text-transform: uppercase;padding: 20px ;color: #fff">Smart Shop</h1>
</div>
<div class="emailbody" style="margin: 0 auto">
    <h2>You are nearly There </h2>
    <p>We just need to verify Your email address to complete smart shop registration</p>
    <p style="padding-bottom: 30px">Please Click The link below to Confirm your Signup</p>
    <a style="
    background: #0069D9;
    padding: 20px;
    position: relative;
    top: 20px;
    color: #fff;
    list-style: none;
    text-decoration: none;
    border-radius: 50px;" href="{{route('sendEmailDone',["email"=>$user->email,"verifyToken"=>$user->verifyToken])}}">Verify email address</a>

    <p style="margin-top: 50px">You can Login Your account after Confirm Your email address</p>

    <p>Thanks</p>
</div>

</body>
</html>

