@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Users</h1>

    @foreach($users as $user)
        <div>
            <a href="{{ route('users.show', $user) }}">{{ $user->name }}</a>
        </div>
    @endforeach
</div>
@endsection
