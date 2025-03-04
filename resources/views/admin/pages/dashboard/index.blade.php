@extends('admin.layouts.master')

@section('page-header')
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                Bảng điều khiển
            </h4>
        </div>
    </div>

    <div class="page-header-content d-lg-flex border-top">
        <div class="d-flex">
            <div class="breadcrumb py-2">
                <a href="#" class="breadcrumb-item"><i class="ph-house"></i></a>
                <span class="breadcrumb-item active">Bảng điều khiển</span>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-content')
<style>
    .card {
        overflow: hidden;
    }

    .darker-bg {
        background-color: rgba(0, 0, 0, 0.1);
        padding: 10px;
        margin-left: -1rem;
        margin-right: -1rem;
        margin-bottom: -1rem;
    }

    .darker-bg a {
        text-decoration: none;
    }
</style>
<div class="content">
    <div class="row">

        <div class="col-lg-3">
            <div class="card bg-pink text-white">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h1 class="mb-0">{{ $productCount }}</h1>
                            <div>Sản phẩm</div>
                        </div>
                        <div>
                            <i class="ph-tote-simple fs-1" style="transform: scale(2.9); margin-right: 20px; color: rgba(255, 255, 255, 0.5);"></i>
                        </div>
                    </div>
                    <div class="darker-bg mt-auto">
                        <a href="{{route('admin.products.index')}}" class="text-white d-flex justify-content-between align-items-center">
                            <span>Xem chi tiết</span>
                            <i class="ph-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card bg-primary text-white">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h1 class="mb-0">{{ $categoryCount }}</h1>
                            <div>Danh mục</div>
                        </div>
                        <div>
                            <i class="ph-stack fs-1" style="transform: scale(2.9); margin-right: 20px; color: rgba(255, 255, 255, 0.5);"></i>
                        </div>
                    </div>
                    <div class="darker-bg mt-auto">
                        <a href="{{route('admin.categories.index')}}" class="text-white d-flex justify-content-between align-items-center">
                            <span>Xem chi tiết</span>
                            <i class="ph-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card bg-teal text-white">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h1 class="mb-0">{{ $postCount }}</h1>
                            <div>Bài viết</div>
                        </div>
                        <div>
                            <i class="ph-newspaper fs-1" style="transform: scale(2.9); margin-right: 20px; color: rgba(255, 255, 255, 0.5);"></i>
                        </div>
                    </div>
                    <div class="darker-bg mt-auto">
                        <a href="{{route('admin.post.index')}}" class="text-white d-flex justify-content-between align-items-center">
                            <span>Xem chi tiết</span>
                            <i class="ph-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card bg-warning text-white">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h1 class="mb-0">{{ $orderCount }}</h1>
                            <div>Đơn hàng</div>
                        </div>
                        <div>
                            <i class="ph-shopping-bag fs-1" style="transform: scale(2.9); margin-right: 20px; color: rgba(255, 255, 255, 0.5);"></i>
                        </div>
                    </div>
                    <div class="darker-bg mt-auto">
                        <a href="{{route('admin.orders.index')}}" class="text-white d-flex justify-content-between align-items-center">
                            <span>Xem chi tiết</span>
                            <i class="ph-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>Thống kê đơn hàng</h5>
            </div>
            <div class="card-body">
                <canvas id="orderChart" height="100"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-12 mt-4">
        <div class="card">
            <div class="card-header">
                <h5>Thống kê doanh thu theo tháng</h5>
            </div>
            <div class="card-body">
                <canvas id="revenueChart" height="100"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    const ctx = document.getElementById('orderChart').getContext('2d');
    const orderChart = new Chart(ctx, {
        type: 'bar',
        data: {
            //labels: {!! json_encode($months) !!},  
            datasets: [{
                label: 'Số lượng đơn hàng',
                data: {!! json_encode($ordersPerMonth) !!},  
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('revenueChart').getContext('2d');
        
        const sortedRevenueData = {!! json_encode($revenuePerMonth) !!};
        const sortedMonths = Object.keys(sortedRevenueData).sort((a, b) => a - b);  
        const sortedValues = sortedMonths.map(month => sortedRevenueData[month]);   

        const chartData = {
            labels: sortedMonths,  
            datasets: [{
                label: 'Doanh thu',
                data: sortedValues,  
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 2,
                fill: true,
                tension: 0.4  
            }]
        };

        const config = {
            type: 'line',
            data: chartData,
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Tháng'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Doanh thu (VND)'
                        },
                        beginAtZero: true
                    }
                }
            }
        };

        const revenueChart = new Chart(ctx, config);
    });
</script>

@endsection