<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>
        
        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <i class="fas fa-envelope"></i> <span> Correo</span>
                {{-- <x-jet-label for="email" value="{{ __('Correo') }}" /> --}}
                <x-jet-input id="email" class="block mt-1 w-full" type="email" placeholder="Ingrese Correo" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <i class="fas fa-lock"></i><span> Contraseña</span>
                {{-- <x-jet-label for="password" value="{{ __('Contraseña') }}" /> --}}
                <x-jet-input id="password" class="block mt-1 w-full" type="password" placeholder="Ingrese Constraseña" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
               {{--  @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                    </a>
                @endif --}}
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                    {{ __('no estas registrado? Registrate Ahora!!') }}
                </a>
                <x-jet-button class="ml-4">
                    {{ __('Ingresar') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
