@extends('website.user._layout')

@section('content')
<form>
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" placeholder="Enter your name">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="{{ $user->email }}" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
    <div class="form-group">
        <textarea name="resume" id="resume" class="form-control" rows="5">{{ $user->resume }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
