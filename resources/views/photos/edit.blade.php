@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
   <form action="{{ route('photo.update', ['photo' => $photo->id]) }}" method="post" class="bg-white shadow-md rounded px-8 p-6 pb-8 mb-4 mt-3" enctype="multipart/form-data">

        @csrf
        @method('PATCH')

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                タイトル
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" name="title" value="{{ $photo->title }}">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="caption">
                説明
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="caption" type="text" name="caption" value="{{ $photo->caption }}">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="photo">
                投稿写真
            </label>
            <img src="{{ Storage::url($photo->filename) }}" alt="Uploaded photo" style="object-fit: cover; width:400px; height: 400px;">
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="photo" type="file" name="photo">
        </div>

        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                編集
            </button>
        </div>
    </form>
</div>
@endsection
