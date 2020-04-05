@extends('website.course._layout')
@section('content')
@if ($createdCourses)
    <h1>{{ $user->name }} Courses:</h1>
@endif
<ol>
    @forelse ($createdCourses as $course)
    <li> 
        <a href="{{ route('courses.show', $course->id) }}">
            {{ $course->title }}
        </a>
    </li>
    @empty
    <p class="lead">There are no Courses Yet!</p>
    @endforelse 
</ol>
@endsection

@section('sidebar')
    this is the side bar 1/3 rd
@endsection