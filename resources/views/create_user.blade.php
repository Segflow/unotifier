@extends('app')

@section('content')
<div class="container">
	{!! Breadcrumbs::render('create_user') !!}

	<form class="form-horizontal" role="form" method="POST" action="{{ route('post_create_user') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
		
		<div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" class="form-control" required name="nom" value="" placeholder="First Name">
        </div>

        <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" class="form-control" required name="prenom" value="" placeholder="Last Name">
        </div>

        <div class="input-group form-group">
        	<span class="input-group-addon"><i class="fa fa-users"></i></span>
        	<input type="text" required name="member_groupes" class="form-control member_groupes" aria-label="Text input with segmented button dropdown">
        </div>
    
    </form>
</div>

@endsection

@section('css_includes')
<link rel="stylesheet" href="{{ asset('/css/vendor/select2.css') }}" >
<link rel="stylesheet" href="{{ asset('/css/vendor/select2-bootstrap.css') }}">
@endsection

@section('js_includes')
<script src="{{ asset('/js/vendor/select2.js') }}"></script>
<script>
	data = {!! $all_groupes !!}
	$(".member_groupes").select2({
		multiple: true,
		tags: data,
		placeholder: 'Select member groupes'
	});
</script>
@endsection