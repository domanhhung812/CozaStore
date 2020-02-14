@extends('admin.base')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h3 class="text-center"> Update categories !</h3>
	</div>
</div>
@if(count($errors) > 0)
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
<form action="{{ route('admin.handleEditCategories',['id' => $infoCat['id']]) }}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row">
		<div class="col-md-12">
			<a href="{{ route('admin.categories') }}" class="btn btn-primary">Back</a>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<label for="nameCategories"> Name:</label>
				<input type="text" class="form-control" name="name" id="nameCategories" value="{{ $infoCat['name'] }}">
				<label for="nameCategories"> Parent ID: </label>
				<input type="text" class="form-control" name="parent_id" id="nameCategories" value="{{ $infoCat['parent_id'] }}">
				<label for="nameCategories"> Status</label>
				<input type="text" class="form-control" name="status" id="nameCategories" value="{{ $infoCat['status'] }}">
			</div>
		<div class="col-md-6 offset-md-3 mt-3 mb-3">
			<button type="submit" class="btn btn-primary btn-block"> UPDATE </button>
		</div>
	</div>
</form>
@endsection