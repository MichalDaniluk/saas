@extends('layouts.master')
@section('title','Lista kursów')
@section('content')

    <h1>Wykładowcy</h1>

    <a class="btn btn-primary" href="{{ route('instructors.create') }}">dodaj</a><br><br>

    <table class="table table-striped">
        <tr>
            <th>Imię i nazwisko</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @foreach($instructors as $instructor)
        <tr>
            <td><h5>{{ $instructor->name }}</h5></td>
            <td></td>
            <td><a class="btn btn-primary" href="{{ route('instructors.edit', $instructor->id) }}"><i class="fas fa-edit"></i></a></td>
            <td>
                <form action="{{ route('instructors.delete', $instructor->id) }}" method="post">
                    <input type="hidden" name="course_id" value="{{ $instructor->id }}">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" class="btn btn-danger" value="usuń" onclick="confirm('Jesteś pewny, że chcesz usunąć wybranego wykładowcę?')">
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection
