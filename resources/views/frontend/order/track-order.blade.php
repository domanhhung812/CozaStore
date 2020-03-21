@extends('frontend.base-layout')
@section('title','My orders')
@section('content')
<style>
.section-slide{
	display:none !important;
}
.sec-banner{
	display:none !important;
}
/* Tabs*/
section {
    padding: 60px 0;
}

section .section-title {
    text-align: center;
    color: white;
    margin-bottom: 50px;
    text-transform: uppercase;
}
#tabs{
	background:white;
    color: black;
}
#tabs h6.section-title{
    color: black;
}

#tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: black;
    background-color: transparent;
    border-color: transparent transparent #f3f3f3;
    border-bottom: 4px solid !important;
    font-size: 20px;
    font-weight: bold;
}
#tabs .nav-tabs .nav-link {
    border: 1px solid transparent;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
    color: black;
    font-size: 20px;
}
.card{
	display: flex;
  flex-direction: row;
	width: 100%;
}
.card-price{
	position: absolute;
	right: 0;
	top: 0;
	font-size: 2.5rem;
}
#ModalCenter .modal-dialog {
    -webkit-transform: translate(0,-50%);
    -o-transform: translate(0,-50%);
    transform: translate(0,-50%);
    top: 50%;
    margin: 0 auto;
}
.container{
	margin-top: 20px;
}
</style>
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('http://localhost:8000/frontend/images/bg-02.jpg');margin-top: 100px;">
	<h2 class="ltext-105 cl0 txt-center">
		Track order
	</h2>
</section>
<?php
	$items = json_decode($items);
	$newItems = array();
	$unchecked = 0;
	$checked = 0;
	foreach($items as $key => $value ){
			$value->tr_status == 0 ? $unchecked++ : $checked++;
			if(!isset($newItems[$value->or_transaction_id])){
				$newItems[$value->or_transaction_id] =  array();
			}
			array_push($newItems[$value->or_transaction_id],$value);
	}
?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-9 col-md-9 col-sm-10">
			<section id="tabs">
				<div class="container-fluid">
					<nav>
						<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
							<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Waiting for seller ({{ $unchecked === 0 ? '' : ($unchecked) }})</a>
							<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Shipping ({{ $checked === 0 ? '' : ($checked) }})</a>
							<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Received</a>
						</div>
					</nav>
					<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
						<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
							@if($unchecked)
							@foreach($newItems as $items)
							@if($items[0]->tr_status === 0)
							<div class="container container-3">
								@foreach($items as $item)
								<?php
									$countStr = strlen($item->image_product);
									$link1 = substr($item->image_product,-($countStr-2));
									$link = substr($link1,0,($countStr-4));
									$sizes = json_decode($arrSizes);
									$colors = json_decode($arrColors);
								?>
								<div class="card">
									<img class="card-img-top" src="{{ URL::to('/') }}/upload/images/{{$link}}" alt="Card image cap" style="width: 180px; height:240px;">
									<div class="card-body">
										<h5 class="card-title">{{ $item->name_product }}</h5>
										<p class="card-text">Quantity: {{$item->or_qty}}</p>
										@foreach($sizes as $size)
										@if($size->id == $item->or_size )
										<p class="card-text">Size: {{$size->letter_size}}</p>
										@endif
										@endforeach
										@foreach($colors as $color)
										@if($color->id == $item->or_color )
										<p class="card-text">Color: {{$color->name_color}}</p>
										@endif
										@endforeach
										<p class="card-text card-price"><small class="text-muted">{{$item->or_price}}$</small></p>
									</div>
								</div>
								@endforeach
							</div>
							<h2 style="float:right; color: red;margin: 50px 0px;">Total: {{$item->tr_total}}$</h2>
							@endif
							@endforeach
							@else
							<div class="container container-3">
								<div class="row">
									Haven't orders.
								</div>
							</div>
							@endif
						</div>
						<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
						@if($checked)
							@foreach($newItems as $items)
							@if($items[0]->tr_status === 1)
							<div class="container container-3">
								@foreach($items as $item)
								<?php
									$countStr = strlen($item->image_product);
									$link1 = substr($item->image_product,-($countStr-2));
									$link = substr($link1,0,($countStr-4));
									$sizes = json_decode($arrSizes);
									$colors = json_decode($arrColors);
								?>
								<div class="card">
									<img class="card-img-top" src="{{ URL::to('/') }}/upload/images/{{$link}}" alt="Card image cap" style="width: 180px; height:240px;">
									<div class="card-body">
										<h5 class="card-title">{{ $item->name_product }}</h5>
										<p class="card-text">Quantity: {{$item->or_qty}}</p>
										@foreach($sizes as $size)
										@if($size->id == $item->or_size )
										<p class="card-text">Size: {{$size->letter_size}}</p>
										@endif
										@endforeach
										@foreach($colors as $color)
										@if($color->id == $item->or_color )
										<p class="card-text">Color: {{$color->name_color}}</p>
										@endif
										@endforeach
										<p class="card-text card-price"><small class="text-muted">{{$item->or_price}}$</small></p>
									</div>
								</div>
								@endforeach
							</div>
							<div class="container container-4" style="margin-top:0 !important;">
								<div class="card card-total-price">
									<div class="card-body" style="display: flex;flex-direction: column;align-items: flex-end;">
										<h2 class="card-title" style="color:red !important;">Total: {{ $item->tr_total }}$</h2>
										<button class="btn btn-primary" data-toggle="modal" data-target="#ModalCenter">Received</button>
									</div>
								</div>
							</div>
							<div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLongTitle">Confirm order</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											Are you sure you received products in this order? If you have not received the product and you press confirm we will not refund the product to you.
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
											<button type="button" class="btn btn-primary">Confirm</button>
										</div>
									</div>
								</div>
							</div>
							@endif
							@endforeach
							@else
							<div class="container container-3">
								<div class="row">
									Haven't orders.
								</div>
							</div>
							@endif
						</div>
						<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
							Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
						</div>
					</div>
				</div>
			</section>
    </div>
  </div>
</div>
@endsection