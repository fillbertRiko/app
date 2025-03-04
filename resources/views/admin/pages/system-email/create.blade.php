@extends('admin.layouts.master')

@section('page-header')
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    Email hệ thống
                </h4>
            </div>

        </div>

        <div class="page-header-content d-lg-flex border-top">
            <div class="d-flex">
                <div class="breadcrumb py-2">
                    <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                    <a href="{{ route('admin.system-email.index') }}" class="breadcrumb-item active">Email hệ thống</a>
                    <span class="breadcrumb-item active">Thêm mới email hệ thống</span>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('page-content')
    <div class="content">
        <!-- Content -->
        <livewire:admin.email.system-email-create />
        <!-- /content -->
    </div>
@endsection

