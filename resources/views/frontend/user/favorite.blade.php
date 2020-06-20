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
@media only screen and (max-width: 768px){
    #section-favorite{
	margin-top: 0px;
    }
    .table-bordered{
        font-size: 0.6rem !important;
    }
    .btn-primary{
        font-size: 0.6rem !important;
    }
    .img-product{
        width: 100%; height: auto;
    }
}
@media only screen and (max-width: 1024px){
    .img-product{
        width: 100%; height: auto;
    }
}
@media only screen and (min-width: 1366px){
    .img-product{
        width: 300px; height: 372px;
    }
}
</style>
<section class="bg-img1 txt-center p-lr-15 p-tb-92" id="section-favorite"style="background-image: url('{{asset('frontend/images/bg-02.jpg')}}');">
	<h2 class="ltext-105 cl0 txt-center">
		My favorite product
	</h2>
</section>
<div class="row mt-3 justify-content-center mx-0">
	<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
        <table class="table table-bordered" style="text-align: center;">
            <thead>
                <tr>
                    <th scope="col" style="text-align: center;">No.</th>
                    <th scope="col" style="text-align: center;">Product's name</th>
                    <th scope="col" style="text-align: center;">Image</th>
                    <th scope="col" style="text-align: center;">Price</th>
                    <th scope="col" style="text-align: center;">Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $key => $item)
                <?php 
                    $countStr = strlen($item->image_product);
                    $link1 = substr($item->image_product,-($countStr-2));
                    $link = substr($link1,0,($countStr-4));
                ?>
                <tr>
                    <th scope="row" style="text-align: center;font-size: 0.8rem !important;">{{$key + 1}}</th>
                    <td ">{{$item->name_product}}</td>
                    <td>
                    <img class="img-product" src="{{ URL::to('/') }}/upload/images/{{ $link }}" alt="" style="">
                    </td>
                    <td>{{$item->price}}$</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('fr.detailPd', ['slug' => $item->pro_slug, 'id' => $item->id]) }}" style="">Click here</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>              
		
	</div>
</div>
@endsection