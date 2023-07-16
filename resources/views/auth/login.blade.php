<!-- component -->
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">


<section class="bg-blueGray-50 h-full">
  <div class="w-full lg:w-4/12 px-4 mx-auto pt-6">
    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0">
      <div class="rounded-t mb-0 px-6 py-6">
        <div class="text-center mb-3">
          <h6 class="text-blueGray-500 text-sm font-bold">
            Sign in with
          </h6>
        </div>
        <div class="btn-wrapper text-center">
          <button class="bg-white active:bg-blueGray-50 text-blueGray-700 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-2 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150" type="button">
            <img alt="..." class="w-5 mr-1" src="https://demos.creative-tim.com/notus-js/assets/img/github.svg">Github</button>
          <button class="bg-white active:bg-blueGray-50 text-blueGray-700 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150" type="button">
            <img alt="..." class="w-5 mr-1" src="https://demos.creative-tim.com/notus-js/assets/img/google.svg">Google </button>

        </div>
        <hr class="mt-6 border-b-1 border-blueGray-300">
      </div>
      <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
        <div class="text-blueGray-400 text-center mb-3 font-bold">
          <small>Or sign in with credentials</small>
        </div>


        <form method="POST" action="{{ route('login') }}">
        @csrf

          <div class="relative w-full mb-3">
            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="email" :value="__('Email')">Email</label>
            <input id="email" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
            type="email"
            name="email"
            placeholder="Email">
          </div>

          <div class="relative w-full mb-3">
            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="password" :value="__('Password')">Password</label>
            <input id="password" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
            type="password"
            name="password"
            :value="old('email')"
            placeholder="Password">
          </div>

          <div>
            <label class="inline-flex items-center cursor-pointer"><input id="remember_me" type="checkbox" class="form-checkbox border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150" name="remember"><span class="ml-2 text-sm font-semibold text-blueGray-600">{{ __('Remember me') }}</span></label>
          </div>

          <div class="flex items-center justify-end mt-4">
              @if (Route::has('password.request'))
                  <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-4" href="{{ route('password.request') }}">
                      {{ __('Forgot your password?') }}
                  </a>
              @endif

              <x-primary-button class="bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="submit">
                  {{ __('Log in') }}
              </x-primary-button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>