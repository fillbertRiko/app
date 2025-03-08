@extends('admin.layouts.app')

@section('content')
@auth
    <script>
        window.location.href = "{{ route('admin.dashboard') }}";
    </script>
@else
    <form method="POST" action="{{ route('admin.auth.login') }}" class="max-w-md mx-auto mt-10 p-6 bg-white shadow-md rounded">
        @csrf
        <div class="mb-4">
            <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username</label>
            <input type="text" id="username" name="username" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
            <input type="email" id="email" name="email" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
            <input type="password" id="password" name="password" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <input type="checkbox" id="remember" name="remember" class="mr-2 leading-tight">
            <label for="remember" class="text-sm text-gray-700">Remember Me</label>
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="btn-submit">SUBMIT</button>
        </div>
        
    </form>
@endauth
@endsection