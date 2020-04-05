@extends('website.layout')

@section('main-content')
<ol>

    @foreach ($courses as $course)
    <li>
        <a href="{{ route('courses.show', ['course' => $course->id]) }}">
            {{ $course->title }}
        </a>
        <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
            @csrf @method('DELETE')
            <button class="btn btn-outline-danger" type="submit">Delete</button>
        </form>
    </li>
    @endforeach
</ol>
    
@endsection
