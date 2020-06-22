@extends('admin.base')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h3 class="text-center">Feedbacks</h3>
        <img id="loading-image" src="ajax-loader.gif" style="display:none;"/>
		<br>
		<!-- @if($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
		@endif -->
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<form action="" method="get">
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
    $('.delete-feedback').on('click', function(e){
        e.preventDefault();
        let id = $(this).attr('id');
        $.ajax({
            url: '{{ route('admin.deleteFeedback') }}',
            type: "POST",
            data: { id: id },
            beforeSend: function(){

            }
        })
    })
</script>
@endpush