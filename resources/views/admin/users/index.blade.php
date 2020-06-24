@extends('admin.base')

@section('content')
<style>
.modal {
    display:    none;
    position:   fixed;
    z-index:    1000;
    top:        0;
    left:       0;
    height:     100%;
    width:      100%;
    background: rgba( 255, 255, 255, .8 ) 
                url('{{asset('/upload/images/loading2.gif')}}') 
                50% 50% 
                no-repeat;
}
</style>
<div class="row">
	<div class="col-md-12">
		<h3 class="text-center">Users</h3>
		<br>
		<!-- @if($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
		@endif -->
	</div>
</div>
<div class="modal"></div>
<div class="row mt-3">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<tr>	
					<th>#</th>
					<th>Tên người dùng</th>
					<th>Email</th>
					<th>Hình ảnh</th>
					<th colspan="2" width="3%" class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				@if(isset($users))
          @foreach($users as $key => $user)
          <tr>
						<td>
							{{  $key }}
						</td>
						<td>{{ $user->username }}</td>
						<td>{{ $user->email }}</td> 
						<td></td>
						<!-- <td>
							<a href="#" class="btn btn-info">Edit</a>
						</td> -->
						<td>
							<button class="btn btn-danger btnDelete" id="{{ $user->id }}">Delete</button>
						</td>
					</tr>
          @endforeach
        @endif
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
				const idU = self.attr('id');
				if($.isNumeric(idU)){
					$.ajax({
						url: "{{ route('admin.deleteUser') }}",
						type: "POST",
						data:{ id: idU },
						beforeSend: function(){
							$('.modal').css('display','block');
						},
						success: function(result){
							self.text('Delete');
							result = $.trim(result);
							if(result === 'OK'){
								window.location.reload(true);
								$('#row_'+idU).hide();
							} else {
								console.log('failed');
							}
							return false; 
						},
						// error: function (result) {
						// 	console.log(result+" Error!");
						// },
					});
				}
			});
			
		})
</script>
@endpush