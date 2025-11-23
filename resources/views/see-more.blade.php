<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>See More Courts</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white">

  <!-- HEADER -->
  <header class="bg-yellow-400 text-black">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-4 py-4 md:py-6">
      <nav class="flex space-x-8 font-semibold text-lg">
        <a href="{{ route('dashboard') }}" class="hover:underline">Discover</a>
        <a href="{{ route('orders') }}">Orders</a>
        <a href="{{ route('see-more') }}" class="hover:underline">Available Courts</a>  
      </nav>

      <div class="flex items-center space-x-4">
        <form method="GET" action="#" class="relative hidden md:block">
          <input type="text" name="search" placeholder="Search..."
            class="rounded-full py-2 px-6 pr-10 text-black placeholder-black bg-transparent border border-black focus:outline-none focus:ring-2 focus:ring-yellow-400" />
          <button type="submit" class="absolute right-3 top-2">
            <img src="{{ asset('assets/img/Search2.png') }}" alt="Search" class="h-4.5 w-4.5" />
          </button>
        </form>

        @auth
        <div>
          <span class="text-black font-semibold mr-2 md:mr-4">
            Hi, {{ auth()->user()->name }}
          </span>
          <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" class="text-black font-semibold hover:underline">Logout</button>
          </form>
        </div>
        @else
        <a href="{{ route('login') }}" class="text-black font-semibold hover:underline">Login</a>
        @endauth
      </div>
    </div>
  </header>

  <section class="bg-white max-w-7xl mx-auto px-4 py-6 shadow-md mt-4 rounded relative">
    <div class="flex items-center space-x-4 mb-4">
      <select id="monthSelect" class="border border-gray-300 rounded px-2 py-1 focus:ring-yellow-400">
        <option value="11">November</option>
        <option value="12">December</option>
      </select>
    </div>

    <div class="overflow-hidden relative">
      <button onclick="prevPage()" 
              class="hidden absolute left-0 top-1/2 -translate-y-1/2 bg-yellow-400 text-white font-bold px-3 py-2 rounded shadow z-10">
        ←
      </button>

      <div id="dateContainer" class="flex space-x-2 transition-transform duration-500 ease-in-out"></div>

      <button onclick="nextPage()" 
              class="absolute right-0 top-1/2 -translate-y-1/2 bg-yellow-400 text-white font-bold px-3 py-2 rounded shadow">
        →
      </button>
    </div>
  </section>

  <main class="w-full max-w-7xl mx-auto px-4 py-8 bg-white rounded mt-4">

    @foreach ($courtsByType as $type => $courts)
      <section class="mb-12 w-full">
        <h2 class="text-2xl font-bold mb-6">{{ $type }} Court</h2>

        <div class="flex space-x-6 overflow-x-auto pb-4">

          @foreach ($courts as $court)
            <div class="flex-shrink-0 w-72 rounded-xl overflow-hidden shadow-lg">

  
              <img src="{{ asset($court->image ?? 'assets/img/default.jpg') }}"
                   alt="{{ $court->name }}"
                   class="w-full h-40 object-cover" />

              <div class="bg-yellow-400 p-4 flex flex-col justify-between h-32">
                <h3 class="text-black font-bold mb-2">{{ $court->name }}</h3>

                <div class="flex items-center justify-between">
                  <div class="flex items-center space-x-2">
                    <img src="{{ asset('assets/img/maps.png') }}" class="w-5 h-5" />
                    
                    <p class="text-black text-sm">{{ $court->location }}</p>
                  </div>

                  <a href="{{ route('description', $court->id) }}"
                     class="bg-white text-yellow-600 font-semibold px-4 py-2 rounded 
                            hover:bg-yellow-500 hover:text-white transition">
                    Detail
                  </a>
                </div>
              </div>
            </div>
          @endforeach

        </div>
      </section>
    @endforeach

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

<script>
  const dateContainer = document.getElementById("dateContainer");
  const monthSelect = document.getElementById("monthSelect");
  const backButton = document.querySelector("button[onclick='prevPage()']");
  const pageByMonth = {};

  let currentPage = 0;
  const daysPerPage = 14;
  const today = new Date().getDate();
  const thisMonth = new Date().getMonth() + 1;
  const thisYear = new Date().getFullYear();
  const daysShort = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"];

  function getDaysInMonth(month, year = thisYear) {
    return new Date(year, month, 0).getDate();
  }

  function renderDates() {
    dateContainer.innerHTML = "";
    const totalDays = getDaysInMonth(parseInt(monthSelect.value));

    for (let d = 1; d <= totalDays; d++) {
      const dateObj = new Date(thisYear, monthSelect.value - 1, d);
      const dayName = daysShort[dateObj.getDay()];

      let btnClass = "border rounded p-2 min-w-[50px] flex flex-col items-center ";

      if (monthSelect.value < thisMonth || (monthSelect.value == thisMonth && d < today)) {
        btnClass += "bg-gray-400 text-white cursor-not-allowed";
      } else if (monthSelect.value == thisMonth && d == today) {
        btnClass += "bg-yellow-400 text-white font-bold";
      } else {
        btnClass += "border-2 border-yellow-400 text-yellow-600 font-bold";
      }

      dateContainer.innerHTML += `
        <button class="${btnClass}">
          <span class="text-xs mb-1">${dayName}</span>
          <span>${d}</span>
        </button>
      `;
    }

    updatePagePosition();
    updateBackButtonVisibility();
  }

  function updatePagePosition() {
    const offset = -currentPage * (daysPerPage * 60);
    dateContainer.style.transform = `translateX(${offset}px)`;
  }

  function updateBackButtonVisibility() {
    backButton.classList.toggle("hidden", currentPage === 0);
  }

  function nextPage() {
    const totalDays = getDaysInMonth(parseInt(monthSelect.value));
    const maxPage = Math.ceil(totalDays / daysPerPage) - 1;
    if (currentPage < maxPage) {
      currentPage++;
      pageByMonth[monthSelect.value] = currentPage;
      updatePagePosition();
      updateBackButtonVisibility();
    }
  }

  function prevPage() {
    if (currentPage > 0) {
      currentPage--;
      pageByMonth[monthSelect.value] = currentPage;
      updatePagePosition();
      updateBackButtonVisibility();
    }
  }

  monthSelect.addEventListener("change", () => {
    currentPage = pageByMonth[monthSelect.value] || 0;
    renderDates();
  });

  renderDates();
  updateBackButtonVisibility();
</script>

</body>
</html>
