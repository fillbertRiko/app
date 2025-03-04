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
                <span class="breadcrumb-item active">Thêm mới</span>
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

                    <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="mb-3 row">
                            <label for="productName" class="col-sm-2 col-form-label">Tên sản phẩm</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('productName') is-invalid @enderror" name="productName" value="{{ old('productName') }}">
                                @error('productName')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="descript" class="col-sm-2 col-form-label">Mô tả</label>
                            <div class="col-sm-8">
                                <textarea rows="3" cols="3" class="form-control @error('descript') is-invalid @enderror" name="descript">{{ old('descript') }}</textarea>
                                @error('descript')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="price" class="col-sm-2 col-form-label">Giá</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}">
                                @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="mb-3 row">
                            <label for="thumbnail" class="col-sm-2 col-form-label">Ảnh đại diện</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail">
                                @error('thumbnail')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> -->
                        <div class="mb-3 row">
                            <label for="thumbnail" class="col-sm-2 col-form-label">Ảnh đại diện</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail" id="thumbnailInput" onchange="handleFileSelect(this, 'thumbnailPreview')">
                                <img id="thumbnailPreview" class="img-thumbnail mt-2" width="150" style="display: none;">
                                @error('thumbnail')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="mb-3 row">
                            <label for="galleries" class="col-sm-2 col-form-label">Ảnh bổ sung</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control @error('galleries.*') is-invalid @enderror" name="galleries[]" multiple>
                                @error('galleries.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> -->

                        <div class="mb-3 row">
                            <label for="galleries" class="col-sm-2 col-form-label">Ảnh bổ sung</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control @error('galleries.*') is-invalid @enderror" name="galleries[]" id="galleriesInput" multiple onchange="handleMultipleFileSelect(this, 'galleriesPreview')">
                                <div id="galleriesPreview" class="mt-2 d-flex flex-wrap gap-2"></div>
                                @error('galleries.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="quantity" class="col-sm-2 col-form-label">Số lượng</label>
                            <div class="col-sm-8">
                                <input class="form-control @error('quantity') is-invalid @enderror" type="number" name="quantity" value="{{ old('quantity') }}">
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
                        <div class="form-check mt-2">
                            <input class="form-check-input @error('category_id') is-invalid @enderror"
                                type="radio"
                                name="category_id"
                                value="{{ $category->id }}"
                                id="category{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'checked' : '' }}>
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
        const inputs = document.querySelectorAll('form input:not([type="radio"]):not([type="file"]), form textarea, form select');
        const categoryRadios = document.querySelectorAll('input[name="category_id"]');
        const categoryErrorMessage = document.querySelector('.card-body .invalid-feedback.d-block');
        const thumbnailInput = document.getElementById('thumbnailInput');
        const thumbnailPreview = document.getElementById('thumbnailPreview');
        const galleriesInput = document.getElementById('galleriesInput');
        const galleriesPreview = document.getElementById('galleriesPreview');

        // Khôi phục file đã chọn cho thumbnail nếu có
        if (sessionStorage.getItem('selectedFile')) {
            const fileData = JSON.parse(sessionStorage.getItem('selectedFile'));
            const file = dataURLtoFile(fileData.dataURL, fileData.name);

            // Tạo một DataTransfer object và thêm file vào
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);
            thumbnailInput.files = dataTransfer.files;

            // Hiển thị preview
            thumbnailPreview.src = fileData.dataURL;
            thumbnailPreview.style.display = 'block';
        }

        // Khôi phục files đã chọn cho galleries nếu có
        if (sessionStorage.getItem('selectedGalleries')) {
            const filesData = JSON.parse(sessionStorage.getItem('selectedGalleries'));
            const dataTransfer = new DataTransfer();

            filesData.forEach(fileData => {
                const file = dataURLtoFile(fileData.dataURL, fileData.name);
                dataTransfer.items.add(file);

                const img = document.createElement('img');
                img.src = fileData.dataURL;
                img.className = 'img-thumbnail';
                img.style.width = '100px';
                img.style.height = '100px';
                img.style.objectFit = 'cover';
                galleriesPreview.appendChild(img);
            });

            galleriesInput.files = dataTransfer.files;
        }

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

    function handleFileSelect(input, previewId) {
        const preview = document.getElementById(previewId);
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';

                // Lưu thông tin file vào sessionStorage
                sessionStorage.setItem('selectedFile', JSON.stringify({
                    name: file.name,
                    dataURL: e.target.result
                }));
            };
            reader.readAsDataURL(file);
        } else {
            preview.style.display = 'none';
            sessionStorage.removeItem('selectedFile');
        }
    }

    function handleMultipleFileSelect(input, previewId) {
        const preview = document.getElementById(previewId);
        preview.innerHTML = ''; // Xóa preview cũ
        const files = input.files;
        const fileData = [];

        if (files.length > 0) {
            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'img-thumbnail';
                    img.style.width = '100px';
                    img.style.height = '100px';
                    img.style.objectFit = 'cover';
                    preview.appendChild(img);

                    fileData.push({
                        name: file.name,
                        dataURL: e.target.result
                    });

                    if (fileData.length === files.length) {
                        // Lưu thông tin tất cả các file vào sessionStorage
                        sessionStorage.setItem('selectedGalleries', JSON.stringify(fileData));
                    }
                };
                reader.readAsDataURL(file);
            });
        } else {
            sessionStorage.removeItem('selectedGalleries');
        }
    }

    // Hàm hỗ trợ để chuyển đổi Data URL thành File object
    function dataURLtoFile(dataURL, filename) {
        var arr = dataURL.split(','),
            mime = arr[0].match(/:(.*?);/)[1],
            bstr = atob(arr[1]),
            n = bstr.length,
            u8arr = new Uint8Array(n);
        while (n--) {
            u8arr[n] = bstr.charCodeAt(n);
        }
        return new File([u8arr], filename, {
            type: mime
        });
    }

</script>
