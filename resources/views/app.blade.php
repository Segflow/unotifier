<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>UNotifier</title>
		<link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
		<link rel="stylesheet" href="{{ asset('/css/vendor/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('/css/vendor/font-awesome.min.css') }}">

		@yield('css_includes')
		<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-menu" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">UNotifier</a>
				</div>
				<div class="collapse navbar-collapse" id="top-menu">
					<ul class="nav navbar-nav">
						<li class="{{ Html::activeState('home') }}">
							<a href="{{ url('/') }}"><i class="fa fa-home"></i></i>Home</a>
						</li>
						@if (Auth::check())
						<li class="dropdown {{ Html::activeState(['send_notifs_page', 'list_notifs']) }}">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">
							<i class="fa fa-envelope "></i>Notifications<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ route('list_notifs') }}">My notifications</a></li>
								<li><a href="{{ route('send_notifs_page') }}">Send new</a></li>
							</ul>
						</li>
						@if (Auth::user()->isAdmin())
						<li class="dropdown {{ Html::activeState(['create_user', 'manage_groupe']) }}">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">
							<i class="fa fa-terminal"></i>Manage<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ route('create_user') }}">Create new user</a></li>
								<li><a href="{{ route('manage_groupe') }}">Manage groupes</a></li>
							</ul>
						</li>
						@endif
						@endif
					</ul>
					<ul class="nav navbar-nav navbar-right">
						@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}"><i class="fa fa-user"></i>Login</a></li>
						@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle text-capitalize" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user"></i>{{ Auth::user()->profile }}<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out"></i>Logout</a></li>
							</ul>
						</li>
						@endif
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
			@include('flash::message')
		</div>
		@yield('content')
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<span class="pull-right">© 2016 unotifier.tn | INSAT</span>
					</div>
				</div>
			</div>
		</footer>
		<!-- Scripts -->
		<script src="{{ asset('/js/vendor/jquery.min.js') }}"></script>
		<script src="{{ asset('/js/vendor/bootstrap.min.js') }}"></script>

		@yield('js_includes')
		<script src="{{ asset('/js/helper_func.js') }}"></script>
		<script src="{{ asset('/js/main.js') }}"></script>
	</body>
</html>
