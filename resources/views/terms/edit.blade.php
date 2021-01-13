@extends('layouts.master')
@section('title','Edycja terminu')
@section('content')
<h1>Edycja terminu</h1>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Termin</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Koszty</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <form action="{{ route('terms.edit',$term->id) }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="course_id" value="{{ $course_id }}" />
            @csrf
            {{ method_field('PUT') }}
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">

                        <div class="form-group">
                            <label for="description" class="control-label col-sm-2">Opis</label>
                            <textarea name="description" style="width:500px;height:100px;">{{ $term->description }}</textarea><br>
                        </div>

                        <div class="form-group">
                            <label for="data_od" class="control-label col-sm-2">Dzień od/do</label>
                            <input type="date" name="from" value="{{ $term->from }}" class="width100" required="">
                            <input type="date" name="to" value="{{ $term->to }}" class="width100" required="">
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
                        <input type="submit" value="zapisz" class="btn btn-primary">
                        <a class="btn btn-secondary" href="{{ route('terms.list', $course_id) }}">Lista</a>
                    </div>
                </div>
            </div>

        </form>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
</div>

@endsection
