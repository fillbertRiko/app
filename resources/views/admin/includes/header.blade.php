<div class="navbar navbar-dark navbar-expand-lg navbar-static border-bottom border-bottom-white border-opacity-10">
    <div class="container-fluid">
        <div class="d-flex d-lg-none me-2">
            <button type="button" class="navbar-toggler sidebar-mobile-main-toggle rounded-pill">
                <i class="ph-list"></i>
            </button>
        </div>

        <div class="navbar-brand flex-1 flex-lg-0">
            <a href="{{ route('admin.dashboard') }}" class="d-inline-flex align-items-center">
                <img src="{{ asset('assets/admin/images/coi4.jpg') }}" alt="" style="width:180px" >
            </a>
        </div>

        <ul class="nav flex-row justify-content-end order-1 order-lg-2">
            <li>
                <div class="mt-2 me-4">
                    <i class="ph-arrow-bend-down-left link-yellow"></i>
                    <a href="{{ route('todo.home') }}" class="link-yellow">Trang chủ</a>
                </div>
            </li>
            <li class="nav-item nav-item-dropdown-lg dropdown ms-lg-2">
                <a href="#" class="navbar-nav-link align-items-center rounded-pill p-1" data-bs-toggle="dropdown">
                    <div class="status-indicator-container">
                        <img src="{{ asset('assets/admin/images/avatar.jpg') }}" class="w-32px h-32px rounded-pill" alt="">
                        <span class="status-indicator bg-success"></span>
                    </div>
                    <span class="d-none d-lg-inline-block mx-lg-2 text-info">{{ auth()->user()->fullname }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="{{ route('admin.users.profile',['id' => auth()->id()]) }}" class="dropdown-item">
                        <i class="ph-gear me-2"></i>
                        Tài khoản
                    </a>
                    <div class="dropdown-divider"></div>
                    <form action="{{ route('logout') }}" method="get">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="ph-sign-out me-2"></i>
                            Đăng xuất
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>
