<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h2 class="text-3xl md:text-4xl font-semibold text-gray-900 mb-2">
        Manage Your Account
        </h2>
        <p class="text-gray-600 text-lg mb-12">
        Sign in to Begin.
        </p>

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" 
                class="mt-2 block w-full rounded-md border border-gray-300 bg-pink-50 px-4 py-3 text-gray-700 placeholder-gray-400 focus:border-pink-400 focus:ring-2 focus:ring-pink-200" 
                type="email" 
                name="email" 
                :value="old('email')" 
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" 
                class="mt-2 block w-full rounded-md border border-gray-300 bg-pink-50 px-4 py-3 text-gray-700 placeholder-gray-400 focus:border-pink-400 focus:ring-2 focus:ring-pink-200" 
                type="password" 
                name="password" 
                required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="flex items-center space-x-2">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-pink-500 focus:ring-pink-400" name="remember">
                <span class="text-sm text-gray-700">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-pink-600 hover:text-pink-800">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <!-- Button -->
        <div>
            <button type="submit" 
                class="w-full rounded-md bg-[#922E71] px-6 py-3 text-white font-semibold shadow-md hover:bg-pink-700 focus:ring-2 focus:ring-pink-400">
                {{ __('Log in') }}
            </button>
        </div>
    </form>
</x-guest-layout>
