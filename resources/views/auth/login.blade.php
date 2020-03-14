@extends('frontend.base-layout')
@section('title', 'Đăng nhập')
@section('content')
<style>
.section-slide{
	display:none !important;
}
.sec-banner{
	display:none !important;
}
</style>
<div class="container" style="margin:100px auto;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="" style="margin-left: -50px;">
                        @csrf

                        <div class="form-group row">
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

                        <div class="form-group row">
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
    padding-left: 71px;">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4"style="margin-left:253px;">
                                <button type="submit" class="btn btn-primary" style="width: 74%">
                                    <span style="font-size: 18px;font-family: Tahoma;">{{ __('Login') }}</span>
                                </button>   
                                
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sd-3" style="margin-left: 203px;
    margin-top: 15px;">
                            <a href="login/facebook" class="btn btn-primary" style="background-color:#3b5896;">
                                <i class="fa fa-facebook-square" style="width: 175px;
                                font-size: 18px;"><span style="padding-left: 10px; font-family: Tahoma;">Facebook</span></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
