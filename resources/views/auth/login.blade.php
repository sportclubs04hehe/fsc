@extends('layouts.app')

@section('content')


{{--Login news--}}


<section class="ftco-section">
    <div class="container">
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-6 text-center mb-5">--}}
{{--                <h2 class="heading-section " style="color: #34ce57">Welcome to login</h2>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="wrap">
                    <div class="img" style="background-image: url({{url('image/login.jpg')}});"></div>
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Sign In</h3>
                            </div>
                            <div class="w-100">
                                <p class="social-media d-flex justify-content-end">
                                    <a href="{{ url('auth/google') }}" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-google"></span></a>
                                    <a href="#" class="social-icon d-flex align-items-center justify-content-center"> <span class="fa fa-facebook"></span></a>
                                </p>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group mt-3">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <label class="form-control-placeholder" for="username">{{ __('Email Address') }}</label>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <label class="form-control-placeholder" for="password">{{ __('Password') }}</label>
                                <span toggle="#password-field" onclick="myFunction()" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">
                                    {{ __('Login') }}
                                </button>

                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50 text-left">
                                    <label class="checkbox-wrap checkbox-primary mb-0">{{ __('Remember Me') }}
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">

                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">Forgot Password</a>
                                    @endif
                                </div>
                            </div>
                            <p class="text-center">--Login with--</p>
                            <div class="form-group text-center">
                                    <a href="{{ url('auth/google') }}" >
                                        <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="">
                                    </a>
                            </div>

                        </form>
                        @if (Route::has('register'))
                            <p class="text-center">Not a member? <a href="{{ route('register') }}">{{ __('Register') }}</a></p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <script type="text/javascript">
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection
