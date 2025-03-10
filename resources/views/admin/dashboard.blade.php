@extends('admin.layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-500 to-indigo-600">
  <div class="bg-white shadow-xl rounded-lg p-10 w-full max-w-md">
    <div class="text-center mb-8">
      <h1 class="text-4xl font-bold text-gray-800 mb-3">Dashboard</h1>
      <p class="text-lg text-gray-600">Chào mừng bạn đến với trang quản trị.</p>
    </div>

    <div class="text-center mb-6">
      @auth
        <p class="text-xl font-semibold text-green-500">Đã đăng nhập</p>
      @endauth

      @guest
        <p class="text-xl font-semibold text-red-500">Tư cách khách</p>
        <div class="flex justify-center space-x-4">
          <a href="{{ route('login') }}"
             class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded focus:outline-none focus:ring transform transition duration-300">
            Đăng nhập
          </a>
          <a href="{{ route('register') }}"
             class="bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded focus:outline-none focus:ring transform transition duration-300">
            Đăng Kí
          </a>
        </div>
      @endguest
    </div>

    
  </div>
</div>
@endsection
