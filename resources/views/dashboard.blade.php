<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-0 m-0">
  <div class="relative w-full h-screen overflow-hidden shadow-lg">
    <img src="{{ asset('build/assets/img/Homepage.png') }}"
         alt="Homepage Background"
         class="absolute inset-0 w-full h-full object-top" />

    <nav class="relative left-4 z-4 flex items-center justify-between px-8 py-10 text-white">
      <ul class="flex space-x-8 text-xl font-semibold items-center">
        <li class="pt-3"><a href="#" class="hover:underline">Discover</a></li>
        <li class="pt-3"><a href="#" class="hover:underline">Offers</a></li>
        <li class="pt-3"><a href="#courts" class="hover:underline">Available Courts</a></li>
      </ul>
      <div class="flex items-center space-x-4 text-xl font-semibold mt-3">
        <form method="GET" action="{{ route('dashboard') }}" class="relative right-10 -mt-1">
          <input type="text" name="search" placeholder="Search...."
                 class="rounded-full py-2 px-6 pr-12 text-white placeholder-white bg-transparent border border-white focus:outline-none focus:ring-2 focus:ring-yellow-400" />
          <button type="submit" class="absolute right-2 top-2 px-2">
            <img src="{{ asset('build/assets/img/Search.png') }}" alt="Search" class="h-6 w-6" />
          </button>
        </form>
        @auth
        <div class="relative right-8">
          <span class="text-white font-semibold mr-4">
            Hi, {{ auth()->user()->name }}
          </span>
          <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" class="text-white font-semibold hover:underline">Logout</button>
          </form>
        </div>
        @else
        <a href="{{ route('login') }}" class="text-white font-semibold hover:underline relative right-8">Login</a>
        @endauth
      </div>
    </nav>

    <div class="relative left-12 top-72 max-w-xl text-white">
      <h1 class="text-7xl font-extrabold mb-0">
        Conquer The <span class="text-yellow-400">Court</span>
      </h1>
      <p class="mb-10 text-2xl">
        Secure your spot, gather your team, and dominate the field with
        <span class="text-yellow-400">Reservo</span>
      </p>
      @auth
      <p class="mb-10 text-2xl">
        Welcome, <span class="text-yellow-400 font-bold">{{ explode('@', auth()->user()->email)[0] }}</span>!
      </p>
      @endauth
      <a href="#courts"
         class="border border-white rounded-full px-20 py-2 text-xl font-semibold hover:bg-white hover:text-black transition">
        Reserve
      </a>
    </div>
  </div>

  <section id="courts" class="py-20 bg-white">
    <h2 class="text-4xl md:text-5xl font-extrabold text-center mb-16 text-yellow-500">
      Top Courts
    </h2>

    <div class="max-w-7xl mx-auto space-y-32">
      <div class="flex flex-col md:flex-row items-center md:items-center gap-12 relative">
        <div class="w-full md:w-1/2">
          <img src="{{ asset('build/assets/img/kemang.png') }}"
               alt="PadelPro Kemang"
               class="w-full rounded-xl object-cover" />
        </div>
        <div class="w-full md:w-1/2 md:text-left flex justify-center absolute right-28 top-20">
          <div class="max-w-xl">
            <h3 class="text-4xl font-bold mb-6">PadelPro Kemang</h3>
            <p class="text-xl text-gray-700 leading-relaxed">
              PadelPro Kemang offers premium padel courts with modern facilities,
              comfortable lounges, and professional-grade equipment, all located
              in the lively area of Kemang. It’s the perfect destination for players
              looking to enjoy casual games, join community events, or compete in
              high-level matches.
            </p>
          </div>
        </div>
      </div>

      <div class="flex flex-col md:flex-row-reverse items-center md:items-center gap-12 relative">
        <div class="w-full md:w-1/2">
          <img src="{{ asset('build/assets/img/bass.png') }}"
               alt="Octo Basketball Court"
               class="w-full rounded-xl object-cover" />
        </div>
        <div class="w-full md:w-1/2 md:text-right flex justify-center absolute left-24 top-20">
          <div class="max-w-xl ml-auto">
            <h3 class="text-4xl font-bold mb-6">Octo Basketball Court</h3>
            <p class="text-xl text-gray-700 leading-relaxed">
              Octo Basketball Court provides a spacious indoor court with excellent
              lighting, quality flooring, and supportive amenities to enhance your game.
              Whether you're training, organizing friendly matches, or hosting a tournament,
              this venue delivers a great basketball experience.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

<section class="bg-white">
  <div class="pt-0 pb-20"> 
    <h2 class="text-4xl md:text-5xl font-extrabold text-center text-yellow-500">
      Where To Play?
    </h2>
  </div>

  <div class="max-w-[1000px] mx-auto overflow-x-auto px-4 scroll-smooth">
    <div class="flex space-x-6 w-max">
    
      <!-- Card 1 -->
      <div class="flex-shrink-0 w-[300px] bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="relative">
          <img src="{{ asset('build/assets/img/wtp1.jpg') }}" alt="Court 1" class="w-full h-48 object-cover">
          <span class="absolute bottom-2 left-2 bg-yellow-400 text-white text-sm font-semibold px-3 py-1 rounded-full">
            New Court!
          </span>
        </div>
        <div class="p-4">
          <h3 class="font-bold text-gray-800 text-lg">Neron Padel Court</h3>
          <div class="flex items-start space-x-3 my-3">
            <div class="bg-gray-100 p-2 rounded text-center">
              <p class="text-xl font-bold">12</p>
              <p class="text-xs text-gray-500 uppercase">Nov</p>
              <p class="text-xs text-gray-400">Tue</p>
            </div>
            <div class="flex flex-col">
              <div class="flex items-center space-x-2">
                <img src="{{ asset('build/assets/img/maps.png') }}" alt="Map Icon" class="h-5 w-5">
                <p class="text-sm text-gray-600">Ahmad Yani Street No. 7</p>
              </div>
              <p class="text-sm text-yellow-500 mt-2">⭐⭐⭐⭐☆ (4.5)</p>
              <p class="text-sm text-gray-700 font-semibold mt-2">
                Rp 150,000 <span class="text-gray-500">/ hour</span>
              </p>
            </div>
          </div>
          <div class="flex space-x-2 mb-4">
            <button class="border px-3 py-1 rounded-full text-sm hover:bg-yellow-400 hover:text-white">3:00 PM</button>
            <button class="border px-3 py-1 rounded-full text-sm hover:bg-yellow-400 hover:text-white">4:00 PM</button>
            <button class="border px-3 py-1 rounded-full text-sm hover:bg-yellow-400 hover:text-white">5:00 PM</button>
          </div>
          <button class="bg-yellow-400 text-white w-full py-2 rounded-full font-semibold hover:bg-yellow-500">
            Details
          </button>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="flex-shrink-0 w-[300px] bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="relative">
          <img src="{{ asset('build/assets/img/wtp2.jpg') }}" alt="Court 2" class="w-full h-48 object-cover">
          <span class="absolute bottom-2 left-2 bg-yellow-500 text-white text-sm font-semibold px-3 py-1 rounded-full">
            Top Court!
          </span>
        </div>
        <div class="p-4">
          <h3 class="font-bold text-gray-800 text-lg">Octo Basketball Arena</h3>
          <div class="flex items-start space-x-3 my-3">
            <div class="bg-gray-100 p-2 rounded text-center">
              <p class="text-xl font-bold">12</p>
              <p class="text-xs text-gray-500 uppercase">Nov</p>
              <p class="text-xs text-gray-400">Tue</p>
            </div>
            <div class="flex flex-col">
              <div class="flex items-center space-x-2">
                <img src="{{ asset('build/assets/img/maps.png') }}" alt="Map Icon" class="h-5 w-5">
                <p class="text-sm text-gray-600">Merdeka Street No. 10</p>
              </div>
              <p class="text-sm text-yellow-500 mt-2">⭐⭐⭐⭐⭐ (5.0)</p>
              <p class="text-sm text-gray-700 font-semibold mt-2">Rp 200,000 <span class="text-gray-500">/ hour</span></p>
            </div>
          </div>
          <div class="flex space-x-2 mb-4">
            <button class="border px-3 py-1 rounded-full text-sm hover:bg-yellow-400 hover:text-white">3:00 PM</button>
            <button class="border px-3 py-1 rounded-full text-sm hover:bg-yellow-400 hover:text-white">4:00 PM</button>
            <button class="border px-3 py-1 rounded-full text-sm hover:bg-yellow-400 hover:text-white">5:00 PM</button>
          </div>
          <button class="bg-yellow-400 text-white w-full py-2 rounded-full font-semibold hover:bg-yellow-500">
            Details
          </button>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="flex-shrink-0 w-[300px] bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="relative">
          <img src="{{ asset('build/assets/img/wtp3.jpg') }}" alt="Court 3" class="w-full h-48 object-cover">
          <span class="absolute bottom-2 left-2 bg-yellow-400 text-white text-sm font-semibold px-3 py-1 rounded-full">
            Popular!
          </span>
        </div>
        <div class="p-4">
          <h3 class="font-bold text-gray-800 text-lg">Bandung Padel Club</h3>
          <div class="flex items-start space-x-3 my-3">
            <div class="bg-gray-100 p-2 rounded text-center">
              <p class="text-xl font-bold">12</p>
              <p class="text-xs text-gray-500 uppercase">Nov</p>
              <p class="text-xs text-gray-400">Tue</p>
            </div>
            <div class="flex flex-col">
              <div class="flex items-center space-x-2">
                <img src="{{ asset('build/assets/img/maps.png') }}" alt="Map Icon" class="h-5 w-5">
                <p class="text-sm text-gray-600">Braga Street No. 8</p>
              </div>
              <p class="text-sm text-yellow-500 mt-2">⭐⭐⭐⭐ (4.0)</p>
              <p class="text-sm text-gray-700 font-semibold mt-2">Rp 180,000 <span class="text-gray-500">/ hour</span></p>
            </div>
          </div>
          <div class="flex space-x-2 mb-4">
            <button class="border px-3 py-1 rounded-full text-sm hover:bg-yellow-400 hover:text-white">3:00 PM</button>
            <button class="border px-3 py-1 rounded-full text-sm hover:bg-yellow-400 hover:text-white">4:00 PM</button>
            <button class="border px-3 py-1 rounded-full text-sm hover:bg-yellow-400 hover:text-white">5:00 PM</button>
          </div>
          <button class="bg-yellow-400 text-white w-full py-2 rounded-full font-semibold hover:bg-yellow-500">
            Details
          </button>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="flex-shrink-0 w-[300px] bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="relative">
          <img src="{{ asset('build/assets/img/wtp4.jpeg') }}" alt="Court 4" class="w-full h-48 object-cover">
          <span class="absolute bottom-2 left-2 bg-yellow-400 text-white text-sm font-semibold px-3 py-1 rounded-full">
            Hot Spot!
          </span>
        </div>
        <div class="p-4">
          <h3 class="font-bold text-gray-800 text-lg">Cihampelas Indoor Court</h3>
          <div class="flex items-start space-x-3 my-3">
            <div class="bg-gray-100 p-2 rounded text-center">
              <p class="text-xl font-bold">12</p>
              <p class="text-xs text-gray-500 uppercase">Nov</p>
              <p class="text-xs text-gray-400">Tue</p>
            </div>
            <div class="flex flex-col">
              <div class="flex items-center space-x-2">
                <img src="{{ asset('build/assets/img/maps.png') }}" alt="Map Icon" class="h-5 w-5">
                <p class="text-sm text-gray-600">Cihampelas Street No. 15</p>
              </div>
              <p class="text-sm text-yellow-500 mt-2">⭐⭐⭐☆ (3.5)</p>
              <p class="text-sm text-gray-700 font-semibold mt-2">Rp 120,000 <span class="text-gray-500">/ hour</span></p>
            </div>
          </div>
          <div class="flex space-x-2 mb-4">
            <button class="border px-3 py-1 rounded-full text-sm hover:bg-yellow-400 hover:text-white">3:00 PM</button>
            <button class="border px-3 py-1 rounded-full text-sm hover:bg-yellow-400 hover:text-white">4:00 PM</button>
            <button class="border px-3 py-1 rounded-full text-sm hover:bg-yellow-400 hover:text-white">5:00 PM</button>
          </div>
          <button class="bg-yellow-400 text-white w-full py-2 rounded-full font-semibold hover:bg-yellow-500">
            Details
          </button>
        </div>
      </div>
    </div>
  </div>
</section>


   <div class="text-center mt-16">
    <a href="#"
       class="border border-yellow-400 text-yellow-500 hover:bg-yellow-400 hover:text-white transition px-8 py-2 rounded-full font-semibold relative bottom-6">
      See More
    </a>
  </div>

</section>

<footer class="bg-amber-400 text-black py-12 px-8">
  <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-12">

    <!-- Brand & Description -->
    <div>
      <div class="flex items-center space-x-2 relative right-20">
        <img src="{{ asset('build/assets/img/logo.png') }}" alt="Reservo Logo" class="h-10 w-auto">
        <h2 class="text-2xl font-extrabold">RESERVO</h2>
      </div>
      <p class="mt-4 text-sm leading-relaxed relative right-20">
        Reservo is a smart booking app that makes it easy to reserve sports courts, 
        venues, and more, anytime, anywhere.
      </p>
    </div>

    <!-- Products -->
    <div>
      <h3 class="text-lg font-bold mb-4">Products</h3>
      <ul class="space-y-2">
        <li><a href="#" class="hover:underline">Padel</a></li>
        <li><a href="#" class="hover:underline">Badminton</a></li>
        <li><a href="#" class="hover:underline">Basketball</a></li>
        <li><a href="#" class="hover:underline">Tennis</a></li>
      </ul>
    </div>

    <!-- Contact -->
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

  <!-- Bottom Section -->
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
