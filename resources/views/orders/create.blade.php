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
                    {!! BootForm::text('Shipping postcode', 'shipping_postcode')->addClass('postcode') !!}

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
				    Product details
				</div>
				<div class="panel-body">
                    <div class="form-group"><label class="col-lg-4 control-label" for="billing_postcode">Add products</label>
                        <div class="col-lg-8">
                            <select class="js-example-basic-multiple form-control" name="test" data-placeholder="Select the products">
                                <option></option>
                                @foreach($products as $key => $product)
                                    <option value="{{ $product->id }}">{{ $product->present()->description }} - [{{ $product->price }}]</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <table class="table table-striped" id="products" style="display:none;">
                        <thead>
                            <tr>
                                <th>Product</th><th>Qty</th><th>Price</th><th>Total</th><th></th>
                            </tr>

                        </thead>
                        <tbody>

                        </tbody>
                    </table>


						{!! BootForm::token() !!}


				</div>
			</div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Order details
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td align="right">
                                    <strong>Total</strong>
                                </td>
                                <td id="grand-total" style="font-size: 1.3em">
                                    0.00
                                </td>
                            </tr>
                            <tr>
                                <td width="75%" align="right">
                                    <strong>Coupon</strong>
                                </td>
                                <td width="25%">

                                    <input type="text" class="form-control" name="" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
        var $products = $('#products');

        $products.bind('change', '.qty', function(e){
            var $this = $(e.target);
            var $row = $this.parent().parent();
            var p = $row.data();
            p.qty = $this.val();
            $row.find('.product-subtotal').text(p.total());

            if(p.qty == 0) {
                setTimeout(function(){
                    orders.removeRow($row);
                }, 50);
            }
        }).on('click', '.product-remove', function(e){
            var $this = $(e.target);
            var $row = $this.parent().parent();
            orders.removeRow($row);
        });
        var orders = {};
        orders.products = [];
        orders.addRowToTable = function (product) {
            var $tr = $('<tr id="product-'+product.id+'" class="product-row"><td>'+product.text+'<input name="products[]" value="'+product.id+'" type="hidden" /></td><td><input class="qty" type="number" value="'+product.qty+'" min="0" style="width:40px;" name="qty[]"></td><td>'+product.price.toFixed(2)+'</td><td class="product-subtotal">'+product.total()+'</td><td align="right"><i class="glyphicon glyphicon-trash text-danger product-remove"></i></td>').data(product);
            $products.find('tbody').append($tr);
        };
        orders.addProduct = function(item){
            var product = {
                id: item.id,
                text: item.text,
                qty: 1,
                price: orders.parsePrice(item.text)
            };
            product.total = function() {
                return (this.price * this.qty).toFixed(2);
            };
            orders.addRowToTable(product);
            orders.showHideTable();
        };

        orders.removeRow = function($row)
        {
            $row.remove();
            orders.showHideTable();
        };
        orders.parsePrice = function (text) {
            var matches = text.match(/\[(.*?)\]/);

            if (matches) {
                var submatch = parseFloat(matches[1]);
            }

            return submatch;
        };

        orders.showHideTable = function() {
            var $rows = $products.find('tbody tr');
            if($rows.length == 0) $products.hide();
            else $products.show();
        };

        var $eventSelect = $(".js-example-basic-multiple");


        $eventSelect.on("change", function (e) { orders.addProduct(e.added) });

        $eventSelect.select2();

        $( "#customer_name").bind('blur', function(){

            var $customer_id = $('input[name=customer_id]');

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