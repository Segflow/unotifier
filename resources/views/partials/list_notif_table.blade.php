<table class="notif-outline table table-bordered table-hover table-striped">
    <tbody>
        @foreach ($data as $notif)
            <tr class="notif-wrap  ">
                <td class="notif-content">
                    <a href="#">{{ $notif->content}}</a>
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