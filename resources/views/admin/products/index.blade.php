@extends('admin.layouts.app')

@section('content')
  <div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Danh sách Sản phẩm</h1>

    <!-- Nút thêm sản phẩm -->
    <a href="{{ route('admin.products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4 inline-block">
      Thêm Sản phẩm
    </a>

    <!-- Bảng danh sách sản phẩm -->
    <div class="overflow-x-auto">
      <table class="min-w-full bg-white border border-gray-200">
        <thead>
          <tr class="bg-gray-100">
            <th class="py-2 px-4 border">ID</th>
            <th class="py-2 px-4 border">Tên Sản phẩm</th>
            <th class="py-2 px-4 border">Đơn vị</th>
            <th class="py-2 px-4 border">Giá</th>
            <th class="py-2 px-4 border">Kho hàng</th>
            <th class="py-2 px-4 border">Hành động</th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $product)
            <tr class="text-center">
              <td class="py-2 px-4 border">{{ $product->ProductID }}</td>
              <td class="py-2 px-4 border">{{ $product->ProductName }}</td>
              <td class="py-2 px-4 border">{{ $product->UOMID }}</td>
              <td class="py-2 px-4 border">{{ number_format($product->UnitPrice, 2) }}</td>
              <td class="py-2 px-4 border">{{ $product->WarehouseID }}</td>
              <td class="py-2 px-4 border space-x-2">
                <a href="{{ route('admin.products.edit', $product->ProductID) }}" class="text-blue-500 hover:underline">Sửa</a>
                <form action="{{ route('admin.products.destroy', $product->ProductID) }}" method="POST" class="inline-block">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">
                    Xóa
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
