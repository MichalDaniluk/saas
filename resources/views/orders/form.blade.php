@extends('layouts.master_notlogetuser')
@section('title','Formularz zapisu na szkolenie - ' . $term->title )
@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row ml-5 mr-5 mt-5 mb-2">
            <div class="col-md-2">
                <x-company.logo file="{{  $company->logo }}"></x-company.logo>
            </div>
            <div class="col-md-10">
                <h2>{{ $company->name }}</h2>
                <p>{{ $company->address }}, {{ $company->city }}</p>
                <p>{{ $company->email }}</p>
            </div>
        </div>
        <div class="row ml-5 mr-5 mt-5">
            <div class="col-md-6">
                <h2><span class="text-secondary">Kurs/szkolenie:</span> <span class="text-primary">{{ $course->title }}</span></h2>
                <p></p>
                <h3><span class="text-secondary">Start:</span> {{ $term->from }} <span class="text-secondary">Koniec:</span> {{ $term->to }}</h3>
                <p></p>
                <form action="{{ route('orders.create_client') }}" method="post">
                    <input type="hidden" name="course_id" value="{{ $term->course_id }}">
                    <input type="hidden" name="term_id" value="{{ $term->id }}">
                    <input type="hidden" name="site" value="{{ $site  }}">
                    <input type="hidden" name="partner_code" value="{{ $partner_code }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Imię i nazwisko</label>
                        <input class="form-control" type="text" name="name" value="">
                    </div>
                    <div class="form-group">
                        <label for="tel">Telefon</label>
                        <input class="form-control" type="text" name="tel" value="">
                    </div>
                    <div class="form-group">
                        <label for="email">Adres email</label>
                        <input class="form-control" type="text" name="email" value="">
                    </div>
                    <div class="form-group">
                        <label></label>
                        <input class="btn btn-primary" type="submit" value="zapisz">
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
<script>
    import Input from "@/Jetstream/Input";
    export default {
        components: {Input}
    }
</script>
