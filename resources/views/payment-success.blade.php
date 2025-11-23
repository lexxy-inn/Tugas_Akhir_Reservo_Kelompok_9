<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Payment Success</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <meta http-equiv="refresh" content="2;url={{ route('orders') }}">
</head>
<body class="flex flex-col items-center justify-center h-screen bg-yellow-100 text-center">
  <img src="{{ asset('assets/img/check.png') }}" class="w-24 mb-4" alt="Success">
  <h1 class="text-3xl font-bold mb-2 text-green-700">Payment Successful!</h1>
  <p class="text-gray-700 mb-6">
    Your booking for <b>{{ $order->court->name }}</b> has been confirmed.<br>
    Schedule: {{ $order->schedule->start_time }} - {{ $order->schedule->end_time }}
  </p>
  <a href="{{ route('orders') }}" class="bg-yellow-400 hover:bg-yellow-500 text-black px-6 py-3 rounded font-semibold">View My Orders</a>
</body>
</html>
