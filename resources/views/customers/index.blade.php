@extends('app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
				    Customers  <small class="text-muted">{{ $customers->total() }} total</small>
				    <div class="pull-right"><a class="btn btn-xs btn-primary" href="/customers/create"><i class="glyphicon glyphicon-plus"></i> Add</a></div>
				</div>
				<div class="panel-body">


                    @if( $customers->isEmpty() )

                    <p>No customers available</p>

                    @else

					{!! BootForm::open()->action('/customers/delete-multiple') !!}

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
                              <th>Company</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>

                            @foreach($customers as $k => $customer)
								<tr>
								  <td><input type="checkbox" name="delete[]" value="{{ $customer->id }}"/></td>
								  <th scope="row">{{ $customer->id }}</th>
								  <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
								  <td>{{ $customer->company_name }}</td>
								  <td>{{ $customer->email_address }}</td>
								  <td>{{ $customer->phone_number }}<br/> {{ $customer->mobile_number }}</td>

								  <td>

								  </td>
								  <td align="right"><a class="btn btn-default btn-xs" href="/customers/{{ $customer->id }}/edit">edit</a></td>
								
								</tr>
							@endforeach
                          </tbody>
                    </table>

                    {!! $customers->render() !!}

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