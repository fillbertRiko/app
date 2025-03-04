@extends('admin.layouts.master')

@section('page-header')
<div class="page-header page-header-light shadow">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                Bài viết
            </h4>
        </div>

    </div>

    <div class="page-header-content d-lg-flex border-top">
        <div class="d-flex">
            <div class="breadcrumb py-2">
                <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                <a href="{{ route('admin.post.index') }}" class="breadcrumb-item active">Bài viết</a>
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
                    Bài viết
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.post.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="mb-3 row">
                            <label for="title" class="col-sm-2 col-form-label">Tiêu đề</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="mb-3 row">
                            <label for="thumbnail" class="col-sm-2 col-form-label">Ảnh đại diện bài viết</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail">
                                @error('thumbnail')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> -->

                        <div class="mb-3 row">
                            <label for="thumbnail" class="col-sm-2 col-form-label">Ảnh đại diện bài viết</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail" id="thumbnailInput" onchange="handleFileSelect(this, 'thumbnailPreview')">
                                <img id="thumbnailPreview" class="img-thumbnail mt-2" width="150" style="display: none;">
                                @error('thumbnail')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="content" class="col-sm-2 col-form-label">Nội dung bài viết</label>
                            <div class="col-sm-10">
                                <textarea name="content" id="editor" class="form-control  @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                                @error('content')
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
                        <a href="{{route('admin.post.index')}}" type="button" class="btn btn-warning"><i class="ph-arrow-counter-clockwise"></i> Trở lại</a>
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
        const inputs = document.querySelectorAll('form input:not([type="file"]), form textarea');
        const thumbnailInput = document.getElementById('thumbnailInput');
        const thumbnailPreview = document.getElementById('thumbnailPreview');

        if (sessionStorage.getItem('selectedFile')) {
            const fileData = JSON.parse(sessionStorage.getItem('selectedFile'));
            const file = dataURLtoFile(fileData.dataURL, fileData.name);

            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);
            thumbnailInput.files = dataTransfer.files;

            thumbnailPreview.src = fileData.dataURL;
            thumbnailPreview.style.display = 'block';
        }

        inputs.forEach(input => {
            input.addEventListener('input', function() {
                if (this.classList.contains('is-invalid')) {
                    this.classList.remove('is-invalid');
                }
                const errorElement = this.nextElementSibling;
                if (errorElement && errorElement.classList.contains('invalid-feedback')) {
                    errorElement.style.display = 'none';
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
    if (clearStorage) {
        sessionStorage.removeItem('selectedFile');
        const thumbnailPreview = document.getElementById('thumbnailPreview');
        if (thumbnailPreview) {
            thumbnailPreview.src = '';
            thumbnailPreview.style.display = 'none';
        }
        const thumbnailInput = document.getElementById('thumbnailInput');
        if (thumbnailInput) {
            thumbnailInput.value = '';
        }
    }
</script>
