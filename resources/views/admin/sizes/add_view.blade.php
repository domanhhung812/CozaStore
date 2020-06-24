@extends('admin.base')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h3 class="text-center"> Add Sizes !</h3>
	</div>
	<div class="col-md-12">
			<a href="{{ route('admin.sizes') }}" class="btn btn-primary">Back</a>
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
<form action="{{ route('admin.handleAddSizes') }}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row">
		<div class="col-md-12">
			<a href="{{ route('admin.sizes') }}" class="btn btn-primary">Back</a>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<label for="nameCategories"> Letter size:</label>
				<input type="text" class="form-control" name="letter_size" id="letter_size" value="">
				<label for="nameCategories"> Number size: </label>
				<input type="text" class="form-control" name="number_size" id="number_size" value="">
				<label for="nameCategories"> Status</label>
				<input type="text" class="form-control" name="status" id="status" value="">
				<label for="nameCategories"> Description</label>
				<input type="text" class="form-control" name="description" id="description" value="">
			</div>
		<div class="col-md-6 offset-md-3 mt-3 mb-3">
			<button type="submit" class="btn btn-primary btn-block"> ADD </button>
		</div>
	</div>
</form>
@endsection