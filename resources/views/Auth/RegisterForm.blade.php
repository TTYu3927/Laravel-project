@extends('layouts.app')
@section('title', 'Register')
@section('content')
<style>
    .container {
        max-width: 400px;
        margin: 40px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        background-color: #f9f9f9;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .registerbtn {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 12px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    }

    .registerbtn:hover {
        background-color: #45a049;
    }
</style>

<h1>Register</h1>
<form method="POST" action="{{ route('Auth.createUser') }}">
    @csrf
    <div class="container">
        <label for="name"><b>Name</b></label>
        <input type="text" name="name" id="name" required>

        <label for="email"><b>Email</b></label>
        <input type="email" name="email" id="email" required>

        <label for="password"><b>Password</b></label>
        <input type="password" name="password" id="password" required>

        <button type="submit" class="registerbtn">Register</button>
    </div>
</form>
@endsection
