{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
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
    <link rel="stylesheet" href="{{url('css/app.css')}}">
    <title>Nouveau mot de passe</title>
</head>
<body>
    <div class="container py-5">
    <div class="card card-outline-secondary">
        <div class="card-header">
            <h3 class="mb-0">Changer mot de passe</h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
           </div>
            @endif

            <form class="form"  action="{{route('password.update')}}" method="POST">
                 @csrf
                <div class="form-group">
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <label for="inputPasswordOld">Email</label>
                    <input type="email" class="form-control" id="inputPasswordOld" required="" name="email">
                </div>
                <div class="form-group">
                    <label for="inputPasswordNew">Nouveau mot de passe</label>
                    <input type="password" class="form-control" id="inputPasswordNew" required="" name="password">
                  
                </div>
                <div class="form-group">
                    <label for="inputPasswordNewVerify">Confirmer</label>
                    <input type="password" class="form-control" id="inputPasswordNewVerify" required="" name="password_confirmation">
                    <span class="form-text small text-muted">
                        Pour confirmer, tapez à nouveau le nouveau mot de passe.
                        </span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg float-right">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>