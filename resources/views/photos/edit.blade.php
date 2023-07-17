@extends('layouts.app')

@section('content')
<div class="h-screen">
	<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
	<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

	<style>
		[x-cloak] {
			display: none;
		}

		[type="checkbox"] {
			box-sizing: border-box;
			padding: 0;
		}

		.form-checkbox,
		.form-radio {
			-webkit-appearance: none;
			-moz-appearance: none;
			appearance: none;
			-webkit-print-color-adjust: exact;
			color-adjust: exact;
			display: inline-block;
			vertical-align: middle;
			background-origin: border-box;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			flex-shrink: 0;
			color: currentColor;
			background-color: #fff;
			border-color: #e2e8f0;
			border-width: 1px;
			height: 1.4em;
			width: 1.4em;
		}

		.form-checkbox {
			border-radius: 0.25rem;
		}

		.form-radio {
			border-radius: 50%;
		}

		.form-checkbox:checked {
			background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M5.707 7.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4a1 1 0 0 0-1.414-1.414L7 8.586 5.707 7.293z'/%3e%3c/svg%3e");
			border-color: transparent;
			background-color: currentColor;
			background-size: 100% 100%;
			background-position: center;
			background-repeat: no-repeat;
		}

		.form-radio:checked {
			background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");
			border-color: transparent;
			background-color: currentColor;
			background-size: 100% 100%;
			background-position: center;
			background-repeat: no-repeat;
		}
	</style>

	<div x-data="app()" x-cloak>
		<div class="max-w-3xl mx-auto px-4 py-10">
		   <form action="{{ route('photo.update', ['photo' => $photo->id]) }}" method="post" class="bg-white shadow-md rounded px-8 p-6 pb-8 mb-4 mt-3" enctype="multipart/form-data">
           @csrf
           @method('PATCH')


				<!-- Step Content -->
				<div class="py-10">
					<div x-show.transition.in="step === 1">
						<div class="mb-5 text-center">
						<div class="md:flex-shrink-0">
                            <img
                              src="{{ Storage::url($photo->filename) }}"
                              alt="Blog Cover"
                              class="object-fill w-50 rounded-lg rounded-b-none md:h-28"
                              style="object-fit: cover; width:670px; height: 400px;"
                            />
                          </div>

						<label
								for="photo"
								type="button"
								class="cursor-pointer inine-flex justify-between items-center focus:outline-none border py-2 px-4 rounded-lg shadow-sm text-left text-gray-600 bg-white hover:bg-gray-100 font-medium mt-2"
							>
								<svg xmlns="http://www.w3.org/2000/svg" class="inline-flex flex-shrink-0 w-6 h-6 -mt-1 mr-1" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<rect x="0" y="0" width="24" height="24" stroke="none"></rect>
									<path d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
									<circle cx="12" cy="13" r="3" />
								</svg>
								Browse Photo
							</label>

							<div class="mx-auto w-48 text-gray-500 text-xs text-center mt-1">Add your photo</div>
							<input id="photo" type="file" name="photo" accept="image/*" class="hidden @error('photo') border-red-500 @enderror" type="file" @change="let file = document.getElementById('profile_image').files[0];
								var reader = new FileReader();
								reader.onload = (e) => image = e.target.result;
								reader.readAsDataURL(file);">

    						  @error('photo')
                                <span class="text-red-500 text-sm">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
						</div>

						<div class="mb-5">
							<label for="title" class="font-bold mb-1 text-gray-700 block">Title</label>
							<input type="text"
								class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium @error('title') border-red-500 @enderror"
								placeholder="Write title..." id="title" type="text" name="title" value="{{ $photo->title }}">

							@error('title')
							<span class="text-red-500 text-sm">
							    <strong>{{ $message }}</strong>
							</span>
							@enderror

						</div>

						<div class="mb-5">
							<label for="caption" class="font-bold mb-1 text-gray-700 block">Caption</label>
							<input type="caption"
								class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium @error('caption') border-red-500 @enderror"
								placeholder="Write photo's caption..." id="caption" type="text" name="caption" value="{{ $photo->caption }}" required>
						</div>

						<div class="mb-5">
							<label for="latitude" class="font-bold mb-1 text-gray-700 block">Latitude</label>
							<input type=""
								class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium @error('latitude') border-red-500 @enderror"
								placeholder="35.658584" id="caption" type="text" name="latitude" value="{{ $photo->latitude }}" required>

								@error('latitude')
                                    <span class="text-red-500 text-sm">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						</div>

						<div class="mb-5">
							<label for="longitude" class="font-bold mb-1 text-gray-700 block">Longitude</label>
							<input type="longitude"
								class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium @error('longitudeå') border-red-500 @enderror"
								placeholder="139.7454316" id="longitude" type="text" name="longitude" value="{{ $photo->longitude }}">

								@error('longitude')
                                <span class="text-red-500 text-sm">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						</div>

						<!-- Location Button -->
						<button id="location-btn" type="button" class="group relative h-12 w-48 overflow-hidden rounded-2xl bg-blue-500 text-lg font-bold text-white">
                          Get your location
                          <div class="absolute inset-0 h-full w-full scale-0 rounded-2xl transition-all duration-300 group-hover:scale-100 group-hover:bg-white/30"></div>
                        </button>

						  <button type="submit" class="group relative h-12 w-48 overflow-hidden rounded-2xl bg-blue-500 text-lg font-bold text-white"> Edit!
                            <div class="absolute inset-0 h-full w-full scale-0 rounded-2xl transition-all duration-300 group-hover:scale-100 group-hover:bg-white/30"></div>
                          </button>
					</div>
				</div>
			</div>
		</div>
</form>
	</div>

	<script>
		function app() {
			return {
				step: 1,
				passwordStrengthText: '',
				togglePassword: false,


				checkPasswordStrength() {
					var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
					var mediumRegex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");

					let value = this.password;

					if (strongRegex.test(value)) {
						this.passwordStrengthText = "Strong password";
					} else if(mediumRegex.test(value)) {
						this.passwordStrengthText = "Could be stronger";
					} else {
						this.passwordStrengthText = "Too weak";
					}
				}
			}
		}
	</script>
@endsection



