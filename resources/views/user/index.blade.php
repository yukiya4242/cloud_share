@extends('layouts.app')

@section('content')
<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-20">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">ユーザー</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">このアプリを使って新たな仲間を見つけましょう。あなたの興味、専門知識、または目標に合った仲間を探すことができます。あなたがまだ彼らに出会っていないかもしれませんが、ここにはあなたと共有したいと思っている知識と経験を持つ人々がいます。</p>
    </div>
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
      <div class="w-full overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="text-md font-semibold tracking-wide text-left text-white bg-gray-800 uppercase border-b border-gray-600">
              <th class="px-4 py-3">Profile</th>
              <th class="px-4 py-3">Name</th>
              <th class="px-4 py-3">Status</th>
              <th class="px-4 py-3">Date</th>
            </tr>
          </thead>
          <tbody class="bg-white">
            @foreach($users as $user)
            <tr class="text-gray-700">
              <td class="px-4 py-3 border">
                <div class="flex items-center text-sm">
                  <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                    <img alt="team" class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="{{ $user->profile_image ? Storage::url('photos/'.$user->profile_image) : 'https://dummyimage.com/80x80' }}">
                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                  </div>
                  <div>
                    <p class="font-semibold text-black">{{ $user->name }}</p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-ms font-semibold border">
                <a href="{{ route('users.show', ['user' => $user->id]) }}" class="text-blue-500 hover:underline">{{ $user->name }}</a>
              </td>
              <td class="px-4 py-3 text-xs border">
                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> Acceptable </span>
              </td>
              <td class="px-4 py-3 text-sm border">{{ $user->created_at }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
@endsection
