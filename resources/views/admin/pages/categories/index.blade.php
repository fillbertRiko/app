@extends('admin.layouts.master')

@section('page-header')
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    Danh mục
                </h4>
            </div>

        </div>

        <div class="page-header-content d-lg-flex border-top">
            <div class="d-flex">
                <div class="breadcrumb py-2">
                    <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                    <span class="breadcrumb-item active">Danh mục</span>
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
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="content-header d-flex justify-content-between align-items-end">
                            <div class="content-filter w-50">
                                <div class="row">
                                    <div class="col-12 col-md-8">
                                        <form action="{{ route('admin.categories.index') }}" method="get" id="form-search">
                                            @csrf
                                            <div class="form-group">
                                                <label for="user-search-input">Tìm kiếm</label>
                                                <div class="form-control-feedback form-control-feedback-end">
                                                    <input type="text" name="q" value="{{ request()->query('q') }}"
                                                           placeholder="Nhập từ khoá để tìm kiếm..."
                                                           class="form-control" id="user-search-input">
                                                    <div class="form-control-feedback-icon">
                                                        <i class="ph-magnifying-glass"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                            <div class="content-action">
                                <a href="{{ route('admin.categories.create') }}" class="btn btn-teal"><i
                                        class="ph-plus-circle me-1"></i> Tạo mới</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center" >#</th>
                                    <th class="text-center" >Tên danh mục</th>
                                    <th class="text-center" >Mô tả</th>
                                    <th class="text-center" >Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->description ?? "Trống" }}</td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                                    <i class="ph-list"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <form action="{{ route('admin.categories.delete',['id' => $category->id]) }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('admin.categories.edit', ['id' => $category->id]) }}" class="dropdown-item">
                                                            <i class="ph-pencil me-2"></i>
                                                            Chỉnh sửa
                                                        </a>
                                                        <button type="submit" class="dropdown-item text-danger">
                                                            <i class="ph-trash me-2"></i>
                                                            Xóa
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-end align-items-center w-100 mt-3">

                                <div class="pagination">
                                    {{ $categories->appends(request()->input())->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /content -->

    </div>
@endsection

@section('verify')
    <div id="confirmDialog" class="confirm-dialog">
        <div class="dialog-header">Xác nhận</div>
        <div class="dialog-body">Bạn có chắc chắn muốn xóa không?</div>
        <div class="dialog-footer">
            <button id="confirmYes" class="dialog-button confirm-button">Có, xóa</button>
            <button id="confirmNo" class="dialog-button cancel-button">Hủy</button>
        </div>
    </div>
@endsection

@section('script_custom')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.dropdown-item.text-danger');
            const confirmDialog = document.getElementById('confirmDialog');
            const confirmYesButton = document.getElementById('confirmYes');
            const confirmNoButton = document.getElementById('confirmNo');
            let formToSubmit = null;

            deleteButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault();
                    formToSubmit = this.closest('form');
                    confirmDialog.classList.add('show');
                });
            });

            confirmYesButton.addEventListener('click', function () {
                if (formToSubmit) {
                    formToSubmit.submit();
                }
                confirmDialog.classList.remove('show');
            });

            confirmNoButton.addEventListener('click', function () {
                confirmDialog.classList.remove('show');
            });

            // Optional: Close dialog when clicking outside
            window.addEventListener('click', function (event) {
                if (event.target === confirmDialog) {
                    confirmDialog.classList.remove('show');
                }
            });
        });
    </script>
@endsection

@section('style_custom')
    <style>
        .confirm-dialog {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background: #fff;
            border-radius: 8px;
            z-index: 1000;
        }
        .confirm-dialog.show {
            display: block;
        }
        .confirm-dialog .dialog-header {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .confirm-dialog .dialog-footer {
            text-align: right;
        }
        .confirm-dialog .dialog-button {
            padding: 8px 12px;
            margin: 5px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .confirm-dialog .confirm-button {
            background: #3085d6;
            color: #fff;
        }
        .confirm-dialog .cancel-button {
            background: #d33;
            color: #fff;
        }
        .confirm-dialog .cancel-button, .confirm-dialog .confirm-button {
            margin-left: 10px;
        }
    </style>
@endsection
