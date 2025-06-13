@extends('layouts.app')
@section('title', 'Categories')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            background-color: #f4f4f4;
            color: #333;
        }

        h1 {
            margin-bottom: 20px;
        }

        .flash-message.success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-left: 5px solid #28a745;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .btn-add {
            display: inline-block;
            margin-bottom: 20px;
            background-color: #28a745;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 4px;
        }

        .category-table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }

        .category-table th,
        .category-table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .category-table th {
            background-color: #f0f0f0;
        }

        .btn-edit,
        .btn-delete {
            padding: 6px 10px;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-edit {
            background-color: #007bff;
            text-decoration: none;
        }

        .btn-delete {
            background-color: #dc3545;
        }

        .btn-edit:hover {
            background-color: #0056b3;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        form {
            display: inline;
        }
    </style>
</head>
<body>

<h1>Categories</h1>

@if (session('success'))
    <div class="flash-message success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('categories.create') }}" class="btn-add">Create Category</a>

<table class="category-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn-edit">Edit</a>
                </td>
                <td>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete the category?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="pagination">
    {{ $categories->links() }}
</div>
</body>
</html>
@endsection