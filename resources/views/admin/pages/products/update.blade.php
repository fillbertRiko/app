@extends('admin.layouts.master')

@section('page-header')
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                Sản phẩm
            </h4>
        </div>

    </div>

    <div class="page-header-content d-lg-flex border-top">
        <div class="d-flex">
            <div class="breadcrumb py-2">
                <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                <a href="{{ route('admin.products.index') }}" class="breadcrumb-item active">Sản phẩm</a>
                <span class="breadcrumb-item active">Cập nhật</span>
            </div>
        </div>

    </div>
</div>
@endsection

@section('page-content')
<div class="content">
    <!-- Content -->
    <div class="row">
        <div class="col-md-9 col-12">
            <div class="card">
                <div class="card-header bold">
                    <i class="ph-info"></i>
                    Thông tin sản phẩm
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 row">
                            <label for="productName" class="col-sm-2 col-form-label">Tên sản phẩm</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('productName') is-invalid @enderror" name="productName" value="{{ $product->name }}">
                                @error('productName')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="descript" class="col-sm-2 col-form-label">Mô tả</label>
                            <div class="col-sm-8">
                                <textarea rows="3" cols="3" class="form-control @error('descript') is-invalid @enderror" name="descript"> {{ $product->description}}</textarea>
                                @error('descript')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="price" class="col-sm-2 col-form-label">Giá</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price}}">
                                @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="thumbnail" class="col-sm-2 col-form-label">Hình ảnh</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail" accept="image/*">
                                @error('thumbnail')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="galleries" class="col-sm-2 col-form-label">Ảnh bổ sung</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control @error('galleries.*') is-invalid @enderror" name="galleries[]" multiple>
                                @error('galleries.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="status" class="col-sm-2 col-form-label">Trạng thái</label>
                            <div class="col-sm-8">
                                <select id="status" class="form-select @error('status') is-invalid @enderror" name="status">
                                    <option value="">Chọn trạng thái</option>
                                    @foreach(App\Enums\Status::cases() as $status)
                                    <option value="{{ $status->value }}" {{ old('status', $product->status) == $status->value ? 'selected' : '' }}>
                                        {{ $status->description() }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="quantity" class="col-sm-2 col-form-label">Số lượng</label>
                            <div class="col-sm-8">
                                <input class="form-control @error('quantity') is-invalid @enderror" type="number" name="quantity" value="{{ $product->quantity }}" {{ $product->status === App\Enums\Status::OutOfStock->value ? 'disabled' : '' }}>
                                @error('quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                </div>
            </div>
        </div>
        <div class="col-md-3 col-12">
            <div class="card mb-3">
                <div class="card-header bold">
                        <i class="ph-gear-six"></i>
                        Hành động
                    </div>
                <div class="card-body d-flex align-items-center gap-1">
                        <button type="submit" class="btn btn-primary"><i class="ph-floppy-disk"></i> Lưu</button>
                        <a href="{{ route('admin.products.index') }}" type="button" class="btn btn-warning"><i class="ph-arrow-counter-clockwise"></i> Trở lại</a>
                    </div>
            </div>

            <div class="card mb-3">
                <div class="card-header bold">
                        <i class="ph-stack"></i>
                        Danh mục
                    </div>
                <div class="card-body">
                        @foreach($categories as $category)
                        <div class="form-check">
                            <input class="form-check-input @error('category_id') is-invalid @enderror" type="radio" name="category_id" value="{{ $category->id }}" id="category{{ $category->id }}" {{ $product->category_id == $category->id ? 'checked' : '' }}>
                            <label class="form-check-label" for="category{{ $category->id }}">
                                {{ $category->name }}
                            </label>
                        </div>
                        @endforeach
                        @error('category_id')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
            </div>
        </div>
        </form>
    </div>
    <!-- /content -->

</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputs = document.querySelectorAll('form input:not([type="radio"]), form textarea, form select');
        const categoryRadios = document.querySelectorAll('input[name="category_id"]');
        const categoryErrorMessage = document.querySelector('.card-body .invalid-feedback.d-block');

        inputs.forEach(input => {
            input.addEventListener('input', function() {
                this.classList.remove('is-invalid');
                const errorElement = this.closest('.col-sm-8')?.querySelector('.invalid-feedback');
                if (errorElement) {
                    errorElement.classList.remove('d-block');
                }
            });
        });

        categoryRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                categoryRadios.forEach(r => r.classList.remove('is-invalid'));
                if (categoryErrorMessage) {
                    categoryErrorMessage.classList.remove('d-block');
                }
            });
        });
    });
</script>
