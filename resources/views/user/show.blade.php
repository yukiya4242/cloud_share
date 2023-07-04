@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $user->name }}</h1>

    @foreach($photos as $photo)
        <div>
            <img src="{{ Storage::url($photo->filename) }}" alt="Photo">
            <p>{{ $photo->caption }}</p>
        </div>
    @endforeach
</div>
@endsection
