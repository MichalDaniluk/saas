@section('log')
<table class="table table-striped">
    @foreach($orderlogs as $log)
    <tr>
        <td>{{ $log->created_at }}</td>
        <td>{{ $log->login }}</td>
        <td>{{ $log->content }}</td>
        <td></td>
    </tr>
    @endforeach
</table>
@endsection
