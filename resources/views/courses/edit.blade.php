@extends('layouts.master')
@section('title','Edycja kursu')
@section('content')
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Dane</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Terminy</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('courses.edit', $course->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-row">
                            <input type="hidden" name="kurs_id" value="189">

                            <div class="form-group col-md-4">
                                <label class=font-weight-bold for="nazwa">Nazwa pełna</label>
                                <input class="form-control" type="text" name="title" value="{{ $course->title }}">
                            </div>

                            <div class="form-group col-md-4">
                                <label class=font-weight-bold for="nazwa_krotka">Nazwa krótka</label>
                                <input class="form-control" type="text" name="title_short" value="{{ $course->title_short }}">
                            </div>

                            <div class="form-group col-md-4">
                                <label class=font-weight-bold for="nazwa_en">Nazwa angielska</label>
                                <input class="form-control" type="text" name="title_english" value="{{ $course->title_english }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class=font-weight-bold for="specjalizacja">Specjalizacja polska</label>
                                <input class="form-control" type="text" name="specialization" value="{{ $course->specialization }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label class=font-weight-bold for="specjalizacja_en">Specjalizacja angielska</label>
                                <input class="form-control" type="text" name="specialization_english" value="{{ $course->specialization_english }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class=font-weight-bold for="cena">Cena</label>
                                <input class="form-control" type="text" name="price" value="{{ $course->price }}" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label class=font-weight-bold for="typ_kursu">Typ kursu</label>
                                <select name="typ_kursu" class="form-control"><option value="" ></option><option value="Trenerski" >Trenerski</option><option value="Instruktorski" >Instruktorski</option><option value="Doskonalacy" >Medyczne</option><option value="Biznes" >Biznes</option><option value="Oświata" >Oświata</option><option value="Live" >Live</option><option value="Podyplomowe"  selected>Podyplomowe</option></select>                </div>

                            <div class="form-group col-md-4">
                                <label class=font-weight-bold for="szkolenie">Szkolenie</label>
                                <select name="szkolenie" id="szkolenie" class="form-control"><option value="Tak" selected>Tak</option><option value="Nie">Nie</option></select>                </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class=font-weight-bold for="comment">Uwagi</label>
                                <textarea class="form-control" name="comment">{{ $course->comments }}</textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <textarea id="wysiwyg" name="content">{{ $course->content }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 col-sm-2"></label>
                            <input class="btn btn-primary" type="submit" value="zapisz">
                        </div>

                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <span>{{ env('APP_URL') }}/getterms/html/{{ $course->id }}/{{ $company->partner_code }}/{{ $company->site }}</span>
            <table class="table table-stripped">
                        <tr>
                            <th>Rozpoczęcie</th>
                            <th>Zakończenie</th>
                            <th></th>
                        </tr>
                    @foreach($course->terms as $term)
                        <tr>
                            <td>{{ $term->from }}</td>
                            <td>{{ $term->to }}</td>
                            <td><a class="btn btn-primary" href="{{ route('terms.edit', $term->id) }}">edycja</a></td>
                        </tr>
                    @endforeach
                    </table>
        </div>
    </div>
@endsection
