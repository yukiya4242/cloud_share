@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-center">
        <div class="w-full lg:w-1/2">
            <div class="bg-white shadow rounded-lg p-6">
                <div class="mb-4 font-bold">写真を投稿する</div>

                <div>
                    <form method="POST" action="{{ route('photo.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="photo" class="block text-gray-700">Photo</label>
                            <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" required>

                            @error('photo')
                                <span class="text-red-500 text-sm">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="title" class="block text-gray-700">タイトル</label>
                            <input type="text" id="title" class="form-control @error('title') is-invalide @enderror" name="title" required>

                            @error('title')
                              <span class="text-red-500 text-sm">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="caption" class="block text-gray-700">この写真について</label>
                            <textarea id="caption" class="form-control @error('caption') is-invalid @enderror" name="caption" required></textarea>

                            @error('caption')
                                <span class="text-red-500 text-sm">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                投稿
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
