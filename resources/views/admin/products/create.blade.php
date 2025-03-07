@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Thêm Sản phẩm</h1>

    <form action="{{ route('admin.products.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        <!-- Tên sản phẩm -->
        <div class="mb-4">
            <label for="ProductName" class="block text-gray-700 font-medium mb-2">Tên Sản phẩm</label>
            <input type="text" name="ProductName" id="ProductName" placeholder="Nhập tên sản phẩm"
                   class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-500">
        </div>
        <!-- Đơn vị -->
        <div class="mb-4">
            <label for="UnitID" class="block text-gray-700 font-medium mb-2">Đơn vị</label>
            <input type="text" name="UnitID" id="UnitID" placeholder="Nhập đơn vị"
                   class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-500">
        </div>
        <!-- Giá sản phẩm -->
        <div class="mb-4">
            <label for="UnitPrice" class="block text-gray-700 font-medium mb-2">Giá sản phẩm</label>
            <input type="number" step="0.01" name="UnitPrice" id="UnitPrice" placeholder="Nhập giá sản phẩm"
                   class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-500">
        </div>
        <!-- Kho hàng -->
        <div class="mb-4">
            <label for="WarehouseID" class="block text-gray-700 font-medium mb-2">Kho hàng</label>
            <input type="text" name="WarehouseID" id="WarehouseID" placeholder="Nhập kho hàng"
                   class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-500">
        </div>
        <!-- Nút lưu -->
        <div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                Lưu
            </button>
        </div>
    </form>
</div>
@endsection
