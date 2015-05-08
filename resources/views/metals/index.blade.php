@extends('app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
				    Metals  <small class="text-muted">{{ $metals->total() }} total</small>
				    <div class="pull-right"><a class="btn btn-xs btn-primary" href="/metals/create"><i class="glyphicon glyphicon-plus"></i> Add</a></div>
				</div>
				<div class="panel-body">


                    @if( $metals->isEmpty() )

                    <p>No metals available</p>

                    @else

					{!! BootForm::open()->action('/metals/delete-multiple') !!}

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
                              <th>Ferrous</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>

                            @foreach($metals as $k => $metal)
								<tr>
								  <td><input type="checkbox" name="delete[]" value="{{ $metal->id }}"/></td>
								  <th scope="row">{{ $metal->id }}</th>
								  <td>{{ $metal->name }}</td>

								  <td>
								  	@if($metal->ferrous == 1)
								  		<i class="glyphicon glyphicon-ok text-success"></i>
								  	@else
								  		<i class="glyphicon glyphicon-remove text-danger"></i>

								  	@endif
								  </td>
								  <td align="right"><a class="btn btn-default btn-xs" href="/metals/{{ $metal->id }}/edit">edit</a></td>
								
								</tr>
							@endforeach
                          </tbody>
                    </table>

                    {!! $metals->render() !!}

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