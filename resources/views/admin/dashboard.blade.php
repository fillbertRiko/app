@extends('admin.layouts.app')

@section('content')
  <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
  <p class="text-gray-600 mb-6">Chào mừng bạn đến với trang quản trị.</p>

  <!-- Form mô phỏng Stripe Form -->
  <div class="bg-white p-6 rounded-md shadow">
    <h2 class="text-xl font-semibold mb-4">Stripe Form</h2>
    <form action="#" method="POST" class="space-y-4">
      <div>
        <label for="fullname" class="block text-sm font-medium text-gray-700">Họ và tên</label>
        <input
          type="text"
          id="fullname"
          name="fullname"
          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
          placeholder="Nhập họ tên"
        />
      </div>
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input
          type="email"
          id="email"
          name="email"
          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
          placeholder="Nhập email"
        />
      </div>
      <div>
        <label for="card" class="block text-sm font-medium text-gray-700">Số thẻ</label>
        <input
          type="text"
          id="card"
          name="card"
          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
          placeholder="1234 5678 9012 3456"
        />
      </div>
      <button
        type="submit"
        class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700"
      >
        Submit
      </button>
    </form>
  </div>
@endsection
