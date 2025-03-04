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
                    <a href="{{ route('admin.categories.index') }}" class="breadcrumb-item active">Danh mục</a>
                    <span class="breadcrumb-item active">Thêm mới danh mục</span>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('page-content')
    <div class="content">
        <form class="row" action="{{ route('admin.categories.update',['id' => $category->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-9 col-12">
                <div class="card">
                    <div class="card-header bold">
                        <i class="ph-info"></i>
                        Thông tin danh mục
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <label for="name" class="col-form-label">
                                    Tên danh mục:
                                </label>
                                <div class="input-group">
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ $category->name }}" placeholder="Nhập tên danh mục...">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="description" class="col-form-label">
                                    Mô tả:
                                </label>
                                <div class="input-group">
                                    <textarea class="form-control" id="description" name="description" placeholder="Nhập mô tả...">{{ $category->description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="card">
                    <div class="card-header bold">
                        <i class="ph-gear-six"></i>
                        Hành động
                    </div>
                    <div class="card-body d-flex align-items-center gap-1">
                        <button class="btn btn-primary" type="submit"><i class="ph-floppy-disk"></i>Chỉnh sửa</button>
                        <a href="{{ route('admin.categories.index') }}" type="button" class="btn btn-warning"><i class="ph-arrow-counter-clockwise"></i> Trở lại</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
