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
		<h3 class="text-center">Product !</h3>
		<h3 class="text-center">{{ $mess  }}</h3>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<a href="{{ route('admin.addProduct') }}" class="btn btn-primary"> Add product + </a>
		<a href="{{ route('admin.products') }}" class="btn btn-primary">View all</a>
	</div>
</div>
<div class="modal"></div>
<div class="row mt-3">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<tr>
					<th>Ma SP</th>
					<th>Ten SP</th>
					<th>Anh</th>
					<th>Danh muc</th>
					<th>Mau sac</th>
					<th>Kich co</th>
					<th>Thuong hieu</th>
					<th>Gia SP</th>
					<th>So luong</th>
					<th>Rating</th>
					<th colspan="2" width="3%" class="text-center">Action</th>
				</tr>
			</thead>
			<tbody class="content">
				@foreach($lstPd as $key => $item)
				
					<tr id="row_{{ $item['id'] }}">
						<td>{{ $item['id'] }}</td>
						<td>{{ $item['name_product'] }}</td>
						<td>
							<img src="{{ URL::to('/') }}/upload/images/{{ $item['image_product'][0] }}" alt="{{ $item['name_product'] }}" width="120" height="149">
						</td>
						<td>
							@foreach($item['categories_id']['name_cat'] as $name)
								<p> - {{ $name }}</p>
							@endforeach
						</td>
						<td>
							@foreach($item['colors_id']['name_color'] as $name)
								<p> + {{ $name }}</p>
							@endforeach
						</td>
						<td>
							@foreach($item["sizes_id"]["letter_size"] as $key => $value)
								<p> * {{ $value }}</p>
							@endforeach
						</td>
						<td>{{ $item['brand_name'] }}</td>
						<td>{{ number_format($item['price']) }}</td>
						<td>{{ $item['qty'] }}</td>
						<td>
						<?php
							$star = $avg_rating;
						?>
								<span class="fs-18 cl11">
									@for($i = 0; $i < $star ; $i++)
									<i class="fas fa-star" style="color:orange"></i>
									@endfor
								</span>
								<span class="fs-18 cl11">
									@for($i = 5; $i > $star ; $i--)
									<i class="fas fa-star"></i>
									@endfor
								</span>
						</td>
						<td>
							<a href="{{ route('admin.editProduct',['id'=> $item['id']]) }}" class="btn btn-info">Edit</a>
						</td>
						<td>
							<button class="btn btn-danger btnDelete" id="{{ $item['id'] }}">Delete</button>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{{-- {{ $link->links() }} --}}
		{{-- phan trang va tim kiem --}}
		{{ $link->appends(request()->query())->links() }}
	</div>
</div>
@endsection

@push('js')
	<script type="text/javascript">
		$(function(){
			$('.btnDelete').click(function() {
				let self = $(this);
				let idPd = self.attr('id');
				if($.isNumeric(idPd)){
					$.ajax({
						url: "{{ route('admin.deleteProduct') }}",
						type: "POST",
						data: {id: idPd},
						beforeSend: function(){
							$('.modal').css('display','block');
						},
						success: function(result){
							self.text('Delete');
							result = $.trim(result);
							if(result === 'OK'){
								window.location.reload(true);
								$('#row_'+idPd).hide();
							} else {
								console.log('Delete fail');
							}
							return false; 
						}
					});
				}
			});
		})
	</script>
@endpush



