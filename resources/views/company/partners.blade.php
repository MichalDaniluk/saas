@extends('layouts.master')
@section('title','Program partnerski')
@section('content')
    <h1>Program partnerski</h1>

    <div class="row">
        <div class="col-md-3">
            @include('partials.company.menu')
        </div>
        <div class="col-md-9">
            <form action="{{ route('companies.partners.edit', $company->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="form-group col-md-9">
                    <label for="name">Kod partnerski</label>
                    <input class="form-control" type="text" name="partner_code" value="{{ $company->partner_code }}">
                </div>

                <div class="form-group col-md-9">
                    <label for="name">Strona (URL)</label>
                    <input class="form-control" type="text" name="site" value="{{ $company->site }}">
                </div>

                <div class="form-group col-md-9">
                    <input class="btn btn-primary" type="submit" value="Zapisz">
                    <a class="btn btn-secondary" href="{{ route('companies.list') }}">Lista</a>
                </div>

            </form>
        </div>
    </div>

@endsection
