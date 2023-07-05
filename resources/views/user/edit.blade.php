@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <form action="{{ route('users.update') }}" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                名前
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" name="name" value="{{ Auth::user()->name }}">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                メールアドレス
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" name="email" value="{{ Auth::user()->email }}">
        </div>

        <!-- プロフィール画像 -->
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="profile_image">
                プロフィール画像
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="profile_image" type="file" name="profile_image">
        </div>

        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                更新
            </button>
        </div>
    </form>
</div>
@endsection
