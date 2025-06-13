@extends('layouts.app')
@section('title', 'Home')
@section('content')
<br><br><hr>
<form action="/" enctype="multipart/form-data" method="POST">
    @csrf
    <label for="file">Upload File:</label>
    <input type="file" id="file" name="image" /><br><br>
    <button type="submit">Upload</button>
</form>
<br><br>
<div class="card">
    <!-- @if(session('user'))
    <h2>Welcome! </h2>
    @else
    <h2>Welcome to the Home Page!</h2>
    @endif
    
    <button><a href="logout">Log Out</a></button>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
        Debitis veniam illum laboriosam, numquam commodi earum omnis nobis hic autem sit deserunt tempore, porro nostrum? 
        Autem, doloremque! Sed corporis blanditiis distinctio!</p> -->
        
</div><br><br>

    Hello, {{ $name }}<br>
    The current UNIX timestamp is {{ date('Y-m-d h:i:s', time()) }}<br>
@isset($records)
    @if (count($records) === 1)
        I have one record!
    @elseif (count($records) > 1)
        I have multiple records!
    @else
        I don't have any records!
    @endif
@endisset

    @empty($records)
        $records is "empty"..
    @endempty
    <br><br>
    
    @auth
     The user is authenticated...
    @endauth

    @guest
    The user is not authenticated...
    @endguest
    <br><br>
    @switch($i)
    @case(1)
        First case...
        @break

    @case(2)
        Second case...
        @break

    @default
        Default case...
    @endswitch
    <br><br>
    @for ($i = 0; $i < 10; $i++)
    The current value is {{ $i }}
    @endfor

    @foreach ($users as $user)
        <p>This is user {{ $user['id'] }}</p>
    @endforeach

    @forelse ($users as $user)
        <li>{{ $user['name']}}</li>
    @empty
        <p>No users</p>
    @endforelse
    <!-- {{ $a = 1 }}
    @while ($a < 5)
    <p>I'm looping forever.</p>
    {{ $a++ }}
    @endwhile
 -->
    @unless (Auth::check())
    You are not signed in.
    @endunless
    <br><br>
    
@endsection
