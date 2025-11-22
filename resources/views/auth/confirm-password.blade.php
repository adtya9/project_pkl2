<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        

         <!-- Toggle Mata -->
                <button type="button"
                        onclick="togglePassword('password','eyeOpen','eyeClosed')"
                        class="absolute inset-y-0 right-3 flex items-center cursor-pointer text-gray-600">
                    <svg id="eyeOpen" class="h-5 w-5 hidden" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-width="2"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-width="2"
                              d="M2.5 12C3.7 7.9 7.5 5 12 5s8.3 2.9 9.5 7c-1.2 4.1-5 7-9.5 7S3.7 16.1 2.5 12z"/>
                    </svg>

                    <svg id="eyeClosed" class="h-5 w-5" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-width="2"
                              d="M3 3l18 18M6.23 6.23A9.95 9.95 0 0112 5c4.5 0 8.27 2.94 9.54 7a9.97 9.97 0 01-4.34 5.08M13.88 18.83A10.05 10.05 0 0112 19c-4.5 0-8.27-2.94-9.54-7a9.96 9.96 0 013.31-4.57"/>
                    </svg>
                </button>
            </div>

             <script>
        function togglePassword(inputId, eyeOpenId, eyeClosedId) {
            const input = document.getElementById(inputId);
            const eyeOpen = document.getElementById(eyeOpenId);
            const eyeClosed = document.getElementById(eyeClosedId);

            if (input.type === "password") {
                input.type = "text";
                eyeOpen.classList.remove("hidden");
                eyeClosed.classList.add("hidden");
            } else {
                input.type = "password";
                eyeOpen.classList.add("hidden");
                eyeClosed.classList.remove("hidden");
            }
        }
    </script>




        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
