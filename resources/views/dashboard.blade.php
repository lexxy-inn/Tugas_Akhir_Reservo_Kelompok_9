<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white-100 p-0 m-0">
  <div class="relative w-full h-screen overflow-hidden shadow-lg">
    <img src="{{ asset('build/assets/img/Homepage.png') }}"
         alt="Homepage Background"
         class="absolute inset-0 w-full h-full object-top" />

    <nav class="relative z-10 flex items-center justify-between px-4 md:px-8 py-6 md:py-10 text-white">
      <ul class="flex space-x-4 md:space-x-8 text-sm md:text-xl font-semibold items-center">
        <li><a href="#" class="hover:underline">Discover</a></li>
        <li><a href="#" class="hover:underline">Offers</a></li>
        <li><a href="#courts" class="hover:underline">Available Courts</a></li>
      </ul>
      <div class="flex items-center space-x-2 md:space-x-4 text-sm md:text-xl font-semibold">
        <form method="GET" action="{{ route('dashboard') }}" class="relative hidden md:block">
          <input type="text" name="search" placeholder="Search...."
                 class="rounded-full py-1 md:py-2 px-4 md:px-6 pr-10 text-white placeholder-white bg-transparent border border-white focus:outline-none focus:ring-2 focus:ring-yellow-400" />
          <button type="submit" class="absolute right-2 top-1 md:top-2">
            <img src="{{ asset('build/assets/img/Search.png') }}" alt="Search" class="h-4 w-4 md:h-6 md:w-6" />
          </button>
        </form>
        @auth
        <div>
          <span class="text-white font-semibold mr-2 md:mr-4">
            Hi, {{ auth()->user()->name }}
          </span>
          <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" class="text-white font-semibold hover:underline">Logout</button>
          </form>
        </div>
        @else
        <a href="{{ route('login') }}" class="text-white font-semibold hover:underline">Login</a>
        @endauth
      </div>
    </nav>

    <div class="relative z-10 px-6 md:left-12 top-40 md:top-72 max-w-xl text-white">
      <h1 class="text-4xl md:text-7xl font-extrabold mb-4 md:mb-0">
        Conquer The <span class="text-yellow-400">Court</span>
      </h1>
      <p class="mb-6 md:mb-10 text-lg md:text-2xl">
        Secure your spot, gather your team, and dominate the field with
        <span class="text-yellow-400">Reservo</span>
      </p>
      @auth
      <p class="mb-6 md:mb-10 text-lg md:text-2xl">
        Welcome, <span class="text-yellow-400 font-bold">{{ explode('@', auth()->user()->email)[0] }}</span>!
      </p>
      @endauth
      <a href="#courts"
         class="border border-white rounded-full px-10 md:px-20 py-2 text-lg md:text-xl font-semibold hover:bg-white hover:text-black transition">
        Reserve
      </a>
    </div>
  </div>

  <section id="courts" class="py-20 bg-white">
    <h2 class="text-3xl md:text-5xl font-extrabold text-center mb-16 text-yellow-500">
      Top Courts
    </h2>

    <div class="max-w-7xl mx-auto space-y-20 md:space-y-32 px-4">
      <div class="flex flex-col md:flex-row items-center gap-8 md:gap-12">
        <div class="w-full md:w-1/2">
          <img src="{{ asset('build/assets/img/kemang.png') }}"
               alt="PadelPro Kemang"
               class="w-full rounded-xl object-cover" />
        </div>
        <div class="w-full md:w-1/2 text-center md:text-left">
          <h3 class="text-2xl md:text-4xl font-bold mb-4 md:mb-6">PadelPro Kemang</h3>
          <p class="text-base md:text-xl text-gray-700 leading-relaxed">
            PadelPro Kemang offers premium padel courts with modern facilities,
            comfortable lounges, and professional-grade equipment, all located
            in the lively area of Kemang.
          </p>
        </div>
      </div>

      <div class="flex flex-col md:flex-row-reverse items-center gap-8 md:gap-12">
        <div class="w-full md:w-1/2">
          <img src="{{ asset('build/assets/img/bass.png') }}"
               alt="Octo Basketball Court"
               class="w-full rounded-xl object-cover" />
        </div>
        <div class="w-full md:w-1/2 text-center md:text-right">
          <h3 class="text-2xl md:text-4xl font-bold mb-4 md:mb-6">Octo Basketball Court</h3>
          <p class="text-base md:text-xl text-gray-700 leading-relaxed">
            Octo Basketball Court provides a spacious indoor court with excellent
            lighting, quality flooring, and supportive amenities to enhance your game.
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-white">
    <div class="pt-0 pb-12"> 
      <h2 class="text-3xl md:text-5xl font-extrabold text-center text-yellow-500">
        Where To Play?
      </h2>
    </div>

    <div class="max-w-[1000px] mx-auto overflow-x-auto px-4 scroll-smooth">
      <div class="flex space-x-6 w-max pb-4">

        <div class="flex-shrink-0 w-[280px] md:w-[300px] bg-white rounded-xl shadow-lg overflow-hidden">
          <div class="relative">
            <img src="{{ asset('build/assets/img/wtp1.jpg') }}" alt="Court 1" class="w-full h-40 md:h-48 object-cover">
            <span class="absolute bottom-2 left-2 bg-yellow-400 text-white text-xs md:text-sm font-semibold px-2 py-1 rounded-full">
              New Court!
            </span>
          </div>
          <div class="p-4">
            <h3 class="font-bold text-gray-800 text-base md:text-lg">Neron Padel Court</h3>
            <p class="text-xs md:text-sm text-gray-600 mt-2">Ahmad Yani Street No. 7</p>
            <p class="text-xs md:text-sm text-yellow-500 mt-2">⭐⭐⭐⭐☆ (4.5)</p>
            <p class="text-xs md:text-sm text-gray-700 font-semibold mt-2">Rp 150,000 / hour</p>
          </div>
        </div>

        <div class="flex-shrink-0 w-[280px] md:w-[300px] bg-white rounded-xl shadow-lg overflow-hidden">
          <div class="relative">
            <img src="{{ asset('build/assets/img/wtp2.jpg') }}" alt="Court 2" class="w-full h-40 md:h-48 object-cover">
            <span class="absolute bottom-2 left-2 bg-yellow-500 text-white text-xs md:text-sm font-semibold px-2 py-1 rounded-full">
              Top Court!
            </span>
          </div>
          <div class="p-4">
            <h3 class="font-bold text-gray-800 text-base md:text-lg">Octo Basketball Arena</h3>
            <p class="text-xs md:text-sm text-gray-600 mt-2">Merdeka Street No. 10</p>
            <p class="text-xs md:text-sm text-yellow-500 mt-2">⭐⭐⭐⭐⭐ (5.0)</p>
            <p class="text-xs md:text-sm text-gray-700 font-semibold mt-2">Rp 200,000 / hour</p>
          </div>
        </div>

        <div class="flex-shrink-0 w-[280px] md:w-[300px] bg-white rounded-xl shadow-lg overflow-hidden">
          <div class="relative">
            <img src="{{ asset('build/assets/img/wtp3.jpg') }}" alt="Court 3" class="w-full h-40 md:h-48 object-cover">
            <span class="absolute bottom-2 left-2 bg-yellow-400 text-white text-xs md:text-sm font-semibold px-2 py-1 rounded-full">
              Popular!
            </span>
          </div>
          <div class="p-4">
            <h3 class="font-bold text-gray-800 text-base md:text-lg">Bandung Padel Club</h3>
            <p class="text-xs md:text-sm text-gray-600 mt-2">Braga Street No. 8</p>
            <p class="text-xs md:text-sm text-yellow-500 mt-2">⭐⭐⭐⭐ (4.0)</p>
            <p class="text-xs md:text-sm text-gray-700 font-semibold mt-2">Rp 180,000 / hour</p>
          </div>
        </div>

        <div class="flex-shrink-0 w-[280px] md:w-[300px] bg-white rounded-xl shadow-lg overflow-hidden">
          <div class="relative">
            <img src="{{ asset('build/assets/img/wtp4.jpeg') }}" alt="Court 4" class="w-full h-40 md:h-48 object-cover">
            <span class="absolute bottom-2 left-2 bg-yellow-400 text-white text-xs md:text-sm font-semibold px-2 py-1 rounded-full">
              Hot Spot!
            </span>
          </div>
          <div class="p-4">
            <h3 class="font-bold text-gray-800 text-base md:text-lg">Cihampelas Indoor Court</h3>
            <p class="text-xs md:text-sm text-gray-600 mt-2">Cihampelas Street No. 15</p>
            <p class="text-xs md:text-sm text-yellow-500 mt-2">⭐⭐⭐☆ (3.5)</p>
            <p class="text-xs md:text-sm text-gray-700 font-semibold mt-2">Rp 120,000 / hour</p>
          </div>
        </div>

      </div>
    </div>

    <div class="text-center mt-10 mb-0">
      <a href="#"
        class="border border-yellow-400 text-yellow-500 hover:bg-yellow-400 hover:text-white transition px-6 md:px-8 py-2 rounded-full font-semibold text-sm md:text-base inline-block">
        See More
      </a>
    </div>
  </section>

  <footer class="bg-amber-400 text-black py-12 px-8 mt-16">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-12">
      <div>
        <div class="flex items-center space-x-2">
          <img src="{{ asset('build/assets/img/logo.png') }}" alt="Reservo Logo" class="h-10 w-auto">
          <h2 class="text-2xl font-extrabold">RESERVO</h2>
        </div>
        <p class="mt-4 text-sm leading-relaxed">
          Reservo is a smart booking app that makes it easy to reserve sports courts, 
          venues, and more, anytime, anywhere.
        </p>
      </div>
      <div>
        <h3 class="text-lg font-bold mb-4">Products</h3>
        <ul class="space-y-2 text-sm">
          <li><a href="#" class="hover:underline">Padel</a></li>
          <li><a href="#" class="hover:underline">Badminton</a></li>
          <li><a href="#" class="hover:underline">Basketball</a></li>
          <li><a href="#" class="hover:underline">Tennis</a></li>
        </ul>
      </div>
      <div>
        <h3 class="text-lg font-bold mb-4">Contact</h3>
        <ul class="space-y-2 text-sm">
          <li><a href="#" class="hover:underline">Instagram</a></li>
          <li><a href="#" class="hover:underline">YouTube</a></li>
          <li><a href="#" class="hover:underline">TikTok</a></li>
          <li><a href="#" class="hover:underline">Twitter</a></li>
        </ul>
      </div>
      <div>
        <h3 class="text-lg font-bold mb-4">Company</h3>
        <ul class="space-y-2 text-sm">
          <li><a href="#" class="hover:underline">About Us</a></li>
          <li><a href="#" class="hover:underline">Partnership</a></li>
          <li><a href="#" class="hover:underline">FAQs</a></li>
          <li><a href="#" class="hover:underline">Partner</a></li>
        </ul>
      </div>
    </div>

    <div class="border-t border-black mt-10 pt-8 flex flex-col md:flex-row items-center justify-between text-xs md:text-sm">
      <p>© 2025 All Rights Reserved</p>
      <div class="flex space-x-4 md:space-x-6 mt-4 md:mt-0">
        <a href="#" class="hover:underline">Privacy Policy</a>
        <a href="#" class="hover:underline">Terms & Conditions</a>
        <a href="#" class="hover:underline">Customer Services</a>
      </div>
    </div>
  </footer>
</body>
</html>
