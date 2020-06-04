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
.comments{
	margin-left: 70px !important;
}
.star-icon{
	color: #f9ba48;
}
.list_text{
	display: inline-block;
	margin-left: 10px;
	position: relative;
	background: #52b858;
	color: #fff;
	padding: 2px 8px;
	box-sizing: border-box;
	font-size: 12px;
	border-radius: 2px;
}
.list_text:after{
	right: 100%;
	top: 50%;
	border: solid transparent;
	content: " ";
	height: 0;
	width: 0;
	position: absolute;
	pointer-events: none;
	border-color: rgba(82,184,88,0);
	border-right-color: #52b858;
	border-width: 6px;
	margin-top: -6px;
}
.img-product{
	width: 400px;
	height: 500px;
}
.image-product{
	height:333px;
	border-radius:15px;
	width:250px;
}
.sec-product-detail{
	margin-top: 100px;
}
.add-favorite-product{
	display: flex;
	flex-direction: column;
}
@media only screen and (max-width: 568px){
  .respon6 {
    width: 25px;
	}
	.quantity{
		margin-right: 30px;
	}
	.comments{
		margin-left: 60px !important;
	}
	.mtext-107{
		font-size: 15px !important;
	}
	.sec-product-detail{
	margin-top: 0px;
	}
	.selector-components{
		margin-right:25px;
	}
}
@media only screen and (max-width: 667px){
	.respon6-next{
		width: 100%;
	}
	.wrap-slick3{
		margin-left: 0px !important;
	}
	.img-product{
		width:100%;
		height: auto;
	}
	.image-product{
		height:auto;
		width: 100%;
	}
	.w-full{
		margin-left:-30px;
	}
	.btnComment{
		width:100%;
	}
	.sec-product-detail{
	margin-top: 0px;
	}
	.block2-txt-child2{
		right: 0 !important;
	}
}
@media only screen and (max-width: 1024px){
  .detail-product{
		margin-left: 50px;
	}
	.wrap-slick3{
		margin-left: 0!important;
	}
	.sec-product-detail{
	margin-top: 0px;
	}
	.block2-txt-child2{
		right: 0 !important;
	}
}
@media only screen and (min-width: 1024px){
	.wrap-slick3{
		margin-left: 100px !important;
	}
	.detail-product{
		margin-left: 0px;
	}
	.selector-components{
		margin-left: -30px;
	}
	.sec-product-detail{
	margin-top: 100px;
	}
}
img {
  max-width: 100%; }

.preview {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }
  @media screen and (max-width: 996px) {
    .preview {
      margin-bottom: 20px; } }

.preview-pic {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.preview-thumbnail.nav-tabs {
  border: none;
  margin-top: 15px; }
  .preview-thumbnail.nav-tabs li {
    width: 18%;
    margin-right: 2.5%; }
    .preview-thumbnail.nav-tabs li img {
      max-width: 100%;
      display: block; }
    .preview-thumbnail.nav-tabs li a {
      padding: 0;
      margin: 0; }
    .preview-thumbnail.nav-tabs li:last-of-type {
      margin-right: 0; }

.tab-content {
  overflow: hidden;
  display: flex; 
  justify-content: center;
  }
  .tab-content img {
    width: 100%;
    -webkit-animation-name: opacity;
            animation-name: opacity;
    -webkit-animation-duration: .3s;
            animation-duration: .3s; }

.card {
  margin-top: 50px;
  background: #eee;
  padding: 3em;
  line-height: 1.5em; }
.color_products{
	display: flex;
	flex-direction: row;
}
@media screen and (min-width: 997px) {
  .wrapper {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex; } }

.details {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }

.colors {
	display: flex;
	flex-direction: column;
	justify-content: flex-start;
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.product-title, .price, .sizes, .colors {
  text-transform: UPPERCASE;
  font-weight: bold; }

.checked, .price span {
  color: #ff9f1a; }

.product-title, .rating, .product-description, .price, .vote, .sizes {
  margin-bottom: 15px; }

.product-title {
  margin-top: 0; }

.sizes{
  margin-right: 10px; 
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  }
.size:first-of-type {
    margin-left: 40px; 
}
.size{
	position: relative;
	top: -1.2rem;
}
.color {
  display: inline-block;
  vertical-align: middle;
  margin-right: 10px;
  height: 2em;
  width: 10em;
  border-radius: 2px;
  position: relative;
  top: -0.8rem; }
  .color:first-of-type {
    margin-left: 30px; }

.add-to-cart, .like {
  background: #ff9f1a;
  padding: 1.2em 1.5em;
  border: none;
  text-transform: UPPERCASE;
  font-weight: bold;
  color: #fff;
  -webkit-transition: background .3s ease;
          transition: background .3s ease; }
  .add-to-cart:hover, .like:hover {
    background: #b36800;
    color: #fff; }

.not-available {
  text-align: center;
  line-height: 2em; }
  .not-available:before {
    font-family: fontawesome;
    content: "\f00d";
    color: #fff; }

.orange {
  background: #ff9f1a; }

.green {
  background: #85ad00; }

.blue {
  background: #0076ad; }

.tooltip-inner {
  padding: 1.3em; }

@-webkit-keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }

@keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }
</style>
<section class="sec-product-detail bg0 p-t-65 p-b-60 py-0" style="">
		<div class="container">
			<form action="{{ route('fr.addCart', ['id' => $info['id'] ]) }}" method="post">
						@csrf
				<!-- <div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w" style="margin-left:200px;">
									<img class="img-product" src="{{ URL::to('/') }}/upload/images/{{ $images[0] }}" alt="">
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-5 p-b-30">
						<div class="p-r-50 p-t-5 p-lr-0-lg detail-product">
							<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							{{ $info['name_product'] }}
							</h4>
							
							<span class="mtext-106 cl2">
							{{ number_format($info['price']) }}$
							</span>

							<p class="stext-102 cl3 p-t-23">
							{!! $info['description'] !!}
							</p>
							<div class="p-t-33 selector-components">
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Size
									</div>

									<div class="size-204 respon6-next">
										<div class="">
										@foreach($sizes as $key => $item)
											<label class="form-check" style="padding-top: 10px;">
											<input class="form-check-input" type="radio" name="inlineRadioOptions" id="size_{{ $item['id'] }}" value="{{ $item['id'] }}">
											<span class="form-check-label">{{ $item['letter_size'] }}</span>
										</label>
										@endforeach
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Color
									</div>

									<div class="size-204 respon6-next">
										<div class="">
										@foreach($colors as $key => $item)
											<label class="form-check" style="padding-top: 10px;">
												<input class="form-check-input px-10" type="radio" name="inlineRadioOptionsColor" id="color_{{ $item['id'] }}" value="{{ $item['id'] }}">
												<p class="form-check-label" 
												style="
													padding-left: -10px !important;
												"
												>{{ $item['name_color'] }}</p>
											</label>
										@endforeach
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next quantity">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num_product" value="1" style="width:100%" min="1">
										</div>
										<div class="my-10">
											<p>(Số lượng còn trong kho: {{ $info['qty'] }}.)</p>
										</div>
										<button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
											Add to cart
										</button>
										<div class="add-favorite-product">
											<button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 favorite_product js-add-favorite">
												<i class="fa fa-heart-o" aria-hidden="true"></i>
											</button>
										</div>
									</div>
								</div>	
							</div>
						</div>
					</div>
				</div> -->
				<div class="container-fluild p-l-0 p-r-0">
					<div class="card">
						<div class="container-fliud">
							<div class="wrapper row">
								<div class="preview col-md-6">
									
									<div class="preview-pic tab-content">
										<img class="img-fluid" alt="Responsive image" src="{{ URL::to('/') }}/upload/images/{{ $images[0] }}" >
									</div>
									
								</div>
								<div class="details col-md-6">
									<h3 class="product-title">{{ $info['name_product'] }}</h3>
									<div class="rating">
										<span class="review-no">{{$info['view_product']}} views</span>
									</div>
									<p class="product-description">{!! $info['description'] !!}</p>
									<h4 class="price">price: <span>{{ number_format($info['price']) }}$</span></h4>
									<p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
									<h5 class="sizes">sizes:
										
										@foreach($sizes as $key => $item)
											<label class="form-check" style="padding-top: 10px;">
											<input class="" type="radio" name="inlineRadioOptions" id="size_{{ $item['id'] }}" value="{{ $item['id'] }}">
											<span class="size" data-toggle="tooltip" title="{{ $item['letter_size'] }}" style="font-size: 14px;">{{ $item['letter_size'] }}</span>
										</label>
										@endforeach
									</h5>
									<h5 class="colors">colors:
										@foreach($colors as $key => $item)
											<label class="form-check" style="padding-top: 10px;">
												<input class= "px-10" type="radio" name="inlineRadioOptionsColor" id="color_{{ $item['id'] }}" value="{{ $item['id'] }}">
												<span class="color" style="padding-left: 10px;font-size: 14px;"
												>{{ $item['name_color'] }}</span>
											</label>
										@endforeach
									</h5>
									<div class="flex-w p-b-10">
										<div class="size-204 flex-w flex-m respon6-next quantity">
											<div class="wrap-num-product flex-w m-r-20 m-tb-10">
												<input class="mtext-104 cl3 txt-center num-product" type="number" name="num_product" value="1" style="width:100%" min="1">
											</div>
											<div class="my-10">
												<p>(Left in stock: {{ $info['qty'] }}.)</p>
											</div>
										</div>
									</div>
									<div class="action">
										<button class="add-to-cart btn btn-default" type="submit">add to cart</button>
										<a class="like btn btn-default js-add-favorite" href="{{ route('fr.postAddFavorite', ['id' => $info['id']]) }}"><span class="fa fa-heart"></span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
						</li>
						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#reviews" role="tab" >Comments</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- - -->
						<div class="tab-pane fade show active" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6">
									Aenean sit amet gravida nisi. Nam fermentum est felis, quis feugiat nunc fringilla sit amet. Ut in blandit ipsum. Quisque luctus dui at ante aliquet, in hendrerit lectus interdum. Morbi elementum sapien rhoncus pretium maximus. Nulla lectus enim, cursus et elementum sed, sodales vitae eros. Ut ex quam, porta consequat interdum in, faucibus eu velit. Quisque rhoncus ex ac libero varius molestie. Aenean tempor sit amet orci nec iaculis. Cras sit amet nulla libero. Curabitur dignissim, nunc nec laoreet consequat, purus nunc porta lacus, vel efficitur tellus augue in ipsum. Cras in arcu sed metus rutrum iaculis. Nulla non tempor erat. Duis in egestas nunc.
								</p>
							</div>
						</div>
						<!-- - -->
						<!--  -->
						<div class="tab-pane fade" id="reviews" role="tabpanel">
							<div class="row">
								<div class="col-lg-12 col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<div class="p-b-30 m-lr-15-sm comments" style="margin-top:-60px; margin-left: 70px;">
										<!-- Review -->
										@foreach($comments as $key=> $comment)
										<div class="flex-w flex-t p-b-68 py-0 comments">
											<div class="size-207" style="">
												<span>
													<img src="{{ asset('frontend/images/icons/user-image.png') }}" alt="" style="width: 60px; transform:translateY(105%); margin-left: -70px;border-radius:50%;		">
													<div class="flex-w flex-sb-m p-b-17">
														<span class="mtext-107 cl2 p-r-20" style="color:#385898; font-family: Arial;">
															{{ $comment->co_name }}
														</span>
														<?php 
															$star = $comment->co_rating;
														?>
														<span class="fs-18 cl11">
															@for($i = 0; $i < $star; $i++)
															<i class="zmdi zmdi-star"></i>
															@endfor
														</span>
													</div>

													<p class="stext-102 cl6" style="color:#1c1e21; font-family: Arial;">
														{{ $comment->co_content }}</i>
													</p>
												</span>
											</div>
										</div>
										@endforeach
										<!-- Add review -->
										<form class="w-full" action="" method="POST" style="margin-top: 50px;">
										@csrf
											<h5 class="mtext-108 cl2 p-b-7">
												Add a review
											</h5>
											<div class="flex-w flex-m p-t-50 p-b-23">
												<span class="stext-102 cl3 m-r-16">
													Your Rating
												</span>
												<span class="wrap-rating fs-18 cl11 pointer">
													@for($i = 1; $i < 6; $i++)
													<i class="item-rating pointer zmdi zmdi-star-outline star-icon" data-key="{{$i}}" style="font-size:30px;" data-type="default"></i>
													@endfor
													<input class="dis-none" type="number" name="rating">
												</span>
												<span class="list_text">Awesome</span>
											</div>
											<p class="stext-102 cl6">
												Your email address will not be published. Required fields are marked *
											</p>
											<div class="row p-b-25">
											@if(Auth::check())
												<div class="col-12 p-b-5">
													<label class="stext-102 cl3" for="review">Your review</label>
													<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="co_content"></textarea>
												</div>

												<div class="col-sm-6 p-b-5">
													<label class="stext-102 cl3" for="name">Name</label>
													<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" name="co_name" value="{{ $userName }}" readonly>
												</div>

												<div class="col-sm-6 p-b-5">
													<label class="stext-102 cl3" for="email">Email</label>
													<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="text" name="co_email" value="{{ $userEmail }}" readonly>
												</div>
											</div>
											<button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10 btnComment">
												Submit
											</button>
											@else
											<a href="{{ route('get.login') }}" class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
												Submit
											</a>
											@endif
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>
<section class="sec-relate-product bg0 p-t-45 p-b-105">
    <div class="container">
			<div class="p-b-45">
					<h3 class="ltext-106 cl5 txt-center">
							Related Products
					</h3>
			</div>
        <!-- Slide2 -->
        <div class="swiper-container">
				<div class="swiper-wrapper">
					@foreach($items as $item)
					<?php $link = json_decode($item->image_product)[0] ?>
					@if($item->id == $info['id'])
					<div class="swiper-slide" style="display:none;">
						<div class="">
							<span>
								<img src="{{ URL::to('/') }}/upload/images/{{ $link }}" alt="IMG-PRODUCT" styLe="height:333px;" class="image-product">	
								<div class="inline-text">
									<div class="block2-txt-child1 flex-col-l ">
										<a href="{{ route('fr.detailPd',$item->id) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" tabindex="0">
										{{$item->name_product}}
										</a>
										<span class="stext-105 cl3">
										{{$item->price}}$
										</span>
									</div>
									<!-- <div class="block2-txt-child2 flex-r p-t-3 heart" style="position: absolute;right: 100px;bottom: 25px;">
										<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2" tabindex="0">
										<img class="icon-heart1 dis-block trans-04" src="{{ asset('frontend/images/icons/icon-heart-01.png') }}" alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ asset('frontend/images/icons/icon-heart-02.png') }}" alt="ICON">
										</a>
									</div> -->
								</div>
							</span>
						</div>
					</div>
					@else
					<div class="swiper-slide" style="">
						<div class="">
							<span>
								<img class="image-product" src="{{ URL::to('/') }}/upload/images/{{ $link }}" alt="IMG-PRODUCT">	
								<div class="inline-text">
									<div class="block2-txt-child1 flex-col-l ">
										<a href="{{ route('fr.detailPd',$item->id) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" tabindex="0">
										{{$item->name_product}}
										</a>
										<span class="stext-105 cl3">
										{{$item->price}}$
										</span>
									</div>
									<!-- <div class="block2-txt-child2 flex-r p-t-3" style="position: absolute;right: 120px;bottom: 25px;">
										<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2" tabindex="0">
										<img class="icon-heart1 dis-block trans-04" src="{{ asset('frontend/images/icons/icon-heart-01.png') }}" alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ asset('frontend/images/icons/icon-heart-02.png') }}" alt="ICON">
										</a>
									</div> -->
								</div>
							</span>
						</div>
					</div>
					@endif
					@endforeach
				</div>
			</div>
    </div>
</section>
@endsection
@push('js')
<script>
	$(document).ready(function(){
		const listRatingText = {
			1 : 'Awful',
			2 : 'Not bad',
			3 : 'Good',
			4 : 'Very good',
			5 : 'Awesome',
		};
		//console.log($this.attr('data-key'));
		$('.star-icon').mouseover(function(){
			let $this = $(this);
			$(".list_text").text('').text(listRatingText[$this.attr('data-key')]);
			let id = $this.attr('data-key');
		});
		$('.star-icon').on('click',function(){
			let $this = $(this);
				let id = $this.attr('data-key');
				$('.dis-none').attr('value',id);
		});
		var swiper = new Swiper('.swiper-container', {
			slidesPerView: 3,
			spaceBetween: 30,
			freeMode: true,
			pagination: {
				el: '.swiper-pagination',
				clickable: true,
			},
		});
		$('.js-add-favorite').click(function(e){
			let $this = $(this);
			let url = $this.attr('href');
			e.preventDefault();

			if(url){
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					type: "POST",
					url: url
				}).done(function(results){
					if(results['messages'] === 'Add favorite product successfully'){
						toastr.success('Add favorite product successfully');
					}else if(results['messages'] === 'Not exist product. Please choose again'){
						toastr.info('Not exist product. Please choose again');
					}else if(results['messages'] === 'This product was to be favorite'){
						toastr.error('This product was to be favorite');
					}else{
						toastr.error('Something is wrong. Please try again');
					}
				})
			}
		});
	});
</script>
@endpush