@extends('frontend.base-layout')
@section('title', 'Detail Blog')
@section('content')
<style>
.section-slide{
	display:none !important;
}
.sec-banner{
	display:none !important;
}
.blog_title{
  text-align: center;
}
.wrap-content{
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.how-pos5 {
    position: absolute;
    top: 1%;
    left: 2%;
}
@media only screen and (max-width: 667px){
  .blog-detail{
    margin-top: 0 !important;
  }
  
}
@media only screen and (max-width: 1024px){
  .blog-detail{
    margin-top: 0 !important;
  }
}
</style>
<div class="col-md-12 col-lg-12 p-b-80 blog-detail" style="margin-top:100px;">
  <div class=" p-r-0-lg">
    <!--  -->
    <?php $link = json_decode($blog->b_image);
          $date = $blog->created_at->format('d');
          $monthNum = $blog->created_at->format('m');
          $monthText = date("F", mktime(0, 0, 0, $monthNum, 10));
          $monthText = substr($monthText, 0, 3);
          $year = $blog->created_at->format('Y');
    ?>
    <div class="wrap-content"> 
      <div class="wrap-pic-w how-pos5-parent">
        <div class="col-lg-12 col-md-12 col-sm-10 col-xs-10">
          <img src="{{ URL::to('/') }}/upload/images/{{ $link }}" alt="IMG-BLOG">

          <div class="flex-col-c-m size-123 bg9 how-pos5">
            <span class="ltext-107 cl2 txt-center">
            {{$date}}
            </span>

            <span class="stext-109 cl3 txt-center">
            {{$monthText." ".$year}}
            </span>
          </div>
        </div>
      </div>

      <div class="p-t-32">
        <div class="col-lg-12 col-md-12 col-sm-10 col-xs-10">
          <span class="flex-w flex-m stext-111 cl2 p-b-19">
            <span>
              <span class="cl4">By</span> {{($blog->b_author_id == 0) ? 'Admin' : 'Contributors'}}
              <span class="cl12 m-l-4 m-r-6">|</span>
            </span>

            <span>
              {{ $date." ".$monthText." ".$year }}
              <span class="cl12 m-l-4 m-r-6">|</span>
            </span>

            <span>
            {{$blog->b_slug}}
              <span class="cl12 m-l-4 m-r-6">|</span>
            </span>

            <span>
              8 Comments
              <span class="cl12 m-l-4 m-r-6">|</span>
            </span>
            <span>
              {{$blog->b_view}} Views
            </span>
          </span>

          <h4 class="ltext-109 cl2 p-b-28 blog_title">
            {{ $blog->b_name }}
          </h4>
            {!!$blog->b_content !!}
        </div>
      </div>
    
    <!-- <div class="flex-w flex-t p-t-16">
      <span class="size-216 stext-116 cl8 p-t-4">
        Tags
      </span>

      <div class="flex-w size-217">
        <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
          Streetstyle
        </a>

        <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
          Crafts
        </a>
      </div>
    </div> -->

    <!--  -->
    <div class="col-lg-6 col-md-10 col-sm-10 col-xs-10">
      <div class="p-t-40">
      <form action="" method="post">
      @csrf
          @if(Auth::check())
          <h5 class="mtext-113 cl2 p-b-12">
            Leave a Comment
          </h5>

          <p class="stext-107 cl6 p-b-40">
            Your email address will not be published. Required fields are marked *
          </p>
          
          <form>
            <div class="bor19 m-b-20">
              <textarea class="stext-111 cl2 plh3 size-124 p-lr-18 p-tb-15" name="co_content" placeholder="Comment..."></textarea>
            </div>

            <div class="bor19 size-218 m-b-20">
              <input class="stext-111 cl2 plh3 size-116 p-lr-18" type="text" name="co_name" placeholder="Name *" value="{{Auth::user()->username}}" readonly>
            </div>

            <div class="bor19 size-218 m-b-20">
              <input class="stext-111 cl2 plh3 size-116 p-lr-18" type="text" name="co_email" placeholder="Email *" value="{{Auth::user()->email}}" readonly>
            </div>
            
            <button class="flex-c-m stext-101 cl0 size-125 bg3 bor2 hov-btn3 p-lr-15 trans-04">
              Post Comment
            </button>
            @else
            <a href="{{ route('get.login') }}" class="flex-c-m stext-101 cl0 size-125 bg3 bor2 hov-btn3 p-lr-15 trans-04">
              Login Now
            </a>
            @endif
          </form>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
@stop