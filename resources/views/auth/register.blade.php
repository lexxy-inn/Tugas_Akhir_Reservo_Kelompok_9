<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register</title>
    <link href="{{ asset('css/register.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex">
    <div class="w-1/2 relative h-screen max-h-screen overflow-hidden mr-8">
        <img src="{{ asset('build/assets/img/regis.jpg') }}" alt="Register Background" class="h-full w-full object-cover object-center" />
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 text-white text-3xl font-bold text-center w-full px-4">
            Set Your <span class="text-yellow-400">Game</span><br />
            Play With <span class="text-yellow-400">Ease</span>
        </div>
    </div>
    <div class="w-1/2 flex flex-col justify-center px-16 text-left min-h-screen max-h-screen overflow-hidden">
        <a href="{{ url('/dashboard') }}" class="flex items-center text-gray-600 hover:text-yellow-500 mb-6">
            <img src="{{ asset('build/assets/img/arrow.png') }}" alt="Back" class="w-5 h-5 mr-2">
            <span class="text-sm font-medium">Back to Dashboard</span>
        </a>
        <h1 class="text-4xl font-bold mb-4 text-left">Register</h1>
        <p class="mb-6 text-left">Already have an account? <a href="{{ route('login') }}" class="text-blue-600 underline">Login</a></p>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-4">
                <input id="name" name="name" type="text" placeholder="Enter your name" required autofocus
                    class="w-full border border-gray-400 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-yellow-400" />
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <input id="email" name="email" type="email" placeholder="Enter your email" required
                    class="w-full border border-gray-400 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-yellow-400" />
                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 relative">
                 <input id="password" name="password" type="password" placeholder="Enter your password" required
                    class="w-full border border-gray-400 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-yellow-400" /><i class="bi bi-eye-slash-fill absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 cursor-pointer" id="togglePassword"></i>
                @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm your password" required
                    class="w-full border border-gray-400 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-yellow-400" />
                @error('password_confirmation')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6 flex items-center">
                <input id="terms" name="terms" type="checkbox" class="mr-2" required />
                <label for="terms" class="text-sm">I agree with the terms & conditions</label>
            </div>
            <button type="submit" class="bg-yellow-400 text-black font-semibold py-3 rounded-lg w-full shadow-md hover:bg-yellow-500 transition">
                Register
            </button>
        </form>
    </div>

     <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            this.classList.toggle('bi-eye-fill');
            this.classList.toggle('bi-eye-slash-fill');
        });
    </script>
</body>
</html>
