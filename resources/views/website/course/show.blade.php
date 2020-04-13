@extends('website.course._layout')

@section('content')
<h2>{{ $course->title }}</h2>
<small>{{ formatDuration($course->sections->sum('section_duration')) }}</small> |
<small>{{ $course->enrollments_count }}</small> students enrolled  |
<small>{{ formatRating($course->enrollments->sum('stars'), $course->voters) }}</small> |
<small>{{ $course->teacher->name }}</small> |
<small>{{ $course->updated_at->format('m/Y') }}</small>

<p class="lead">
    {{ $course->description }}
</p>

<hr class="bg-light">
<h2>Requirements</h2>
<ol>
    @foreach ($course->requirements as $requirement)
        <li>{{ $requirement->content }}</li>
    @endforeach
</ol>
<hr class="bg-light">
<h2>Table of Contents</h2>

{{-- <ul>
@foreach ($course->sections as $section)
    <li>
        <h3>{{ $section->title }} </h3>
        <small>{{ $section->lectures->count() }}</small> |
        <small>{{ $section->duration($section->lectures->sum('duration')) }}</small>
        <ul>
            @foreach ($section->lectures as $lecture)
            <li>
                {{ $lecture->title }}
                <small>{{ $course->formatDuration($lecture->duration) }}</small>
            </li>
            @endforeach
        </ul>
    </li>
@endforeach
</ul>--}}

<x-course-content :xyz="$course"/>


<hr class="bg-light">
<h3>Reviews</h3>

@foreach ($enrollments as $enrollment)
<div class="row">
    <div class="col-4">
        <h3>{{ $enrollment->student->name }}</h3>
        <img src="{{ $enrollment->student->image->path ?? asset('avatar.jpg') }}" width="100px" alt="There is no image">
        <small>{{ $enrollment->review->created_at->diffForHumans() }}</small>
    </div>
    <div class="col-8">
        <div class="progress">
            <div class="progress-bar progress-bar-striped" style="width:{{ $enrollment->review->stars * 10 }}%"></div>
        </div>

        <p class="lead">
            {{ $enrollment->review->content }}
        </p>
    </div>
</div>
<hr class="bg-light my-5">
@endforeach


@endsection

@section('sidebar')
    <button class="btn btn-danger">Buy</button>
    <a class="btn btn-info" href="{{ route('courses.edit', ['course' => $course->id]) }}">Edit</a>
@endsection
