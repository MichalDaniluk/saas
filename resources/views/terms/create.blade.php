@extends('layouts.master')
@section('title','Nowy termin')
@section('content')
    <h1>Nowy termin</h1>
        <form action="{{ route('terms.create', $course_id) }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="course_id" value="{{ $course_id }}" />
            @csrf

            <div class="container">
                <div class="row">
                    <div class="col-lg-10">

                        <div class="form-group">
                            <label for="description" class="control-label col-sm-2">Opis</label>
                            <textarea name="description" style="width:500px;height:100px;"></textarea><br>
                        </div>

                        <div class="form-group">
                            <label for="data_od" class="control-label col-sm-2">Dzień od/do</label>
                            <input type="date" name="from" value="" class="width100" required="">
                            <input type="date" name="to" value="" class="width100" required="">
                        </div>

                        <div class="form-group">
                            <label for="place_id" class="control-label col-sm-2">Miejsce</label>
                            <select name="place_id">
                                @foreach($places as $place)
                                    <option value="{{ $place->id }}">{{ $place->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <label class="control-label col-sm-2"></label>
                        <input type="submit" value="dodaj" class="btn btn-primary">

                    </div>
                </div>
            </div>

        </form>
@endsection
