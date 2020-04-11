<h2>Course: {{ $course->title }}</h2>
<ul>
    @foreach ($enrollments as $enrollment)
        <li>{{ $enrollment->student->name }} |  Stars:   {{ $enrollment->review != null ? $enrollment->review->stars : 'no rating yet!' }}</li>
    @endforeach
</ul>
