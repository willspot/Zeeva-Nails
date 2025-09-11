<x-app-layout>
    <x-slot name="header">
        Dashboard
    </x-slot>
@if (session('success'))
<div
    x-data="{ show: true }"
    x-show="show"
    x-init="setTimeout(() => show = false, 3000)"
    x-transition
    class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 bg-green-100 text-green-800 px-6 py-3 rounded-lg shadow-lg text-sm font-medium max-w-sm w-full text-center"
>
    {{ session('success') }}
</div>
@endif

    {{-- Welcome Section --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-10">
        


  <!-- Generate Loyalty Code -->
  <div class="bg-white rounded-xl shadow-md p-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Generate Loyalty Code</h3>
    <form action="{{ route('admin.loyalty.generate') }}" method="POST" class="space-y-4">
      @csrf
      
      <button type="submit" class="bg-[#922E71] text-white px-5 py-2 rounded hover:bg-[#7a255e]">Generate Code</button>
    </form>
  </div>

  <!-- View Generated Codes -->
  <div class="bg-white rounded-xl shadow-md p-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">View Generated Codes</h3>

    <!-- Search Form -->
    <form action="{{ route('dashboard') }}" method="GET" class="mb-4">
      <input
        type="text"
        name="search"
        placeholder="Search by code, phone, email or full name"
        value="{{ request('search') }}"
        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#922E71]"
      >
        @if(request('search'))
            <a href="{{ route('dashboard') }}" 
            class="inline-flex items-center px-4 py-2 border border-gray-300 rounded text-gray-600 hover:bg-gray-100"
            title="Clear Search"
            >
            Clear
            </a>
        @endif
    </form>

    <!-- Codes Table -->
    <div class="overflow-x-auto">
      <table class="w-full table-auto border-collapse border border-gray-200">
        <thead>
          <tr class="bg-gray-100">
            <th class="border border-gray-300 px-4 py-2 text-left">Code</th>
            <th class="border border-gray-300 px-4 py-2 text-left">Status</th>
            <th class="border border-gray-300 px-4 py-2">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($codes as $code)
          <tr>
            <td class="border border-gray-300 px-4 py-2 font-mono">{{ $code->code }}</td>
            <td class="border border-gray-300 px-4 py-2">
                @if($code->status === 'active')
                    <span class="text-green-600 font-semibold">Active</span>
                @elseif($code->status === 'used')
                    <span class="text-blue-600 font-semibold">Used</span>
                @else
                    <span class="text-red-600 font-semibold">Inactive</span>
                @endif
                </td>
                <td class="border border-gray-300 px-4 py-2 text-center">
                @if($code->status === 'used')
                    <a href="{{ route('admin.loyalty.details', $code->id) }}" class="text-[#922E71] font-medium hover:underline">Details</a>
                @else
                    <span class="text-gray-400">—</span>
                @endif
            </td>


          </tr>
          @empty
          <tr>
            <td colspan="3" class="border border-gray-300 px-4 py-2 text-center text-gray-500">No loyalty codes found.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <!-- Pagination (optional, if you paginate) -->
    <div class="mt-4">
      {{ $codes->links() }}
    </div>
  </div>
</div>


    {{-- Notes & Notifications Section --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        {{-- Notes Section --}}
        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                <i class="fas fa-sticky-note text-[#922E71]"></i> Admin Notes
            </h3>
            <p class="text-gray-500 text-sm mb-4">Write private notes and reminders here.</p>

            {{-- Add Note --}}
            <form action="{{ route('admin.notes.store') }}" method="POST" class="mb-6">
                @csrf
                <textarea name="content" rows="3"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#922E71] focus:border-[#922E71] text-gray-700"
                        placeholder="Write a new note..."></textarea>

                <div class="mt-3 flex justify-end">
                    <button type="submit"
                            class="px-4 py-2 bg-[#922E71] text-white rounded-lg shadow hover:bg-pink-800 transition">
                        Add Note
                    </button>
                </div>
            </form>

            {{-- List of Notes --}}
            <div class="space-y-4 max-h-72 overflow-y-auto">
                @forelse($notes as $note)
                    <div class="p-4 border rounded-lg shadow-sm">
                        <form action="{{ route('admin.notes.update', $note) }}" method="POST" class="mb-2">
                            @csrf
                            @method('PUT')
                            <textarea name="content" rows="2"
                                class="w-full border-gray-200 rounded-lg shadow-sm focus:ring-[#922E71] focus:border-[#922E71] text-gray-700">{{ $note->content }}</textarea>
                            <div class="mt-2 flex justify-between">
                                <button type="submit" class="px-3 py-1 bg-blue-600 text-white rounded text-sm">Update</button>

                                <!-- Trigger delete modal -->
                                <button type="button"
                                    class="px-3 py-1 bg-red-600 text-white rounded text-sm"
                                    onclick="openDeleteModal({{ $note->id }})">
                                    Delete
                                </button>
                            </div>
                        </form>

                        <!-- Hidden form for delete -->
                        <form id="delete-form-{{ $note->id }}" action="{{ route('admin.notes.destroy', $note) }}" method="POST" class="hidden">
                            @csrf
                            @method('DELETE')
                        </form>

                        <small class="text-xs text-gray-500">Last updated {{ $note->updated_at->diffForHumans() }}</small>
                    </div>

                @empty
                    <p class="text-gray-500 text-sm">No notes yet. Start by adding one above.</p>
                @endforelse
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div id="deleteModal"
            class="fixed inset-0 hidden items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-2">Delete Note</h2>
                <p class="text-gray-600 mb-4">Are you sure you want to delete this note? This action cannot be undone.</p>

                <div class="flex justify-end gap-3">
                    <button onclick="closeDeleteModal()"
                        class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">
                        Cancel
                    </button>
                    <button id="confirmDeleteBtn"
                        class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                        Delete
                    </button>
                </div>
            </div>
        </div>


        {{-- Notifications Section --}}
        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                <i class="fas fa-bell text-[#922E71]"></i> Notifications
            </h3>
            <p class="text-gray-500 text-sm mb-4">Recent activity & changes on the website.</p>

            <div class="max-h-64 overflow-y-auto space-y-4">
                @forelse($notifications as $note)
                    <div class="flex items-start gap-3 border-b border-gray-100 pb-3">
                        <div class="w-8 h-8 flex items-center justify-center rounded-full bg-pink-100 text-[#922E71]">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-700">{{ $note->message }}</p>
                            <span class="text-xs text-gray-500">{{ $note->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-sm">No recent notifications.</p>
                @endforelse
            </div>
        </div>
    </div>
    <script>
        let deleteNoteId = null;

        function openDeleteModal(noteId) {
            deleteNoteId = noteId;
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteModal').classList.add('flex');
        }

        function closeDeleteModal() {
            deleteNoteId = null;
            document.getElementById('deleteModal').classList.add('hidden');
            document.getElementById('deleteModal').classList.remove('flex');
        }

        document.getElementById('confirmDeleteBtn').addEventListener('click', function () {
            if (deleteNoteId) {
                document.getElementById(`delete-form-${deleteNoteId}`).submit();
            }
        });
    </script>

</x-app-layout>
