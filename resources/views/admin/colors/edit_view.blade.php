@extends('admin.base')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h3 class="text-center"> Update colors !</h3>
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
<form action="{{ route('admin.handleEditColors',['id' => $infoColors['id']]) }}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row">
		<div class="col-md-12">
			<a href="{{ route('admin.colors') }}" class="btn btn-primary">Back</a>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<label for="nameCategories"> Name colors: </label>
				<input type="text" class="form-control" name="name_color" id="name_color" value="{{ $infoColors['name_color'] }}">
				<label for="nameCategories"> Status</label>
				<input type="text" class="form-control" name="status" id="status" value="{{ $infoColors['status'] }}">
				<label for="nameCategories"> Description</label>
				<input type="text" class="form-control" name="description" id="description" value="{{ $infoColors['description'] }}">
			</div>
		<div class="col-md-6 offset-md-3 mt-3 mb-3">
			<button type="submit" class="btn btn-primary btn-block"> UPDATE </button>
		</div>
	</div>
</form>
@endsection