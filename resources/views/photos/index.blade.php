@extends('layouts.app')

@section('content')

<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center mb-20">
      <h1 class="text-2xl font-medium title-font mb-4 text-gray-900">投稿一覧</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">空からの眺めを共有し、美しい世界を探索しましょう。広大な自然、都市のパノラマ、見事な夕暮れ。あなたが撮影した上空の写真がここで新たな視点を開くかもしれません。未知の景色を発見し、世界を飛び越えて旅する喜びを共有しましょう。</p>
    </div>

    <div class="mb-5">
        <form action="{{ route('photos.index') }}" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ old('search') }}">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">検索</button>
                </span>
            </div>
        </form>
    </div>

    <div class="flex flex-wrap -m-4">
        @foreach($photos as $photo)
            <div class="p-4 lg:w-1/4 md:w-1/2">
                <div class="h-full flex flex-col items-center text-center">
                    <img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="{{ Storage::url($photo->filename )}}" style="object-fit: cover; width: 200px; height:200px;">
                    <iframe
                        id="map-{{ $photo->id }}"
                        width="75%"
                        height="200px"
                        frameborder="0"
                        style="border:0"
                        src="https://www.google.com/maps/embed/v1/view?zoom=13&center={{ $photo->latitude }},{{ $photo->longitude }}&key={{ config('services.google-map.apikey') }}"
                        allowfullscreen>
                    </iframe>

                    <div class="w-full">
                        <h2 class="title-font font-medium text-lg text-gray-900">タイトル: {{ $photo->title }}</h2>
                        <h3 class="text-gray-500 mb-3">投稿者:
                            <a href="{{ route('users.show', ['user' => $photo->user->id]) }}" class="font-bold text-gray-700">
                                {{ $photo->user->name }}
                            </a>
                        </h3>
                        <p class="mb-4">{{ $photo->caption }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection
