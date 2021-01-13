@extends('layouts.master')
@section('title','Dodanie kursu')
@section('content')

    <div class="group-row">
        <div class="col">
        <form action="{{ route('courses.create') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-row">

                <div class="form-group col-md-4">
                    <label for="name">Nazwa kursu</label>
                    <input class="form-control{{$errors->has('name') ? ' bg-success' : ' bg-danger' }}" type="text" name="title" value="{{ old('title') }}" required>
                </div>

                <div class="form-group col-md-4">
                    <label for="name">Nazwa krótka</label>
                    <input class="form-control" type="text" name="title_short" value="{{ old('title_short') }}" required>
                </div>

                <div class="form-group col-md-4">
                    <label for="name">Nazwa angielska</label>
                    <input class="form-control" type="text" name="title_english" value="{{ old('title_english') }}"required>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class=font-weight-bold for="cena">Cena</label>
                        <input class="form-control" type="text" name="price" value="{{ old('price') }}" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label class=font-weight-bold for="typ_kursu">Typ kursu</label>
                        <select name="typ_kursu" class="form-control"><option value="" ></option><option value="Trenerski" >Trenerski</option><option value="Instruktorski" >Instruktorski</option><option value="Doskonalacy" >Medyczne</option><option value="Biznes" >Biznes</option><option value="Oświata" >Oświata</option><option value="Live" >Live</option><option value="Podyplomowe"  selected>Podyplomowe</option></select>                </div>

                    <div class="form-group col-md-4">
                        <label class=font-weight-bold for="szkolenie">Szkolenie</label>
                        <select name="szkolenie" id="szkolenie" class="form-control"><option value="Tak" selected>Tak</option><option value="Nie">Nie</option></select>                </div>
                </div>

                <input class="btn btn-primary" type="submit" value="Dodaj kurs">

            </div>
        </form>
        </div>
    </div>

@endsection
