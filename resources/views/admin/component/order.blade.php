<style>
	/* .column{
		margin-left : 50px;
	}
	.column-first{
		margin-left: 50px;
	} */
</style>
@if($orders)
<table class="table">
	<tbody><tr class="table_head">
		<th class="column-1 column-first" scope="col" >#</th>
		<th class="column-2 column-first" scope="col" >Image</th>
		<th class="column-3 column-first" scope="col" >Product Name</th>
		<th class="column-4 column-first" scope="col" >Price</th>
		<th class="column-5 column-first" scope="col" >Quantity</th>
		
		<th class="column-6 column-first" scope="col" >Subtotal</th>
	</tr>
	
	@foreach($orders as $key => $order)
	<?php 
		$link = json_decode($order->product->image_product,true)[0];
		// dd($link);
		// $count = count($link) - 6;
		// $output = array_slice($link, 2, $count);
	?>
	<tr class="table_row">
		<th scope="row">{{$key}}</th>
		<!-- <td class="column-1 column"></td> -->
		<td class="column-2 column">
			<img width="60px" height="80px" src="{{ URL::to('/') }}/upload/images/{{ $link }}" alt="">
		</td>
		<td class="column-3 column">{{ $order->product->name_product }}</td>
		<td class="column-4 column">{{ $order->or_price }}</td>
		<td class="column-5 column">
		{{ $order->or_qty }}
		
		<td class="column-6 column">{{ $order->or_price * $order->or_qty }}</td>
	</tr>
	@endforeach
	<!-- <tr class="table_row">
		<td colspan="6" class="text-center" style="color:red; font-size: 25px">Total</td>
		<td style="color:red; font-size: 25px">{{ str_replace(',','', Cart::subtotal(0,3)) }}$</td>
	</tr> -->
	</tbody>
</table>


@endif
