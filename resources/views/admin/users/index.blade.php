@extends('layouts.app')

@section('title', 'Danh sách người dùng')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Danh sách người dùng</h2>

    <a href="{{ route('users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Thêm người dùng</a>

    <table class="w-full mt-4 border border-gray-300">
        <thead class="bg-gray-200">
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Tên</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Vai trò</th>
                <th class="border px-4 py-2">Hành động</th>
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
                    <a href="{{ route('users.edit', $user->id) }}" class="text-yellow-500">Sửa</a>
                    |
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
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
