@extends('admin.base')
@section('content')
<div class="row">
	<div class="col-md-12">
		<a href="{{ route('admin.getAddBlogs') }}" class="btn btn-primary"> Add blogs + </a>
		<a href="{{ route('admin.blogs') }}" class="btn btn-primary">View all</a>
	</div>
</div>
<div class="row mt-3">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<tr>	
					<th>#</th>
          <th>Tên bài viết</th>
          <th>Hình ảnh</th>
          <th>Mô tả</th>
          <th>Trạng thái</th>
          <th>Ngày tạo</th>
					<th colspan="2" width="3%" class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($blogs as $key => $blog)
			<?php 
				$dateTime = $blog->created_at;
				$date = $dateTime->format('d/m/Y');
				$link = json_decode($blog->b_image);
			?>
					<tr>
						<td>
							{{ $key }}
						</td>
            <td style="width: 200px">
              {{ $blog->b_name }}
						</td>
            <td>
              <img src="{{ URL::to('/') }}/upload/images/{{ $link }}" alt="" width="100px" height="80px">
            </td>
            <td style="width: 300px">
            {{ $blog->b_description }}
            <td>
              <label class="label label-success" for="">{{ ($blog->b_active === 1) ? 'Public' : 'Private' }}</label>
            </td>
            <td>
              {{ $date }}
            </td>
						<td>
              <a href="{{ route('admin.editBlogs', $blog->id) }}" class="btn btn-info">Edit</a>
							<button class="btn btn-danger btnDelete" id="{{ $blog->id }}">Delete</button>
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
@stop
@push('js')
	<script type="text/javascript">
		$(function(){
			$('.btnDelete').click(function() {
				let self = $(this);
				let idBlogs = self.attr('id');
				if($.isNumeric(idBlogs)){
					$.ajax({
						url: "{{ route('admin.deleteBlogs') }}",
						type: "POST",
						data: {id: idBlogs},
						beforeSend: function(){
							self.text('Loading ...');
						},
						success: function(result){
							self.text('Delete');
							result = $.trim(result);
							if(result === 'OK'){
								alert('Delete successful');
								window.location.reload(true);
								$('#row_'+idBlogs).hide();
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