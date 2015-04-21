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