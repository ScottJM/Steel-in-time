@extends('app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
				    Add a coupon
				</div>
				<div class="panel-body">
					{!! BootForm::open()->action('/coupons') !!}

						{!! BootForm::text('Short Name (E.g. "ALUM25")', 'short_name') !!}
						{!! BootForm::text('Description (Admin Use Only)', 'description') !!}
						{!! BootForm::text('Percentage Off (Discount)', 'percent_off') !!}
						{!! BootForm::text('Amount Off', 'amount_off') !!}
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