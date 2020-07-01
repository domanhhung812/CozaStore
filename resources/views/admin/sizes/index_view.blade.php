@extends('admin.base')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h3 class="text-center">Sizes !</h3>
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
		<a href="{{ route('admin.addSizes') }}" class="btn btn-primary"> Add sizes + </a>
		<a href="#" class="btn btn-primary">View all</a>
	</div>
</div>
<div class="row mt-3">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<tr>	
					<th>Letter size</th>
					<th>Number size</th>
					<th>Status</th>
					<th>Description</th>
					<th colspan="2" width="3%" class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($sizes as $key => $item)
					<tr>
						<td>
							{{$item['letter_size']}}
						</td>
						<td>{{ $item['number_size'] }}</td>
						<td>{{ $item['status'] }}</td>
						<td>{{ $item['description'] }}</td>
						<td>
							<a href="{{ route('admin.editSizes',['id'=> $item['id']]) }}" class="btn btn-info">Edit</a>
						</td>
						<td>
							<button class="btn btn-danger btnDelete" id="{{ $item['id'] }}" disabled>Delete</button>
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
				let idSizes = self.attr('id');
				if($.isNumeric(idSizes)){
					$.ajax({
						url: "{{ route('admin.deleteSizes') }}",
						type: "POST",
						data: {id: idSizes},
						beforeSend: function(){
							self.text('Loading ...');
						},
						success: function(result){
							self.text('Delete');
							result = $.trim(result);
							console.log(result);
							if(result === 'OK'){
								alert('Delete successful');
								window.location.reload(true);
								$('#row_'+idSizes).hide();
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