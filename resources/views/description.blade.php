<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>{{ $court->name }} - Court Detail</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .date-selected { background-color: #facc15 !important; color: black !important; border-color: #facc15 !important; transition: 0.3s ease;}
    .time-selected { background-color: #facc15 !important; border-color: #facc15 !important; color: #000000ff !important; transition: 0.3s ease;}
    .date-btn:hover, .time-slot:hover { transform: scale(1.03); transition: transform 0.2s; }
  </style>
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

  <a href="{{ route('see-more') }}" class="flex items-center text-gray-600 hover:text-yellow-500 mb-6 relative left-36 top-12">
    <img src="{{ asset('assets/img/arrow.png') }}" alt="Back" class="w-5 h-5 mr-2">
    <span class="text-sm font-medium">Back To Courts</span>
  </a>

  <main class="max-w-7xl mx-auto px-4 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
      <div>
        <img src="{{ asset($court->image) }}" alt="{{ $court->name }}" class="w-full h-80 object-cover rounded-lg shadow-md">
        <div class="flex space-x-3 mt-4">
          <img src="{{ asset($court->image) }}" class="w-24 h-24 object-cover rounded-md cursor-pointer hover:opacity-80 transition">
          <img src="{{ asset('assets/img/lebron.jpg') }}" class="w-24 h-24 object-cover rounded-md cursor-pointer hover:opacity-80 transition">
          <img src="{{ asset('assets/img/street.jpg') }}" class="w-24 h-24 object-cover rounded-md cursor-pointer hover:opacity-80 transition">
        </div>
        <div class="flex items-center mt-6 space-x-4">
          <img src="{{ asset('assets/img/lpay.png') }}" alt="Logo" class="w-12 h-12 rounded-md shadow">
          <div>
            <h3 class="font-bold text-lg">{{ $court->name }}</h3>
            <p class="text-sm text-gray-700">{{ $court->address }}</p>
            <p class="text-sm text-gray-600"><a href="#" class="text-yellow-500 font-semibold">@reservoid</a> | <a href="#" class="text-yellow-500 font-semibold">tiktok.com/@reservoid</a></p>
          </div>
        </div>
      </div>

      <div>
        <h2 class="text-3xl font-bold">{{ $court->name }}</h2>
        <p class="text-gray-700 mt-2">{{ $court->address }}, {{ $court->city }} <a href="https://maps.google.com/?q={{ urlencode($court->address) }}" class="text-yellow-500 font-semibold">Maps ></a></p>
        <h3 class="text-xl font-semibold mt-4">{{ $court->price_range }}</h3>

        <div class="flex items-center space-x-2 mt-6 mb-3">
          <img src="{{ asset('assets/img/cal.png') }}" alt="calendar" class="w-5 h-5">
          <select id="monthSelect" class="text-black font-semibold bg-transparent focus:outline-none">
            <option value="{{ now()->month }}">{{ now()->format('F') }}</option>
            <option value="{{ now()->addMonth()->month }}">{{ now()->addMonth()->format('F') }}</option>
          </select>
        </div>

        <div id="dateContainer" class="flex flex-wrap gap-2 mb-4"></div>
        <div id="timeContainer" class="flex flex-wrap gap-3 mb-6"></div>

        <button id="reserveButton" class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold rounded-md px-8 py-3 w-full shadow-md transition">
          Reserve
        </button>
      </div>
    </div>

    <div class="mt-12 border-t pt-6">
      <div class="flex space-x-6 border-b border-gray-300 mb-4 pb-2">
        <button id="descTab" class="font-bold text-yellow-500 border-b-2 border-yellow-500 pb-2">Description</button>
        <button id="rulesTab" class="text-gray-600 hover:text-yellow-500 pb-2">Rules</button>
      </div>

      <div id="descContent" class="text-gray-700 leading-relaxed text-sm">
        <p>{{ $court->description }}</p>
        @if($court->meta)
        <div class="mt-4 text-sm space-y-1">
          <p><b>Width:</b> {{ $court->meta['width'] ?? '-' }}</p>
          <p><b>Length:</b> {{ $court->meta['length'] ?? '-' }}</p>
          <p><b>Type:</b> {{ $court->meta['type'] ?? $court->type }}</p>
        </div>
        @endif
      </div>

      <div id="rulesContent" class="hidden text-gray-700 leading-relaxed text-sm">
        <ol class="list-decimal ml-6 space-y-1">
          <li>Court use by booking only.</li>
          <li>Wear non-marking shoes.</li>
          <li>No food or drink on the court.</li>
          <li>Respect staff and players.</li>
          <li>Keep the court clean.</li>
          <li>Leave on time after session.</li>
        </ol>
      </div>
    </div>

    <div class="mt-16">
      <h3 class="text-2xl font-bold mb-6">Recommendation</h3>
      <div class="flex space-x-6 overflow-x-auto pb-4">
        @foreach(\App\Models\Court::inRandomOrder()->take(3)->get() as $rec)
        <div class="flex-shrink-0 w-72 rounded-xl overflow-hidden shadow-lg">
          <img src="{{ asset($rec->image) }}" alt="{{ $rec->name }}" class="w-full h-40 object-cover" />
          <div class="bg-yellow-400 p-4 flex flex-col justify-between h-32">
            <h3 class="text-black font-bold mb-2">{{ $rec->name }}</h3>
            <div class="flex items-center justify-between">
              <div class="flex items-center space-x-2">
                <img src="{{ asset('assets/img/maps.png') }}" alt="Location" class="w-5 h-5" />
                <p class="text-black text-sm">{{ $rec->address }}</p>
              </div>
              <a href="{{ route('description', $rec->id) }}">
                <button class="bg-white text-yellow-600 font-semibold px-4 py-2 rounded">Detail</button>
              </a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </main>

  <script>
const dateContainer = document.getElementById("dateContainer");
const timeContainer = document.getElementById("timeContainer");
const monthSelect = document.getElementById("monthSelect");
const today = new Date();
const courtId = {{ $court->id }};
let selectedScheduleId = null;
let selectedDate = null;

function renderDates() {
    dateContainer.innerHTML = "";

    const selectedMonth = parseInt(monthSelect.value); 
    const selectedYear = today.getFullYear();

    const startDate = new Date(selectedYear, selectedMonth - 1, 1);
    const endDate = new Date(selectedYear, selectedMonth, 0);

    for (let d = new Date(startDate); d <= endDate; d.setDate(d.getDate() + 1)) {

        const iso = d.toISOString().slice(0, 10);
        const isPast = d < new Date(today.toDateString());

        const btn = document.createElement("button");
        btn.className =
            "date-btn border rounded px-3 py-2 min-w-[50px] flex flex-col items-center text-sm border-yellow-400 text-yellow-600 hover:bg-yellow-50 transition";

        btn.innerHTML = `
            <span>${d.toLocaleDateString("en-US", { weekday: "short" })}</span>
            <span>${d.getDate()}</span>
        `;

        if (isPast) {
            btn.classList.add("opacity-40", "cursor-not-allowed");
            btn.disabled = true;
        } else {
            btn.addEventListener("click", () => {
                document.querySelectorAll(".date-btn").forEach(b => b.classList.remove("date-selected"));
                btn.classList.add("date-selected");
                selectedDate = iso;
                loadTimeSlots(iso);
            });
        }

        dateContainer.appendChild(btn);
    }
}

monthSelect.addEventListener("change", renderDates);

async function loadTimeSlots(date) {
    timeContainer.innerHTML = `<p class="text-sm">Loading...</p>`;
    try {
        const res = await fetch(`/api/schedules?court_id=${courtId}&date=${date}`);
        const data = await res.json();

        timeContainer.innerHTML = "";
        const now = new Date();
        const currentDateStr = now.toISOString().slice(0, 10);
        const currentHour = now.getHours();

        if (data.length) {
            data.forEach(s => {
                const btn = document.createElement("button");
                btn.className =
                    "time-slot border border-gray-300 rounded-md px-4 py-2 text-sm font-medium hover:border-yellow-400 hover:text-yellow-600";

                btn.innerHTML = `${s.start_time.slice(0,5)} - ${s.end_time.slice(0,5)}<br>
                    <span class="font-bold">Rp${Number(s.price).toLocaleString("id-ID")}</span>`;

                if (s.is_booked || (date === currentDateStr && parseInt(s.start_time) <= currentHour)) {
                    btn.className = "bg-gray-200 text-gray-400 border rounded-md px-4 py-2 text-sm";
                    btn.disabled = true;
                } else {
                    btn.addEventListener("click", () => {
                        document.querySelectorAll(".time-slot").forEach(x => x.classList.remove("time-selected"));
                        btn.classList.add("time-selected");
                        selectedScheduleId = s.id;
                    });
                }

                timeContainer.appendChild(btn);
            });
        }
    } catch (e) {
        console.error(e);
        timeContainer.innerHTML = `<p class="text-sm text-red-500">Error loading slots</p>`;
    }
}

document.getElementById("reserveButton").addEventListener("click", () => {
    if (!selectedScheduleId) {
        alert("Please select a time slot first!");
        return;
    }

    @if(!auth()->check())
        alert("Please login first!");
        window.location.href = "{{ route('login') }}";
        return;
    @endif
    
    window.location.href = `/payment/${courtId}/${selectedScheduleId}`;
});

renderDates();
</script>

</body>
</html>
