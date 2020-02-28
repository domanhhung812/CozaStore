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
<div class="row" style="margin-top:100px;">
				<div class="col-lg-12 col-xl-12 m-lr-auto">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tbody><tr class="table_head">
									<th class="column-1">#</th>
									<th class="column-2">Image</th>
									<th class="column-3">Product Name</th>
									<th class="column-4">Price</th>
									<th class="column-5">Quantity</th>
									<th class="column-6">Size</th>
									<th class="column-7">Color</th>
									<th class="column-8">Action</th>
									<th class="column-9">Subtotal</th>
								</tr>
								@foreach($products as $key => $product)
								<tr class="table_row">
									<td class="column-1">#</td>
									<td class="column-2"><img width="60px" height="80px" src="{{ URL::to('/') }}/upload/images/{{ $product->options->images }}" alt=""></td>
									<td class="column-3">{{ $product->name }}</td>
									<td class="column-4">{{ $product->price }}</td>
									<td class="column-5">
									<div class="wrap" style="margin-left: 100px;">
									<form action="{{ route('fr.updateCart') }}" method="POST">
									@csrf
										<input class="count" onchange="updateCart(this.value, '{{ $product->rowId }}')" type="number" id="qty_{{ $key }}" value="{{ $product->qty }}" min="1" max="100" name="qty"/>
										<input type="hidden" value="{{ $product->rowId }}" name="rowId">
									</form>
									</div>
									<td class="column-6">
										<?php
											$arrSz = json_decode($sizes)
										?>
										@foreach( $arrSz as $size)
											@if($size->id == $product->options->size)
												{{ $size->letter_size }}
											@endif
										@endforeach
									</td>
									<td class="column-7">
										<?php
											$arrCl = json_decode($colors)
										?>
										@foreach( $arrCl as $color)
											@if($color->id == $product->options->color)
												{{ $color->name_color }}
											@endif
										@endforeach
									</td>
									<td class="column-8">
										<a href="{{ route('fr.deleteCart',['rowId' => $product->rowId]) }}" style="color: white; cursor: pointer;" class="btn btn-danger">Delete</a>
									</td>
									<td class="column-9">{{ $product->price * $product->qty }}</td>
									
								</tr>
								@endforeach
								<tr class="table_row">
									<td colspan="6" class="text-center" style="color:red; font-size: 25px">Total</td>
									<td style="color:red; font-size: 25px">{{ str_replace(',','', Cart::subtotal(0,3)) }}$</td>
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
				</div>

				<!-- <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									$79.65
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									There are no shipping methods available. Please double check your address, or contact us if you need any help.
								</p>
								
								<div class="p-t-15">
									<span class="stext-112 cl8">
										Calculate Shipping
									</span>

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2 select2-hidden-accessible" name="time" tabindex="-1" aria-hidden="true">
											<option>Select a country...</option>
											<option>USA</option>
											<option>UK</option>
										</select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 143px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-time-ch-container"><span class="select2-selection__rendered" id="select2-time-ch-container" title="Select a country...">Select a country...</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
										<div class="dropDownSelect2"></div>
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="State /  country">
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Postcode / Zip">
									</div>
									
									<div class="flex-w">
										<div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
											Update Totals
										</div>
									</div>
										
								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									$79.65
								</span>
							</div>
						</div>

						<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Proceed to Checkout
						</button>
					</div>
				</div> -->
			</div>
@endsection


