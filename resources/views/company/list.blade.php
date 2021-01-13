@extends('layouts.master')
@section('title','Lista firm')
@section('content')

    <h1>Firmy</h1>

    <a class="btn btn-primary" href="{{ route('companies.create') }}">dodaj</a><br><br>

    <table class="table table-striped">
        <tr>
            <th>Lp.</th>
            <th>Nazwa firmy</th>
            <th>Adress</th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <td></td>
            <td>
                <form action="?s=kursytresc" method="post"><input type="text" name="nazwa" value="">
            </td>
            <td></td>
            <td>
                <input type="submit" class="btn btn-success" value="szukaj">
                </form>
            </td>
            <td></td>
            <td></td>
        </tr>
        @foreach($companies as $company)
            <tr>
                <td>{{ $company->id }}</td>
                <td>{{ $company->name }}</td>
                <td>{{ $company->addres }}</td>
                <td></td>
                <td><a class="btn btn-primary" href="{{ route('companies.edit', $company->id) }}">edycja</a></td>
                <td>
                    <form action="{{ route('companies.delete', $company->id) }}" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-danger" value="usuń" onclick="confirm('Jesteś pewny, że chcesz usunąć firmę?')">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
