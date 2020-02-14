@extends('admin.base')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h3 class="text-center"> Update brands !</h3>
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
<form action="{{ route('admin.handleEditBrands',['id' => $infoBrands['id']]) }}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row">
		<div class="col-md-12">
			<a href="{{ route('admin.brands') }}" class="btn btn-primary">Back</a>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<label for="nameCategories"> Brand name: </label>
				<input type="text" class="form-control" name="brand_name" id="brand_name" value="{{ $infoBrands['brand_name'] }}">
				<label for="nameCategories"> Address: </label>
				<input type="text" class="form-control" name="address" id="address" value="{{ $infoBrands['address'] }}">
				<label for="nameCategories"> Status</label>
				<input type="text" class="form-control" name="status" id="status" value="{{ $infoBrands['status'] }}">
				<label for="nameCategories"> Description</label>
				<input type="text" class="form-control" name="description" id="description" value="{{ $infoBrands['description'] }}">
			</div>
		<div class="col-md-6 offset-md-3 mt-3 mb-3">
			<button type="submit" class="btn btn-primary btn-block"> UPDATE </button>
		</div>
	</div>
</form>
@endsection