@extends('frontend.base-layout')
@section('title', 'Đăng nhập')
@section('content')
<?php 
session_start();
session_destroy();
?>
<style>
.section-slide{
	display:none !important;
}
.sec-banner{
	display:none !important;
}
.register:hover{
    text-decoration: underline;
}
</style>
<div class="container" style="margin:100px auto;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><span style="padding-left: 340px;
    font-size: 25px;
    font-weight: bold;">{{ __('Sign in') }}</span></div>

                <div class="card-body">
                    <form method="POST" action="" style="margin-left: -50px;">
                        @csrf

                        <div class="form-group row" style="margin-left: -43px;">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row" style="margin-left: -43px;">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4" style="margin-left:273px;">
                                <div class="row">
                                    <div class="form-check" style="display:flex;">
                                        <input style="margin-left: -3px;" class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} >

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                        @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('getFormResetPassword') }}" style="margin-top: -7px;
    padding-left: 108px;">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4"style="margin-left:253px;">
                                <button type="submit" class="btn btn-primary" style="width: 76%">
                                    <span style="font-size: 18px;font-family: Tahoma;">Login</span>
                                </button>   
                                
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sd-3" style="margin-left: 203px;
    margin-top: 15px;">
                            <a href="login/facebook" class="btn btn-primary" style="background-color:#3b5896;">
                                <i class="fa fa-facebook-square" style="width: 160px;
                                font-size: 18px;"><span style="padding-left: 10px; font-family: Tahoma;">Facebook</span></i>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sd-3" style="
    margin-top: 15px;margin-left: 13px;">
                            <a href="login/google" class="btn btn-primary" style="background-color:#ea4335;outline: none;">
                                <i class="fa fa-google" style="width: 160px;
                                font-size: 18px;"><span style="padding-left: 10px; font-family: Tahoma;">Google</span></i>
                            </a>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-8" style="margin-top:15px;padding-left: 22%;
    color: #222222;">
                            Don't have an account?
                            <a href="/sign-up" style="" class="register"> Sign up now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
