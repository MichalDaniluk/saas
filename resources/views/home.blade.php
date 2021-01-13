@extends('layouts.master')
@section('title','`Witaj w systemie')
@section('content')
<div class="container">
<p>Witaj w systemie {{ Auth::user()->name }}</p>
</div>
@endsection
