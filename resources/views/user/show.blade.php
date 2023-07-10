@extends('layouts.app')

@section('content')

<!--<写真の位置情報をJavaScriptオブジェクトとして作成 -->
<script>
let locations = [
    @foreach($photos as $photo)
    @dump($photo)
    { "id": "{{ $photo->id }}", "lat": {{ $photo->latitude }}, "lng": {{ $photo->longitude }} },
    @endforeach
];
</script>

<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center mb-20">
      <h1 class="text-2xl font-medium title-font mb-4 text-gray-900">{{ $user->name }}さんの投稿</h1>
      <!--<p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of them.</p>-->
    </div>
    <div class="flex flex-wrap -m-4">
       @foreach($photos as $photo)
         <div class="p-4 lg:w-1/4 md:w-1/2">
           <div class="h-full flex flex-col items-center text-center">
             <img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="{{ Storage::url($photo->filename )}}" style="object-fit: cover; width: 200px; height:200px;">
             <div id="map-{{ $photo->id }}" style="height: 200px; width: 100%;"></div>

             <div class="w-full">
               <h2 class="title-font font-medium text-lg text-gray-900">タイトル: {{ $photo->title }}</h2>
               <h3 class="text-gray-500 mb-3">名前: {{ $user->name }}</h3>
               <p class="mb-4">{{ $photo->caption }}</p>

               <form method="POST" action="{{ route('photo.destroy', ['id' => $photo->id]) }}">
                   @csrf
                   @method('DELETE')

               @if(Auth::user()->id == $photo->user_id)
                   <button type="submit" class="btn btn-danger bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('本当に削除しますか')">
                       削除
                   </button>
               @endif
               </form>

               <form method="GET" action="{{ route('photo.edit', ['photo' => $photo->id]) }}">
                   @csrf
                   @method('GET')

               @if(Auth::user()->id == $photo->user_id)
                   <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                       編集
                   </button>
               @endif
               </form>
             </div>
           </div>
         </div>
       @endforeach
    </div>

    <!-- APIの読み込みと初期化は一度だけ行う -->
    <!--<script src="{{ asset('/js/result.js') }}"></script>-->



  </div>
</section>

@endsection
