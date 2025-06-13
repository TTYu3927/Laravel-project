@extends('layouts.app')
@section('title', 'Conditional Rendering')
@section('content')
    @php
        $isAdmin = false; 
        @endphp
    @if($isAdmin)

        <h1>Welcome, Admin!</h1>
    @else
        <h1>Welcome, User!</h1>

    @endif
@endsection