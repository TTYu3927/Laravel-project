@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .cat-table {
        width: 100%;
        border-collapse: collapse;
    }

    .cat-table th, .cat-table td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: left;
    }

    .cat-table th {
        background-color: #f2f2f2;
    }

    .btn-add, .btn-edit, .btn-delete {
        text-decoration: none;
        color: white;
        padding: 8px 12px;
        border-radius: 4px;
    }

    .btn-add {
        background-color: #28a745;
    }

    .btn-edit {
        background-color: #007bff;
    }

    .btn-delete {
        background-color: #dc3545;
    }
    .btn-add:hover, .btn-edit:hover, .btn-delete:hover {
        opacity: 0.8;
    }
    .flash-message.success {
        margin-top: 20px;
        padding: 10px;
        background-color: #e6ffed;
        color: #1a7f37;
        border: 1px solid #b6f2c2;
        border-radius: 4px;
    }
    .error-message {
        color: red;
        font-size: 0.9em;
        margin-top: -10px;
        margin-bottom: 10px;
    }
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 30px;
    }

    .pagination ul {
        list-style: none;
        padding: 0;
        display: flex;
    }

    .pagination .page-item {
        margin: 0 5px;
    }

    .pagination .page-link {
        display: block;
        padding: 8px 12px;
        background-color: #fff;
        color: #007bff;
        border: 1px solid #ddd;
        border-radius: 4px;
        text-decoration: none;
        transition: background-color 0.3s, color 0.3s;
        font-size: 14px;
    }

    .pagination .page-link:hover {
        background-color: #007bff;
        color: white;
    }

    .pagination .active .page-link {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }

    .pagination .disabled .page-link {
        color: #6c757d;
        background-color: #f8f9fa;
        border-color: #ddd;
        pointer-events: none;
    }
</style>

</head>
<body>
<h1>Cats</h1>
<a href="{{ route('cats.create') }}" class="btn-add">Add New Cat</a>
@if (session('success'))
    <div class="flash-message success">
        {{ session('success') }}
    </div>
@endif
<table class="cat-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Color</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cats as $cat)
            <tr>
                <td>{{ $cat->name }}</td>
                <td>{{ $cat->color }}</td>
                <td><a href="{{ route('cats.edit', $cat->id) }}" class="btn-edit">Edit</a></td>
                <td>
                    <form action="{{ route('cats.destroy', $cat->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
    <!-- {{ $cats->links() }} -->
  <ul>
    <li class="page-item"><a class="page-link" href="">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
  {{ $cats->links() }}
</div>
@endsection
</body>
</html>


