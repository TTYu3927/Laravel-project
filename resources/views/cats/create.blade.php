@extends('layouts.app')
@section('title', 'Categories')
@section('content')

<h1>New Cat</h1>
<form action="{{ route('cats.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}">
    @if ($errors->has('name'))
        <div class="error-message">{{ $errors->first('name') }}</div>
    @endif

    <label for="color">Color:</label>
    <input type="color" id="color" name="color" value="{{ old('color') }}">
    @if ($errors->has('color'))
        <div class="error-message">{{ $errors->first('color') }}</div>
    @endif

    <button type="submit">Create Cat</button>
@endsection