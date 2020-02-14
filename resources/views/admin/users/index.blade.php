@extends('admin.base')

@section('content')
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

<!-- <div class="row">
	<div class="col-md-12">
		<a href="{{ route('admin.addSizes') }}" class="btn btn-primary"> Add sizes + </a>
		<a href="#" class="btn btn-primary">View all</a>
	</div>
</div> -->
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
						<td>
							<a href="#" class="btn btn-info">Edit</a>
						</td>
						<td>
							<button class="btn btn-danger btnDelete" id="">Delete</button>
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