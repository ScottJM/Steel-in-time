@extends('app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
				   Edit Order
				</div>
				<div class="panel-body">
					{!! BootForm::open()->put()->action('/orders/'.$order->id) !!}

					{!! BootForm::bind($order) !!}
                      {!! BootForm::text('Payment Method', 'payment_method') !!}
					  {!! BootForm::checkbox('Has the item been sent?', 'status') !!}
					  {!! BootForm::text('Amount Paid', 'amount_paid') !!}
                      {!! BootForm::token() !!}
					  <div class="pull-right">
                      	{!! BootForm::submit('Edit')->addClass('btn-success') !!}
					  </div>
					{!! BootForm::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>



@endsection