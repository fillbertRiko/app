@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Edit User</h1>
    <form action="{{ route('update', $user->id) }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                value="{{ old('name', $user->name) }}" 
                required 
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
            >
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
            <input 
                type="email" 
                id="email" 
                name="email" 
                value="{{ old('email', $user->email) }}" 
                required 
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
            >
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
            <input 
                type="password" 
                id="password" 
                name="password" 
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
            >
            <p class="text-sm text-gray-500 mt-1">Leave blank to keep current password</p>
        </div>

        <div class="mb-6">
            <label for="role" class="block text-gray-700 font-medium mb-2">Role</label>
            <select 
                id="role" 
                name="role" 
                required 
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
            >
                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="staff" {{ old('role', $user->role) == 'staff' ? 'selected' : '' }}>Staff</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            Update User
        </button>
    </form>
</div>
@endsection
