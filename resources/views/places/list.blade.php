@extends('layouts.master')
@section('title','Lista miejsc')
@section('content')

    <h1>Miejsca</h1>

    <a class="btn btn-primary" href="{{ route('places.create') }}">dodaj</a><br><br>

    <table class="table table-striped">
        <tr>
            <th>Nazwa</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @foreach($places as $place)
        <tr>
            <td><h5>{{ $place->name }}</h5></td>
            <td></td>
            <td><a class="btn btn-primary" href="{{ route('places.edit', $place->id) }}"><i class="fas fa-edit"></i></a></td>
            <td>
                <form action="{{ route('places.delete', $place->id) }}" method="post">
                    <input type="hidden" name="course_id" value="{{ $place->id }}">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" class="btn btn-danger" value="usuń" onclick="confirm('Jesteś pewny, że chcesz usunąć wybrane miejsce?')">
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection
