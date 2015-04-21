@extends('app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
				   Edit customer
				</div>
				<div class="panel-body">
					{!! BootForm::openHorizontal(4, 8)->put()->action('/customers/'.$customer->id) !!}

					{!! BootForm::bind($customer) !!}
                    {!! BootForm::text('First name', 'first_name') !!}
                    {!! BootForm::text('Last name', 'last_name') !!}
                    {!! BootForm::text('Company name', 'company_name') !!}
                    {!! BootForm::text('VAT Number', 'vat_number')->placeholder('Optional') !!}
                    {!! BootForm::text('Email address', 'email_address') !!}
                    {!! BootForm::textarea('Billing address', 'billing_address')->rows(3) !!}
                    {!! BootForm::text('Billing postcode', 'billing_postcode')->addClass('postcode') !!}
                    {!! BootForm::textarea('Shipping address', 'shipping_address')->rows(3) !!}
                    {!! BootForm::text('Shipping postcode', 'billing_postcode')->addClass('postcode') !!}
                    {!! BootForm::text('Phone number', 'phone_number') !!}
                    {!! BootForm::text('Mobile number', 'mobile_number') !!}

                    {!! BootForm::checkbox('Receive newsletter?', 'receive_newsletter') !!}
                    {!! BootForm::token() !!}
                    {!! BootForm::submit('Edit', null, null, ['class' => 'btn-success']) !!}
                    					{!! BootForm::close() !!}

				</div>
			</div>
		</div>
	</div>
</div>



@endsection