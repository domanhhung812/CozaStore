<!DOCTYPE html>
<html lang="en">
<head>
  <title>Coza Store - @yield('title')</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="{{ asset('frontend/images/icons/favicon.png') }}"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/fonts/iconic/css/material-design-iconic-font.min.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href=" {{ asset('frontend/fonts/linearicons-v1.0.0/icon-font.min.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href=" {{ asset('frontend/vendor/animate/animate.css') }}">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/slick/slick.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/MagnificPopup/magnific-popup.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/util.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/main.css') }}">
  <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
  
<!--===============================================================================================-->
</head>
<body class="animsition">
  
  <!-- Header -->
  <header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
      <!-- Topbar -->
      <div class="top-bar">
        <div class="content-topbar flex-sb-m h-full container">
          <div class="left-top-bar">
            Free shipping for standard order over $100
          </div>

          <div class="right-top-bar flex-w h-full">
            @if(Auth::check())
              <a href="{{ route('get.logout.user') }}" class="flex-c-m trans-04 p-lr-25">
              Hi {{ Auth::user()->username }}
              </a>
            @else
              <a href="{{ route('get.register') }}" class="flex-c-m trans-04 p-lr-25">
                Register
              </a>

              <a href="{{ route('get.login') }}" class="flex-c-m trans-04 p-lr-25">
                Login
              </a>
            @endif
            <a href="#" class="flex-c-m trans-04 p-lr-25">
              EN
            </a>
          </div>
        </div>
      </div>

      <div class="wrap-menu-desktop">
        <nav class="limiter-menu-desktop container">
          
          <!-- Logo desktop -->   
          <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('frontend/images/icons/logo-01.png') }}" alt="IMG-LOGO">
          </a>

          <!-- Menu desktop -->
          <div class="menu-desktop">
            <ul class="main-menu">
        
              <li>
                <a href="{{ route('home') }}">Shop</a>
              </li>

              <li class="label1" data-label1="hot">
                <a href="#">Categories</a>
                <ul class="sub-menu">
                  @foreach($categories as $cate)
                 <li><a href="{{ route('fr.getCategories', $cate->id) }}">{{ $cate->name}}</a></li>
                  @endforeach
                </ul>
                <span class="arrow-main-menu">
                  <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
              </li>

              <li>
                <a href="{{ route('fr.getBlog') }}">Blog</a>
              </li>

              <li>
                <a href="{{ route('fr.getAbout') }}">About</a>
              </li>

              <li>
                <a href="{{ route('fr.getContact') }}">Contact</a>
              </li>
            </ul>
          </div>  

          <!-- Icon header -->
          <div class="wrap-icon-header flex-w flex-r-m">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
              <i class="zmdi zmdi-search"></i>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{ Cart::count() }}">
              <i class="zmdi zmdi-shopping-cart"></i>
            </div>

          </div>
        </nav>
      </div>  
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
      <!-- Logo moblie -->    
      <div class="logo-mobile">
        <a href="index.html"><img src="{ asset('frontend/images/icons/logo-01.png') }" alt="IMG-LOGO"></a>
      </div>

      <!-- Icon header -->
      <div class="wrap-icon-header flex-w flex-r-m m-r-15">
        <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
          <i class="zmdi zmdi-search"></i>
        </div>

        <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
          <i class="zmdi zmdi-shopping-cart"></i>
        </div>

        <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
          <i class="zmdi zmdi-favorite-outline"></i>
        </a>
      </div>

      <!-- Button show menu -->
      <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
      <ul class="topbar-mobile">
        <li>
          <div class="left-top-bar">
            Free shipping for standard order over $100
          </div>
        </li>

        <li>
          <div class="right-top-bar flex-w h-full">
            <a href="#" class="flex-c-m p-lr-10 trans-04">
              Help & FAQs
            </a>

            <a href="#" class="flex-c-m p-lr-10 trans-04">
              My Account
            </a>

            <a href="#" class="flex-c-m p-lr-10 trans-04">
              EN
            </a>

            <a href="#" class="flex-c-m p-lr-10 trans-04">
              USD
            </a>
          </div>
        </li>
      </ul>

      <ul class="main-menu-m">
        <li>
          <a href="index.html">Home</a>
          {{-- <ul class="sub-menu-m">
            <li><a href="index.html">Homepage 1</a></li>
            <li><a href="home-02.html">Homepage 2</a></li>
            <li><a href="home-03.html">Homepage 3</a></li>
          </ul> --}}
          <span class="arrow-main-menu-m">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
          </span>
        </li>

        <li>
          <a href="product.html">Shop</a>
        </li>

        <li>
          <a href="shoping-cart.html" class="label1 rs1" data-label1="hot">Features</a>
        </li>

        <li>
          <a href="blog.html">Blog</a>
        </li>

        <li>
          <a href="about.html">About</a>
        </li>

        <li>
          <a href="{{ route('fr.getContact') }}">Contact</a>
        </li>
      </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
      <div class="container-search-header">
        <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
          <img src="{{ asset('frontend/images/icons/icon-close2.png') }}" alt="CLOSE">
        </button>

        <form class="wrap-search-header flex-w p-l-15" action="{{ route('fr.searchProducts') }}">
          <button class="flex-c-m trans-04">
            <i class="zmdi zmdi-search"></i>
          </button>
          <input class="plh3" type="text" name="search" placeholder="Search...">
        </form>
      </div>
    </div>
  </header>

  <!-- Cart -->
  <div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
      <div class="header-cart-title flex-w flex-sb-m p-b-8">
        <span class="mtext-103 cl2">
          Your Cart
        </span>

        <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
          <i class="zmdi zmdi-close"></i>
        </div>
      </div>
      
      <div class="header-cart-content flex-w js-pscroll">
            <p>You are having <span style="color: red; font-size: 18px;">{{ Cart::count() }}</span> products in your cart. <br>Please choose the following:</p>
          <div class="header-cart-buttons flex-w w-full">
            <a href="{{ route('fr.getListCart') }}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
              View Cart
            </a>

            <a href="{{ route('fr.getFormPayment') }}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
              Check Out
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  @include('frontend.slide-layout')
  
  @yield('content')

  @include('frontend.footer-layout')
 <!-- Footer -->

<!--===============================================================================================-->  
  <script src="{{ asset('frontend/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
  <script src="{{ asset('frontend/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
  <script src="{{ asset('frontend/vendor/bootstrap/js/popper.js') }}"></script>
  <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
  <script src="{{ asset('frontend/vendor/select2/select2.min.js') }}"></script>
  <script>
    $(".js-select2").each(function(){
      $(this).select2({
        minimumResultsForSearch: 20,
        dropdownParent: $(this).next('.dropDownSelect2')
      });
    })
  </script>
<!--===============================================================================================-->
  <script src="{{ asset('frontend/vendor/daterangepicker/moment.min.js') }}"></script>
  <script src="{{ asset('frontend/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
  <script src="{{ asset('frontend/vendor/slick/slick.min.js') }}"></script>
  <script src="{{ asset('frontend/js/slick-custom.js') }}"></script>
<!--===============================================================================================-->
  <script src="{{ asset('frontend/vendor/parallax100/parallax100.js') }}"></script>
  <script>
        $('.parallax100').parallax100();
  </script>
<!--===============================================================================================-->
  <script src="{{ asset('frontend/vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
  <script>
    $('.gallery-lb').each(function() { // the containers for all your galleries
      $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
              enabled:true
            },
            mainClass: 'mfp-fade'
        });
    });
  </script>
<!--===============================================================================================-->
  <script src="{{ asset('frontend/vendor/isotope/isotope.pkgd.min.js') }}"></script>
<!--===============================================================================================-->
  <script src="{{ asset('frontend/vendor/sweetalert/sweetalert.min.js') }}"></script>
  <script>
    $('.js-addwish-b2').on('click', function(e){
      e.preventDefault();
    });

    $('.js-addwish-b2').each(function(){
      var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
      $(this).on('click', function(){
        swal(nameProduct, "is added to wishlist !", "success");

        $(this).addClass('js-addedwish-b2');
        $(this).off('click');
      });
    });

    $('.js-addwish-detail').each(function(){
      var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

      $(this).on('click', function(){
        swal(nameProduct, "is added to wishlist !", "success");

        $(this).addClass('js-addedwish-detail');
        $(this).off('click');
      });
    });

    /*---------------------------------------------*/

    $('.js-addcart-detail').each(function(){
      var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
      $(this).on('click', function(){
        swal(nameProduct, "is added to cart !", "success");
      });
    });
  
  </script>
<!--===============================================================================================-->
  <script src="{{ asset('frontend/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
  <script>
    $('.js-pscroll').each(function(){
      $(this).css('position','relative');
      $(this).css('overflow','hidden');
      var ps = new PerfectScrollbar(this, {
        wheelSpeed: 1,
        scrollingThreshold: 1000,
        wheelPropagation: false,
      });

      $(window).on('resize', function(){
        ps.update();
      })
    });
  </script>
<!--===============================================================================================-->
  <script src="{{ asset('frontend/js/main.js') }}"></script>

</body>
</html>


  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <script type="text/javascript">
    $(function(){
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    });
  </script>
  
  <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
  {!! Toastr::message() !!}

  @stack('js')

</body>

</html>
