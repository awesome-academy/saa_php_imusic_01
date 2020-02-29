<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{url('web/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="{{url('web/css/style.css')}}" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="{{url('web/css/font-awesome.css')}}" rel="stylesheet"> 
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="{{url('web/css/icon-font.css')}}" type='text/css' />
<!-- //lined-icons -->
 <!-- Meters graphs -->
<script src="{{url("web/js/jquery-2.1.4.js")}}"></script>
</head>
<body>
    <div class="" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="outline:none">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-info">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
                </div>
                @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                <div class="modal-body modal-spa">
                    <div class="sign-grids">
                        <div class="sign">
                            <div class="sign-left">
                                <ul>
                                    <li><a class="fb" href="{{route('social_login', ['social' => 'facebook'])}}"><i></i>Sign in with Facebook</a></li>
                                    <li><a class="goog" href="{{route('social_login', ['social' => 'google'])}}"><i></i>Sign in with Google</a></li>
                                    <li><a class="linkin" href="{{route('login')}}">Login with your account</a></li>
                                </ul>
                            </div>
                            <div class="sign-right">
                                <form method="post">
                                    {{ csrf_field() }}
                                    <h3>Create your account </h3>
                                    <input type="text" placeholder="Name" required="" name='username' value="{{old('username')}}">
                                    <input type="text" placeholder="Mobile number" required="" name='phone' value="{{old('phone')}}">
                                    <input type="text" placeholder="Email" required="" name='email' value="{{old('email')}}">	
                                    <input type="password" placeholder="Password" required="" name='password'>	
                                    <input type="password" placeholder="Password" required="" name='password_confirmation'>	
                                    <input type="submit" placeholder="CREATE ACCOUNT" >
                                </form>
                            </div>
                            <div class="clearfix"></div>								
                        </div>
                        <p>By logging in you agree to our <span>Terms and Conditions</span> and <span>Privacy Policy</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
