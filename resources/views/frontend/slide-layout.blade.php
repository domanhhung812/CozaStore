
<!-- Slider -->
  <section class="section-slide">
    <div class="wrap-slick1">
      <div class="slick1">
        <div class="item-slick1" style="background-image: url({{ URL::asset('frontend/images/slide-01.jpg') }});">
          <div class="container h-full">
            <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
              <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                <span class="ltext-101 cl2 respon2">
                  Women Collection 2020
                </span>
              </div>
                
              <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                  NEW SEASON
                </h2>
              </div>
              <!-- <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                <a href="#" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                  Shop Now
                </a>
              </div> -->
            </div>
          </div>
        </div>

        <div class="item-slick1" style="background-image: url({{ URL::asset('frontend/images/slide-02.jpg') }});">
          <div class="container h-full">
            <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
              <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
                <span class="ltext-101 cl2 respon2">
                  Men New-Season
                </span>
              </div>
                
              <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                  Jackets & Coats
                </h2>
              </div>
                
              <!-- <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
                <a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                  Shop Now
                </a>
              </div> -->
            </div>
          </div>
        </div>

        <div class="item-slick1" style="background-image: url({{ URL::asset('frontend/images/slide-03.jpg') }});">
          <div class="container h-full">
            <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
              <div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
                <span class="ltext-101 cl2 respon2">
                  Men Collection 2020
                </span>
              </div>
                
              <div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                  New arrivals
                </h2>
              </div>
                
              <!-- <div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
                <a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                  Shop Now
                </a>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Banner -->
  <div class="sec-banner bg0 p-t-80 p-b-50">
    <div class="container">
    <div class="p-b-10 sale-title">
        <h3 class="ltext-103 cl5">
          Top sale
        </h3>
        <a href="{{ route('fr.topsale') }}" class="show-all">Show all ></a>
      </div>
      <div class="swiper-container">
        <div class="swiper-wrapper">
        @foreach($products as $item)
        <?php $link = json_decode($item->image_product)[0] ?>
        @if($item->sale_off)
          <div class="swiper-slide" style="">
						<div class="swiper-slide__display">
							<span style="position: relative;">
								<img src="{{ URL::to('/') }}/upload/images/{{ $link }}" alt="IMG-PRODUCT" styLe="height:333px;" class="image-product">	
                <div class="_2N1Tif"><div class="coza-badge coza-badge--fixed-width coza-badge--promotion"><div class="coza-badge--promotion__label-wrapper coza-badge--promotion__label-wrapper--vi"><span class="percent">{{$item->sale_off}}%</span><span class="coza-badge--promotion__label-wrapper__off-label coza-badge--promotion__label-wrapper__off-label--vi">sale</span></div></div></div>
								<div class="inline-text">
									<div class="block2-txt-child1 flex-col-l ">
										<a href="{{ route('fr.detailPd',['slug' => $item->pro_slug, 'id' => $item->id]) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" tabindex="0">
										{{$item->name_product}}
										</a>
										<span class="stext-105 cl3 sale_price">
										<strike>{{$item->price}}$</strike>&nbsp;&nbsp;<h4 style="color: red;">{{$item->price - $item->price * $item->sale_off/100}}$</h4>
										</span>
									</div>
								</div>
							</span>
						</div>
					</div>
        @endif
        @endforeach
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </div>
  </div>
  @push('js')
  <script type="text/javascript">
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 1,
      spaceBetween: 10,
      // init: false,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 10,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 10,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 10,
        },
        1366: {
          slidesPerView: 5,
          spaceBetween: 10,
        },
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>
  @endpush