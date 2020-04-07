@extends('website.course._layout')

@section('content')
<h2>{{ $course->title }}</h2>
<small>{{ $course->calcDuration() }}</small>

<p class="lead">
    {{ $course->description }}
</p>
<h2>Table of Contents</h2>

<ul>
@foreach ($course->sections as $section)
    <li>
        <h3>{{ $section->title }} </h3>
        <small>{{ $section->duration($section->lectures->sum('duration')) }}</small>
        <ul>
            @foreach ($section->lectures as $lecture)
            <li>
                {{ $lecture->title }}
            </li> 
            @endforeach
        </ul>
    </li>
@endforeach
</ul>


@endsection

@section('sidebar')
    <button class="btn btn-danger">Buy</button>
    <a class="btn btn-info" href="{{ route('courses.edit', ['course' => $course->id]) }}">Edit</a>
@endsection 