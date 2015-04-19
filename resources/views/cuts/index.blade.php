@extends('app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
				    Cuts  <small class="text-muted">{{ $cuts->total() }} total</small>
				    <div class="pull-right"><a class="btn btn-xs btn-primary" href="/cuts/create"><i class="glyphicon glyphicon-plus"></i> Add</a></div>
				</div>
				<div class="panel-body">


                    @if( $cuts->isEmpty() )

                    <p>No cuts available</p>

                    @else

					{!! BootForm::open()->action('/cuts/delete-multiple') !!}

					{!! BootForm::token() !!}
                    <button type="submit" class="btn btn-danger btn-sm disabled" id="delete-multiple">Delete (<span class="count">0</span>)</button>

                    </div>
 					{!! BootForm::open() !!}

                    <table class="table table-striped">
                          <thead>
                            <tr>
                              <th></th>
                              <th>#</th>
                              <th>Cut</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>

                            @foreach($cuts as $k => $cut)
								<tr>
								  <td><input type="checkbox" name="delete[]" value="{{ $cut->id }}"/></td>
								  <th scope="row">{{ $cut->id }}</th>
								  <td>{{ $cut->name }}</td>
								  <td align="right"><a class="btn btn-default btn-xs" href="/cuts/{{ $cut->id }}/edit">edit</a></td>
								
								</tr>
							@endforeach
                          </tbody>
                    </table>

                    {!! $cuts->render() !!}

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