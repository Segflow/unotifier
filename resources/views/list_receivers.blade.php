@extends('app')
@section('content')
<div class="container">
{!! Breadcrumbs::render('list_receivers') !!}
<blockquote>
  <p>{{ $notif->content }}</p>
  <small>{{ date("d M Y",strtotime($notif->created_at)) }} at {{ date("H:i",strtotime($notif->created_at)) }}</small>
</blockquote>
<table class="receiver-table table table-striped table-hover ">
    <thead>
        <tr>
            <th>#</th>
            <th>Receiver</th>
            <th>Seen at</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    	<?php $count = 1; ?>
        @foreach ($notif->receivers as $receiver)
            <tr class="receiver-wrap {{ Html::notifState($receiver) }}">
                <td class="receiver-id">
                    {{ $count++ }}
                </td>
                <td class="receiver-name">
                    {{ $receiver }}
                </td>
                <td class="receiver-seen-at">
                    @if ($receiver->pivot->seen)
                    	{{ date("d M Y",strtotime($receiver->created_at)) }} at {{ date("H:i",strtotime($receiver->created_at)) }}
                    @else
                    	Not seen yet 
                   	@endif
                </td>
                <td class="receiver-action">
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection