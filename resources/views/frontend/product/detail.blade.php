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
</style>
<section class="sec-product-detail bg0 p-t-65 p-b-60 py-0" style="margin-top: 100px;">
		<div class="container">
			<form action="{{ route('fr.addCart', ['id' => $info['id'] ]) }}" method="post">
						@csrf
				<div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
								<div class="wrap-slick3-dots"></div>
								<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
					
									<img src="{{ URL::to('/') }}/upload/images/{{ $images[0] }}" alt="" style="width: 400px; heigth: 500px;">
					
							</div>
						</div>
					</div>
						
					<div class="col-md-6 col-lg-5 p-b-30">
						<div class="p-r-50 p-t-5 p-lr-0-lg">
							<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							{{ $info['name_product'] }}
							</h4>

							<span class="mtext-106 cl2">
							{{ number_format($info['price']) }}$
							</span>

							<p class="stext-102 cl3 p-t-23">
							{!! $info['description'] !!}
							</p>
							
							<!--  -->
							<div class="p-t-33">
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
									<div class="size-204 flex-w flex-m respon6-next">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num_product" value="1" style="width:100%" min="1">
										</div>
										<div class="my-10">
											<p>(Số lượng còn trong kho: {{ $info['qty'] }}.)</p>
										</div>
										<button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
											Add to cart
										</button>
									</div>
								</div>	
							</div>

							<!--  -->
							<div class="flex-w flex-m p-l-100 p-t-40 respon7">
								<div class="flex-m bor9 p-r-10 m-r-11">
									<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
										<i class="zmdi zmdi-favorite"></i>
									</a>
								</div>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
									<i class="fa fa-facebook"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
									<i class="fa fa-twitter"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
									<i class="fa fa-google-plus"></i>
								</a>
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
							<a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional information</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Comments</a>
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
						<div class="tab-pane fade" id="reviews" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<div class="p-b-30 m-lr-15-sm" style="position:relative; top: -9%; left: 14%;">
										<!-- Review -->
										@foreach($comments as $key=> $comment)
										<div class="flex-w flex-t p-b-68 py-0 comments">
											<div class="size-207" style="">
												<span>
													<img src="{{ asset('frontend/images/icons/user-image.png') }}" alt="" style="width: 60px; transform:translateY(105%); margin-left: -70px;">
													<div class="flex-w flex-sb-m p-b-17">
														<span class="mtext-107 cl2 p-r-20" style="color:#385898; font-family: Arial;">
															{{ $comment->co_name }}
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

											<p class="stext-102 cl6">
												Your email address will not be published. Required fields are marked *
											</p>
											<div class="row p-b-25">
												<div class="col-12 p-b-5">
													<label class="stext-102 cl3" for="review">Your review</label>
													<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="co_content"></textarea>
												</div>

												<div class="col-sm-6 p-b-5">
													<label class="stext-102 cl3" for="name">Name</label>
													<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" name="co_name">
												</div>

												<div class="col-sm-6 p-b-5">
													<label class="stext-102 cl3" for="email">Email</label>
													<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="text" name="co_email">
												</div>
											</div>
											<button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
												Submit
											</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection