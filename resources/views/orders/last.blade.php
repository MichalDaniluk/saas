@extends('layouts.master')
@section('title','Lista ostatnich szkoleń')
@section('content')

    <script>
        $( function() {
            $( "#tabs" ).tabs();
        } );
    </script>

    <div id="tabs">
        <ul>
            <li><a href="#tabs-1">Najnowsze zapisy</a></li>
            <li><a href="#tabs-3">Bez zaliczek</a></li>
            <li><a href="#tabs-2">Zakończone</a></li>
        </ul>
        <div id="tabs-1">

                    <div style="width:100%;text-align:center;padding:10px;">
                        <form action="" method="get">
                            <input type="hidden" name="s" value="zapisy">
                            <input type="text" name="od" id="od" value="" placeholder="data rozpoczęcia">
                            <input type="text" name="do" id="do" value="" placeholder="data zakończenia">
                            <input type="submit" value="filtruj">
                        </form>
                    </div>

                    <a class="" href="/orders/0" title="Dodaj wpis">Dodaj wpis</a>

                    <table class="table table-striped">
                        <tr>
                            <th>Nazwa kursu</th>
                            <th>Termin</th>
                            <th>Kursant</th>
                            <th>Telefon</th>
                            <th>Email</th>
                            <th></th>
                            <th>Kod Partnera</th>
                            <th>Kod Prom</th>
                            <th>Zal</th>
                            <th colspan="2"></th>
                        </tr>
                        @foreach($orders as $order)
                        <tr id="15424" class="bg-success">
                            <td><a href="{{ route('orders.show', $order->id) }}">Kurs Instruktora Narciarstwa (Rusza)</a></td>
                            <td><a href="?s=terminyedycja&termin_id=10527&rand=5031475f7fc7c2d4edaafcb410554d24&kurs_id=5">Wisła<br>28 grudnia 2020 - 03 stycznia 2021</a></td>
                            <td> <a href="?s=kursantedycja&kursant_id=12975">Marek Jakóbik</a></td>
                            <td>570271109</td>
                            <td>mjakobik53@gmail.com</td>
                            <td></td>
                            <td><a href="">ckks</a></td>
                            <td>44-164</td>
                            <td><i class="fas fa-money-bill-wave text-success"></i></td>
                            <td><span onclick="UsunZapis( 15424, 10510, 12975, 'Marek Jakóbik' )"><i class="far fa-trash-alt text-danger"></i></span></td>
                        </tr>
                        @endforeach
                    </table>
                        @include('partials.pagination', ['pagination'=>$orders])
        </div>

@endsection
