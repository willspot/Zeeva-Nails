<x-app-layout>
    <x-slot name="header">
        Add Service
    </x-slot>

    <div class="bg-white rounded-xl shadow p-6 max-w-2xl mx-auto">
        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Duration</label>
                <input type="text" name="duration" placeholder="e.g. 60 min"
                       class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Price</label>
                <input type="text" name="price" placeholder="e.g. N15,000"
                       class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" rows="4"
                          class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm"></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">What's Included</label>
                <textarea name="features" rows="3" placeholder="One per line"
                          class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm"></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" name="image" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm">
            </div>

            <div class="flex justify-end">
                <a href="{{ route('admin.services.index') }}" class="px-4 py-2 rounded-md border border-gray-300 text-gray-600 mr-2">Cancel</a>
                <button type="submit" class="px-4 py-2 rounded-md bg-[#922E71] text-white hover:bg-pink-800">Save</button>
            </div>
        </form>
    </div>
</x-app-layout>
