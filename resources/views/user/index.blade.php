@extends('layouts.app')

@section('content')


<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-20">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">ユーザー</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">このアプリを使って新たな仲間を見つけましょう。あなたの興味、専門知識、または目標に合った仲間を探すことができます。あなたがまだ彼らに出会っていないかもしれませんが、ここにはあなたと共有したいと思っている知識と経験を持つ人々がいます。</p>
    </div>
    <div class="flex flex-wrap -m-2">
        @foreach($users as $user)
          <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
              <img alt="team" class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="https://dummyimage.com/80x80">
              <div class="flex-grow">
                <h2 class="text-gray-900 title-font font-medium ml-3">{{ $user->name }}</h2>
                <p class="text-gray-500"></p>
              </div>
            </div>
          </div>
         @endforeach
         </div>
        </div>
    </section>

@endsection
