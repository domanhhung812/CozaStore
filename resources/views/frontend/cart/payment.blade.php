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
						<tr class="table_row">
							<td colspan="4" class="text-center" style="color:red; font-size: 25px; padding-left:-100px;">Total: </td>
							<td style="color:red; font-size: 25px; padding-left:-100px;">{{ str_replace(',','', Cart::subtotal(0,3)) }}$</td>
						</tr>
					</tbody></table>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-lg-6 col-xl-6 col-xs-12 col m-lr-auto m-b-50">
			<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
			<form action="" method="POST">
			@csrf
				<h4 class="mtext-109 cl2 p-b-30">
					Shopping Information:
				</h4>
				<div class="flex-w flex-t bor12 p-t-15 p-b-30">
					<div class="size-208 w-full-ssm stext-110 cl2 input-group-prepend">
							<input class="shopping" type="text" name="phone" placeholder=Phone... required>
							<input class="shopping" type="text" name="address" placeholder="Address..." required>
							<input class="shopping" type="text" name="note" placeholder="Note..." required>
					</div>
				</div>
				<h4 class="mtext-109 cl2 p-b-30">
					Payment method:
				</h4>
				<div class="flex-w flex-t bor12 p-t-15 p-b-30" style="display: flex;
flex-direction: column;">
						<input type="radio" id="payment1" name="payment" value="COD">
						<label for="payment1" style="margin-top: -18px;
padding-left: 20px;">Cash on delivery</label>
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