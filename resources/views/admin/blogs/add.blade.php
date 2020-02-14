@extends('admin.base')
@section('content')
<div class="row">
	<div class="col-md-12">
		<h3 class="text-center"> Add Blogs </h3>
	</div>
</div>
<form action="{{ route('admin.handleAddBlogs') }}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row">
		<div class="col-md-12">
			<a href="{{ route('admin.blogs') }}" class="btn btn-primary">Back</a>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<label for="nameCategories"> Tên bài viết:</label>
				<input type="text" class="form-control" name="name" id="name" value="">
				<label for="nameCategories"> Hình ảnh: </label>
				<input type="file" class="form-control" name="image" id="image" value="">
				<label for="nameCategories"> Mô tả: </label>
				<input type="text" class="form-control" name="description" id="description" value="">
        <label for="nameCategories"> Nội dung: </label>
				<textarea type="text" class="form-control" name="content" id="content" value="" row="3"></textarea>
        <label for="nameCategories"> Meta title: </label>
				<input type="text" class="form-control" name="meta_title" id="meta_title" value="">
        <label for="nameCategories"> Meta decription: </label>
				<input type="text" class="form-control" name="meta_description" id="meta_description" value="">
			</div>
		<div class="col-md-6 offset-md-3 mt-3 mb-3">
			<button type="submit" class="btn btn-primary btn-block"> ADD </button>
		</div>
	</div>
</form>
@stop