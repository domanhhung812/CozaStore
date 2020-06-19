@extends('frontend.base-layout')
@section('title','My categories')
@section('content')
<style>
.section-slide{
	display:none !important;
}
.sec-banner{
	display:none !important;
}
</style>
<section class="bg-img1 txt-center p-lr-15 p-tb-92" id="section-about" style="">
    <img src="{{ asset('upload/images/sale2.jpg') }}" class="img-fluid" alt="Responsive image">
</section>
<div class="container">
    <div class="row isotope-grid">
        @foreach($items as $key => $item)
        <?php $countStr = strlen($item->image_product);
            $link1 = substr($item->image_product,-($countStr-2));
            $link = substr($link1,0,($countStr-4)); ?>
        @if($item->sale_off)
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
          <!-- Block2 -->
          <div class="block2">
            <div class="block2-pic hov-img0">
              <img class="img-product" src="{{ URL::to('/') }}/upload/images/{{ $link }}" alt="IMG-PRODUCT">

              <a href="{{ route('fr.detailPd',['slug' => $item->pro_slug,'id' => $item->id]) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                Quick View
              </a>
              <div class="_2N1Tif"><div class="coza-badge coza-badge--fixed-width coza-badge--promotion"><div class="coza-badge--promotion__label-wrapper coza-badge--promotion__label-wrapper--vi"><span class="percent">{{$item->sale_off}}%</span><span class="coza-badge--promotion__label-wrapper__off-label coza-badge--promotion__label-wrapper__off-label--vi">sale</span></div></div></div>
            </div>

            <div class="block2-txt flex-w flex-t p-t-14">
              <div class="block2-txt-child1 flex-col-l ">
                <a href="{{ route('fr.detailPd',['slug' => $item->pro_slug,'id' => $item->id]) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                  {{ $item->name_product }} 
                  @if($item->qty == 0)
                    <span><i style="color:red; font-family: Arial;">(Sold out)</i></span>
                  @endif
                </a>

                <span class="stext-105 cl3 sale_price">
                  <strike>{{$item->price}}$</strike>&nbsp;&nbsp;<h4 style="color: red;">{{$item->price - $item->price * $item->sale_off/100}}$</h4>
                </span>
              </div>

              <div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="{{ asset('frontend/images/icons/icon-heart-01.png')}}" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ asset('frontend/images/icons/icon-heart-02.png')}}" alt="ICON">
								</a>
							</div>
            </div>
          </div>
        </div>
        @endif
        @endforeach    
      </div>
</div>
@endsection
