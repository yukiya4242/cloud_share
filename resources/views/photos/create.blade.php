@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" class="form-control" name="photo" id="photo">
        </div>

        <div class="form-group">
            <label for="caption">Caption</label>
            <input type="text" class="form-control" name="caption" id="caption">
        </div>

        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
@endsection
