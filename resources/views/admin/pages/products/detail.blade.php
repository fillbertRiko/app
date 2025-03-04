@extends('admin.layouts.master')

@section('page-header')
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                Chi tiết sản phẩm
            </h4>
        </div>
    </div>

    <div class="page-header-content d-lg-flex border-top">
        <div class="d-flex">
            <div class="breadcrumb py-2">
                <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                <a href="{{ route('admin.products.index') }}" class="breadcrumb-item">Sản phẩm</a>
                <span class="breadcrumb-item active">Chi tiết</span>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-content')
<div class="content">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Chi tiết sản phẩm: {{ $product->name }}</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset($product->thumbnail) }}" alt="{{ $product->name }}" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h3>{{ $product->name }}</h3>
                    <p>{{ $product->description }}</p>
                    <p>Giá: {{ number_format($product->price, 0, ',', '.') }} ₫</p>
                    <p>Số lượng: {{ $product->quantity }}</p>
                    <p>
                        Trạng thái:
                        <span class="badge {{ $product->status === \App\Enums\Status::InStock ? 'bg-success' : 'bg-danger' }}">
                            {{ $product->status->description() }}
                        </span>
                    </p>
                    <p>Danh mục: {{ $product->category->name }}</p>
                </div>
            </div>

            <h4 class="mt-4">Hình ảnh bổ sung</h4>
            @if($product->galeries->isNotEmpty())
            <div class="row">
                @foreach($product->galeries as $gallery)
                <div class="col-md-3 mb-3">
                    <img src="{{ asset($gallery->thumbnail) }}" alt="Gallery image" class="img-fluid">
                </div>
                @endforeach
            </div>
            @else
            <p>Không có hình ảnh bổ sung.</p>
            @endif
        </div>
    </div>
</div>
@endsection