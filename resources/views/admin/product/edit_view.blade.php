@extends('admin.base')

@section('content')
<style>

.active{
	width: 100%;
	height: auto;
	display: flex; 
	flex-direction: column;
}
.btn-add-size{
	margin-top: 10px;
}
</style>
<div class="row">
	<div class="col-md-12">
		<h3 class="text-center"> Update product !</h3>
	</div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- <div class="alert alert-danger">
	<h3>{{ $mess }}</h3>
</div> --}}

<form action="{{ route('admin.handleEditProduct',['id' => $info['id']]) }}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="nameProduct"> Name : </label>
				<input type="text" class="form-control" name="nameProduct" id="nameProduct" value="{{ $info['name_product'] }}">
			</div>
			<div class="form-group border-top">
				<p> Categories : </p>
				@foreach($cat as $key => $item)
					<label for="cat_{{ $item['id'] }}"> {{ $item['name'] }} </label>
					<input 
						type="radio"
						name="cat[]" 
						id="cat_{{ $item['id'] }}"
						value="{{ $item['id'] }}"
						{{ in_array($item['id'], $infoCat) ? 'checked' : '' }}
					>
				@endforeach
			</div>
			<div class="form-group border-top">
				<p> Colors : </p>
				@foreach($colors as $key => $item)
					<label for="color_{{ $item['id'] }}"> {{ $item['name_color'] }} </label>
					<input type="radio" name="color" id="{{ $item['id'] }}" value="{{ $item['id'] }}" class="color" {{ in_array($item['id'], $infoColor) ? 'checked' : '' }}>
				@endforeach
			</div>
			
			<div class="sub-info">
				<table style="width: 100%;">
					<thead>
						<tr>
							<th>Select size:</th>
							<th>Type quantity:</th>
						</tr>
					</thead>
					<tbody id="content-size">
					@foreach($sizes as $key => $item2)
						<tr>
							<td>
								<select name="size_detail_{{ $item2->id }}" id="" style="width: 200px;">
								
									<option value="{{ $item2->id }}">{{ $item2->letter_size }} ({{ $item2->number_size }})</option>
								
								</select>
							</td>
							<td>
								<input type="number" name="size_qty_{{ $item2->id }}" id="size_qty" class="form-control" value="{{$item2->pd_qty}}">
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
			<div class="form-group border-top">
				<label for="brands"> Brands </label>	
				<select name="brands" class="form-control">
					@foreach($brands as $key => $item)
						<option
							value="{{ $item['id'] }}"
							{{ $item['id'] == $info['brands_id'] ? 'selected' : '' }}
						>
							{{ $item['brand_name'] }}
						</option>
					@endforeach
				</select>
			</div>
		</div>	
		<div class="col-md-6">
			<div class="form-group">
				<label for="price">Price</label>
				<input value="{{ $info['price'] }}" type="number" name="price" id="price" class="form-control">
			</div>
			<div class="form-group border-top">
				<label for="qty">QTY</label>
				<input value="{{ $info['qty'] }}" type="number" name="qty" id="qty" class="form-control" readonly>
			</div>

			<div class="form-group border-top">
				@foreach($infoImage as $key => $img)
					<img src="{{ URL::to('/') }}/upload/images/{{ $img }}" width="120" height="149" class="img ml-3">
				@endforeach
			</div>

			<div class="form-group border-top">
				<label for="images">Images</label>
				<input type="file" name="images[]" id="images" class="form-control" multiple="multiple">
			</div>
			<div class="form-group border-top mt-3">
				<label for="sale">Sale off</label>
				<input value="{{ $info['sale_off'] }}" type="text" name="sale" id="sale" class="form-control">
			</div>
			<div class="form-group border-top mt-3">
				<label for="description">Description</label>
				<textarea class="form-control" name="description" id="description" rows="5">
					{!! $info['description'] !!}
				</textarea>
			</div>
		</div>
		<div class="col-md-6 offset-md-3 mt-3 mb-3">
			<button type="submit" class="btn btn-primary btn-block"> UPDATE </button>
		</div>
	</div>
</form>
@endsection
@push('js')
<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
	CKEDITOR.replace('description');
	$(".select-all").change(function () {
		$(this).siblings().prop('checked', $(this).prop("checked"));
	});

	$(".checkboxlistitem").change(function() {
		var checkboxes = $(this).parent().find('.checkboxlistitem');
		var checkedboxes = checkboxes.filter(':checked');

		if(checkboxes.length === checkedboxes.length) {
		$(this).parent().find('.select-all').prop('checked', true);
		} else {
		$(this).parent().find('.select-all').prop('checked', false);
		}
	});
	$(".color").click(function(){
		$('.sub-info').addClass('active');
	});
</script>
@endpush