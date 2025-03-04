<!-- Main sidebar -->
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- Sidebar header -->
        <div class="sidebar-section">
            <div class="sidebar-section-body d-flex justify-content-center">
                <h5 class="sidebar-resize-hide flex-grow-1 my-auto">Hệ thống quản lý</h5>

                <div>
                    <button type="button" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                        <i class="ph-arrows-left-right"></i>
                    </button>

                    <button type="button" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-mobile-main-toggle d-lg-none">
                        <i class="ph-x"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- /sidebar header -->


        <!-- Main navigation -->
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header pt-0">
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide"></div>
                    <i class="ph-dots-three sidebar-resize-show"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="ph-house"></i>
                        <span>
                            Bảng điều khiển
                        </span>
                    </a>
                </li>

                <li class="nav-item-header">
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Sản phẩm</div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.products.index') }}" class="nav-link {{ request()->routeIs('admin.products.index') ? 'active' : '' }}">
                        <i class="ph-tote-simple"></i>
                        <span>
                            Sản phẩm
                        </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->routeIs('admin.categories.index') ?'active' : '' }}">
                        <i class="ph-stack"></i>
                        <span>
                            Danh mục
                        </span>
                    </a>
                </li>
                <li class="nav-item-header">
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Bài viết</div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.post.index') }}" class="nav-link {{ request()->routeIs('admin.post.index') ?'active' : '' }}">
                        <i class="ph-newspaper"></i>
                        <span>
                            Bài viết
                        </span>
                    </a>
                </li>

                <li class="nav-item-header">
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Đơn hàng</div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.orders.pending.index') }}" class="nav-link {{ request()->routeIs('admin.orders.pending.index') ?'active' : '' }}">
                        <i class="ph-shopping-bag"></i>
                        <span>
                            Đơn hàng chờ duyệt
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.orders.index') }}" class="nav-link {{ request()->routeIs('admin.orders.index') ?'active' : '' }}">
                        <i class="ph-shopping-cart"></i>
                        <span>
                            Tất cả đơn hàng
                        </span>
                    </a>
                </li>

                <li class="nav-item-header">
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Hệ thống</div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.index') ?'active' : '' }}">
                        <i class="ph-user-gear"></i>
                        <span>
                            Tài khoản
                        </span>
                    </a>
                </li>
                @if(auth()->user()->role == \App\Enums\Role::SuperAdmin)
                <li class="nav-item">
                    <a href="{{ route('admin.system-email.index') }}" class="nav-link {{ request()->routeIs('admin.system-email.index') ?'active' : '' }}">
                        <i class="ph-twitch-logo"></i>
                        <span>
                            Email hệ thống
                        </span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>
<!-- /main sidebar -->
