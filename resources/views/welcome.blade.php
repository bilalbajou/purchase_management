{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Mot de passe')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié ?') }}
                    </a>
                @endif
                
                <x-button class="ml-3">
                    {{ __('Connecter') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{url('css/login.css')}}" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">        
        <div class="card my-5">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
          <form class="card-body cardbody-color p-lg-5" method="POST" action="{{route('login')}}">
            @csrf
            <div class="text-center">
              <img src="{{url('images/login.png')}}" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px" alt="profile">
            </div>
  
            <div class="mb-3">
              <input type="text" class="form-control" id="Email" aria-describedby="emailHelp" placeholder="Email" name="email" value="{{old('email')}}" autofocus>
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" id="password" placeholder="Mot de passe" name="password">
            </div>
            <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-3 w-100">Connecter</button></div>
              @if (Route::has('password.request'))
                <div id="emailHelp" class="form-text text-center mb-5 text-dark"><a href="{{route('password.request')}}" class="text-dark fw-bold">Mot de passe oublié ? </a>
              </div>
            @endif
          </form>
        </div>
  
      </div>
    </div>
  </div>
  <script src="{{ asset('js/app.js') }}" defer></script>

</body>
</html>



