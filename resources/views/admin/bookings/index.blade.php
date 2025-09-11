<x-app-layout>
    <x-slot name="header">
        Bookings
    </x-slot>

    {{-- Toast (accept/decline/delete) --}}
    @if (session('toast'))
        <div id="toast"
             class="fixed top-6 left-1/2 -translate-x-1/2 bg-[#922E71] text-white px-5 py-3 rounded-lg shadow-lg z-50 transition duration-500">
            {{ session('toast') }}
        </div>
        <script>
            setTimeout(() => {
                const t = document.getElementById('toast');
                if (t) { t.classList.add('opacity-0', '-translate-y-2'); setTimeout(()=>t.remove(), 500); }
            }, 3000);
        </script>
    @endif

    <div class="space-y-6">

        {{-- Summary Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div class="rounded-xl bg-white shadow p-5 border border-pink-100">
                <div class="text-sm text-gray-500">Pending</div>
                <div class="mt-1 text-3xl font-bold text-[#922E71]">{{ $counts['pending'] }}</div>
            </div>
            <div class="rounded-xl bg-white shadow p-5 border border-pink-100">
                <div class="text-sm text-gray-500">Accepted</div>
                <div class="mt-1 text-3xl font-bold text-green-600">{{ $counts['accepted'] }}</div>
            </div>
            <div class="rounded-xl bg-white shadow p-5 border border-pink-100">
                <div class="text-sm text-gray-500">Declined</div>
                <div class="mt-1 text-3xl font-bold text-rose-600">{{ $counts['declined'] }}</div>
            </div>
        </div>

        {{-- Filter --}}
        <form method="GET" action="{{ route('admin.bookings.index') }}"
              class="bg-white rounded-xl shadow border border-pink-100 p-4 flex items-center gap-3">
            <input type="text" name="code" value="{{ $code }}"
                   placeholder="Filter by confirmation code, email, fullname…"
                   class="w-full sm:w-72 rounded-md border border-gray-300 bg-pink-50 px-3 py-2 focus:border-pink-400 focus:ring-2 focus:ring-pink-200 outline-none">
            <button class="px-4 py-2 rounded-md bg-[#922E71] text-white hover:bg-pink-800">
                Filter
            </button>
            @if($code)
                <a href="{{ route('admin.bookings.index') }}" class="text-sm text-gray-600 hover:text-gray-900">Clear</a>
            @endif
        </form>

        {{-- Table --}}
        <div x-data="{ openDecline: false, openAccept: false, openDelete: false, msg: '', activeId: null, openMenu: null }"
             class="bg-white rounded-xl shadow border border-pink-100 overflow-hidden">
            <div class="hidden sm:block overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-pink-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Code</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Customer</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Services</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Date/Time</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Status</th>
                            <th class="px-4 py-3 text-right text-xs font-semibold text-gray-600 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($bookings as $b)
                            <tr class="hover:bg-pink-50/50">
                                <td class="px-4 py-3 font-semibold text-gray-900">{{ $b->confirmation_code }}</td>
                                <td class="px-4 py-3">
                                    <div class="text-gray-900">{{ $b->full_name }}</div>
                                    <div class="text-xs text-gray-500">{{ $b->email }}</div>
                                </td>
                                <td class="px-4 py-3 text-gray-700">
                                    {{ collect($b->services)->join(', ') }}
                                </td>
                                <td class="px-4 py-3 text-gray-700">
                                    @if($b->preferred_date)
                                        <div>{{ $b->preferred_date->format('M d, Y') }}</div>
                                    @endif
                                    @if($b->preferred_time)
                                        <div class="text-xs text-gray-500">{{ $b->preferred_time }}</div>
                                    @endif
                                </td>




                                <td class="px-4 py-3">
                                    @php
                                        $badge = [
                                            'pending' => 'bg-yellow-100 text-yellow-800',
                                            'accepted' => 'bg-green-100 text-green-800',
                                            'declined' => 'bg-rose-100 text-rose-800',
                                        ][$b->status] ?? 'bg-gray-100 text-gray-800';
                                    @endphp
                                    <span class="px-2 py-1 text-xs rounded-full {{ $badge }}">{{ ucfirst($b->status) }}</span>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex justify-end gap-2">
                                        {{-- View (public detail by code) --}}
                                        <a href="{{ route('booking.lookup.show', ['code' => $b->confirmation_code]) }}"
                                        target="_blank"
                                        class="px-3 py-1.5 rounded-md border text-[#922E71] border-pink-300 hover:bg-pink-50 text-sm">
                                            View
                                        </a>

                                        @if($b->status === 'pending')
                                            {{-- Accept --}}
                                            <button type="button"
                                                    @click="openAccept = true; activeId = {{ $b->id }}; msg = 'Great news! Your appointment at Zeeva Nails has been confirmed.\nWe can’t wait to pamper you 🌸';"
                                                    class="px-3 py-1.5 rounded-md bg-green-600 text-white hover:bg-green-700 text-sm">
                                                Accept
                                            </button>

                                            {{-- Decline --}}
                                            <button type="button"
                                                    @click="openDecline = true; activeId = {{ $b->id }}; msg = 'We’re sorry — we can’t honor the selected time.\nPlease reply to this email or rebook a new time. 💖';"
                                                    class="px-3 py-1.5 rounded-md bg-rose-600 text-white hover:bg-rose-700 text-sm">
                                                Decline
                                            </button>
                                        @elseif($b->status === 'accepted')
                                            {{-- Accept (disabled) --}}
                                            <button type="button"
                                                    disabled
                                                    class="px-3 py-1.5 rounded-md bg-green-200 text-white cursor-not-allowed text-sm">
                                                Accepted
                                            </button>

                                            {{-- Revoke (sets back to pending) --}}
                                            <form method="POST" action="{{ route('admin.bookings.revoke', $b) }}">
                                                @csrf
                                                @method('PATCH')
                                                <button class="px-3 py-1.5 rounded-md bg-yellow-500 text-white hover:bg-yellow-600 text-sm">
                                                    Revoke
                                                </button>
                                            </form>
                                        @elseif($b->status === 'declined')
                                            {{-- Accept (active again) --}}
                                            <button type="button"
                                                    @click="openAccept = true; activeId = {{ $b->id }}; msg = 'Great news! Your appointment at Zeeva Nails has been confirmed.\nWe can’t wait to pamper you 🌸';"
                                                    class="px-3 py-1.5 rounded-md bg-green-600 text-white hover:bg-green-700 text-sm">
                                                Accept
                                            </button>

                                            {{-- Decline (disabled) --}}
                                            <button type="button"
                                                    disabled
                                                    class="px-3 py-1.5 rounded-md bg-rose-200 text-white cursor-not-allowed text-sm">
                                                Declined
                                            </button>
                                        @endif

                                        {{-- Delete --}}
                                        <button type="button"
                                                @click="openDelete = true; activeId = {{ $b->id }}"
                                                class="px-3 py-1.5 rounded-md bg-gray-200 text-gray-800 hover:bg-gray-300 text-sm">
                                            Delete
                                        </button>
                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr><td colspan="6" class="px-4 py-6 text-center text-gray-500">No bookings found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Mobile cards -->
            <div class="sm:hidden divide-y divide-gray-200 text-sm">
                @foreach ($bookings as $b)
                    <div class="p-3">
                        <div class="flex justify-between items-start">
                            <div>
                                <div class="font-semibold text-gray-900">{{ $b->confirmation_code }}</div>
                                <div class="text-gray-700 text-xs">{{ $b->full_name }} ({{ $b->email }})</div>
                                <div class="text-gray-600 text-xs mt-1">{{ collect($b->services)->join(', ') }}</div>
                                @if($b->preferred_date)
                                    <div class="text-xs text-gray-500 mt-1">{{ $b->preferred_date->format('M d, Y') }} {{ $b->preferred_time }}</div>
                                @endif
                                <span class="inline-block mt-1 px-2 py-0.5 text-xs rounded-full
                                    {{ $b->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                    {{ $b->status === 'accepted' ? 'bg-green-100 text-green-800' : '' }}
                                    {{ $b->status === 'declined' ? 'bg-rose-100 text-rose-800' : '' }}">
                                    {{ ucfirst($b->status) }}
                                </span>
                            </div>

                            <!-- Three dot menu -->
                            <div class="relative" x-data="{ open: false }">
                                <button @click="open = !open" class="p-2 text-gray-600 hover:text-gray-900">
                                    ⋮
                                </button>
                                <div x-show="open" @click.away="open = false"
                                    class="absolute right-0 mt-1 w-36 bg-white border rounded-lg shadow-lg z-10 text-sm">
                                    <a href="{{ route('booking.lookup.show', ['code' => $b->confirmation_code]) }}"
                                    target="_blank"
                                    class="block px-4 py-2 hover:bg-pink-50">View</a>

                                    @if($b->status === 'pending')
                                        <button type="button"
                                            @click="openAccept=true; activeId={{ $b->id }}; msg='Great news! Your appointment is confirmed 🎉'; open=false"
                                            class="block w-full text-left px-4 py-2 hover:bg-pink-50">Accept</button>
                                        <button type="button"
                                            @click="openDecline=true; activeId={{ $b->id }}; msg='Sorry, we cannot honor this time 💖'; open=false"
                                            class="block w-full text-left px-4 py-2 hover:bg-pink-50">Decline</button>
                                    @elseif($b->status === 'accepted')
                                        <form method="POST" action="{{ route('admin.bookings.revoke', $b) }}">
                                            @csrf @method('PATCH')
                                            <button class="block w-full text-left px-4 py-2 hover:bg-pink-50">Revoke</button>
                                        </form>
                                    @elseif($b->status === 'declined')
                                        <button type="button"
                                            @click="openAccept=true; activeId={{ $b->id }}; msg='Great news! Your appointment is confirmed 🎉'; open=false"
                                            class="block w-full text-left px-4 py-2 hover:bg-pink-50">Accept</button>
                                    @endif

                                    <button type="button"
                                        @click="openDelete=true; activeId={{ $b->id }}; open=false"
                                        class="block w-full text-left px-4 py-2 hover:bg-pink-50 text-red-600">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="px-4 py-3">
                {{ $bookings->links() }}
            </div>

            {{-- Delete Modal --}}
            <div x-show="openDelete" x-cloak
                class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 p-4">
                <div @click.away="openDelete=false"
                    class="bg-white rounded-xl shadow-xl w-full max-w-md p-6">
                    <h3 class="text-lg font-semibold text-gray-900">Delete booking?</h3>
                    <p class="mt-1 text-sm text-gray-600">This action cannot be undone.</p>
                    <form method="POST" :action="`/admin/bookings/${activeId}`" class="mt-4 flex justify-end gap-2">
                        @csrf
                        @method('DELETE')
                        <button type="button"
                                @click="openDelete=false"
                                class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-100">
                            Cancel
                        </button>
                        <button class="px-4 py-2 rounded-md bg-gray-800 text-white hover:bg-gray-900">
                            Delete
                        </button>
                    </form>
                </div>
            </div>


            {{-- Accept Modal --}}
            <div x-show="openAccept" x-cloak
                 class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 p-4">
                <div @click.away="openAccept=false"
                     class="bg-white rounded-xl shadow-xl w-full max-w-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900">Send acceptance email</h3>
                    <p class="mt-1 text-sm text-gray-600">Edit the message before sending.</p>
                    <form method="POST" :action="`/admin/bookings/${activeId}/accept`" class="mt-4 space-y-4">
                        @csrf
                        <textarea x-model="msg" name="message" rows="5"
                                  class="w-full rounded-md border border-gray-300 bg-pink-50 px-3 py-2 focus:border-pink-400 focus:ring-2 focus:ring-pink-200 outline-none"></textarea>
                        <div class="flex justify-end gap-2">
                            <button type="button" @click="openAccept=false"
                                    class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-100">Cancel</button>
                            <button class="px-4 py-2 rounded-md bg-[#922E71] text-white hover:bg-pink-800">Send & Accept</button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Decline Modal --}}
            <div x-show="openDecline" x-cloak
                 class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 p-4">
                <div @click.away="openDecline=false"
                     class="bg-white rounded-xl shadow-xl w-full max-w-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900">Decline booking?</h3>
                    <p class="mt-1 text-sm text-gray-600">An email will be sent to the customer.</p>
                    <form method="POST" :action="`/admin/bookings/${activeId}/decline`" class="mt-4 space-y-4">
                        @csrf
                        <textarea x-model="msg" name="message" rows="5"
                                  class="w-full rounded-md border border-gray-300 bg-pink-50 px-3 py-2 focus:border-pink-400 focus:ring-2 focus:ring-pink-200 outline-none"></textarea>
                        <div class="flex justify-end gap-2">
                            <button type="button" @click="openDecline=false"
                                    class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-100">Cancel</button>
                            <button class="px-4 py-2 rounded-md bg-rose-600 text-white hover:bg-rose-700">Decline & Send</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Custom New Booking Popup -->
            <div id="newBookingPopup"
                class="hidden fixed bottom-6 right-6 bg-white border border-pink-200 shadow-lg rounded-xl p-4 w-80 animate-slide-in z-50">
                <div class="flex items-start gap-3">
                    <!-- Icon -->
                    <div class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-full bg-pink-100 text-[#922E71] font-bold">
                        📅
                    </div>
                    <!-- Content -->
                    <div class="flex-1">
                        <h4 class="text-sm font-semibold text-gray-900">New Booking</h4>
                        <p id="popupMessage" class="text-sm text-gray-600"></p>
                        <a id="popupLink"
                        href="#"
                        class="mt-2 inline-block text-sm text-[#922E71] font-medium hover:underline">
                            View Booking →
                        </a>
                    </div>
                    <!-- Close -->
                    <button onclick="closePopup()" class="text-gray-400 hover:text-gray-600">✕</button>
                </div>
            </div>

            <style>
            @keyframes slide-in {
                from { transform: translateY(100%); opacity: 0; }
                to { transform: translateY(0); opacity: 1; }
            }
            @keyframes slide-out {
                from { transform: translateY(0); opacity: 1; }
                to { transform: translateY(100%); opacity: 0; }
            }
            .animate-slide-in {
                animation: slide-in 0.3s ease-out;
            }
            .animate-slide-out {
                animation: slide-out 0.3s ease-in forwards;
            }
            </style>


        </div>
    </div>
    <script>
        let lastBookingId = {{ $latestBookingId ?? 0 }};
        let popupTimeout = null;

        function showPopup(message, link) {
            const popup = document.getElementById("newBookingPopup");
            const msg = document.getElementById("popupMessage");
            const popupLink = document.getElementById("popupLink");

            msg.textContent = message;
            popupLink.href = link;

            popup.classList.remove("hidden", "animate-slide-out");
            popup.classList.add("animate-slide-in");

            clearTimeout(popupTimeout);
            popupTimeout = setTimeout(closePopup, 6000);
        }

        function closePopup() {
            const popup = document.getElementById("newBookingPopup");
            popup.classList.remove("animate-slide-in");
            popup.classList.add("animate-slide-out");
            setTimeout(() => popup.classList.add("hidden"), 300);
        }

        // Poll backend every 10s
        setInterval(() => {
            fetch("{{ route('admin.bookings.latest') }}")
                .then(res => res.json())
                .then(data => {
                    if (!data) return;

                    // Only show if booking is PENDING and is newer than lastBookingId
                    if (data.status === 'pending' && data.id > lastBookingId) {
                        lastBookingId = data.id; // update so it won’t repeat
                        showPopup(
                            `New booking from ${data.full_name}`,
                            `/admin/bookings?code=${data.confirmation_code}`
                        );
                    }
                })
                .catch(err => console.error(err));
        }, 10000);
    </script>




</x-app-layout>
