<h2>Student: {{ $user->name }}</h2>
<ul>
    @foreach ($enrollments as $enrollment)
        <li>{{ $enrollment->course->title }} |  Stars:   {{ $enrollment->review != null ? $enrollment->review->stars : 'no rating yet!' }}</li>
    @endforeach
</ul>
