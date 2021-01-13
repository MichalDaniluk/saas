@extends('layouts.master')
@section('title','Instruktor')
@section('content')


    <div class="panel panel-default">
        <div class="panel-body">
            <form action="{{ route('instructors.edit', $instructor->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label for="name">Imię i nazwisko</label>
                        <input class="form-control" type="text" name="name" value="{{ $instructor->name }}">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="name">Adres email</label>
                        <input class="form-control" type="text" name="email" value="{{ $instructor->email }}">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="phone">Telefon</label>
                        <input class="form-control" type="text" name="phone" value="{{ $instructor->phone }}">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="phone">Opis</label>
                        <input class="form-control" type="text" name="description" value="{{ $instructor->description }}">
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 col-sm-2"></label>
                        <input class="btn btn-primary" type="submit" value="zapisz">
                    </div>

                </div>
            </form>
        </div>
    </div>

@endsection
