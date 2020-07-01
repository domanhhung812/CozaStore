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
.selection{
	display: flex;
}
.has-search{
	flex-grow: 2;
	margin-left: 10px;
}
</style>
<div class="row">
	<div class="col-md-12">
		<h3 class="text-center">Product !</h3>
		<!--  -->
	</div>
</div>
<div class="row">
	<div class="col-md-12 selection">
		<div class="action">
			<a href="{{ route('admin.addProduct') }}" class="btn btn-primary"> Add product + </a>
			<a href="{{ route('admin.products') }}" class="btn btn-primary">View all</a>
		</div>
		<form action="" method="post" style="width: 80%;">
			<div class="form-group has-search">
				<span class="fa fa-search form-control-feedback"></span>
				<input type="search" class="form-control" placeholder="Search" id="search">
			</div>
		</form>
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
						@foreach($arrS as $values)
							<?php 
								$idP = $item['id'];
								$sizes = [];
								foreach($values as $k => $v){
									$sizes[$v->id] = array();
									array_push($sizes[$v->id],$v);
								}
								$idCate = $item['categories_id'][0];
							?>
							@foreach($sizes as $i => $e)
								@if($idP === $e[0]->pd_product_id)
									@if($idCate == 5)
										<p>{{$e[0]->number_size}} - ({{$e[0]->pd_qty}})</p>
									@else
										<p>{{$e[0]->letter_size}} - ({{$e[0]->pd_qty}})</p>
									@endif
								@endif
							@endforeach
						@endforeach
						</td>
						<td>{{ $item['brand_name'] }}</td>
						<td>{{ number_format($item['price']) }}</td>
						<td>{{ $item['qty'] }}</td>
						<td>
						<?php
							$id = $item['id'];
							$star = $avg_rating;
							$sum  = 0;
							$avg = 0;
							foreach($star as $k => $v){
								if($id == $k){
									foreach($v[0] as $i => $e){
										$sum+=$e->co_rating;
									}	
									$count = count($v[0]);
									if($count === 0 || $v[0] === []){
										$avg = 0;
									}else{
										$avg = ceil($sum/$count);
									}	
								}
							}
						?>
							<span class="fs-18 cl11">
								@for($i = 0; $i < $avg ; $i++)
								<i class="fas fa-star" style="color:orange"></i>
								@endfor
							</span>
							<span class="fs-18 cl11">
								@for($i = 5; $i > $avg ; $i--)
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
			$('#search').keyup(function(){
				let value = $(this).val();
				$.ajax({
					url: "{{ route('admin.searchProducts') }}",
					type: "post",
					data: { value: value },
					success: function(res){
						$('.content').html('');
						$('.content').append(res);
						//console.log(res);
					}
				})
			});
		});
	</script>
@endpush



