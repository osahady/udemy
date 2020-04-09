@extends('website.course._layout')

@section('content')
<h2>{{ $course->title }}</h2>
<small>{{ $course->calcDuration() }}</small> |
<<<<<<< HEAD
<small>{{ $course->enrollments->count() }}</small> students enrolled  |
<small>{{ $course->rating()['rating'] }}</small> |
<small>{{ $course->teacher->name }}</small> |
<small>{{ $course->updated_at->format('m/Y') }}</small>
=======
<small>{{ $course->enrollments->count() }} students enrolled</small>
>>>>>>> 06b2091d9440cf2230114907efec168104aff478

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
<<<<<<< HEAD
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

=======
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
>>>>>>> 06b2091d9440cf2230114907efec168104aff478

@endsection

@section('sidebar')
    <button class="btn btn-danger">Buy</button>
    <a class="btn btn-info" href="{{ route('courses.edit', ['course' => $course->id]) }}">Edit</a>
@endsection


    

