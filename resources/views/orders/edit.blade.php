@extends('layouts.master')
@section('title','Pokaż wpis')
@section('content')
<h4>ID: {{ $order->id }}
    {{ $order->name }} tel: {{ $order->phone }} email: <a href="mailto:{{ $order->email }}">{{ $order->email }}</a> termin: 28 grudnia 2020 - 03 stycznia 2021, Wisła
    <br>Data i czas zapisu: {{ $order->created_at }}, zapis z <strong>{{ $order->site }}</strong>
</h4>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Dane</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Terminy</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <form action="{{ route('orders.edit',$order->id) }}" method="post">
            @csrf
            {{ method_field('PUT') }}
            <div class="panel panel-default panel-success">
                <div class="panel-heading"></div>
                <div class="panel-body">

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="kod_partnera">Kod partnera</label>
                            <input class="form-control" type="text" name="kod_partnera" value="{{ $order->partner_code }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="kod_promocyjny">Kod promocyjny</label>
                            <input class="form-control" type="text" name="kod_promocyjny" value="{{ $order->promotion_code  }}">
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="imie_nazwisko">Imie i nazwisko</label>
                            <input class="form-control" required type="text" id="imie_nazwisko" name="imie_nazwisko" value="{{ $order->name  }}">
                        </div>


                        <div class="form-group col-md-4">
                            <label for="telefon">Telefon</label>
                            <input class="form-control" type="text" id="telefon" name="telefon" value="{{ $order->phone }}">
                        </div>


                        <div class="form-group col-md-4">
                            <label for="email">Email</label>
                            <input class="form-control" type="text" id="email" name="email" value="{{ $order->email }}">
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="uwagi">Uwagi kursanta</label>
                            <textarea class="form-control" name="uwagi" rows="3" disabled>{{ $order->comments }}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="uwagi">Uwagi CKKS</label>
                            <textarea class="form-control" name="uwagi_ckks" rows="3">{{ $order->comments_company }}</textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Nr konta kursanta</label>
                            <input class="form-control" type="text" id="nrkonta" name="nrkonta" value="{{ $order->acount_number }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="due">Należność</label>
                            <input class="form-control" type="text" id="due" name="due" value="{{ $order->due }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="status">Status</label>
                            <select name="status">
                                @for($a=0;$a<count($status);$a++)
                                    <option value="{{ $status[$a] }}">{{ $status[$a] }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="status">Zaliczka</label>
                            <select name="installment">
                                @for($a=0;$a<count($installment);$a++)
                                    <option value="{{ $installment[$a] }}">{{ $installment[$a] }}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="form-group">
                            <label></label>
                            <input class="btn btn-primary" type="submit" value="zapisz">
                        </div>
                    </div>

                </div>
            </div></form>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        lista wlasnych
    </div>
</div>


{{--        @include('partials.orders.payment')--}}
{{--        @yield('payment')--}}
{{--    --}}
{{--        @include('partials.orders.shipment')--}}
{{--        @yield('shipment')--}}
{{--    --}}
{{--        @include('partials.orders.documents')--}}
{{--        @yield('documents')--}}
{{--    --}}
{{--        @include('partials.orders.emails')--}}
{{--        @yield('emails')--}}
{{--    --}}
{{--        @include('partials.orders.log')--}}
{{--        @yield('log')--}}


@endsection
