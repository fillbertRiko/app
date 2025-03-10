<!-- resources/views/admin/partials/sidebar.blade.php -->
<aside class="w-64 bg-white shadow-md min-h-screen p-6">
    <!-- Header của Sidebar -->
    <div class="mb-10">
        <h1 class="text-2xl font-bold text-center text-gray-800">Admin Panel</h1>
    </div>
    
    <!-- Navigation Menu -->
    <nav>
        <ul class="space-y-4">
            <li>
                <a href="{{ route('dashboard') }}" 
                   class="flex items-center px-4 py-2 rounded transition-colors duration-200 font-semibold text-gray-700 hover:bg-blue-100 hover:text-blue-600">
                    <!-- Icon Dashboard -->
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M3 12l2-2m0 0l7-7 7 7m-2 2v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6"/>
                    </svg>
                    Dashboard
                </a>
            </li>
            <!-- Thêm các mục menu khác tại đây nếu cần -->
        </ul>
    </nav>
</aside>
