<!-- resources/views/admin/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
    @include('admin.partials.head')
    @include('admin.partials.style')
    <title>@yield('title', 'Dashboard')</title>
</head>
<body>
    @include('admin.partials.header')
    <div class="container">
        @include('admin.partials.sidebar')

        <main class="content">
            @yield('content')
        </main>
    </div>
    @include('admin.partials.footer')
    @include('admin.partials.scripts')
</body>
</html>
