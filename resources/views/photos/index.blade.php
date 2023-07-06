@extends('layouts.app')

@section('content')


<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center mb-20">
      <h1 class="text-2xl font-medium title-font mb-4 text-gray-900">投稿一覧</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of them.</p>
    </div>
    <div class="flex flex-wrap -m-4">
        @foreach($photos as $photo)
      <div class="p-4 lg:w-1/4 md:w-1/2">
        <div class="h-full flex flex-col items-center text-center">
          <img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="{{ Storage::url($photo->filename )}}" style="object-fit: cover; width: 200px; height:200px;">

          <div class="w-full">
            <h2 class="title-font font-medium text-lg text-gray-900">タイトル: {{ $photo->title }}</h2>
            <h3 class="text-gray-500 mb-3 font-bold">投稿者:
                <a href="{{ route('users.show', ['user' => $photo->user->id]) }}">
                     {{ $photo->user->name }}
            </h3>
            <p class="mb-4">{{ $photo->caption }}</p>

          </div>
        </div>
      </div>
     @endforeach
  </div>
</section>
@endsection
