@extends('layouts.master')
@section('title','Miejsca')
@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col">
                <h2>{{ $course->title }}</h2>
                <h3>Rozpoczęcie {{ $term->from }} Zakończenie {{ $term->to }}</h3>
            </div>
        </div>
        <form action="{{ route('orders.create') }}" method="post">
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
@endsection
<script>
    import Input from "@/Jetstream/Input";
    export default {
        components: {Input}
    }
</script>
