@section('title', 'Edit Cats')
@section('content')
    <h1>Edit Cat</h1>
    @if (session('success'))
    <div class="flash-message success">
        {{ session('success') }}
    </div>
@endif

    <form action="{{ route('cats.update', $cat->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $cat->name) }}">
        @if ($errors->has('name'))
            <div class="error-message">{{ $errors->first('name') }}</div>
        @endif

        <label for="color">Color:</label>
        <input type="color" id="color" name="color" value="{{ old('color', $cat->color) }}">
        @if ($errors->has('color'))
            <div class="error-message">{{ $errors->first('color') }}</div>
        @endif

        <button type="submit">Update Cat</button>
    </form>
    <a href="{{ route('cats.index') }}" class="btn-back">Back to Cats</a>
@endsection