@extends('app')
@section('content')
<div class="container">
	{!! Breadcrumbs::render('send') !!}
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-primary">
				<div class="panel-heading"><b>Write your message:</b></div>
				<div class="panel-body">
					{!! Form::open(['route' => 'send_notifs']) !!}
					<div class="form-group">
						<textarea class="form-control" required placeholder="Your message here" name="notif_msg" cols="50" rows="10"></textarea>
					</div>
					<div class="input-group form-group">
						<span class="input-group-addon"><i class="fa fa-book"></i></span>
						<input type="text" class="form-control" required placeholder="Your subject here" name="notif_subject">
					</div>
					<div class="input-group form-group">
						<span class="input-group-addon"><i class="fa fa-users"></i></span>
						<input type="text" required name="receivers" class="form-control receivers" aria-label="Text input with segmented button dropdown">
						<div class="input-group-btn">
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							<span class="caret"></span>
							<span class="sr-only">Action</span>
							</button>
							<ul id="select-options" class="dropdown-menu dropdown-menu-right" role="menu">
								<li><a href="#" data-action="select">Select all</a></li>
								<li><a href="#" data-action="unselect">Unselect all</a></li>
							</ul>
						</div>
					</div>
					<div class="form-group">
						<input type="submit" value="send" class="btn btn-primary">
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('css_includes')
<link rel="stylesheet" href="{{ asset('/css/vendor/select2.css') }}" >
<link rel="stylesheet" href="{{ asset('/css/vendor/select2-bootstrap.css') }}">
@endsection

@section('js_includes')
<script src="{{ asset('/js/vendor/select2.js') }}"></script>
<script>
	data = {!! $data !!}
	$(".receivers").select2({
		data: data,
		multiple: true,
		placeholder: 'Select targets'
	});
</script>
@endsection