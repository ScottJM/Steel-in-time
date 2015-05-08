@extends('app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
				    Coupons  <small class="text-muted">{{ $coupons->total() }} total</small>
				    <div class="pull-right"><a class="btn btn-xs btn-primary" href="/coupons/create"><i class="glyphicon glyphicon-plus"></i> Add</a></div>
				</div>
				<div class="panel-body">


                    @if( $coupons->isEmpty() )

                    <p>No coupons available</p>

                    @else

					{!! BootForm::open()->action('/coupons/delete-multiple') !!}

					{!! BootForm::token() !!}
                    <button type="submit" class="btn btn-danger btn-sm disabled" id="delete-multiple">Delete (<span class="count">0</span>)</button>

                    </div>
 					{!! BootForm::open() !!}

					<table class="table table-striped">
						<thead>
						<tr>
							<th width="2%"></th>
							<th width="2%">#</th>
							<th>Name</th>
							<th>Description</th>
							<th>Discount</th>
							<th></th>
						</tr>
						</thead>
						<tbody>

						@foreach($coupons as $k => $coupon)
							<tr>
								<td><input type="checkbox" name="delete[]" value="{{ $coupon->id }}"/></td>
								<th scope="row">{{ $coupon->id }}</th>
								<td>{{ $coupon->short_name }}</td>
								<td>{{ $coupon->description }}</td>
								<td>
									@if($coupon->percent_off)
										{{ $coupon->percent_off  }}%
									@else
										£{{ $coupon->amount_off }}
									@endif
								</td>

								<td>

								</td>
								<td align="right"><a class="btn btn-default btn-xs" href="/coupon/{{ $coupon->id }}/edit">edit</a></td>

							</tr>
						@endforeach
						</tbody>
					</table>


				{!! $coupons->render() !!}

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