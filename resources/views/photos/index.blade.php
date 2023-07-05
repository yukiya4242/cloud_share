@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-center">
        <div class="w-full lg:w-1/2">
            <form method="GET" action="{{ route('photos.index') }}" class="mb-4">
                <div class="mb-2">
                    <input type="text" name="search" class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-gray font-bold py-2 px-4 rounded">
                    Search
                </button>
            </form>

            @foreach($photos as $photo)
                <div class="bg-white shadow rounded-lg p-6 mb-4">
                    <div class="mb-4 font-bold">Photo</div>

                    <div class="mb-4">
                        <img src="{{ Storage::url($photo->filename )}}" alt="Photo" class="w-full">
                        <h2 class="title-font font-medium text-lg text-gray-900">タイトル: {{ $photo->title }}</h2>
                        <p class="mb-4">説明: {{ $photo->caption }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
