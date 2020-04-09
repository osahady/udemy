{{-- @extends('website.course._layout')

@section('content')
<h2>{{ $course->title }}</h2>
<small>{{ $course->calcDuration() }}</small> |
<small>{{ $course->enrollments->count() }}</small> students enrolled  |
<small>{{ $course->rating()['rating'] }}</small> |
<small>{{ $course->teacher->name }}</small> |
<small>{{ $course->updated_at->format('m/Y') }}</small>

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
<h3>Reviews</h3>
<ul>
@foreach ($course->reviewing() as $review)
    <li>{{ $review }}</li>
@endforeach
</ul>
@endsection

@section('sidebar')
    <button class="btn btn-danger">Buy</button>
    <a class="btn btn-info" href="{{ route('courses.edit', ['course' => $course->id]) }}">Edit</a>
@endsection --}}


{{-- @foreach (json_decode($course->reviewing(), true) as $item)
    <p>{{ $item }}</p>
@endforeach --}}

{{ $course->reviewing() }}