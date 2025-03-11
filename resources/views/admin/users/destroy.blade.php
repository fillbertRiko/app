@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow rounded p-6">
        <h1 class="text-2xl font-bold mb-4">Confirm Delete User</h1>
        <p class="mb-4 text-gray-700">Are you sure you want to delete the following account? This action cannot be undone.</p>
        
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-1">Name</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" 
                   class="w-full border rounded px-3 py-2 bg-gray-100 cursor-not-allowed" disabled>
        </div>
        
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" 
                   class="w-full border rounded px-3 py-2 bg-gray-100 cursor-not-allowed" disabled>
        </div>
        
        <div class="mb-4">
            <label for="role" class="block text-gray-700 font-medium mb-1">Role</label>
            <select id="role" name="role" class="w-full border rounded px-3 py-2 bg-gray-100 cursor-not-allowed" disabled>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="staff" {{ $user->role == 'staff' ? 'selected' : '' }}>Staff</option>
            </select>
        </div>
        
        <!-- Nếu password không cần hiển thị, bạn có thể bỏ phần này. Nếu vẫn cần hiển thị: -->
        <div class="mb-6">
            <label for="password" class="block text-gray-700 font-medium mb-1">Password</label>
            <input type="password" id="password" name="password" 
                   class="w-full border rounded px-3 py-2 bg-gray-100 cursor-not-allowed" disabled>
            <p class="text-sm text-gray-500 mt-1">Current password is hidden for security reasons.</p>
        </div>
        
        
            <div class="flex space-x-4">
                <form action="{{ route('destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                        Delete
                    </button>
                </form>
                <a href="{{ route('users') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
