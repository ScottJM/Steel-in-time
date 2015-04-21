@extends('app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
				   Edit Coupon
				</div>
				<div class="panel-body">
					{!! BootForm::open()->put()->action('/coupons/'.$coupon->id) !!}

					{!! BootForm::bind($coupon) !!}
						{!! BootForm::text('Short Name (E.g. "ALUM25")', 'short_name') !!}
						{!! BootForm::text('Description (Admin Use Only)', 'description') !!}
						{!! BootForm::text('Percentage Off (Discount)', 'percent_off') !!}
						{!! BootForm::text('Amount Off (E.g. £10.00) ', 'amount_off') !!}
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