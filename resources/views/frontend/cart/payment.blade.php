@extends('frontend.base-layout')
@section('title','Checkout')
@section('content')
<style>
.shopping{
  border: 1px solid black;
  border-radius: 10px;
  padding-left: 15px;
  margin: 20px 0px;
  width: 350px;
  height: 40px;
	
}
.form-control{
	border-radius: 25px;
}
@media only screen and (max-width: 1024px){
  .shopping{
		width:100%;
	}
}
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
.bor10{
	border: 1px solid #b2a47f;
}
.coupon{
	display: flex;
	flex-direction: row;
}
</style>
<div class="container">
	<div class="row" style="margin-top:100px;">
		<div class="col-sm-12 col-lg-6 col-xl-6 col-xs-12 col m-lr-auto m-b-50">
			<div class="m-lr-0-xl">
				<div class="wrap-table-shopping-cart">
					<table class="table">
						<tbody><tr>
							<th scope="col" class="">Image</th>
							<th scope="col" class="">Product</th>
							<th scope="col" class="">Price</th>
							<th scope="col" class="">Quantity</th>
							<th scope="col" class="">Total</th>
						</tr>
						@foreach($products as $product)
						<tr class="table_row">
							<td class="" scope="row">
								<img width="60px" height="80px" src="{{ URL::to('/') }}/upload/images/{{ $product->options->images }}" alt="IMG">
							</td>
							<td class="">{{ $product->name }}</td>
							<td class="">{{ $product->price }}$</td>
							<td class="">{{ $product->qty }}
							</td>
							<td class="">{{ $product->qty * $product->price }}$</td>
						</tr>
						@endforeach
						<?php $ship_cost = 20; 	
							$total = Cart::subtotal();
							if($total >= 100){
								$ship_cost = 0;
							}else if($total == 0){
								$total = 0;
							}
							$discount = session()->get('coupon')['discount'];
						?>
						@if(session()->has('coupon'))
							<tr class="table_row">
								<td colspan="3" class="text-center" style="padding-left:-100px;border-right: none;">Shipping cost: </td>
								<td style="border-left: none;"></td>
								<td style="padding-left:-100px;">{{ $ship_cost }}$</td>
							</tr>
							<tr class="table_row">
								<td colspan="3" class="text-center" style="padding-left:-100px;">Discount ({{session()->get('coupon')['name']}}):</td>
								<td>
									<form action="{{route('fr.removeCoupons')}}" method="post">
									@csrf 
									{{ method_field('delete') }}
									<button type="submit" class="btn btn-danger">Remove</button>
									</form>
								</td>
								<td style="padding-left:-100px;">- {{$discount}}$</td>
							</tr>
							<tr class="table_row">
								<td colspan="3" class="text-center" style="color:red; font-size: 25px; padding-left:-100px;border-right: none;" value="{{ $total + $ship_cost }}">Total: </td>
								<td style="border-left: none;"></td>
								<td style="color:red; font-size: 25px; padding-left:-100px;">{{ $total + $ship_cost - $discount}}$</td>
							</tr>
						@elseif($total == 0)
							<tr class="table_row">
								<td colspan="4" class="text-center" style="color:red; font-size: 25px; padding-left:-100px;" value="{{ $total + $ship_cost }}">Total: </td>
								<td style="color:red; font-size: 25px; padding-left:-100px;">{{ $total}}$</td>
							</tr>
						@else
							<tr class="table_row">
								<td colspan="4" class="text-center" style="padding-left:-100px;">Shipping cost: </td>
								<td style="padding-left:-100px;">{{ $ship_cost }}$</td>
							</tr>
							<tr class="table_row">
								<td colspan="4" class="text-center" style="color:red; font-size: 25px; padding-left:-100px;" value="{{ $total + $ship_cost }}">Total: </td>
								<td style="color:red; font-size: 25px; padding-left:-100px;">{{ $total + $ship_cost - $discount}}$</td>
							</tr>
						@endif
					</tbody>
					</table>
				</div>
			</div>
			<form action="{{ route('fr.postCoupons') }}" method="POST">
			@csrf
				<h4>Have a coupon code?</h4>
				<P>Copy the discount code you have and paste it in the box below. Our smart mechanism will let you know if the code you have is valid, what exact discount it will grant and how much money you will save by using it.</P>
			    <div class="input-group mb-3">
				<input type="text" class="form-control" placeholder="Insert your code..." aria-label="Insert your code..." aria-describedby="basic-addon2" name="coupons_code">
					<div class="input-group-append">
						<button class="btn btn-outline-secondary btn-apply" type="submit" id="btn-apply">Apply</button>
					</div>
				</div>
			</form>
		</div>
		<div class="col-sm-12 col-lg-6 col-xl-6 col-xs-12 col m-lr-auto m-b-50">
			<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
			<form action="" method="POST">
			@csrf
				<h4 class="mtext-109 cl2 p-b-30">
					Shopping Information:
				</h4>
				<div class="container-fluild">
					<div class="col-lg-12 col-md-12 col-xs-8 col-sm-8">
						<div class="row m-t-15 m-b-15" >
							<input type="text" class="form-control" placeholder="Phone..." aria-label="Recipient's username" aria-describedby="basic-addon2" name="phone"  value="{{Auth::user()->phone}}">
						</div>
						<div class="row m-t-15 m-b-15">
							<input type="text" class="form-control" placeholder="Address..." aria-label="Recipient's username" aria-describedby="basic-addon2" name="address" value="{{Auth::user()->address}}">
						</div>
						<div class="row m-t-15 m-b-15">
							<input type="text" class="form-control" placeholder="Note..." aria-label="Recipient's username" aria-describedby="basic-addon2" name="note" value="">
						</div>
					</div>
				</div>
				<h4 class="mtext-109 cl2 p-b-30">
					Payment method:
				</h4>
				<div class="flex-w flex-t bor12 p-t-15 p-b-30" style="display: flex;
flex-direction: column;">
						<input type="radio" id="payment1" name="payment" value="COD">
						<label for="payment1" style="margin-top: -18px;
padding-left: 20px;">Cash on delivery (COD)</label>
						<input type="radio" id="payment2" name="payment" value="Stripe">
						<label for="payment2" style="margin-top: -18px;
padding-left: 20px;">Stripe</label>
				</div>
				<button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
					Checkout
				</button>
				</form>
			</div>
		</div>
		
	</div>
</div>
@endsection
