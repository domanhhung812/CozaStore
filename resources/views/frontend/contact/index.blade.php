@extends('frontend.base-layout')
@section('title','Contact us')
@section('content')
<style>
.section-slide{
	display:none !important;
}
.sec-banner{
	display:none !important;
}
#section-contact{
	margin-top: 100px;
}
@media only screen and (max-width: 667px){
  #section-contact{
      margin-top:0px;
	}
}
@media only screen and (max-width: 1024px){
  #section-contact{
      margin-top:0px;
	}
}
</style>
<section class="bg-img1 txt-center p-lr-15 p-tb-92" id="section-contact" style="background-image: url('{{asset('frontend/images/bg-01.jpg')}}');">
	<h2 class="ltext-105 cl0 txt-center">
		Contact
	</h2>
</section>
<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form action="" method="POST">
          @csrf
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Send Us A Message
						</h4>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="c_email" placeholder="Your Email Address" required>
							<img class="how-pos4 pointer-none" src="{{ asset('frontend/images/icons/icon-email.png') }}" alt="ICON">
						</div>

						<div class="bor8 m-b-30">
							<textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="c_content" placeholder="How Can We Help?" required></textarea>
						</div>

						<button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							Submit
						</button>
					</form>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Address
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								Coza Store Center 8th floor, 379 Hudson St, New York, NY 10018 US
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Lets Talk
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								0964387230
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Sale Support
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								domanhhung812@gmail.com
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection