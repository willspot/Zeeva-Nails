<x-app-layout>
    <x-slot name="header">
        Edit Service
    </x-slot>
    {{-- Custom Success/Error Popups --}}
    @if(session('success'))
        <div id="popup-success" class="fixed top-5 right-5 bg-green-500 text-white px-4 py-3 rounded-lg shadow-lg z-50">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div id="popup-error" class="fixed top-5 right-5 bg-red-500 text-white px-4 py-3 rounded-lg shadow-lg z-50">
            Please fix the errors below.
        </div>
    @endif

    

    <div class="bg-white rounded-xl shadow p-6 max-w-2xl mx-auto">
        <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" value="{{ old('title', $service->title) }}"
                       class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Duration</label>
                <input type="text" name="duration" value="{{ old('duration', $service->duration) }}"
                       class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Price</label>
                <input type="text" name="price" value="{{ old('price', $service->price) }}"
                       class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" rows="4"
                          class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm">{{ old('description', $service->description) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">What's Included</label>
                <textarea name="features" rows="3"
                        class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm">{{ old('features', is_array(json_decode($service->features, true)) 
                    ? implode("\n", json_decode($service->features, true)) 
                    : $service->features) }}</textarea>
            </div>



            <div>
                <label class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" name="image" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm">
                @if($service->image)
                    <img src="{{ asset('storage/' . $service->image) }}" class="mt-2 h-32 rounded-md">
                @endif
            </div>

            <div class="flex justify-end">
                <a href="{{ route('admin.services.index') }}" class="px-4 py-2 rounded-md border border-gray-300 text-gray-600 mr-2">Cancel</a>
                <button type="submit" class="px-4 py-2 rounded-md bg-[#922E71] text-white hover:bg-pink-800">Update</button>
            </div>
        </form>
    </div>

    <script>
        // Auto-hide popups after 3s
        setTimeout(() => {
            document.getElementById('popup-success')?.remove();
            document.getElementById('popup-error')?.remove();
        }, 3000);
    </script>
</x-app-layout>
