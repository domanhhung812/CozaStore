@extends('admin.base')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h3 class="text-center">Brands !</h3>
		<br>
		@if($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
		@endif
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<a href="{{ route('admin.addBrands') }}" class="btn btn-primary"> Add Brands + </a>
		<a href="#" class="btn btn-primary">View all</a>
	</div>
</div>
<div class="row mt-3">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<tr>
					<th>Brands name</th>
					<th>Address</th>
					<th>Status</th>
					<th>Description</th>
					<th colspan="2" width="3%" class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($brands as $key => $item)
					<tr>
						<td>{{ $item['brand_name'] }}</td>
						<td>{{ $item['address'] }}</td>
						<td>{{ $item['status'] }}</td>
						<td>{{ $item['description'] }}</td>
						<td>
							<a href="{{ route('admin.editBrands',['id'=> $item['id']]) }}" class="btn btn-info">Edit</a>
						</td>
						<td>
							<button class="btn btn-danger btnDelete" id="{{ $item['id'] }} ">Delete</button>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{{-- {{ $link->links() }} --}}
		{{-- phan trang va tim kiem --}}
		{{-- {{ $link->appends(request()->query())->links() }} --}}
	</div>
</div>
@endsection
@push('js')
	<script type="text/javascript">
		$(function(){
			$('.btnDelete').click(function() {
				let self = $(this);
				let idBrands = self.attr('id');
				if($.isNumeric(idBrands)){
					$.ajax({
						url: "{{ route('admin.deleteBrands') }}",
						type: "POST",
						data: {id: idBrands},
						beforeSend: function(){
							self.text('Loading ...');
						},
						success: function(result){
							self.text('Delete');
							result = $.trim(result);
							if(result === 'OK'){
								alert('Delete successful');
								window.location.reload(true);
								$('#row_'+idBrands).hide();
							} else {
								alert('Delete fail');
							}
							return false; 
						}
					});
				}
			});
		})
	</script>
@endpush