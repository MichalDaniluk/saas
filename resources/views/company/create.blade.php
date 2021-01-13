@extends('layouts.master')
@section('title','Dodanie nowej firmy')
@section('content')

    <div class="group-row">
        <div class="col">
        <form action="{{ route('companies.create') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-row">

                <div class="form-group col-md-4">
                    <label for="name">Nazwa firmy</label>
                    <input class="form-control{{$errors->has('name') ? ' bg-success' : ' bg-danger' }}" type="text" name="name" value="{{ old('name') }}" required>
                </div>

                <div class="form-group col-md-4">
                    <label for="name">Adres firmy</label>
                    <input class="form-control" type="text" name="address" value="{{ old('address') }}" required>
                </div>

                <div class="form-group col-md-4">
                    <label for="name">Miasto</label>
                    <input class="form-control" type="text" name="city" value="{{ old('city') }}"required>
                </div>

                <div class="form-group col-md-4">
                    <label for="name">Kod pocztowy</label>
                    <input class="form-control" type="text" name="post_code" value="{{ old('post_code') }}" required>
                </div>

                <div class="form-group col-md-4">
                    <label for="name">Adres email</label>
                    <input class="form-control" type="text" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group col-md-9">
                    <label for="logo">Logo</label>
                    <input class="form-control" type="file" name="logo">
                </div>

                <input class="btn btn-primary" type="submit" value="Dodaj firmę">

            </div>
        </form>
        </div>
    </div>

@endsection
