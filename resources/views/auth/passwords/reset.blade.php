@extends('frontend.base-layout')
@section('title','Mật khẩu mới')
@section('content')
<style>
.section-slide{
	display:none !important;
}
.sec-banner{
	display:none !important;
}
.btnNewPassword{
    margin-left: 253px;
}
@media only screen and (min-width: 320px){
    .btnNewPassword{
        margin: 0px auto;
    }
    .btn, .btn-primary{
        width: 100%;
    }
}
@media only screen and (min-width: 768px){
    .btnNewPassword{
        margin: 0px auto;
        position: relative;
        left: 8.5%;
    }
}
@media only screen and (min-width: 1024px){
    .btnNewPassword{
        margin: 0px auto;
        position: relative;
        left: 8.5%;
    }
    .btn, .btn-primary{
        width: 100%;
    }
}
</style>
<div class="container container-reset-email" style="margin: 100px 0px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password confirm') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password_confirm">

                                @if ($errors->has('password_confirm'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password_confirm') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 btnNewPassword" style=NewPassword">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
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
