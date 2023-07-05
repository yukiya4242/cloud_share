@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-center">
        <div class="w-full lg:w-1/2">
            <div class="bg-white shadow rounded-lg p-6">
                <div class="mb-4 font-bold">Photo</div>

                <div class="mb-4">
                    <img src="{{ Storage::url($photo->filename )}}" alt="Photo" class="w-full">
                </div>

                <div class="mb-4">
                    <div class="font-bold text-lg">タイトル:{{ $photo->title }}</div>
                    <p>説明:{{ $photo->caption }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-center mt-4">
        <form method="POST" action="{{ route('photo.destroy', ['id' => $photo->id]) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                削除
            </button>
        </form>
    </div>
</div>
@endsection
