@extends('website.layout')

@section('main-content')
<ol>

    @foreach ($courses as $course)
    <li>
        <a href="{{ route('courses.show', ['course' => $course->id]) }}">
            {{ $course->title }}
        </a>
        <small>{{ $course->id }}</small> |
        <small>{{ formatDuration($course->sections->sum('section_duration')) }}</small> (
        <small> {{ formatRating($course->enrollments->sum('stars'), $course->voters) }} </small> )
        <small>{{ $course->enrollments_count }} students enrolled</small>
        <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
            @csrf @method('DELETE')
            <button class="btn btn-outline-danger" type="submit">Delete</button>
        </form>

    </li>
    @endforeach
</ol>

<div class="row justify-content-center">{{ $courses->render() }}</div>
@endsection
