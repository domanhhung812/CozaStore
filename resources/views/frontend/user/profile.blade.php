@extends('frontend.base-layout')
@section('title','My product details')
@section('content')
<style>
.section-slide{
	display:none !important;
}
.sec-banner{
	display:none !important;
}
#section-favorite{
	margin-top: 100px;
}
.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;   
    cursor: inherit;
    display: block;
}
.fa-camera{
    position: relative;
    top: 2px;
}
.btn-file{
    width: 120%;
    height: auto;
    position: relative;
    left: -20%;
}
.avatar-uploader__avatar-image {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background-position: 50%;
    background-size: cover;
    background-repeat: no-repeat;
    cursor: pointer;
}
</style>
<section class="bg-img1 txt-center p-lr-15 p-tb-92" id="section-favorite"style="background-image: url('{{asset('frontend/images/bg-02.jpg')}}');">
	<h2 class="ltext-105 cl0 txt-center">
		My profile
	</h2>
</section>
<?php $item = json_decode($data)[0] ?>
<div class="row justify-content-center mx-0">
    <div class="col-lg-8 col-md-10 col-sm-10-col-xs-10">
    <form action="" method="POST">
    @csrf
        <div class="card">
        <div class="card-body">
            <div class="e-profile">
            <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                <div class="mx-auto" style="width: 140px;">
                    <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);border-radius: 50%;">
                    <!-- <div class="avatar-uploader__avatar-image" style="background-image: url();"></div> -->
                        <img src="{{ $item->user_image }}"  class="avatar-uploader__avatar-image" style="border-radius: 50%;">
                        <input type="text" hidden value="" name="user_image" class="user_image">   
                    </div>
                </div>
                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                <div class="text-center text-sm-left mb-2 mb-sm-0">
                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ $item->username }}</h4>
                    <div class="mt-2">
                        <button class="btn btn-primary upload-button" type="button">
                            <i class="fa fa-fw fa-camera"></i>
                            <span class="btn btn-file">
                                Change photo <input type="file" class="file-upload">
                            </span>
                        </button>
                    </div>
                </div>
                <div class="text-center text-sm-right">
                    <span class="badge badge-secondary">administrator</span>
                    <div class="text-muted"><small>Joined {{ $item->created_at }}</small></div>
                </div>
                </div>
            </div>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
            </ul>
            <div class="tab-content pt-3">
                <div class="tab-pane active">
                    <div class="row">
                    <div class="col">
                        <div class="row">
                        <div class="col">
                            <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" type="text" name="username" placeholder="johnny.s" value="{{ $item->username }}">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col">
                            <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="text" placeholder="user@example.com" value="{{ $item->email }}" name="email">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col">
                            <div class="form-group">
                            <label>Phone</label>
                            <input class="form-control" type="text" placeholder="0123456789" value="{{ $item->phone }}" name="phone">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col">
                            <div class="form-group">
                            <label>Address</label>
                            <input class="form-control" type="text" placeholder="New York, USA" value="{{ $item->address }}" name="address">
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- <div class="row">
                    <div class="col">
                        <div class="mb-2"><b>Change Password</b></div>
                        <div class="row">
                        <div class="col">
                            <div class="form-group">
                            <label>Current Password</label>
                            <input class="form-control" type="password" placeholder="••••••" name="password">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col">
                            <div class="form-group">
                            <label>New Password</label>
                            <input class="form-control" type="password" placeholder="••••••" name="-password">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col">
                            <div class="form-group">
                            <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                            <input class="form-control" type="password" placeholder="••••••"></div>
                        </div>
                        </div>
                    </div>
                    </div> -->
                    <div class="row">
                    <div class="col d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Save Changes</button>
                    </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        </form>
    </div>
</div>
@endsection
@push('js')
<script>
    $(document).ready(function() {
	
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar-uploader__avatar-image').attr('src', e.target.result);
                $('.user_image').attr('value', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
   
    $(".file-upload").on('change', function(){
        readURL(this);
    });
    
    $(".upload-button").on('click', function() {
       $(".file-upload").click();
    });
});
</script>
@endpush