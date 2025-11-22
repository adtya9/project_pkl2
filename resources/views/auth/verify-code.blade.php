<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Kode OTP</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { background-color: #FFFDF2; }
    </style>
</head>
<body class="min-h-screen flex justify-center items-center">

<div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-lg border border-gray-200">

    <h1 class="text-2xl font-bold text-center text-black mb-4">Verifikasi Email Anda</h1>

    <p class="text-center text-gray-600 mb-6">
        Masukkan 6 digit kode OTP yang telah dikirim ke email Anda.
    </p>

    <!-- Pesan error -->
    @if(session('error'))
        <div class="text-red-600 mb-4 text-center font-medium">
            {{ session('error') }}
        </div>
    @endif

    <!-- Pesan info (OTP baru dikirim) -->
    @if(session('info'))
        <div class="text-blue-600 mb-4 text-center font-medium">
            {{ session('info') }}
        </div>
    @endif

    <!-- Form OTP -->
    <form method="POST" action="{{ route('verify.code') }}" id="otpForm">
        @csrf
        <input type="text" name="code" maxlength="6" id="otpInput"
               class="w-full px-4 py-3 mb-4 border rounded-lg text-center tracking-widest text-lg focus:border-black focus:ring-1 focus:ring-black outline-none"
               placeholder="• • • • • •" required>
        <button type="submit" id="verifyBtn"
                class="w-full bg-red-600 text-white py-3 rounded-lg text-lg font-semibold transition duration-200">
            Verifikasi
        </button>
    </form>

    <p id="countdown" class="text-center text-gray-500 mt-3"></p>
</div>

<script>
let timer = 60;
const countdownDisplay = document.getElementById("countdown");
const verifyBtn = document.getElementById("verifyBtn");
const otpForm = document.getElementById("otpForm");

let interval = setInterval(updateTimer, 1000);

function updateTimer() {
    countdownDisplay.textContent = "Kode OTP kedaluwarsa dalam " + timer + " detik";
    timer--;

    if (timer < 0) {
        clearInterval(interval);
        countdownDisplay.textContent = "Kode OTP telah kedaluwarsa!";

        // Tombol berubah jadi Kirim Ulang
        verifyBtn.textContent = "Kirim Ulang Kode";
        verifyBtn.disabled = false;

        // Ubah form action ke route resend OTP
        otpForm.action = "{{ route('resend.otp') }}";

        // Submit form saat tombol diklik
        verifyBtn.onclick = function(e) {
            e.preventDefault(); // supaya tidak bentrok
            otpForm.submit();
        };
    }

    function resendOtp() {
    fetch("{{ route('resend.otp') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({})
    })
    .then(response => response.json())
    .then(data => {
        infoMsg.textContent = data.message; // tampil di bawah tombol
        timer = 60; // reset timer
        interval = setInterval(updateTimer, 1000);

        // Reset tombol jadi Verifikasi
        verifyBtn.textContent = "Verifikasi";
        verifyBtn.classList.remove("bg-yellow-500");
        verifyBtn.classList.add("bg-red-600");

        // Reset onclick ke submit form
        verifyBtn.onclick = function() {
            otpForm.submit();
        };
    })
    .catch(err => console.error(err));
}
}

</script>


</body>
</html>
