@extends('frontend.base-layout')
@section('title', 'Detail Blog')
@section('content')
<div class="col-md-12 col-lg-12 p-b-80">
  <div class="p-r-45 p-r-0-lg">
    <!--  -->
    <?php $link = json_decode($blog->b_image);
          $date = $blog->created_at->format('d');
          $monthNum = $blog->created_at->format('m');
          $monthText = date("F", mktime(0, 0, 0, $monthNum, 10));
          $monthText = substr($monthText, 0, 3);
          $year = $blog->created_at->format('Y');
    ?>
    <div class="wrap-pic-w how-pos5-parent">
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

    <div class="p-t-32">
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

      <h4 class="ltext-109 cl2 p-b-28">
        {{ $blog->b_name }}
      </h4>

      <p class="stext-117 cl6 p-b-26">
        {{ $blog->b_content }}
      </p>
    </div>

    <div class="flex-w flex-t p-t-16">
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
    </div>

    <!--  -->
    <div class="p-t-40">
      <h5 class="mtext-113 cl2 p-b-12">
        Leave a Comment
      </h5>

      <p class="stext-107 cl6 p-b-40">
        Your email address will not be published. Required fields are marked *
      </p>

      <form>
        <div class="bor19 m-b-20">
          <textarea class="stext-111 cl2 plh3 size-124 p-lr-18 p-tb-15" name="cmt" placeholder="Comment..."></textarea>
        </div>

        <div class="bor19 size-218 m-b-20">
          <input class="stext-111 cl2 plh3 size-116 p-lr-18" type="text" name="name" placeholder="Name *">
        </div>

        <div class="bor19 size-218 m-b-20">
          <input class="stext-111 cl2 plh3 size-116 p-lr-18" type="text" name="email" placeholder="Email *">
        </div>

        <div class="bor19 size-218 m-b-30">
          <input class="stext-111 cl2 plh3 size-116 p-lr-18" type="text" name="web" placeholder="Website">
        </div>

        <button class="flex-c-m stext-101 cl0 size-125 bg3 bor2 hov-btn3 p-lr-15 trans-04">
          Post Comment
        </button>
      </form>
    </div>
  </div>
</div>
@stop