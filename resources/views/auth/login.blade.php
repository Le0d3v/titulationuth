<x-guest-layout>
    <div id="auth-container">

        <div id="login-form" class="auth-form">
            <p class="text-center text-gray-500 text-lg my-3">
                Inicio de Sesión
            </p>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        
            <form method="POST" action="{{ route('login') }}" autocomplete="none">
                @csrf
        
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>
        
                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
        
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
        
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
        
                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Mantener mi Sesión Abierta') }}</span>
                    </label>
                </div>
        
                <div class="flex items-center justify-end mt-4 gap-5">
                    @if (Route::has('password.request'))
                        <a 
                            class="text-sm text-gray-600 hover:text-blue-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" 
                            href="#"
                            onclick="toggleForms('forgot-password')"
                        >
                            {{ __('¿Olvidaste tu Contraseña?') }}
                        </a>
                    @endif
        
                    <x-primary-button class="ms-3">
                        {{ __('Iniciar Sesión') }}
                    </x-primary-button>
                </div>
            </form>
        </div>

        <div id="forgot-password-form" class="auth-form hidden">
            <p class="text-center text-gray-500 text-lg my-3">
                Reestablecer Contraseña
            </p>
            <div class="mb-4 text-sm text-gray-600">
                {{ __('¿Olvidaste tu contraseña? No hay problema. Solo indícanos tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña y podrás elegir una nueva.') }}
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4 gap-5">
                    <a 
                        class="text-sm text-gray-600 hover:text-blue-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" 
                        href="#"
                        onclick="toggleForms('login')"
                    >
                        {{ __('Volver al Login') }}
                    </a>
        
                    <x-primary-button class="ms-3">
                        {{ __('Enviar Enlace') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function toggleForms(form) {
            const loginForm = document.getElementById('login-form');
            const forgotPasswordForm = document.getElementById('forgot-password-form')
            if (form === 'login') {
                forgotPasswordForm.classList.add('hidden')
                loginForm.classList.remove('hidden');
            } else {
                loginForm.classList.add('hidden');
                forgotPasswordForm.classList.remove('hidden')
            }
        }
    
    </script>
</x-guest-layout>
