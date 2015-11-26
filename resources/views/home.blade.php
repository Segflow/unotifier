@extends('app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8">
		{!! Breadcrumbs::render('home') !!}
			<h2>Let the notification era begin!</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis ullam cum deserunt aliquam, unde cupiditate placeat dolore, nemo, totam nesciunt dolores eaque modi laboriosam hic optio magnam neque. Accusantium, odio.</p>
			<div class="row row-centered">
				<div class="col-md-12 col-centered">
					<a href=""><img class="smartphone_logo" src="{{ asset('img/google-play-button.png') }}" alt=""></a>
				</div>
			</div>
		</div>
		@if (Auth::guest())
		<div class="col-md-4">
			@include('partials.login-panel')
		</div>
		@else
		<div class="col-md-4">
			@include('partials.contact-panel')
		</div>
		@endif
	</div>
	<div class="row stats">
		@include('partials.stats')
	</div>
</div>
@include('partials.avis')
@endsection
@section('css_includes')
<link rel="stylesheet" href="{{ asset('/css/vendor/jquery.circliful.css') }}">
@endsection
@section('js_includes')
<script src="{{ asset('/js/vendor/jquery.circliful.min.js') }}"></script>
<script>
	$('.stat_widget').circliful();
</script>
@endsection
