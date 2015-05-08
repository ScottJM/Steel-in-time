@extends('app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
				    Products  <small class="text-muted">{{ $products->total() }} total</small>
				    <div class="pull-right"><a class="btn btn-xs btn-primary" href="/products/create"><i class="glyphicon glyphicon-plus"></i> Add</a></div>
				</div>
				<div class="panel-body">


                    @if( $products->isEmpty() )

                    <p>No products available</p>

                    @else

					{!! BootForm::open()->action('/products/delete-multiple') !!}

					{!! BootForm::token() !!}
                    <button type="submit" class="btn btn-danger btn-sm disabled" id="delete-multiple">Delete (<span class="count">0</span>)</button>

                    </div>
 					{!! BootForm::open() !!}

                    <table class="table table-striped">
                          <thead>
                            <tr>
                              <th></th>
                              <th>#</th>
                              <th>Metal</th>
                              <th>Cut</th>
                              <th>Grade</th>
                              <th>Width (mm)</th>
                              <th>Height (mm)</th>
                              <th>Length (mm)</th>
                              <th>Price</th>
                              <th>In stock?</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>

                            @foreach($products as $k => $product)
								<tr>
								  <td><input type="checkbox" name="delete[]" value="{{ $product->id }}"/></td>
								  <th scope="row">{{ $product->id }}</th>
								  <td>{{ $product->metal_type->name }}</td>
								  <td>{{ $product->cut_type->name }}</td>
								  <td>{{ $product->grade }}</td>
								  <td>{{ $product->width }}</td>
								  <td>{{ $product->height }}</td>
								  <td>{{ $product->length }}</td>
								  <td>{{ $product->price }}</td>
								  <td>
								  	@if($product->in_stock == 1)
								  		<i class="glyphicon glyphicon-ok text-success"></i>
								  	@else
								  		<i class="glyphicon glyphicon-remove text-danger"></i>

								  	@endif
								  </td>
								  <td  align="right"><a class="btn btn-default btn-xs" href="/products/{{ $product->id }}/edit">edit</a></td>
								
								</tr>
							@endforeach
                          </tbody>
                    </table>

                    {!! $products->render() !!}

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