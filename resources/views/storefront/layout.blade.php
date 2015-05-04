<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Steel In Time</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.4/flatly/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/jqueryuibootstrap/css/custom-theme/jquery-ui-1.10.3.theme.css" rel="stylesheet">
    <link href="/assets/vendor/select2/select2.css" rel="stylesheet">
    <link href="/assets/vendor/select2/select2-bootstrap.css" rel="stylesheet">
    <link href="/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/storefront.css" rel="stylesheet">


    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!-- Scripts -->
	<script src="{{ asset('/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('/assets/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/assets/vendor/jquery-ui/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('/assets/vendor/jquery-pjax/jquery.pjax.js') }}"></script>
	<script src="/assets/vendor/select2/select2.min.js"></script>
	<script src="/assets/vendor/angular/angular.min.js"></script>
	<script src="/assets/vendor/angular-route/angular-route.min.js"></script>
	<script src="/assets/vendor/angular-bootstrap/ui-bootstrap.min.js"></script>
	<script src="/assets/vendor/angular-bootstrap/ui-bootstrap-tpls.min.js"></script>
	<script src="/assets/vendor/angular-resource/angular-resource.min.js"></script>
	<script src="/assets/vendor/angular-bootstrap-show-errors/src/showErrors.min.js"></script>
	<script src="/js/helpers.js"></script>
	<script src="/js/app.js"></script>
	<script src="/js/app.services.js"></script>
	<script src="/js/app.routes.js"></script>
	<script src="/js/app.controllers.js"></script>

</head>
<body ng-app="SIT"  ng-controller="AppCtrl">
<div class="wrapper">
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Steel In Time</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav pjax" id="main-nav">
					<li><a href="{{ url('/store/') }}"><span>Home</span></a></li>
					<li><a href="{{ url('/store/#about') }}"><span>About</span></a></li>
					<li><a href="{{ url('/store/#contact') }}"><span>Contact</span></a></li>



				</ul>

                <div class="navbar-right" ng-controller="CartCtrl" id="basket">
                    <a href="" ng-click="viewCart()"><i class="glyphicon glyphicon-shopping-cart"></i> View cart (<span ng-bind="cartItems.length"></span>)</a>
                </div>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}" class="nav-action">Login</a></li>
					@else
                        <li><a href="{{ url('/home') }}" class="nav-action">Account</a></li>

                    @endif
				</ul>

                <div class="navbar-right" id="help-box">
                    <a href="mailto:{{ config('steelintime.infoemail') }}">{{ config('steelintime.infoemail') }}</a><br/>
                    <strong>{{ config('steelintime.phonenumber') }}</strong>
                </div>
			</div>
		</div>
	</nav>
    <div class="alert alert-success" ng-show="alert != null" >@{{ alert.text }} <a href="" ng-click="alert.action()" class="alert-link" ng-show="alert.action">[@{{ alert.actionLabel }}]</a></div>


        @yield('content')

   {{--footer--}}
    @include('storefront.footer')

    </div>
</body>
</html>
