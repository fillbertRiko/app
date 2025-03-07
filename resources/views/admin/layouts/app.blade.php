<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.partials.head')
  @include('admin.partials.style')
</head>
<body class="bg-gray-100">

  @include('admin.partials.header')

  <div class="flex">
    @include('admin.partials.sidebar')
    
    <main class="flex-1 p-6">
      @yield('content')
    </main>
  </div>

  @include('admin.partials.footer')
  @include('admin.partials.scripts')

</body>
</html>
