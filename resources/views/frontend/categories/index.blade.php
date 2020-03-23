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
#section-category{
	margin-top: 100px;
}
.img-product{
  height: 333px;
}
#btnSort{
  margin-top:70px;
  margin-left: 130px;
}
@media only screen and (max-width: 667px){
  #section-category{
      margin-top:0px;
	}
	#footer{
		margin-top: -150px;
  }
  .img-product{
    height:auto;
  }
  .stext-106{
    font-size:14px !important;
  }
  .ltext-103{
    font-size: 33px !important;
  }
  #sortProducts{
    flex-direction: column;
  }
  #sortPrice{
    margin-top:-50px;
  }
  #btnSort{
    margin-top:0px;
    margin-left: 0px;
    width: 100%;
  }
}
@media only screen and (max-width: 1024px){
  #section-category{
      margin-top:0px;
	}
	#footer{
		margin-top: -100px;
	}
}
@media only screen and (min-width: 1024px){
  #section-category{
      margin-top:100px;
	} 
}
</style>
<section class="bg0 p-t-23 p-b-140" id="section-category">
    <div class="container">
      <div class="p-b-10">
        <h3 class="ltext-103 cl5">
          Product Overview
        </h3>
      </div>

      <div class="flex-w flex-sb-m p-b-52">
        <div class="flex-w flex-l-m filter-tope-group m-tb-10">
          <a href="{{ route('fr.product') }}" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
            All Products
          </a>

          @foreach($categories as $cate)
          <?php $name = json_decode($cate)->name;
                $id = json_decode($cate)->id ?>
          <a href="{{ route('fr.getCategories', $id) }}" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
            {{ $name }}
          </a>
          @endforeach
         
        </div>

        <div class="flex-w flex-c-m m-tb-10">
          <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
            <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
            <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
             Filter
          </div>

          <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
            <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
            <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
            Search
          </div>
        </div>
        
        <!-- Search product -->
        <div class="dis-none panel-search w-full p-t-10 p-b-15">
          <div class="bor8 dis-flex p-l-15">
            <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
              <i class="zmdi zmdi-search"></i>
            </button>

            <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
          </div>  
        </div>

        <!-- Filter -->
        <div class="dis-none panel-filter w-full p-t-10">
          <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
          <form action="" id="sortProducts" style="display:flex; align-items:center;">
            <div class="filter-col1 p-r-15 p-b-27" style="width:100% !important;margin-bottom:36px">
              <div class="mtext-102 cl2 p-b-15" id="sortBy">
                Sort By
              </div>

              <ul>
                 <!-- <li class="p-b-6" style="display:flex; align-items:center">
                  <input type="checkbox" value="latest" style="margin-right:10px;" name="sortDate">Newness
                </li> -->

                <li class="p-b-6" style="display:flex; align-items:center">
                  <input type="radio" value="asc" style="margin-right:10px;" name="sortPrice">Price: Low to High
                </li>

                <li class="p-b-6" style="display:flex; align-items:center">
                  <input type="radio" value="desc" style="margin-right:10px;" name="sortPrice">Price: High to Low
                </li>
              </ul>
            </div>

            <div class="filter-col2 p-r-15 p-b-27" id="sortPrice">
              <div class="mtext-102 cl2 p-b-15 ">
                Price
              </div>

              
                <span>
                  Min:<br />
                  <input type="number" name="min_price" style="border: 1px solid gray;
                  border-radius:10px; padding-left:10px;" min="1"/>
                  Max:<br />
                  <input type="number" name="max_price" style="border: 1px solid gray;
                  border-radius:10px; padding-left:10px;" min="1"/>
                </span>
              
            </div>
            <button
              id="btnSort"
              type="submit"
              class="btn btn-primary"
            >
            Search
            </button>
          </div>
          </form>
        </div>
      </div>

      <div class="row isotope-grid">
        @foreach($items as $key => $item)
        <?php $link = json_decode($item->image_product)[0] ?>
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
          <!-- Block2 -->
          <div class="block2">
            <div class="block2-pic hov-img0">
              <img class="img-product" src="{{ URL::to('/') }}/upload/images/{{ $link }}" alt="IMG-PRODUCT">
              <a href="{{ route('fr.detailPd', $item->id) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                Quick View
              </a>
            </div>
            <div class="block2-txt flex-w flex-t p-t-14">
              <div class="block2-txt-child1 flex-col-l ">
                <a href="{{ route('fr.detailPd', $item->id) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                  {{ $item->name_product }}
                </a>
                <span class="stext-105 cl3">
                 {{ $item->price }}$
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
        @endforeach
      </div>

      <!-- Load more -->
      {{-- <div class="flex-c-m flex-w w-full p-t-45">
        <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
          Load More
        </a>
      </div> --}}
    </div>
  </section>
<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
 

</div>
@endsection      