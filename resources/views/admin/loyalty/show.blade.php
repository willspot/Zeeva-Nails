<x-app-layout>
    <x-slot name="header">
        Loyalty Code Details
    </x-slot>

    <div class="max-w-5xl mx-auto my-20 bg-white rounded-2xl shadow p-8 border border-pink-100">
        <h1 class="text-2xl font-bold mb-4">Loyalty Code Details</h1>

        <p><strong>Code:</strong> {{ $code->code }}</p>
        <p><strong>Status:</strong> 
          @php
            $badgeClasses = [
              'active' => 'bg-green-100 text-green-800',
              'used' => 'bg-blue-100 text-blue-800',
              'inactive' => 'bg-red-100 text-red-800',
            ];
            $badgeClass = $badgeClasses[$code->status] ?? 'bg-gray-100 text-gray-800';
          @endphp
          <span class="px-2 py-1 rounded-full text-sm font-semibold {{ $badgeClass }}">{{ ucfirst($code->status) }}</span>
        </p>
        <p><strong>Full Name:</strong> {{ $code->full_name ?? 'N/A' }}</p>
        <p><strong>Phone:</strong> {{ $code->phone ?? 'N/A' }}</p>
        <p><strong>Email:</strong> {{ $code->email ?? 'N/A' }}</p>
        <p><strong>Created At:</strong> {{ $code->created_at->format('M d, Y H:i') }}</p>

        <a href="{{ route('dashboard') }}" class="inline-block mt-6 text-[#922E71] hover:underline">← Back to Dashboard</a>
    </div>
</x-app-layout>
