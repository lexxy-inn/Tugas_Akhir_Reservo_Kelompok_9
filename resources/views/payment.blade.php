<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Payment</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white">

  <header class="bg-yellow-400 text-black">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-4 py-4 md:py-6">
      <nav class="flex space-x-8 font-semibold text-lg">
        <a href="{{ route('dashboard') }}" class="hover:underline">Discover</a>
        <a href="{{ route('orders') }}" class="hover:underline">Orders</a>
        <a href="{{ route('see-more') }}" class="hover:underline">Available Courts</a>
      </nav>
      <div class="flex items-center space-x-4">
        <form method="GET" action="#" class="relative hidden md:block">
          <input type="text" placeholder="Search...." class="rounded-full py-2 px-6 pr-10 text-black placeholder-black bg-transparent border border-black focus:outline-none focus:ring-2 focus:ring-yellow-400" />
          <button type="submit" class="absolute right-3 top-2">
            <img src="{{ asset('assets/img/Search2.png') }}" alt="Search" class="h-4.5 w-4.5" />
          </button>
        </form>
        @auth
        <div>
          <span class="text-black font-semibold mr-2 md:mr-4">Hi, {{ auth()->user()->name }}</span>
          <form method="POST" action="{{ route('logout') }}" class="inline">@csrf <button type="submit" class="text-black font-semibold hover:underline">Logout</button></form>
        </div>
        @else
        <a href="{{ route('login') }}" class="text-black font-semibold hover:underline">Login</a>
        @endauth
      </div>
    </div>
  </header>

  <a href="{{ route('description', $court->id) }}" class="flex items-center text-gray-600 hover:text-yellow-500 mb-6 relative left-36 top-12">
    <img src="{{ asset('assets/img/arrow.png') }}" alt="Back" class="w-5 h-5 mr-2">
    <span class="text-sm font-medium">Back To Courts</span>
  </a>

  <main class="max-w-7xl mx-auto px-4 py-8 grid grid-cols-1 lg:grid-cols-2 gap-10">
    <div>
      <img src="{{ asset($court->image) }}" alt="Court Image" class="w-full h-72 object-cover rounded-lg shadow-md">
      <div class="flex items-center mt-6">
        <img src="{{ asset('assets/img/lpay.png') }}" alt="Court Logo" class="w-14 h-14 rounded mr-4">
        <div>
          <h3 class="text-lg font-bold">{{ $court->name }}</h3>
          <p class="text-gray-600 text-sm">{{ $court->address }}</p>
        </div>
      </div>

      <div class="flex items-center space-x-3 mt-4">
        <div class="flex items-center bg-yellow-400 px-3 py-1 rounded-md">
          <img src="{{ asset('assets/img/cal.png') }}" alt="Time" class="w-4 h-4 mr-2">
          <span class="text-sm font-semibold">{{ $schedule->start_time }} - {{ $schedule->end_time }}</span>
        </div>
        <div class="flex items-center bg-yellow-400 px-3 py-1 rounded-md">
          <img src="{{ asset('assets/img/wallet.png') }}" alt="Price" class="w-4 h-4 mr-2">
          <span class="text-sm font-semibold">Rp{{ number_format($schedule->price, 0, ',', '.') }}</span>
        </div>
      </div>
    </div>

    <div>
      <h2 class="text-2xl font-bold mb-4">Reservation Information</h2>

      <form class="space-y-4" method="POST" action="{{ route('payment.process') }}">
        @csrf
        <input type="hidden" name="court_id" value="{{ $court->id }}">
        <input type="hidden" name="schedule_id" value="{{ $schedule->id }}">

        <div>
          <label class="block font-semibold mb-1">Full Name <span class="text-red-500">*</span></label>
          <input type="text" name="name" value="{{ auth()->user()->name ?? '' }}" placeholder="Enter your full name" class="w-full border border-gray-400 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400">
        </div>

        <div>
          <label class="block font-semibold mb-1">Phone Number <span class="text-red-500">*</span></label>
          <input type="text" name="phone" placeholder="Enter your phone number" class="w-full border border-gray-400 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400">
        </div>

        <div>
          <label class="block font-semibold mb-1">Email <span class="text-red-500">*</span></label>
          <input type="email" name="email" value="{{ auth()->user()->email ?? '' }}" placeholder="Enter your email" class="w-full border border-gray-400 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400">
        </div>

        <h3 class="text-xl font-bold mt-6 mb-2">Payment Method</h3>
        <div class="flex items-center space-x-6">
          <label><input type="radio" name="method" value="gopay" required class="mr-2"> <img src="{{ asset('assets/img/gopay.png') }}" alt="Gopay" class="h-8 inline"></label>
          <label><input type="radio" name="method" value="mastercard" class="mr-2"> <img src="{{ asset('assets/img/master.png') }}" alt="Mastercard" class="h-8 inline"></label>
          <label><input type="radio" name="method" value="bca" class="mr-2" checked> <img src="{{ asset('assets/img/bca.png') }}" alt="BCA" class="h-8 inline"></label>
        </div>

        <p class="text-gray-700 mt-4 font-semibold">Your Current Balance:
          <span class="text-green-600">Rp{{ number_format(auth()->user()->wallet->balance ?? 0,0,',','.') }}</span>
        </p>

        <button type="submit" class="w-full mt-4 border border-black rounded-md py-3 font-semibold hover:bg-yellow-400 hover:text-white transition">Pay</button>

        @if(session('error'))
          <p class="text-red-500 font-semibold mt-2">{{ session('error') }}</p>
        @endif
      </form>
    </div>
  </main>
</body>
</html>
