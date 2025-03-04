{{--<!-- Core JS files -->--}}
<script src="{{ asset('assets/admin/demo/demo_configurator.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
{{--<!-- /core JS files -->--}}

{{--<!-- Theme JS files -->--}}
<script src="{{ asset('assets/admin/js/noty/noty.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/vendor/notifications/sweet_alert.min.js') }}"></script>
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script src="{{ asset('assets/admin/js/money/simple.money.format.js') }}"></script>
<script src="{{ asset('assets/admin/js/vendor/ui/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/vendor/pickers/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/admin/js/app.js') }}"></script>
<script src="{{ asset('assets/admin/js/init.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script type="importmap">
    {
        "imports": {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/42.0.2/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/42.0.2/"
        }
    }
</script>

<script type="module">
    import {
        ClassicEditor,
        Essentials,
        Bold,
        Italic,
        Font,
        Paragraph,
        Alignment,
        Image,
        ImageToolbar,
        ImageCaption,
        ImageStyle,
        ImageResize,
        ImageInsert,
        ImageUpload,
        AutoImage,
        SimpleUploadAdapter
    } from 'ckeditor5';

    // Thêm CSS cho hình ảnh responsive
    const style = document.createElement('style');
    style.innerHTML = `
        .ck-content img {
            max-width: 100%;
            height: auto;
        }
    `;
    document.head.appendChild(style);

    function ImageResponsivePlugin(editor) {
        editor.conversion.for('downcast').add(dispatcher => {
            dispatcher.on('insert:image', (evt, data, conversionApi) => {
                const viewWriter = conversionApi.writer;
                const figure = conversionApi.mapper.toViewElement(data.item);
                const imageElement = figure.getChild(0);

                viewWriter.setAttribute('class', 'img-responsive', imageElement);
                viewWriter.removeAttribute('style', imageElement);
            });
        });
    }
    ClassicEditor
        .create(document.querySelector('#editor'), {
            plugins: [
                Essentials, Bold, Italic, Font, Paragraph, Alignment,
                Image, ImageToolbar, ImageCaption, ImageStyle, ImageResize, ImageInsert, ImageUpload, AutoImage, ImageResponsivePlugin, SimpleUploadAdapter
            ],
            toolbar: {
                items: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
                    'alignment:left', 'alignment:center', 'alignment:right', 'alignment:justify', '|',
                    'imageInsert', 'blockQuote'
                ]
            },
            image: {
                toolbar: [
                    'imageTextAlternative', 'imageStyle:full', 'imageStyle:side'
                ],
                styles: ['full', 'side'],
                upload: {
                    types: ['jpeg', 'png', 'gif', 'bmp', 'webp', 'tiff']
                }
            },
            imageInsert: {
                type: ['auto', 'url']
            },
            simpleUpload: {
                uploadUrl: '{{ route("admin.post.upload-image") }}',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                withCredentials: true,
                responseType: 'json'
            }
        })
        .then(editor => {
            console.log('Editor was initialized', editor);

        })
        .catch(error => {
            console.error(error);
        });
</script>



{{--<!-- /theme JS files -->--}}

{{--<!-- JS custom -->--}}
@yield('script_custom')
{{--<!-- /JS custom  -->--}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('order-cancel', (id) => {
            Swal.fire({
                title: "Bạn có chắc hủy đơn hàng này không?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Có, hủy đơn!",
                cancelButtonText: "Không!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('confirmCancel', id);
                    Swal.fire({
                        title: "Hủy đơn thành công!",
                        icon: "success"
                    });
                }
            });
        });
    });
</script>

