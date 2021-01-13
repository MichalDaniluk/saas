@extends('layouts.master')
@section('title','Lista kursów')
@section('content')

    <h1>Szkolenia</h1>

    <a class="btn btn-primary" href="{{ route('courses.create') }}">dodaj</a><br><br>

    <table class="table table-striped">
        <tr>
            <th>Nazwa kursu</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @foreach($courses as $course)
        <tr>
            <td><h5>{{ $course->title }}</h5></td>
            <td>{{ $course->type }}</td>
            <td><a class="btn btn-primary" href="{{ route('courses.edit', $course->id) }}"><i class="fas fa-edit"></i></a></td>
            <td>
                <form action="{{ route('courses.delete', $course->id) }}" method="post">
                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" class="btn btn-danger" value="usuń" onclick="confirm('Jesteś pewny, że chcesz usunąć wybrany kurs?')">
                </form>
            </td>
            <td><a class="btn btn-primary" href="{{ route('terms.list', $course->id) }}"><i class="far fa-calendar-alt"></i></a></td>
            <td><a class="btn btn-success" href="{{ route('terms.create', $course->id) }}"><i class="far fa-calendar-plus"></i></a></td>
        </tr>
        @endforeach
    </table>

@endsection
