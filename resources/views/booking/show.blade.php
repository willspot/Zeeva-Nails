<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Booking Details | Zeeva Nails</title>
  @vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-[#FEEDF8]">
  <x-navbar />

  <section class="max-w-5xl mx-auto mb-80 mt-80 bg-white rounded-2xl shadow p-8 border border-pink-100">
    @if(!$booking)
        <h2 class="text-xl font-semibold text-gray-900">No booking found</h2>
        <p class="text-gray-600 mt-2">Please check your confirmation code and try again.</p>
    @else
        <h2 class="text-2xl font-semibold text-gray-900">Booking Details</h2>
        <div class="mt-4 grid sm:grid-cols-2 gap-4 text-gray-800">
            <div><span class="text-gray-500">Confirmation:</span> <strong>{{ $booking->confirmation_code }}</strong></div>
            <div><span class="text-gray-500">Status:</span>
                @php
                    $badge = [
                        'pending' => 'bg-yellow-100 text-yellow-800',
                        'accepted' => 'bg-green-100 text-green-800',
                        'declined' => 'bg-rose-100 text-rose-800',
                    ][$booking->status] ?? 'bg-gray-100 text-gray-800';
                @endphp
                <span class="px-2 py-1 text-xs rounded-full {{ $badge }}">{{ ucfirst($booking->status) }}</span>
            </div>
            <div><span class="text-gray-500">Name:</span> {{ $booking->full_name }}</div>
            <div><span class="text-gray-500">Email:</span> {{ $booking->email }}</div>
            <div><span class="text-gray-500">Phone:</span> {{ $booking->phone }}</div>
            <div><span class="text-gray-500">Services:</span> {{ collect($booking->services)->join(', ') }}</div>
            <div><span class="text-gray-500">Date:</span>
                {{ $booking->preferred_date ? $booking->preferred_date->format('M d, Y') : '-' }}
            </div>
            <div><span class="text-gray-500">Time:</span> 
                {{ $booking->preferred_time ?? '-' }}
            </div>



        </div>
        @if($booking->special_request)
            <div class="mt-4">
                <div class="text-gray-500">Special Request:</div>
                <div class="mt-1 bg-pink-50 border border-pink-100 rounded-md p-3">{{ $booking->special_request }}</div>
            </div>
        @endif
    @endif
  </section>

  <x-footer />
</body>
</html>
