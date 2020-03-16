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
.section-slide{
	display:none !important;
}
.sec-banner{
	display:none !important;
}
</style>
<div class="row" style="margin-top:100px;width:100%;">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tbody><tr class="table_head">
									<th class="column-1">Image</th>
									<th class="column-2">Product</th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>
                @foreach($products as $product)
								<tr class="table_row">
									<td class="column-1">
										
										<img width="60px" height="80px" src="{{ URL::to('/') }}/upload/images/{{ $product->options->images }}" alt="IMG">
									</td>
									<td class="column-2">{{ $product->name }}</td>
									<td class="column-3">{{ $product->price }}$</td>
									<td class="column-4">{{ $product->qty }}
									</td>
									<td class="column-5">{{ $product->qty * $product->price }}$</td>
								</tr>
                @endforeach
                <tr class="table_row">
									<td colspan="4" class="text-center" style="color:red; font-size: 25px; padding-left:-100px;">Total</td>
									<td style="color:red; font-size: 25px; padding-left:-100px;">{{ str_replace(',','', Cart::subtotal(0,3)) }}$</td>
								</tr>
							</tbody></table>
						</div>
					</div>
				</div>
				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
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
@endsection