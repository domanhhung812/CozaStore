@extends('frontend.base-layout')
@section('title','My Blogs')
@section('content')
<style>
.section-slide{
	display:none !important;
}
.sec-banner{
	display:none !important;
}
</style>
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{asset('frontend/images/bg-02.jpg')}}');margin-top: 100px;">
	<h2 class="ltext-105 cl0 txt-center">
		Blog
	</h2>
</section>
<section class="bg0 p-t-62 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12 p-b-80">
					<div class="p-r-45 p-r-0-lg">
						<!-- item blog -->
						@foreach($blogs as $blog)
						<?php $link = json_decode($blog->b_image);
									$date = $blog->created_at->format('d');
									$monthNum = $blog->created_at->format('m');
									$monthText = date("F", mktime(0, 0, 0, $monthNum, 10));
									$monthText = substr($monthText, 0, 3);
									$year = $blog->created_at->format('Y');
						?>
						<div class="p-b-63">
							<a href="blog-detail.html" class="hov-img0 how-pos5-parent">
								<img src="{{ URL::to('/') }}/upload/images/{{ $link }}" alt="IMG-BLOG">

								<div class="flex-col-c-m size-123 bg9 how-pos5">
									<span class="ltext-107 cl2 txt-center">
										{{$date}}
									</span>

									<span class="stext-109 cl3 txt-center">
										{{$monthText." ".$year}}
									</span>
								</div>
							</a>

							<div class="p-t-32">
								<h4 class="p-b-15">
									<a href="{{ route('fr.getDetailBlogs', $blog->id) }}" class="ltext-108 cl2 hov-cl1 trans-04">
										{{ $blog->b_title_seo }}
									</a>
								</h4>

								<p class="stext-117 cl6">
									{{ $blog->b_description_seo }}
								</p>

								<div class="flex-w flex-sb-m p-t-18">
									<span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
										<span>
											<span class="cl4">By</span> {{($blog->b_author_id == 0) ? 'Admin' : 'Contributors'}}  
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

									<a href="{{ route('fr.getDetailBlogs', $blog->id) }}" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
										Continue Reading

										<i class="fa fa-long-arrow-right m-l-9"></i>
									</a>
								</div>
							</div>
						</div>
						@endforeach
						{{$blogs->links()}}
					</div>
				</div>
			</div>
		</div>
	</section>
@stop