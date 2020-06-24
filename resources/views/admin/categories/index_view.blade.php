@extends('admin.base')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h3 class="text-center">Categories !</h3>
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
		<a href="{{ route('admin.addCategories') }}" class="btn btn-primary"> Add categories + </a>
		<a href="{{ route('admin.categories') }}" class="btn btn-primary">View all</a>
	</div>
</div>
<div class="row mt-3">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<tr>	
					<th>Danh muc</th>
					<th colspan="2" width="3%" class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($cat as $key => $item)
					<tr>
						<td>
							{{ $item['name']}}
						</td>
						<td>
							<a href="{{ route('admin.editCategories',['id'=> $item['id']]) }}" class="btn btn-info">Edit</a>
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
				let idCat = self.attr('id');
				if($.isNumeric(idCat)){
					$.ajax({
						url: "{{ route('admin.deleteCategories') }}",
						type: "POST",
						data: {id: idCat},
						beforeSend: function(){
							self.text('Loading ...');
						},
						success: function(result){
							self.text('Delete');
							result = $.trim(result);
							if(result === 'OK'){
								alert('Delete successful');
								window.location.reload(true);
								$('#row_'+idCat).hide();
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
