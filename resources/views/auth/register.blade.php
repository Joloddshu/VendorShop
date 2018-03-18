@extends('layouts.homepage')
@section('css')
    <style>
        .hidden_error{
            display: none;
        }
    </style>
    @endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}" id="formdata">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="firstname" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required autofocus>

                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required autofocus>

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                        <strong>username not available</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                <small id="emailHelp" class="form-text text-muted"></small>
                                @if ($errors->has('email'))
                                    <span id="checkmail" class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }} ">
                            <label for="phonenumber" class="col-md-4 control-label">Phone Number</label>
                            <div class="col-md-6 input-box">

                                <input id="phonenumber" type="text" class="form-control" name="phonenumber" value="{{ old('phonenumber') }}" style="
                                padding-left: 37px;font-weight: 400;position:relative;top: 2px;font-family: sans-serif" required>
                                <span class="unit">+880</span>
                                @if ($errors->has('phonenumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phonenumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                <div class="row">
                                    <div class="container">
                                        <div class="col-md-12">
                                           <span id="ConfirmPasswordError" class="hidden_error"><span class="label label-danger">Confirm Password Does Not Matched</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" id="btnsubmit">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
    <script type="text/javascript">
        var username = $('#username').val();

        $(document).ready(function(){
            $('#password-confirm').keyup(function(){


                    if($(this).val()==$('#password').val()){
                        $('#ConfirmPasswordError').addClass('hidden_error');
                    }


                else{
                    $('#ConfirmPasswordError').removeClass('hidden_error');
                }
            });
//Email Checking Ajax Call
            $("#email").blur(function(e){
                var _token = $("input[name='_token']").val();
                var email = $('#email').val();
                $.ajax({
                    url: "/checkemail",
                    type:'POST',
                    data: {_token:_token, email:email},
                    success: function(data) {
                        $("#emailHelp").html(data);
                    }

                });


            });
        });
    </script>
    @endsection