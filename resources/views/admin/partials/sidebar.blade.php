<!-- resources/views/admin/partials/sidebar.blade.php -->
<aside class="sidebar">
    <ul>
        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('admin.users.index') }}">Users</a></li>
        <li><a href="{{route('admin.customers.index')}}">Customers</a></li>
        <li><a href="{{route('admin.staff.index')}}">Staff</a></li>
        <li><a href="{{route('admin.products.index')}}">Products</a></li>
        <li><a href="{{route('admin.materials.index')}}">Materials</a></li>
        <li><a href="{{route('admin.suppliers.index')}}">Suppliers</a></li>
        <li><a href="{{route('admin.invoices.sale')}}">Invoices</a></li>
        <li><a href="{{route('admin.reports.index')}}">Reports</a></li>
    </ul>
</aside>
