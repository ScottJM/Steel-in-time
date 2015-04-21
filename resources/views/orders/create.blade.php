@extends('app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
            {!! BootForm::openHorizontal(4,8)->action('/orders') !!}

            <div class="panel panel-default">
				<div class="panel-heading">
				    Customer details
				</div>
				<div class="panel-body">

						{!! BootForm::text('Name', 'customer_name') !!}
						{!! BootForm::hidden('customer_id') !!}
                        {!! BootForm::text('Company name', 'company_name') !!}
                        {!! BootForm::text('VAT Number', 'vat_number')->placeholder('Optional') !!}
                        {!! BootForm::text('Email address', 'email_address') !!}

                        {!! BootForm::text('Phone number', 'phone_number') !!}
                        {!! BootForm::text('Mobile number', 'mobile_number') !!}



                </div>
			</div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Address Details
                </div>
                <div class="panel-body">
                    {!! BootForm::textarea('Billing address', 'billing_address')->rows(3) !!}
                    {!! BootForm::text('Billing postcode', 'billing_postcode')->addClass('postcode') !!}
                    {!! BootForm::textarea('Shipping address', 'shipping_address')->rows(3) !!}
                    {!! BootForm::text('Shipping postcode', 'billing_postcode')->addClass('postcode') !!}
                </div>
            </div>

            <div class="panel panel-info" id="new_customer" style="display:none">
                <div class="panel-heading">
                    <h3 class="panel-title">New customer will be created</h3>
                </div>
                <div class="panel-body">
                    {!! BootForm::checkbox('Receive newsletter?', 'receive_newsletter')->defaultToChecked() !!}
                    {!! BootForm::checkbox('Create temporary password?', 'create_temporary_password')->defaultToChecked() !!}

                </div>
            </div>

            <div class="panel panel-default">
				<div class="panel-heading">
				    Order details
				</div>
				<div class="panel-body">

						{!! BootForm::text('Amount Paid', 'amount_paid') !!}
						{!! BootForm::checkbox('Has the item been sent?', 'status') !!}
						{!! BootForm::token() !!}


				</div>
			</div>
            <div class="panel panel-default">
				<div class="panel-heading">
				    Payment details
				</div>
				<div class="panel-body">

						{!! BootForm::select('Payment method', 'payment_method')->options(['Credit card', 'Cash', 'Cheque', 'Purchase order']) !!}

                      	{!! BootForm::submit('Process order') !!}

				</div>
			</div>
            {!! BootForm::close() !!}

        </div>
	</div>
</div>


<script>
    $(function(){

        $( "#customer_name").bind('blur', function(){

            var $customer_id = $('input[name=customer_id]');
            console.log($customer_id.val().length)
            if($customer_id.val().length == 0 ){
                console.log('a')
                $('#new_customer').fadeIn(300);
            } else {
                $('#new_customer').hide();
            }

        }).autocomplete({
            minLength: 0,
            source: '/customers/search',
            appendTo: $('#customer_name').parent(),
            focus: function( event, ui ) {
                var item = ui.item;
                $( "#customer_name" ).val( item.first_name + " "+item.last_name );

                return false;
            },
            select: function( event, ui ) {
                var item = ui.item;
                $( "#customer_name" ).val( item.first_name + " "+item.last_name).attr('disabled', 'disabled').bind('dblclick' ,function(){
                    $(this).removeAttr('disabled').val('');
                });
                $( "#company_name" ).val( item.company_name );
                $( "#vat_number" ).val( item.vat_number );
                $( "#email_address" ).val( item.email_address );
                $( "#phone_number" ).val( item.phone_number );
                $( "#mobile_number" ).val( item.mobile_number );
                $( "#shipping_address" ).val( item.shipping_address );
                $( "#billing_address" ).val( item.billing_address );
                $( "#shipping_postcode" ).val( item.shipping_postcode );
                $( "#billing_postcode" ).val( item.billing_postcode );
                $('input[name=customer_id]').val(item.id);
                return false;
            }
        }).autocomplete( "instance" )._renderItem = function( ul, item ) {
            return $( "<li class='list-group-item list-autocomplete'>" )
                    .append( "<a>" + item.first_name + " "+item.last_name+ "<br><small>"+item.email_address+"</small></a>" )
                    .appendTo( ul );
        };



    });

</script>


@endsection