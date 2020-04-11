@extends('website.user._layout')

@section('content')
    <ul>
        @foreach ($users as $user)
            <li><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></li>
            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        @endforeach
    </ul>
@endsection
