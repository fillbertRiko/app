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
                    <span class="breadcrumb-item active">Tài khoản hệ thống</span>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('page-content')
    <div class="content">
        <!-- Content -->
        @if (session('success'))
            <script>
                new Noty({
                    type: 'success',
                    layout: 'topRight',
                    text: "{{ session('success') }}",
                    timeout: 2000,
                    progressBar: true,
                    callbacks: {
                        onTemplate: function() {
                            this.barDom.innerHTML = '<div class="noty_body" style="background: #188251; color: #ffffff;">' + this.options.text + '</div>';
                            this.barDom.style.backgroundColor = 'transparent';
                        }
                    }
                }).show();
            </script>
        @elseif(session('error'))
            <script>
                new Noty({
                    type: 'error',
                    layout: 'topRight',
                    text: "{{ session('error') }}",
                    timeout: 2000,
                    progressBar: true,
                    callbacks: {
                        onTemplate: function() {
                            this.barDom.innerHTML = '<div class="noty_body" style="background: #e7515a; color: #ffffff;">' + this.options.text + '</div>';
                            this.barDom.style.backgroundColor = 'transparent';
                        }
                    }
                }).show();
            </script>
        @endif
        <div class="row">
            <livewire:admin.user.user-index />
        </div>
        <!-- /content -->
    </div>
@endsection
