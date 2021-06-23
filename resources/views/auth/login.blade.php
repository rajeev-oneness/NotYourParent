@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
<section class="login">
    <div class="container">
        <!-- login left  -->
        <div class="login_left">
            <div class="logo">
                <a href="{{route('front.home')}}">
                    <img src="{{asset('front/images/logo.png')}}" alt="Logo">
                </a>
            </div>
            <div class="login_text">
                <h2 class="proxima_bold">Login To Your Account</h2>
                <p class="darkgray">To keep connected with us please Register with your personal information by email address and password</p>
            </div>
        </div>
        <!-- login right  -->
        <div class="login_right">
            <div class="login_form_container">
                <div class="login-top">
                    <a href="#" class="google_btn"><img class="g-icon" src="{{asset('front/images/google-icon.png')}}" alt=""> Login with Google</a>
                    <p class="or">or</p>
                </div>
                <div class="login_form">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="email-address">
                            <div class="label-text">
                                <img src="{{asset('front/images/mail.png')}}" alt="">
                                <label for="email">EMAIL ADDRESS @error('email')<span class="text-danger"> ({{ $message }})</span>@enderror</label>
                            </div>
                            <input type="email" name="email" required autofocus>
                        </div>
                        <div class="login_c_password">
                            <div class="label-text">
                                <img src="{{asset('front/images/lock.png')}}" alt="">
                                <label for="password">PASSWORD @error('email')<span class="text-danger"> ({{ $message }})</span>@enderror <a class="forgot" href="{{ route('password.request') }}">(Forgot)</a></label>
                            </div>
                            <input type="password" name="password" id="c_pass" required>
                            <div class="eye"><img onclick="showHide(); "  src="{{asset('front/images/eye.png')}}"></div>
                        </div>
                        <p class="darkgray">Don't have an account? <a href="{{route('front.sign-up',['userType' => 2])}}">(Sign Up As Student)</a> <a href="{{route('front.sign-up',['userType' => 3])}}">(Sign Up As Teacher)</a></p>
                        <input class="green_btn parimary_btn proxima_bold" type="submit" value="Log In">
                    </form>
                    <p class="darkgray">Protected by reCAPTCHA Google <a href="#">Privacy Policy</a> & <a href="#">Terms of Services apply.</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection