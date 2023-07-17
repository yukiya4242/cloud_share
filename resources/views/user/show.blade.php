@extends('layouts.app')

@section('content')

<!--<写真の位置情報をJavaScriptオブジェクトとして作成 -->
<script>
let locations = [
    @foreach($photos as $photo)

    { "id": "{{ $photo->id }}", "lat": {{ $photo->latitude }}, "lng": {{ $photo->longitude }} },
    @endforeach
];
</script>
 <!--<script src="{{ asset('/js/result.js') }}"></script>-->

<section class="flex flex-row flex-wrap mx-auto">
<!-- Card Component -->
 @foreach($photos as $photo)
  <div
    class="transition-all duration-150 flex w-full px-4 py-6 md:w-1/4 lg:w-1/4"
  >
    <div
      class="flex flex-col items-stretch min-h-full pb-4 mb-6 transition-all duration-150 bg-white rounded-lg shadow-lg hover:shadow-2xl"
    >
      <div class="md:flex-shrink-0">
        <img
          src="{{ Storage::url($photo->filename )}}"
          alt="Blog Cover"
          class="object-cover object-center w-full h-full block rounded-lg"
          style="height: 200px; width: 300px;"
        />
      </div>
      <div class="flex items-center justify-between px-4 py-2 overflow-hidden">
        <span class="text-xs font-medium text-blue-900 uppercase">
          <a href="#" class="show-map" data-lat="{{ $photo->latitude }}" data-lng="{{ $photo->longitude }}" data-photo-id="{{ $photo->id }}">Mapを表示</a>
        </span>
        <div class="flex flex-row items-center">
          <div
            class="text-xs font-medium text-gray-500 flex flex-row items-center mr-2"
          >
            <svg
              class="w-4 h-4 mr-1"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
              ></path>
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
              ></path>
            </svg>
          </div>

          <div
            class="text-xs font-medium text-gray-500 flex flex-row items-center mr-2"
          >
            <svg
              class="w-4 h-4 mr-1"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"
              ></path>
            </svg>
          </div>

          <div
            class="text-xs font-medium text-gray-500 flex flex-row items-center"
          >
            <svg
              class="w-4 h-4 mr-1"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"
              ></path>
            </svg>
          </div>
        </div>
      </div>
      <hr class="border-gray-300" />
      <div class="flex flex-wrap items-center flex-1 px-4 py-1 text-center mx-auto">
        <h2 class="text-2xl font-bold tracking-normal text-gray-800">Title: {{ $photo->title }}</h2>
      </div>
      <hr class="border-gray-300" />
      <p class="flex flex-row flex-wrap w-full px-4 py-2 overflow-hidden text-sm text-justify text-gray-700">Capation: {{ $photo->caption }}</p>
      <hr class="border-gray-300" />
      <section class="px-2 py-1 pt-2">
        <div class="flex items-center justify-between">
          <div class="flex items-center flex-1">
　　　　　　　<form method="POST" action="{{ route('photo.destroy', ['id' => $photo->id]) }}">
                   @csrf
                   @method('DELETE')

               @if(Auth::user()->id == $photo->user_id)
                   <button type="submit" class="btn btn-danger bg-red-500 hover:bg-red-700 text-white mr-4 font-bold py-1 px-2 rounded text-sm" onclick="return confirm('本当に削除しますか')">
                       削除
                   </button>
               @endif
               </form>

               <form method="GET" action="{{ route('photo.edit', ['photo' => $photo->id]) }}">
                   @csrf
                   @method('GET')

               @if(Auth::user()->id == $photo->user_id)
                   <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-700 rounded text-sm">
                       編集
                   </button>
               @endif
               </form>

          </div>
        </div>
      </section>
    </div>
  </div>
  @endforeach
 </div>
</section>

<!-- モーダルの基本的なHTML -->
<div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="mapModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mapModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
  $('.show-map').on('click', function(e) {
    e.preventDefault();

    var lat = $(this).data('lat');
    var lng = $(this).data('lng');
    var photoId = $(this).data('photo-id');

    var iframe = `<iframe
      id="map-${photoId}"
      width="100%"
      height="450"
      frameborder="0"
      style="border:0"
      src="https://www.google.com/maps/embed/v1/view?zoom=13&center=${lat},${lng}&key={{ config('services.google-map.apikey') }}"
      allowfullscreen>
    </iframe>`;

    $('#mapModal .modal-body').html(iframe);

    $('#mapModal').modal('show');
  });
});
</script>

@endsection


