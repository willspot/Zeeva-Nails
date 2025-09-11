<x-app-layout>
    <x-slot name="header">
        Services
    </x-slot>

    <div x-data="{ openDelete: false, activeId: null }" class="bg-white rounded-xl shadow p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-800">Services</h2>
            <a href="{{ route('admin.services.create') }}"
               class="px-4 py-2 rounded-md bg-[#922E71] text-white hover:bg-pink-800">
                + Add Service
            </a>
        </div>

        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-pink-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Title</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Duration</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Price</th>
                    <th class="px-4 py-3 text-right text-xs font-semibold text-gray-600 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($services as $service)
                    <tr>
                        <td class="px-4 py-3">{{ $service->title }}</td>
                        <td class="px-4 py-3">{{ $service->duration }}</td>
                        <td class="px-4 py-3">{{ $service->price }}</td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.services.edit', $service) }}"
                               class="px-3 py-1.5 rounded-md border text-[#922E71] border-pink-300 hover:bg-pink-50 text-sm">
                                Edit
                            </a>
                            <button type="button"
                                    @click="openDelete = true; activeId = {{ $service->id }}"
                                    class="px-3 py-1.5 rounded-md bg-rose-600 text-white hover:bg-rose-700 text-sm">
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-gray-500">No services found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Delete Modal -->
        <div x-show="openDelete" x-cloak
             class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 p-4">
            <div @click.away="openDelete=false"
                 class="bg-white rounded-xl shadow-xl w-full max-w-md p-6">
                <h3 class="text-lg font-semibold text-gray-900">Delete service?</h3>
                <p class="mt-1 text-sm text-gray-600">This action cannot be undone.</p>

                <form method="POST" :action="`/admin/services/${activeId}`" class="mt-4 flex justify-end gap-2">
                    @csrf
                    @method('DELETE')
                    <button type="button"
                            @click="openDelete=false"
                            class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-100">
                        Cancel
                    </button>
                    <button class="px-4 py-2 rounded-md bg-rose-600 text-white hover:bg-rose-700">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
