<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Page</title>
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
</head>

<body>
    @extends('layouts.app')
    @section('title', 'About Page')
    @section('content')

 <main class="main-content">
            <div class="container">
                <h1>Let's get in touch!</h1>
                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                <div class="content">
                    <div class="name">
                        <label for="name">Your name:</label><br>
                        <input type="text" name="name" class="form-control">
                        @error('name')
                            <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>

                    <br><br>

                    <div class="email">
                        <label for="email">Your email:</label><br>
                        <input type="email" name="email" class="form-control">
                        @error('email')
                            <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>

                    <br><br>
                    <div class="message">
                        <label for="text">Your message:</label><br>
                        <textarea name="message" class="form-control"></textarea>
                    </div>
                    <br>
                    <button class="btn-contact" type="submit">Send</button>
                </div>
            </form>
            </div>

            @if(session('success'))
            <div class="flash-message success">
             {{ session('success') }}
            </div>
            @endif
       </main>

      


 


    @endsection

</body>

</html>