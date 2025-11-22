<x-guest-layout>

    <style>
        body {
            background-color: #fffdf2 !important;
        }
        .card {
            background: #ffffff;
            color: #000;
            width: 420px;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.25);
            text-align: center;
            margin: 40px auto;
        }
        .logo-img {
            width: 55px;
            height: 43px;
            transform: scale(1.8);
            transform-origin: center;
            display: block;
            margin: 0 auto 30px;
        }
        input.custom-input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-bottom: 2px solid #c7bca6;
            background: transparent;
            color: #000;
            font-size: 15px;
        }
        input.custom-input:focus {
            outline: none;
            border-bottom: 2px solid #c7bca6;
        }
        .remember {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            margin: 12px 0 20px;
            color: #000;
        }
        .btn-primary {
            width: 100%;
            padding: 12px;
            background: #000;
            color: #fffdf2;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
            font-weight: bold;
        }
        .btn-primary:hover {
            background: #222;
        }
        .footer a { color: #000; font-weight: bold; }

         .separator {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 20px 0;
    color: #555;
    font-size: 13px;
    font-weight: 500;
}

.separator::before,
.separator::after {
    content: "";
    flex: 1;
    height: 1px;
    background: #c7bca6;
    margin: 0 10px;
}

    </style>

    <div class="card">

        <!-- Logo -->
        <img src="{{ asset('OIP2.png') }}" class="logo-img" alt="Logo">

        <h2 class="text-xl font-bold mb-4">Login Akun</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <x-text-input id="email" 
             type="email"
                   name="email"
                   class="custom-input"
                   placeholder="Email"
                   required
                   value="{{ old('email') }}" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />

            <!-- PASSWORD -->
            <div class="relative mt-2">
                <x-text-input id="password"
                type="password"
                       id="password"
                       name="password"
                       class="custom-input pr-10"
                       placeholder="Password"
                       required />

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

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />

            <!-- REMEMBER -->
            <div class="remember mt-1">
                <label class="flex items-center gap-1">
                    <input type="checkbox" name="remember">
                    <span class= "text-sm">Ingat aku</span>
                </label>

                <a href="{{ route('password.request') }}" class = "hover:underline ml-1 text-sm">Lupa Password?</a>
            </div>

            <button class="btn-primary">Login</button>
        </form>

        <div class="separator ">
    <span>atau</span>
</div>

        <!-- REGISTER -->
        <div class="footer mt-4">
            Belum punya akun?
            <a href="{{ route('register') }}" class = "hover:underline ml-1">Registrasi</a>
        </div>

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

</x-guest-layout>



