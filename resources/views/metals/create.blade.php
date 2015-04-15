@extends('app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
				    Add a metal
				</div>
				<div class="panel-body">
					{!! BootForm::open()->action('/metals') !!}

                                          {!! BootForm::text('Name', 'name') !!}
                                          {!! BootForm::checkbox('Ferrous?', 'ferrous') !!}
                                          {!! BootForm::token() !!}
                                          <div class="pull-right">
                                          	{!! BootForm::submit('Add')->addClass('btn-success') !!}
                    					  </div>

                    					{!! BootForm::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>



@endsection