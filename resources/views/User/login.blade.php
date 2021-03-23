<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <!--Made with love by Mutiullah Samim -->

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" href="{{asset('login/login.css')}}">
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>{{__('Sign In')}}</h3>
                <div class="d-flex justify-content-end social_icon">
                    <span><a href="{{route('loginFacebook')}}"><i class="fab fa-facebook-square"></i></a></span>
                    <span><a href="{{route('loginGoogle')}}"><i class="fab fa-google-plus-square"></i></a></span>
{{--                    <span><i class="fab fa-twitter-square"></i></span>--}}
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="name" class="form-control" placeholder="{{__('Username')}}">

                    </div>
                    <div class="form-group">
                        @error('name')
                        <small class="text-danger form-text">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control" placeholder="{{__('Password')}}">

                    </div>
                    <div class="form-group">
                        @error('password')
                        <small class="text-danger form-text">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">

                      @if(isset($msg))
                            <small class="text-danger form-text">{{$msg}}</small>
                        @endif

                    </div>
{{--                    <div class="row align-items-center remember">--}}
{{--                        <input type="checkbox">Ghi nhớ--}}
{{--                    </div>--}}
                    <div class="form-group mt-1">
                        @if (session('xyz'))
                            <div class="alert alert-info">{{session('xyz')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Login" class="btn float-right login_btn">
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                   {{__("Don't have an account?")}}<a href="{{route('register')}}">{{ __('Đăng kí') }}</a>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="{{url('password/reset')}}">{{__('Forgot your password?')}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
