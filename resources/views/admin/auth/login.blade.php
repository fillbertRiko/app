@extends('admin.layouts.app')

@section('content')
@auth
  <script>
    window.location.href = "{{ route('dashboard') }}";
  </script>
@else
<div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-lg">
    <div class="mb-6 text-center">
      <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
        Đăng nhập vào tài khoản
      </h2>
      <p class="mt-2 text-sm text-gray-600">
        Hoặc đăng ký <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500">tại đây</a>
      </p>
    </div>
    <form class="space-y-6" method="POST" action="{{ route('login') }}">
      @csrf
      <div class="grid grid-cols-1 gap-6">
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input id="email" name="email" type="email" required
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
            placeholder="Nhập email">
        </div>
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input id="password" name="password" type="password" required
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
            placeholder="Nhập password">
        </div>
        <div class="flex items-center">
          <input id="remember" name="remember" type="checkbox"
            class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
          <label for="remember" class="ml-2 block text-sm text-gray-900">Remember Me</label>
        </div>

        @error('failed')
          <p class="error" {{$message}}></p>
        @enderror
      </div>

      <div>
        <button type="submit"
          class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
          Đăng nhập
        </button>
      </div>
    </form>
  </div>
</div>
@endauth
@endsection
