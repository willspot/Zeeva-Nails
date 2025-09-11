<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Booking Lookup | Zeeva Nails</title>
  @vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-[#FEEDF8]">
  <x-navbar />

  <section class="max-w-xl mx-auto mt-32 bg-white rounded-2xl shadow p-8 border border-pink-100">
    <h1 class="text-2xl font-semibold text-gray-900">Find your booking</h1>
    <p class="text-gray-600 mt-1">Enter your confirmation code to view your appointment details.</p>
    <form method="GET" action="{{ route('booking.lookup.show') }}" class="mt-6 flex gap-3">
      <input type="text" name="code" placeholder="e.g. 0019"
             class="flex-1 rounded-md border border-gray-300 bg-pink-50 px-4 py-3 focus:border-pink-400 focus:ring-2 focus:ring-pink-200 outline-none" required>
      <button class="px-5 py-3 rounded-md bg-[#922E71] text-white hover:bg-pink-800">View</button>
    </form>
  </section>

  <x-footer />
</body>
</html>
