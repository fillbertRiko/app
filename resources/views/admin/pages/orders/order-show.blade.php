@extends('admin.layouts.master')

@section('page-header')
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    Đơn hàng
                </h4>
            </div>

        </div>

        <div class="page-header-content d-lg-flex border-top">
            <div class="d-flex">
                <div class="breadcrumb py-2">
                    <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                    <a href="{{ route('admin.orders.index') }}" class="breadcrumb-item active">Tất cả đơn hàng</a>
                    <span class="breadcrumb-item active">Xem chi tiết đơn hàng</span>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('page-content')
    <div class="content">
        <!-- Content -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Chi tiết đơn hàng
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-8">
                                <span class="text-muted">Nơi gửi: </span>
                                <ul class="list-unstyled">
                                    <li><h6 class="mb-0 mt-2">Cửa hàng Cóincidence</h6></li>
                                    <li>Địa chỉ shop: Huyện Kim Sơn, tỉnh Ninh Bình</li>
                                    <li>Số điện thoại : {{ $user->phone_number }}</li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div>
                                    <h5 class="text-uppercase text-semibold">Đơn hàng: <span class="text-primary">#{{ $order->code }}</span> </h5>
                                    <ul class="list-condensed list-unstyled">
                                        <li>Ngày: <span class="text-semibold">{{ $order->order_date }}</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-8">
                                <span class="text-muted mt-2">Nơi nhận: </span>
                                <ul class="list-unstyled">
                                    <li><h6 class="mb-0 mt-2">{{ $order->fullname }}</h6></li>
                                    @if($ward == null && $district == null && $province == null)
                                        <li>Địa chỉ: {{ $order->address }}</li>
                                    @else
                                        <li>Địa chỉ: {{ $order->address }}, {{ $ward }}, {{ $district }}, {{ $province }}</li>
                                    @endif
                                    <li>Số điện thoại: {{ $order->phone_number }}</li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <span class="text-muted"> Thông tin thanh toán:</span>
                                <ul class="list-unstyled">
                                    <li><h6 class="mb-0 mt-2">Tổng tiền: <span class="text-right">{{ number_format($order->total, 0, ',', '.') }} VNĐ</span></h6></li>
                                    <li>Phương thức: Thanh toán khi nhận hàng</li>
                                    <li>Trạng thái: {!! $order->statusText !!}</li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <span class="text-muted">Chi tiết sản phầm: </span>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <span class="text-muted">
                                    <b>
                                        <span class="">{{ $products->count() }} sản phẩm</span>
                                    </b>
                                </span>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th width="100px"></th>
                                    <th>Sản phẩm</th>
                                    <th class="text-center">Đơn giá</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-center">Tạm tính</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>
                                            <div style="width: 170px; height: 200px; object-fit: cover">
                                                <img src="{{ asset($product->pivot->thumbnail) }}" alt="{{ $product->pivot->name }}" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">{{ $product->name }}</h6>
                                        </td>
                                        <td class="text-center">{{ number_format($product->pivot->price) }} VNĐ</td>
                                        <td class="text-center">{{ $product->pivot->quantity }}</td>
                                        <td class="text-center">{{ number_format($product->pivot->price * $product->pivot->quantity) }} VNĐ</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('admin.orders.index') }}" class="btn btn-danger">Quay lại</a>
                            </div>
                            <div class="col-md-3">
                                <span class="text-muted d-flex justify-content-end"><h4><b>Tổng tiền: </b></h4></span>
                            </div>
                            <div class="col-md-3">
                                <span class="text-primary d-flex justify-content-end"><h4>{{ number_format($order->total, 0, ',', '.') }} VNĐ</h4></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /content -->

    </div>
@endsection




