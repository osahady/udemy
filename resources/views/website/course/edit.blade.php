@extends('website.course._layout')

@section('content')
<h1>Creating an Awsome Course:</h1>
<form method="POST" action="{{ route('courses.update', ['course' => $course->id]) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" id="title" value="{{ $course->title }}"  placeholder="Enter Title">
    </div>
    
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description" rows="3">
            {{ $course->description }}
        </textarea>
    </div>
      
    
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection

@section('sidebar')
    
@endsection