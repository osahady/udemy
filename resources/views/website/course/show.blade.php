@extends('website.course._layout')

@section('content')
<h2>{{ $course->title }}</h2>
<p class="lead">
    {{ $course->description }}
</p>
@endsection

@section('sidebar')
    <button class="btn btn-danger">Buy</button>
    <a class="btn btn-info" href="{{ route('courses.edit', ['course' => $course->id]) }}">Edit</a>
@endsection
