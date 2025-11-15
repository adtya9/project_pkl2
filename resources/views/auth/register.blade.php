<x-guest-layout>
    <form method="POST" action="{{ route('register') }}"
        class="bg-amber-500 text-black p-6 rounded-xl shadow-lg border border-gray-200">
        @csrf

        <!-- Judul -->
        <h2 class="text-2xl font-bold text-center mb-6 text-red-600">
            Registrasi Akun
        </h2>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="text-black" />
            <x-text-input id="name"
                class="block mt-1 w-full bg-[#f9fafb] border border-gray-300 text-black"
                type="text"
                name="name"
                :value="old('name')"
                required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" class="text-black" />
            <x-text-input id="email"
                class="block mt-1 w-full bg-[#f9fafb] border border-gray-300 text-black"
                type="email"
                name="email"
                :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-black" />
            <x-text-input id="password"
                class="block mt-1 w-full bg-[#f9fafb] border border-gray-300 text-black"
                type="password"
                name="password"
                required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-black" />
            <x-text-input id="password_confirmation"
                class="block mt-1 w-full bg-[#f9fafb] border border-gray-300 text-black"
                type="password"
                name="password_confirmation"
                required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
        </div>

        <div class="flex items-center justify-between mt-6">
            <a class="text-sm text-red-600 hover:underline ml-1" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-3 bg-[#d97706] hover:bg-[#c2410c] text-white">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
