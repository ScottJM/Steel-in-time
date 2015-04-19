@extends('app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
				    Add an order
				</div>
				<div class="panel-body">
					{!! BootForm::open()->action('/orders') !!}

						{!! BootForm::text('Payment Method', 'payment_method') !!}
						{!! BootForm::text('Amount Paid', 'amount_paid') !!}
						{!! BootForm::checkbox('Has the item been sent?', 'status') !!}
						{!! BootForm::token() !!}
                      <div class="pull-right">
                      	{!! BootForm::submit('Add')->addClass('btn-success') !!}
					  </div>
					{!! BootForm::close() !!}

				</div>
			</div>
		</div>
	</div>
</div>



@endsection