{{-- {@extends('website.course._layout')

@section('content')
<h2>{{ $course->title }}<small> ({{ $course->sections_count }})</small></h2>
<p class="lead">
    {{ $course->description }}
</p>
<hr class="bg-light">
<div>
    <h3>Coures Requirements:</h3>
    <ol>
        @foreach ($requirements as $requirement)
            <li>{{ $requirement->content }}</li>
        @endforeach
    </ol>
</div>
<hr class="bg-light">
<div>
    <ul>
        @foreach ($course->sections as $section)
            <h3>{{ $section->title }}<small> | {{ $section->lectures_count }}</small></h3>
            @foreach ($section->lectures as $lecture)
                <li>{{ $lecture->title }}</li>
            @endforeach
        @endforeach
    </ul>
</div>
@endsection

@section('sidebar')
    <button class="btn btn-danger">Buy</button>
    <a class="btn btn-info" href="{{ route('courses.edit', ['course' => $course->id]) }}">Edit</a>
@endsection --}}
{{ $course }}
