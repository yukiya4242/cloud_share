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

@andsection