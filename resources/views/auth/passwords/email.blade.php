@extends('frontend.base-layout')
@section('title','Lấy lại mật khẩu')
@section('content')
<style>
.section-slide{
	display:none !important;
}
.sec-banner{
	display:none !important;
}
.btnSendMail{
    margin-left: 253px;
}
@media only screen and (min-width: 320px){
    .btnSendMail{
        margin: 0px auto;
    }
    .btn, .btn-primary{
        width: 100%;
    }
}
@media only screen and (min-width: 768px){
    .btnSendMail{
        margin: 0px auto;
        position: relative;
        left: 8.5%;
    }
}
@media only screen and (min-width: 1024px){
    .btnSendMail{
        margin: 0px auto;
        position: relative;
        left: 8.5%;
    }
    .btn, .btn-primary{
        width: 100%;
    }
}
</style>
<div class="container" style="margin: 100px 0px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('getCodeResetPassword') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 btnSendMail" style="">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
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
