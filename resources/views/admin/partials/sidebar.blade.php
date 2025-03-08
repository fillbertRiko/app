<!-- resources/views/admin/partials/sidebar.blade.php -->
<aside class="w-64 bg-white shadow-md h-screen p-4">
    <ul class="space-y-3">
        <li><a href="{{ route('admin.dashboard') }}" class="block text-center text-gray-700 hover:text-blue-500 font-bold border border-gray-300 p-2">Dashboard</a></li>
        <li><a href="{{ route('admin.users.index') }}" class="block text-center text-gray-700 hover:text-blue-500 font-bold border border-gray-300 p-2">Users</a></li>
        
        
    </ul>
</aside>
