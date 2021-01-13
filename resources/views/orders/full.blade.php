@extends('layouts.master')
@section('title','Lista zapisów')
@section('content')

    <h1>Zapisy</h1>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Zapisy własne</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Zapisy partnerskie</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <table class="table table-striped">
        <tr>
            <th>Szkolenie</th>
            <td>Miejsce</td>
            <td>Data</td>
            <th>Imię i nazwisko</th>
            <th></th>
        </tr>
    @foreach($orders as $order)
        <tr>
            <td>{{ $order->title }}</td>
            <td></td>
            <td>{{ $order->from }}</td>
            <td>{{ $order->name }}</td>
            <td><a class="btn btn-primary" href="{{ route('orders.edit', $order->id) }}">edycja</a></td>
        </tr>
    @endforeach
    </table>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <table class="table table-striped">
                <tr>
                    <th>Partner</th>
                    <th>Szkolenie</th>
                    <td>Miejsce</td>
                    <td>Data</td>
                    <th>Imię i nazwisko</th>
                    <th></th>
                </tr>
                @foreach($partner_orders as $porder)
                    <tr>
                        <td>{{ $porder->site }}</td>
                        <td>{{ $porder->title }}</td>
                        <td></td>
                        <td>{{ $porder->from }}</td>
                        <td>{{ $porder->name }}</td>
                        <td><a class="btn btn-primary" href="{{ route('orders.edit', $porder->id) }}">edycja</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection

