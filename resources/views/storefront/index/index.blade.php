@extends('storefront.layout')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1" ng-view autoscroll="true">

            </div>
        </div>
    </div>

@endsection