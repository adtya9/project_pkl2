<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}"
        class="bg-amber-500 text-black text-bold p-6 rounded-xl shadow-lg border border-gray-200">
        @csrf

        <!-- Judul -->
        <h2 class="text-2xl font-bold text-center mb-6 text-red-600">
            Login Akun
        </h2>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-black text-bold" />
           <x-text-input id="email" class="block mt-1 w-full text-black"

                type="email"
                name="email"
                :value="old('email')"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-black" />

            <x-text-input id="password"
                class="block mt-1 w-full bg-[#f9fafb] border border-gray-300 text-black"
                type="password"
                name="password"
                required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center text-black">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-red-600 focus:ring-red-600"
                    name="remember">
                <span class="ms-2 text-sm text-black">{{ __('Remember me') }}</span>
            </label>
        </div>

        <!-- Tombol Login + Lupa Password -->
        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a class="text-sm text-black hover:text-[#d97706] transition"
                   href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3 bg-[#d97706] hover:bg-[#c2410c] text-white">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <!-- Tombol Registrasi -->
        <div class="mt-6 text-center">
            <span class="text-black text-sm">Belum punya akun?</span>
            <a href="{{ route('register') }}" class="text-red-600 font-semibold hover:underline ml-1">
                Registrasi
            </a>
        </div>
    </form>

</x-guest-layout>
