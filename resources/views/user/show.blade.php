@extends('layouts.app')

@section('content')

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
          <div id="map_{{ $photo->id }}" style="height: 200px; width: 100%;"></div>

          <script>
              function initMap{{ $photo->id }}() {
                  var myLatLng = {lat: -25.363, lng: 131.044};

                  var map = new google.maps.Map(document.getElementById('map_{{ $photo->id }}'), {
                    zoom: 4,
                    center: myLatLng
                  });

                  var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    title: 'Hello World!'
                  });
              }
              initMap{{ $photo->id }}();
          </script>

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

          </div>
        </div>
      </div>
     @endforeach
  </div>
</section>

@php
  $initMapFunctions = array_map(function($photo) {
    return 'initMap' . $photo->id . '()';
  }, $photos->all());
  $initAllMapsFunctionBody = implode(';', $initMapFunctions);
@endphp

<script>
  function initAllMaps() {
    {!! $initAllMapsFunctionBody !!}
  }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initAllMaps" async defer></script>

@endsection
