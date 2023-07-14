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
            <div class="pt-2 relative mx-auto text-gray-600">
                <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                       type="text" name="search" placeholder="Search..." value="{{ old('search') }}">
               <button type="submit" class="ml-2">
                  <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                    viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                    width="512px" height="512px">
                    <path
                      d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                  </svg>
                </button>
            </div>
        </form>
    </div>


    <div class="flex flex-wrap -m-4">
        @foreach($photos as $photo)
            <div class="p-4 lg:w-1/4 md:w-1/2">
                <div class="block relative h-56 rounded overflow-hidden">
                    <img alt="team" class="object-cover object-center w-full h-full block" src="{{ Storage::url($photo->filename )}}">
                </div>
                <div class="mt-4">
                    <h2 class="text-gray-900 tracking-widest text-lg mb-1">Title: {{ $photo->title }}</h2>
                    <h3 class="text-gray-500 title-font text-lg font-medium">Name:
                        <a href="{{ route('users.show', ['user' => $photo->user->id]) }}" class="font-bold text-gray-500">
                            {{ $photo->user->name }}
                        </a>
                    </h3>
                    <p class="mt-1">Capation: {{ $photo->caption }}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection

