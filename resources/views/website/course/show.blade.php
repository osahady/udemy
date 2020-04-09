@extends('website.course._layout')

@section('content')
<h2>{{ $course->title }}</h2>
<small>{{ $course->calcDuration() }}</small> |
<small>{{ $course->enrollments->count() }} students enrolled</small>

<p class="lead">
    {{ $course->description }}
</p>

<hr class="bg-light">
<h2>Requirements</h2>
<ol>
    @foreach ($requirements as $requirement)
        <li>{{ $requirement->content }}</li>
    @endforeach
</ol>
<hr class="bg-light">
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

<hr class="bg-light">
<h2>Reviews</h2>
@foreach ($reviews as $review)
    <div class="row">
        <div class="col-4">
            <p>{{ $review->student->name }}</p>
            <p>{{ $review->student->image->path }}</p>
        </div>
        <div class="col-8">
            <p>{{ $review->review->stars }}</p>
            <p>{{ $review->review->content }}</p>
        </div>
    </div>
@endforeach

@endsection

@section('sidebar')
    <button class="btn btn-danger">Buy</button>
    <a class="btn btn-info" href="{{ route('courses.edit', ['course' => $course->id]) }}">Edit</a>
@endsection
