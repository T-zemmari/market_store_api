<x-guest-layout>
    @include('layouts.partials.navbar')

    <div class="w-full h-screen flex justify-center items-center !bg-center !bg-cover"
        style="background:url('{{ asset('/assets/imgs/bg_1.png') }}')">
        <form method="POST" action="{{ route('register') }}"
            class="w-[98%] h-[520px] flex flex-col justify-center p-8 sm:w-[480px] bg-[#2d2828de] sm:p-10 rounded-lg">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" class="text-white"/>
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" class="text-white"/>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Contraseña')" class="text-white"/>

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" class="text-white"/>

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

             <!-- Confirm Password -->
             <div class="mt-4">
                <x-input-label for="register_admin_code" :value="__('¿Eres admin? (Ingresa el codigo admin)')" class="text-white"/>
                <x-text-input id="register_admin_code" class="block mt-1 w-full" type="password"
                    name="register_admin_code" autocomplete="register-admin-code" />

                <!--<x-input-error :messages="$errors->get('register_admin_code')" class="mt-2" />-->
            </div>

            <div class="flex items-center justify-between mt-4">
                <a class="text-sm text-white dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('login') }}">
                    {{ __('Click aqui si ya tienes cuenta') }}
                </a>
                <x-primary-button class="ms-4">
                    {{ __('Registrate') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
