@extends('app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
            {!! BootForm::open()->action('/orders') !!}

            <div class="panel panel-default">
				<div class="panel-heading">
				    Customer
				</div>
				<div class="panel-body">

						{!! BootForm::text('Name', 'customer_name') !!}


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

                      <div class="pull-right">
                      	{!! BootForm::submit('Process order')->addClass('btn-success') !!}
					  </div>

				</div>
			</div>
            {!! BootForm::close() !!}

        </div>
	</div>
</div>


<script>
    $(function(){

        var projects = [
            {
                value: "jquery",
                label: "jQuery",
                desc: "the write less, do more, JavaScript library",
                icon: "jquery_32x32.png"
            },
            {
                value: "jquery-ui",
                label: "jQuery UI",
                desc: "the official user interface library for jQuery",
                icon: "jqueryui_32x32.png"
            },
            {
                value: "sizzlejs",
                label: "Sizzle JS",
                desc: "a pure-JavaScript CSS selector engine",
                icon: "sizzlejs_32x32.png"
            }
        ];

        $( "#customer_name" ).autocomplete({
            minLength: 0,
            source: '/customers/search',
            appendTo: $('#customer_name').parent(),
            focus: function( event, ui ) {
                $( "#customer_name" ).val( ui.item.label );
                return false;
            },
            select: function( event, ui ) {
                $( "#customer_name" ).val( ui.item.label );
               console.log('item', ui.item);

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