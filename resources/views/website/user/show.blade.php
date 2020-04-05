@extends('website.user._layout')

@section('content')
    <h2>{{ $user->name }}<small> | {{ $user->locale }}</small></h2>
    <p><span>Email: </span>{{ $user->email }}</p>
    <p><span>Resume: </span>{{ $user->resume }}</p>
    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success">Edit</a>
@endsection
