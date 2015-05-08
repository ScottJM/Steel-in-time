@extends('app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
				    Orders  <small class="text-muted">{{ $orders->total() }} total</small>
				    <div class="pull-right"><a class="btn btn-xs btn-primary" href="/orders/create"><i class="glyphicon glyphicon-plus"></i> Add</a></div>
				</div>
				<div class="panel-body">


                    @if( $orders->isEmpty() )

                    <p>No orders available</p>

                    @else

					{!! BootForm::open()->action('/orders/delete-multiple') !!}

					{!! BootForm::token() !!}
                    <button type="submit" class="btn btn-danger btn-sm disabled" id="delete-multiple">Delete (<span class="count">0</span>)</button>

                    </div>
 					{!! BootForm::open() !!}
				<table class="table table-striped">
					<thead>
					<tr>
						<th></th>
						<th>#</th>
						<th>Customer ID</th>
						<th>Payment Method</th>
						<th>Amount Paid</th>
						<th>Order Status (Sent?)</th>
					</tr>
					</thead>
					<tbody>

					@foreach($orders as $k => $order)
						<tr>
							<td><input type="checkbox" name="delete[]" value="{{ $order->id }}"/></td>
							<th scope="row">{{ $order->id }}</th>
							<td>{{ $order->customer_id }}</td>
							<td>{{ $order->payment_method }}</td>
							<td>{{ $order->amount_paid }}</td>
							<td>
								@if($order->status == 1)
									<i class="glyphicon glyphicon-ok text-success"></i>
								@else
									<i class="glyphicon glyphicon-remove text-danger"></i>
								@endif
							</td>
							<td  align="right"><a class="btn btn-default btn-xs" href="/products/{{ $order->id }}/edit">edit</a></td>

						</tr>
					@endforeach
					</tbody>
				</table>

                    {!! $orders->render() !!}

 					{!! BootForm::close() !!}
					<div>
                    @endif


				</div>
			</div>
		</div>
	</div>
</div>

<script>
$(function(){

	$('table input[type=checkbox]').bind('change', function(){
		var i = 0;
		$('table input[type=checkbox]').each(function(){
			if( $(this).prop('checked') ) i++;
		});
		$('.count').text(i);

		if( i > 0 ){
			$('#delete-multiple').removeClass('disabled');
		} else {
			$('#delete-multiple').addClass('disabled');
		}

	});

	$('#delete-multiple').bind('click', function(){
	 	return confirm ( 'Are you sure you want to delete those items?' );
	})

});
</script>

@endsection