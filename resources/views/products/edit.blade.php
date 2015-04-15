@extends('app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
				   Edit product
				</div>
				<div class="panel-body">
					{!! BootForm::open()->put()->action('/products/'.$product->id) !!}

					{!! BootForm::bind($product) !!}
   					  {!! BootForm::select('Metal Type', 'metal_type_id')->options( $metal_types ) !!}
   					  {!! BootForm::select('Cut Type', 'cut_type_id')->options( $cut_types ) !!}


                      {!! BootForm::text('Grade', 'grade') !!}
                      {!! BootForm::text('Width (mm)', 'width') !!}
                      {!! BootForm::text('Height (mm)', 'height') !!}
                      {!! BootForm::text('Length (mm)', 'length') !!}
                      {!! BootForm::text('Price (£)', 'price')->placeholder('0.00') !!}
                      {!! BootForm::checkbox('In stock?', 'in_stock')->defaultToChecked() !!}
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