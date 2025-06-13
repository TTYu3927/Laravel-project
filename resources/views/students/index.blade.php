@foreach($students as $student)
    <h2>{{ $student->title }}</h2>
    <p>{{ $student->body }}</p>

    <h4>Students:</h4>
    <ul>
        @foreach($student->courses as $course)
            <li>{{ $course->name }}</li>
        @endforeach
    </ul>
@endforeach
