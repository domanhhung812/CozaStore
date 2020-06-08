@extends('admin.base')
@section('content')
<?php $link = json_decode($blogs->b_image) ?>
<div class="row">
	<div class="col-md-12">
		<h3 class="text-center"> Add Blogs </h3>
	</div>
</div>
<form action="{{ route('admin.handleEditBlogs', $blogs->id) }}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row">
		<div class="col-md-12">
			<a href="{{ route('admin.blogs') }}" class="btn btn-primary">Back</a>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<label for="nameCategories"> Tên bài viết:</label>
				<input type="text" class="form-control" name="name" id="name" value="{{ $blogs->b_name }}">
				<label for="nameCategories"> Hình ảnh: </label>
        <img src="{{ URL::to('/') }}/upload/images/{{ $link }}" width="120" height="120" class="img ml-3">
				<input type="file" class="form-control" name="image" id="image" value="{{ $blogs->b_image }}">
				<label for="nameCategories"> Mô tả: </label>
				<input type="text" class="form-control" name="description" id="description" value="{{ $blogs->b_description }}">
        <label for="nameCategories"> Nội dung: </label>
				<textarea type="text" class="form-control" name="content" id="content" value="" row="3">{{ $blogs->b_content }}</textarea>
        <label for="nameCategories"> Meta title: </label>
				<input type="text" class="form-control" name="meta_title" id="meta_title" value="{{ $blogs->b_title_seo }}">
        <label for="nameCategories"> Meta decription: </label>
				<textarea type="text" class="form-control" name="meta_description" id="meta_description" value="{{ $blogs->b_description_seo }}"></textarea>
			</div>
		<div class="col-md-6 offset-md-3 mt-3 mb-3">
			<button type="submit" class="btn btn-primary btn-block"> UPDATE </button>
		</div>
	</div>
</form>
@stop
@push('js')
<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
	CKEDITOR.replace('meta_description');
</script>
@endpush