@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="GET" action="{{ route('photos.index') }}">
                <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>

            @foreach($photos as $photo)
                <div class="card">
                    <div class="card-header">Photo</div>

                    <div class="card-body">
                        <img src="{{ Storage::url($photo->filename )}}" alt="Photo" class="img-fluid">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
