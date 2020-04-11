@extends('website.layout')

@section('title')
    Courses list
@endsection
    

@section('main-content')
    <div class="row">
        <div class="col-8">
            @yield('content')
        </div>
        <div class="col-4">
            @yield('sidebar')
        </div>
    </div>
@endsection