@extends('layouts.master')
@section('title','Lista terminów')
@section('content')
    <h1>Terminy</h1>

    <a class="btn btn-primary" href="{{ route('terms.create', $course_id) }}">dodaj</a><br><br>

    <table class="table table-striped">
        <tr>
            <th>Rozpoczęcie</th>
            <th>Zakończenie</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @foreach($terms as $term)
        <tr>
            <td>{{ $term->from }}</td>
            <td>{{ $term->to }}</td>
            <td><a class="btn btn-primary" href="/terms/{{  $term->id }}/{{ $course_id }}">edycja</a></td>
            <td>
                <form action="{{ route('terms.delete', $term->id) }}" method="post">
                    <input type="hidden" name="course_id" value="{{ $course_id }}">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" class="btn btn-danger" value="usuń termin" onclick="confirm('Jesteś pewny, że chcesz usunąć wybrany termin?')">
                </form>
            </td>
            <td><a class="btn btn-primary" href="/orders/form/{{  $term->id }}">zapisz się</a></td>
        </tr>
        @endforeach
    </table>

@endsection
