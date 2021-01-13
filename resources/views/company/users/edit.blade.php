@extends('layouts.master')
@section('title','Użytkownik')
@section('content')
<h1>Użytkownik</h1>

    <div class="row">
        <div class="col-md-3">
            @include('partials.company.menu')
        </div>
        <div class="col-md-9">
            <form action="{{ route('companies.user.edit',$user->id) }}" method="post">
                @csrf
                {{ method_field('PUT') }}
                <div class="form-group col">
                    <label for="name">Imię i nazwisko</label>
                    <input class="form-control" type="text" name="name" value="{{ $user->name }}">
                </div>

                <div class="form-group col">
                    <label for="name">Adres email</label>
                    <input class="form-control" type="text" name="email" value="{{ $user->email }}">
                </div>

                <div class="form-group col">
                    <label for="role">Rola</label>
                    <select name="role" class="form-control">
                        @for($a=0;$a<count($role);$a++)
                            <option value="{{ $role[$a] }}">{{ $role[$a] }}</option>
                        @endfor
                    </select>
                </div>

                <div class="form-group">
                    <label></label>
                    <input class="btn btn-primary" type="submit" value="zapisz">
                </div>
            </form>
        </div>
    </div>

@endsection
