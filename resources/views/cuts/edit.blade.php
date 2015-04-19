@extends('app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
				   Edit cut
				</div>
				<div class="panel-body">
					{!! BootForm::open()->put()->action('/cuts/'.$cut->id) !!}

					{!! BootForm::bind($cut) !!}

                                          {!! BootForm::text('Name', 'name') !!}
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