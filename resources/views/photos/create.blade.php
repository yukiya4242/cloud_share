@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 pt-16">
    <div class="flex justify-center">
        <div class="w-full lg:w-1/2">
            <div class="bg-white shadow-md rounded-lg p-6 mt-3">
                <h2 class="mb-4 text-2xl font-bold text-center text-gray-700">写真を投稿する</h2>

                <div>
                    <form method="POST" action="{{ route('photo.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="photo" class="block text-gray-700 font-semibold">写真</label>
                            <input id="photo" type="file" class="form-input mt-1 block w-full @error('photo') border-red-500 @enderror" name="photo" required>

                            @error('photo')
                                <span class="text-red-500 text-sm">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 font-semibold">タイトル</label>
                            <input type="text" id="title" class="form-input mt-1 block w-full @error('title') border-red-500 @enderror" name="title" required>

                            @error('title')
                              <span class="text-red-500 text-sm">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="caption" class="block text-gray-700 font-semibold">この写真について</label>
                            <textarea id="caption" class="form-input mt-1 block w-full @error('caption') border-red-500 @enderror" name="caption" required></textarea>

                            @error('caption')
                                <span class="text-red-500 text-sm">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
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
