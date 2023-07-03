@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Photo</div>

        <div class="card-body">
          <img src="{{ Storage::url($photo->filename )}}" alt="Photo" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
</div>

<form method="POST" action="{{ route('photo.destroy', ['id' => $photo->id]) }}">
  @csrf
  @method('DELETE')
  <button type="submit", class="btn btn-danger">削除</button>
</form>

@endsection