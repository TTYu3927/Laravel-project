<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        padding: 40px;
        color: #333;
    }

    h1 {
        margin-bottom: 20px;
        font-size: 24px;
    }

    form {
        background-color: #fff;
        padding: 20px;
        max-width: 400px;
        border-radius: 6px;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }

    input[type="text"] {
        width: 100%;
        padding: 8px 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
    }

    .error {
        color: brown;
        margin-bottom: 10px;
    }

    button[type="submit"] {
        padding: 10px 16px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>

</head>
<body>
@section('title', 'Edit Category')
@section('content')
    <h1>Edit Category</h1>
    @if (session('success'))
    <div class="flash-message success">
        {{ session('success') }}
    </div>
@endif

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" required>
        @error('name')
            <div style="color: brown;">{{ $message }}</div>
        @enderror
        <button type="submit">Edit</button>
    </form>
</body>
</html>