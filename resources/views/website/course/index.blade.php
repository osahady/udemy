@extends('website.layout')

@section('main-content')
<ol>

    @foreach ($courses as $course)
    <li>
        <a href="{{ route('courses.show', ['course' => $course->id]) }}">
            {{ $course->title }}
        </a>
        <small>{{ $course->showDuration($coursesDuration[$course->id]) }}</small> (
        {{-- <small>stars: {{$course->rating()["rating"]}}</small> ) --}}
        <small>{{ $course->enrollments->count() }} students enrolled</small>
        <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
            @csrf @method('DELETE')
            <button class="btn btn-outline-danger" type="submit">Delete</button>
        </form>

    </li>
    @endforeach
</ol>

@endsection
