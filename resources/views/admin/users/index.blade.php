@extends('admin.layouts.app')

@section('title', 'Danh sách tài khoản')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Danh sách tài khoản</h2>

    <!-- Nếu có route tạo mới, bạn có thể thêm link: -->
    <a href="{{ route('register') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Tạo tài khoản mới</a>

    <table class="w-full mt-4 border border-gray-300">
        <thead class="bg-gray-200">
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Role</th>
                <th class="border px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr class="text-center">
                <td class="border px-4 py-2">{{ $user->id }}</td>
                <td class="border px-4 py-2">{{ $user->name }}</td>
                <td class="border px-4 py-2">{{ $user->email }}</td>
                <td class="border px-4 py-2">{{ $user->role }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('edit', $user->id) }}" class="text-yellow-500">Sửa</a>
                    |
                    <form action="{{ route('destroy', $user->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
