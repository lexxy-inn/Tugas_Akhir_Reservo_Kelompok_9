<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Orders</title>
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
          <input type="text" name="search" placeholder="Search..." class="rounded-full py-2 px-6 pr-10 text-black placeholder-black bg-transparent border border-black focus:outline-none focus:ring-2 focus:ring-yellow-400" />
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

  <main class="max-w-7xl mx-auto mt-10 px-4">
    <h1 class="text-2xl font-bold mb-4">My Orders</h1>

    @if($orders->isEmpty())
      <p class="text-gray-600">You have no orders yet.</p>
    @else
      <div class="space-y-4">
        @foreach($orders as $order)
          <div class="border rounded-lg p-4 shadow flex justify-between items-center">
            <div>
              <h2 class="font-bold">{{ $order->court->name }}</h2>
              <p class="text-sm text-gray-600">{{ $order->date }} | {{ $order->time_slot }}</p>
              <p class="text-sm text-gray-600">Paid via {{ $order->wallet->bank_name ?? 'Wallet' }}</p>
            </div>
            <div class="text-right">
              <p class="text-lg font-bold text-yellow-500">Rp{{ number_format($order->amount, 0, ',', '.') }}</p>
              <p class="text-sm text-green-600">{{ ucfirst($order->status) }}</p>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </main>

  <footer class="bg-amber-400 text-black py-12 px-8">
  <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-12">

    <div>
      <div class="flex items-center space-x-2 relative right-20">
        <img src="{{ asset('assets/img/logo.png') }}" alt="Reservo Logo" class="h-10 w-auto">
        <h2 class="text-2xl font-extrabold">RESERVO</h2>
      </div>
      <p class="mt-4 text-sm leading-relaxed relative right-20">
        Reservo is a smart booking app that makes it easy to reserve sports courts, 
        venues, and more, anytime, anywhere.
      </p>
    </div>


    <div>
      <h3 class="text-lg font-bold mb-4">Products</h3>
      <ul class="space-y-2">
        <li><a href="#" class="hover:underline">Padel</a></li>
        <li><a href="#" class="hover:underline">Badminton</a></li>
        <li><a href="#" class="hover:underline">Basketball</a></li>
        <li><a href="#" class="hover:underline">Tennis</a></li>
      </ul>
    </div>


    <div>
      <h3 class="text-lg font-bold mb-4">Contact</h3>
      <ul class="space-y-2">
        <li><a href="#" class="hover:underline">Instagram</a></li>
        <li><a href="#" class="hover:underline">YouTube</a></li>
        <li><a href="#" class="hover:underline">TikTok</a></li>
        <li><a href="#" class="hover:underline">Twitter</a></li>
      </ul>
    </div>

    <div>
      <h3 class="text-lg font-bold mb-4">Company</h3>
      <ul class="space-y-2">
        <li><a href="#" class="hover:underline">About Us</a></li>
        <li><a href="#" class="hover:underline">Partnership</a></li>
        <li><a href="#" class="hover:underline">FAQs</a></li>
        <li><a href="#" class="hover:underline">Partner</a></li>
      </ul>
    </div>

  </div>

  
  <div class="border-t border-black mt-10 pt-8 flex flex-col md:flex-row items-center justify-between text-sm">
    <p>© 2025 All Rights Reserved</p>
    <div class="flex space-x-6 mt-4 md:mt-0">
      <a href="#" class="hover:underline">Privacy Policy</a>
      <a href="#" class="hover:underline">Terms & Conditions</a>
      <a href="#" class="hover:underline">Customer Services</a>
    </div>
  </div>
</footer>

</body>
</html>
