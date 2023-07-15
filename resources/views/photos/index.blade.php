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


    <!-- component -->
<!-- This is an example component -->
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
          style="height: 300px; width: 300px;"
        />
      </div>
      <div class="flex items-center justify-between px-4 py-2 overflow-hidden">
        <span class="text-xs font-medium text-blue-900 uppercase">
          {{ $photo->created_at }}
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
      <section class="px-4 py-2 mt-2">
        <div class="flex items-center justify-between">
          <div class="flex items-center flex-1">
            <img
              class="object-cover h-10 rounded-full"
              src="{{ $photo->user->profile_image ? Storage::url('photos/'.$photo->user->profile_image) : 'https://dummyimage.com/80x80' }}"
              alt="Avatar"
            />
            <div class="flex flex-col mx-2 ml-4">
              <a href="{{ route('users.show', ['user' => $photo->user->id]) }}" class="font-semibold text-gray-700 hover:underline">
                  {{ $photo->user->name }}
              </a>
              <span class="mx-1 text-xs text-gray-600">{{ $photo->updated_at }}</span>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  @endforeach
 </div>
</section>
@endsection


