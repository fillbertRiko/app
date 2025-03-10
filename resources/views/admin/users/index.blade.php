@extends('admin.layouts.app')

@section('title', 'Danh sách tài khoản')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Danh sách tài khoản</h2>

    <a href="{{ route('edit') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Sửa tài khoản</a>

    <table class="w-full mt-4 border border-gray-300">
        <thead class="bg-gray-200">
            <tr>
                <th class="border px-4 py-2">AccountID</th>
                <th class="border px-4 py-2">UsernameAcc</th>
                <th class="border px-4 py-2">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr class="text-center">
                <td class="border px-4 py-2">{{ $user->AccountID }}</td>
                <td class="border px-4 py-2">{{ $user->UsernameAcc }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('admin.users.edit', $user->AccountID) }}" class="text-yellow-500">Sửa</a>
                    |
                    <form action="{{ route('admin.users.destroy', $user->AccountID) }}" method="POST" class="inline">
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
