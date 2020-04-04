@extends('website.layout')

@section('content')
@foreach ($courses as $course)
    {{ $course }}
@endforeach
    
@endsection
