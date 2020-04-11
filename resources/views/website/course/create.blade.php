@extends('website.course._layout')

@section('content')
<h1>Creating an Awsome Course:</h1>
<form method="POST" action="{{ route('courses.store') }}">
    @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" id="title"  placeholder="Enter Title">
    </div>
    
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
    </div>
      
    
    <button type="submit" class="btn btn-primary">Create</button>
</form>
@endsection

@section('sidebar')
    
@endsection