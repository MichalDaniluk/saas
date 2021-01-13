@extends('layouts.master')
@section('title','Dodanie nowego użytkownika')
@section('content')

    <div class="group-row">
        <div class="col">
        <form action="{{ route('companies.user.create') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="company_id" value="{{ $company_id }}">
            @csrf

            <div class="form-row">

                <div class="form-group col-md-3">
                    <label for="name">Imię i nazwisko</label>
                    <input class="form-control{{$errors->has('name') ? ' bg-success' : ' bg-danger' }}" type="text" name="name" value="{{ old('name') }}" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="email">Adres email</label>
                    <input class="form-control" type="text" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="password">Hasło</label>
                    <input class="form-control" type="password" name="password" value="" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="password_confirmation">Potwierdź hasło</label>
                    <input class="form-control" type="password" name="password_confirmation" value="" required>
                </div>

                <div class="form-group col">
                    <label for="role">Rola</label>
                    <select name="role" class="form-control">
                        @for($a=0;$a<count($role);$a++)
                            <option value="{{ $role[$a] }}">{{ $role[$a] }}</option>
                        @endfor
                    </select>
                </div>

                <input class="btn btn-primary" type="submit" value="Dodaj użytkownika">

            </div>
        </form>
        </div>
    </div>

@endsection
