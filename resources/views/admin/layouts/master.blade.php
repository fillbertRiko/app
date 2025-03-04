<!doctype html>
<html lang="en">

@include('admin.includes.head')

<body>

<!--Main navbar-->
@include('admin.includes.header')
<!--/Main navbar-->

<!-- Page content -->
<div class="page-content">

    <!-- Main sidebar -->
    @include('admin.includes.sidebar')
    <!-- /main sidebar -->


    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Inner content -->
        <div class="content-inner">

            <!-- Page header -->
            @yield('page-header')
            <!-- /page header -->


            <!-- Content area -->
            @yield('page-content')
            <!-- /content area -->


            <!-- Footer -->
            @include('admin.includes.footer')
            <!-- /footer -->

        </div>
        <!-- /inner content -->

    </div>
    <!-- /main content -->

</div>
@yield('verify')
<!-- /page content -->
</body>
</html>
