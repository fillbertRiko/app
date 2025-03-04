@extends('admin.layouts.master')

@section('page-header')
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                Chi tiết bài viết
            </h4>
        </div>
    </div>

    <div class="page-header-content d-lg-flex border-top">
        <div class="d-flex">
            <div class="breadcrumb py-2">
                <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                <a href="{{ route('admin.post.index') }}" class="breadcrumb-item">Bài viết</a>
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
            <h5 class="card-title">{{ $post->title }}</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-10">
                {!! $post->content !!}
                </div>
            </div>


        </div>
    </div>
</div>
@endsection