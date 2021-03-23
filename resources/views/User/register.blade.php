<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<link rel="stylesheet" href="{{asset('login/register.css')}}">

<div class="container-fluid">

    <div class="card-lg bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
{{--            <h4 class="card-title mt-3 text-center">{{__('Create Account')}}</h4>--}}
{{--            <p class="text-center">{{__('Get started with your free account')}}</p>--}}
            <p>
                <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-google"></i>   Login via google</a>
                <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>
            </p>
            <p class="divider-text">
                <span class="bg-light">OR</span>
            </p>
            <form action="{{route('register')}}" method="post">
                @csrf
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="name" class="form-control" placeholder="{{__('Username')}}" type="text" value="{{old('name')}}">

                </div> <!-- form-group// -->
                <div class="form-group">
                    @error('name')
                    <small class="text-danger form-text">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input name="email" class="form-control" placeholder="{{__('Email address')}}" type="" value="{{old('email')}}">

                </div> <!-- form-group// -->
                 <div class="form-group">
                     @error('email')
                     <small class="text-danger form-text">{{$message}}</small>
                     @enderror
                 </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input class="form-control" name="password" placeholder="{{__('Create password')}}" type="password">

                </div> <!-- form-group// -->
                <div class="form-group">
                    @error('password')
                    <small class="text-danger form-text">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input class="form-control"  name="password_confirmation" placeholder="{{__('Repeat password')}}" type="password">

                </div> <!-- form-group// -->

                <div class="form-group">
                    @error('password_confirmation')
                    <small class="text-danger form-text">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> {{__('Create Account')}} </button>
                </div> <!-- form-group// -->
                <p class="text-center">Have an account? <a href="{{route('login')}}">{{__('Login')}}</a> </p>
            </form>
        </article>
    </div> <!-- card.// -->

</div>
