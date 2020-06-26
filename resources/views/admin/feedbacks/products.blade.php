@extends('admin.base')

@section('content')
<style>
#loading-image{
margin: 0 auto;
}
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
		<h3 class="text-center">Feedbacks</h3>
        
		<br>
		<!-- @if($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
		@endif -->
	</div>
</div>
<div class="modal"></div>
<div class="row">
	<div class="col-md-12">
		<form action="" method="post">
		@csrf
			<div class="input-group">
				<select class="custom-select" id="inputGroupSelect04">
					<option value="1">Products</option>
					<option value="2">Blogs</option>
				</select>
				<!-- <div class="input-group-append">
					<button class="btn btn-outline-secondary" type="button">Search</button>
				</div> -->
			</div>
		</form>
	</div>
</div>
<div class="row mt-3">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<tr>	
					<th>#</th>
					<th>Tên người dùng</th>
					<th>Email</th>
					<th>Tên sản phẩm</th>
                    <th>Nội dung</th>
                    <th>Rating</th>
                    <th>Thời gian đánh giá</th>
					<th colspan="2" width="3%" class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->co_name }}</td>
                    <td>{{ $item->co_email }}</td>
                    <td>{{ $item->name_product }}</td>
                    <td>{{ $item->co_content }}</td>
                    <td>{{ $item->co_rating ? $item->co_rating : "NULL" }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <button class="btn btn-danger delete-feedback" id="{{$item->id}}">Delete</button>
                    </td>
                </tr>
                @endforeach
			</tbody>
		</table>
		{{ $data->links() }}
	</div>
</div>
@endsection
@push('js')
<script type="text/javascript">
    $(function(){
			$('.delete-feedback').click(function() {
				const idFb = $(this).attr('id');
				if($.isNumeric(idFb)){
					$.ajax({
						url: "{{ route('admin.deleteFeedback') }}",
						type: "POST",
						data:{ id: idFb },
						beforeSend: function(){
							$('.modal').css('display','block');
						},
						success: function(result){
							result = $.trim(result);
							if(result === 'OK'){
								window.location.reload(true);
								$('#row_'+idFb).hide();
							} else {
								console.log('failed');
							}
							return false; 
						},
						error: function (result) {
							console.log(result+" Error!");
						},
					});
				}
			});
			$('.custom-select').change(function(){
				let id = $(this).val();
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				if(id == 2){
					$.ajax({
						url: "{{ route('admin.getFeedbackBlogs') }}",
						type: "POST",
						data: {id:id},
						beforeSend: function(){
							$('.modal').css('display','block');
						},
						
					}).done(function(res){
						$('.table').html('').append(res);
						$('.modal').css('display','none');
					});
				}else if(id == 1){
					$.ajax({
						url: "{{ route('admin.postFeedbackProducts') }}",
						type: "POST",
						data: {id:id},
						beforeSend: function(){
							$('.modal').css('display','block');
						},
						
					}).done(function(res){
						$('body').html('').append(res);
						$('.modal').css('display','none');
					});
				}
			});		
		});
</script>
@endpush