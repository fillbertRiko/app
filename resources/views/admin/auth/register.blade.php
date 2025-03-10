@extends('admin.layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-500 to-indigo-600 p-4">
    <div class="max-w-md w-full bg-white rounded-lg shadow-lg">
        <div class="px-8 py-6">
            <h2 class="text-center text-3xl font-extrabold text-gray-900 mb-6">
                {{ __('Register') }}
            </h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name Field -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                        {{ __('Name') }}
                    </label>
                    <input id="name" type="text"
                           class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400 @error('name') border-red-500 @else border-gray-300 @enderror"
                           name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <p class="mt-2 text-xs text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                        {{ __('E-Mail Address') }}
                    </label>
                    <input id="email" type="email"
                           class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400 @error('email') border-red-500 @else border-gray-300 @enderror"
                           name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <p class="mt-2 text-xs text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                        {{ __('Password') }}
                    </label>
                    <input id="password" type="password"
                           class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400 @error('password') border-red-500 @else border-gray-300 @enderror"
                           name="password" required autocomplete="new-password">
                    @error('password')
                        <p class="mt-2 text-xs text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Confirm Password Field -->
                <div class="mb-4">
                    <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2">
                        {{ __('Confirm Password') }}
                    </label>
                    <input id="password-confirm" type="password"
                           class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                           name="password_confirmation" required autocomplete="new-password">
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit"
                            class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
