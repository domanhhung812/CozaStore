@extends('admin.base')

@section('content')

<div class="row">
	<div class="col-md-12">
		<h3 class="text-center">Transactions</h3>
		<br>
		<!-- @if($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
		@endif -->
	</div>
</div>

<div class="row mt-3">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<tr>	
					<th>#</th>
          <th>Mã giao dịch</th>
					<th>Tên người dùng</th>
					<th>Địa chỉ</th>
					<th>Số điện thoại</th>
					<th>Hình thức TT</th>
          <th>Tổng tiền </th>
          <th>Trạng thái</th>
					<th colspan="2"  class="text-center">Thao tác</th>
				</tr>
			</thead>
			<tbody>
				@if(isset($transactions))
          @foreach($transactions as $key => $transaction)
          <tr>
						<td>
							{{  $key }}
						</td>
						<td>#{{ $transaction->id }}</td>
						<td>{{ isset($transaction->user->username) ? $transaction->user->username : '[N\A]'}}</td>
						<td>{{ $transaction->tr_address }}</td>
						<td>{{ $transaction->tr_phone }}</td>
						<td>{{ $transaction->tr_payment_method }}</td>
            <td>{{ $transaction->tr_total }}$</td>
            <td>
            @if( $transaction->tr_status   == 1)
              <a href="#" class="label-success label">Đã xử lý</a>
							@if($transaction->tr_confirm == 1)
								<p>(Khách đã nhận được sản phẩm)</p>
							@else
								<p>(Đang giao hàng)</p>
							@endif
            @else
              <a href="{{route('admin.sendEmailBill', $transaction->id)}}" class="label-default label">Chờ xử lý</a>
            @endif
            </td>
						<td>
							<a class="btn btn-light btnDelete" id="{{$transaction->id}}">Delete</a>
              <a href="{{route('admin.getViewOrder',$transaction->id)}}" class="btn btn-light js_order_item" id="" data-id="{{ $transaction->id }}"><i class="fas fa-eye"></i></a>
						</td>
					</tr>
          @endforeach
        @endif
			</tbody>
		</table>
	  {{ $transactions->links() }}
		{{-- phan trang va tim kiem --}}
		{{-- {{ $link->appends(request()->query())->links() }} --}}
	</div>

  <div class="modal" tabindex="-1" role="dialog" id="myModalOrder">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Chi tiết đơn hàng #<b class="transaction_id"></b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="md_content">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
    $(function(){
      $(".js_order_item").click(function(event){
        event.preventDefault();
        let $this = $(this);
        let url = $this.attr('href');
        $(".transaction_id").text('').text($this.attr('data-id'));

        $("#myModalOrder").modal('show');
        
        $.ajax({
          url: url,
        }).done(function(res){
          console.log(res);
          if(res){
            $("#md_content").html('').append(res);
          }
        });
      });
      $('.btnDelete').click(function(event){
      event.preventDefault();
      let self = $(this);
				let idTr = self.attr('id');
				if($.isNumeric(idTr)){
					$.ajax({
						url: "{{ route('admin.deleteTransaction') }}",
						type: "POST",
						data: {id: idTr},
						beforeSend: function(){
							self.text('Loading ...');
						},
						success: function(result){
							self.text('Delete');
							result = $.trim(result);
							if(result === 'OK'){
								alert('Delete successful');
								window.location.reload(true);
								$('#row_'+idTr).hide();
							} else {
								alert('Delete fail');
							}
							return false;
						}
					});
				}
    });
    });
    
</script>
@endpush