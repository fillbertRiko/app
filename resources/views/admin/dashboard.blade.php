@extends('admin.layouts.app')

@section('content')
  <div class="flex items-center justify-center h-screen">
    <div class="text-center" style="font-size: 5vh;">
      <h1 class="font-bold mb-4">Dashboard</h1>
      <p class="text-gray-600 mb-6">Chào mừng bạn đến với trang quản trị.</p>

      @auth
        <h1 class="text-green-500">Đã đăng nhập</h1>
      @endauth

      @guest
        <h1 class="text-red-500">Tư cách khách</h1>
      @endguest

      <div class="mt-4">
        <a href="{{ route('admin.auth.login') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
          Đăng nhập
        </a>
        <a href="{{ route('admin.auth.register') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
          Đăng Kí
        </a>
      </div>
    </div>
  </div>
@endsection
