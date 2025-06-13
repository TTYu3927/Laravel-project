<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="layout-wrapper">
        @include("includes.header")
        <main class="main-content">
            <div class="container">
                <h1>Sign In</h1>
                <form action="{{ route('about.submit') }}" method="POST">
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
                    <div class="password">
                        <label for="email">Password:</label><br>
                        <input type="password" name="password" class="form-control">
                        @error('password')
                            <div style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <br><br>
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
        
    @include("includes.footer")

</div>
</body>
</html>