<!-- resources/views/admin/partials/sidebar.blade.php -->
<aside class="w-64 bg-white shadow-md h-screen p-4">
    <ul class="space-y-3">
        <li><a href="{{ route('admin.dashboard') }}" class="block text-center text-gray-700 hover:text-blue-500 font-bold border border-gray-300 p-2">Dashboard</a></li>
        <li><a href="{{ route('admin.users.index') }}" class="block text-center text-gray-700 hover:text-blue-500 font-bold border border-gray-300 p-2">Users</a></li>
        <li><a href="{{route('admin.customers.index')}}" class="block text-center text-gray-700 hover:text-blue-500 font-bold border border-gray-300 p-2">Customers</a></li>
        <li><a href="{{route('admin.staff.index')}}" class="block text-center text-gray-700 hover:text-blue-500 font-bold border border-gray-300 p-2">Staff</a></li>
        <li><a href="{{route('admin.products.index')}}" class="block text-center text-gray-700 hover:text-blue-500 font-bold border border-gray-300 p-2">Products</a></li>
        <li><a href="{{route('admin.materials.index')}}" class="block text-center text-gray-700 hover:text-blue-500 font-bold border border-gray-300 p-2">Materials</a></li>
        <li><a href="{{route('admin.suppliers.index')}}" class="block text-center text-gray-700 hover:text-blue-500 font-bold border border-gray-300 p-2">Suppliers</a></li>
        <li><a href="{{route('admin.invoices.sale')}}" class="block text-center text-gray-700 hover:text-blue-500 font-bold border border-gray-300 p-2">Invoices</a></li>
        <li><a href="{{route('admin.reports.index')}}" class="block text-center text-gray-700 hover:text-blue-500 font-bold border border-gray-300 p-2">Reports</a></li>
    </ul>
</aside>
