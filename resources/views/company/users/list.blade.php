@extends('layouts.master')
@section('title','Użytkownicy w firmie')
@section('content')
<h1>Użytkownicy</h1>
        <div class="row">
            <div class="col-md-3">
                @include('partials.company.menu')
            </div>
            <div class="col-md-9">
                <a class="btn btn-primary" href="/companies/users/create/{{ $company->id }}">Dodaj użytkownika</a>
                <table class="table table-stripped">
                    <tr>
                        <th>Imię i nazwisko</th>
                        <th>Rola</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->role }}</td>
                            <td><a class="btn btn-primary" href="{{ route('companies.user.edit', $user->id) }}">edycja</a></td>
                            <td>
                                <form action="{{ route('companies.user.delete', $user->id) }}" method="post">
                                    <input type="hidden" name="company_id" value="{{ $company->id }}">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input type="submit" class="btn btn-danger" value="usuń" onclick="confirm('Jesteś pewny, że chcesz usunąć użytkownika?')">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>


@endsection
