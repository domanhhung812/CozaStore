@extends('frontend.base-layout')
@section('title','My cart')
@section('content')
<style>
.section-slide{
	display:none !important;
}
.sec-banner{
	display:none !important;
}
.table td, .table th{
	border: 1px solid #b2a47f;
	text-align: center;
}
._38f5r7 {
  background-position: 50%;
  background-size: cover;
  background-repeat: no-repeat;
  width: 12.5rem;
  height: 11.1875rem;
  background-image: url('{{asset('/upload/images/empty-cart.png')}}');
}
@media only screen and (max-width: 1024px){
  .count{
		width:50%;
	}
}
</style>
<script type="text/javascript">
	function updateCart(qty, rowId){
		$.get(
			'{{ asset('/update-cart') }}',
			{qty:qty, rowId: rowId},
			function(){
				location.reload();
			}
		);
	}
</script>
<div class="container-fluid px-0">
	<div class="row m-lr-0" style="margin-top:100px;width:100%;">
		<div class="col-lg-12 col-xl-12 m-lr-auto">
			<div class="m-lr-0-xl">
			@if(json_decode($products) === [])
				<div class="CzsW3c _1wkChM"><div class="_38f5r7"></div><div class="UM4yVY">Giỏ hàng của bạn còn trống</div><a class="_1Fz64J" href="/"><button class="btn btn-primary"><span class="_3KnH_F">MUA NGAY</span></button></a></div>
			@else
				<div class="wrap-table-shopping-cart">
					<table class="table m-b-0">
						<tbody><tr class="">
							<th scope="col" class="">#</th>
							<th scope="col" class="">Image</th>
							<th scope="col" class"">Product Name</th>
							<th scope="col" class="">Price</th>
							<th scope="col" class="">Quantity</th>
							<th scope="col" class="">Size</th>
							<th scope="col" class="">Color</th>
							<th scope="col" class="">Action</th>
							<th scope="col" class="">Subtotal</th>
						</tr>
						@foreach($products as $key => $product)
						<tr class="">
							<td scope="row" class="">#</td>
							<td class=""><img width="60px" height="80px" src="{{ URL::to('/') }}/upload/images/{{ $product->options->images }}" alt=""></td>
							<td class="">{{ $product->name }}</td>
							<td class="">{{ $product->price }}$</td>
							<td class="">
							<div class="wrap" style="position: relative;">
							<form action="{{ route('fr.updateCart') }}" method="POST" style="position: absolute;top: 0; left: 0; transform: translate(50%, 0%);">
							@csrf
								<input class="count" onchange="updateCart(this.value, '{{ $product->rowId }}')" type="number" id="qty_{{ $key }}" value="{{ $product->qty }}" min="1" max="100" name="qty"/>
								<input type="hidden" value="{{ $product->rowId }}" name="rowId">
							</form>
							</div>
							<td class="">
								<?php
									$arrSz = json_decode($sizes)
								?>
								@foreach( $arrSz as $size)
									@if($size->id == $product->options->size && $product->options->cate == 5)
										{{ $size->number_size }}
									@elseif($size->id == $product->options->size && $product->options->cate == 3)
										{{ $size->letter_size }}
									@elseif($size->id == $product->options->size && $product->options->cate == 1)
										{{ $size->letter_size }}
									@endif
								@endforeach
							</td>
							<td class="">
								<?php
									$arrCl = json_decode($colors)
								?>
								@foreach( $arrCl as $color)
									@if($color->id == $product->options->color)
										{{ $color->name_color }}
									@endif
								@endforeach
							</td>
							<td class="">
								<a href="{{ route('fr.deleteCart',['rowId' => $product->rowId]) }}" style="color: white; cursor: pointer;"><i class="fa fa-trash" aria-hidden="true" style="color: black;"></i></a>
							</td>
							<td class="">{{ $product->price * $product->qty }}$</td>
							
						</tr>
						@endforeach
						<tr class="">
						<td colspan="8" style="color:red; font-size: 25px">Total: </td>
							<td style="color:red; font-size: 25px">{{ Cart::subtotal() }}$</td>
						</tr>
					</tbody></table>
				</div>
				@if(Auth::check())
				<div class="row justify-content-center">
					<a href="{{ route('fr.getFormPayment') }}" style="
					width: 300px;
					margin: 50px 0px;
					"
					class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
						Proceed to Checkout
					</a>
				</div>
				@else
				<div class="row justify-content-center">
					<a href="{{ route('get.login') }}" style="
					width: 300px;
					margin: 50px 0px;
					"
					class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
						Proceed to Checkout
					</a>
				</div>
				@endif
			</div>
			@endif
		</div>
	</div>
</div>
@endsection


