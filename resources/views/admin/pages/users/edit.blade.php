@extends('admin.layouts.master')

@section('page-header')
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    Tài khoản hệ thống
                </h4>
            </div>

        </div>

        <div class="page-header-content d-lg-flex border-top">
            <div class="d-flex">
                <div class="breadcrumb py-2">
                    <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                    <a href="{{ route('admin.users.index') }}" class="breadcrumb-item active">Tài khoản hệ thống</a>
                    <span class="breadcrumb-item active">Chỉnh sửa thông tin</span>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('page-content')
    <div class="content">
        <!-- Content -->
            <livewire:admin.user.user-edit />
        <!-- /content -->
    </div>
@endsection

