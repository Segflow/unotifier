@extends('app')
@section('content')
<div class="container">
{!! Breadcrumbs::render('list_notif') !!}
<div class="input-group pull-right form-group">
	<span class="input-group-addon"><i class="fa fa-search"></i></span>
	<input type="text" class="form-control" required placeholder="Search" id="search">
</div>
<table class="notifs-table table table-striped table-hover ">
    <thead>
        <tr>
            <th>Content</th>
            <th>Subject</th>
            <th>Link</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($notifs as $notif)
            <tr class="notif-wrap  ">
                <td class="notif-content">
                    <a href="{{ route('view_notif', ['id' => $notif->id]) }}">
                        {{ Html::excerpt($notif->content) }}
                    </a>
                </td>
                <td class="notif-subject">
                    {{ Html::excerpt($notif->subject) }}
                </td>
                <td class="notif-link">
                    <a href="#">{{ $notif->link != '' ? $notif->link: '-' }}</a>
                </td>
                <td class="notif-date">
                    {{ date("d M Y",strtotime($notif->created_at)) }} at {{ date("H:i",strtotime($notif->created_at)) }}
                </td>
                
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection