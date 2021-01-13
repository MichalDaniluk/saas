@extends('layouts.master')
@section('title','Edycja firmy')
@section('content')
<h1>Firma</h1>
<div class="row">
    <div class="col-md-3">
        <x-company.logo file="{{  $company->logo }}"></x-company.logo>
        @include('partials.company.menu')
        <form action="{{ route('companies.delete', $company->id) }}" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input type="submit" class="btn btn-danger" value="Usuń firmę" onclick="confirm('Jesteś pewny, że chcesz usunąć firmę?')">
        </form>
    </div>
    <div class="col-md-9">
        <form action="{{ route('companies.edit', $company->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PUT') }}
        <div class="form-row">

            <div class="form-group col-md-9">
                <label for="name">Nazwa firmy</label>
                <input class="form-control" type="text" name="name" value="{{ $company->name }}">
            </div>

            <div class="form-group col-md-9">
                <label for="address">Adres firmy</label>
                <input class="form-control" type="text" name="address" value="{{ $company->address }}">
            </div>

            <div class="form-group col-md-9">
                <label for="city">Miasto</label>
                <input class="form-control" type="text" name="city" value="{{ $company->city }}">
            </div>

            <div class="form-group col-md-9">
                <label for="post_code">Kod pocztowy</label>
                <input class="form-control" type="text" name="post_code" value="{{ $company->post_code }}">
            </div>

            <div class="form-group col-md-9">
                <label for="email">Adres email</label>
                <input class="form-control" type="text" name="email" value="{{ $company->email }}">
            </div>

            <div class="form-group col-md-9">
                <label for="logo">Logo</label>
                <input class="form-control" type="file" name="logo">
            </div>

            <div class="form-group col-md-9">
                <input class="btn btn-primary" type="submit" value="Zapisz">
                <a class="btn btn-secondary" href="{{ route('companies.list') }}">Lista</a>
            </div>

        </div>
    </form>
    </div>
</div>

@endsection
