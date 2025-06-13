@extends('layouts.app')
@section('title', 'PHP Code Integration')
@section('content')
    @php
    $randomNumber = rand(1, 100);
    @endphp
        <h2>Random Number: {{ $randomNumber }}</h2>
@endsection