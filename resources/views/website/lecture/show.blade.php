@extends('website.lecture._layout')
    @section('content')
        <div>
            content 2 3rd of the whole width
        </div>
    @endsection
    @section('sidebar')
    <div>
        <ul>
            @foreach ($list[0]->sections as $section)
                <h3>{{ $section->title }}</h3>
                @foreach ($section->lectures as $lecture)
                    <li>{{ $lecture->title }}</li>
                @endforeach
            @endforeach
        </ul>
    </div>
    @endsection
