@extends('layouts.master')
@section('title','Miejsca')
@section('content')


    <div class="panel panel-default">
        <div class="panel-body">
            <form action="{{ route('places.create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label for="name">Nazwa</label>
                        <input class="form-control" type="text" name="name" value="">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="city">Miasto</label>
                        <input class="form-control" type="text" name="city" value="">
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 col-sm-2"></label>
                        <input class="btn btn-primary" type="submit" value="dodaj">
                    </div>

                </div>
            </form>
        </div>
    </div>

@endsection
