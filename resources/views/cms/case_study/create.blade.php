@extends('rcms::layout.index')
@section('content')
    @component('rcms::components.breadcrumb')
        @slot('title')
            Thêm
        @endslot
        @slot('title2')
            <a href="{{ route('rcms.posts.index') }}">Article</a>
        @endslot
    @endcomponent

    <div class="row ">
        <div class="col-10 col-xxl-10 mx-auto">
            <div class=" rsolution-card-shadow">
                <div class="rsolution-card-header border-bottom">
                    <div class="row d-flex align-items-center">
                        <div class="col">
                            <span class="title">Thông tin bài đăng</span>
                        </div>
                    </div>
                </div>
                <div class="rsolution-card-body">
                    <form id="form-create" action="{{ route('rcms.case-study.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="author_id" value="{{ Auth::id() }}">
                        <div class="form-group">
                            <label for="name">Title <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="title" placeholder="Tên tiêu đề "
                                value="{{ old('title') }}" maxlength="255" required>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label for="name">Slug <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="slug" placeholder=""
                                    value="{{ old('slug') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <label for="name">Meta Description <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" value="{{ old('meta_description') }}"
                                    name="meta_description" maxlength="160" required>
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-3">
                                <label for="name">Pin</label>
                                <select class="custom-select custom-select-lg" name="special">
                                    <option value="0" selected>Normal</option>
                                    <option value="1">Banner</option>
                                </select>
                            </div>
                            <div class="col-3" data-target="category">
                                <label for="category_id">Category <span class="text-danger">*</span> <a href="{{route('rcms.categories.index')}}">+</a> </label>
                                <select name="category_id" class="custom-select custom-select-lg" required>
                                    <option value="">Select</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-3">
                                <label for="">Related Case Studies <span class="text-danger">*</span></label>
                                <input type="text" id="search_blog" class="form-control form-control-lg mb-2"
                                    placeholder="search...">
                                <div id="blog-selected">

                                </div>
                                <input type="hidden" value="{{ $cases }}" id="blog-data">
                                <div style="max-height: 200px;" class="rsolution-scrollbar" id="blog-container">
                                    @foreach ($cases as $item)
                                        <div class="form-check mb-2" data-target="blog-item"
                                            data-value="{{ $item->id }}" data-title="{{ $item->title }}"
                                            data-id="blog{{ $item->id }}"
                                            onclick="addSelectedBlog(`blog{{ $item->id }}`)">
                                            <input class="form-check-input" id="blog{{ $item->id }}" type="checkbox"
                                                value="{{ $item->id }}">
                                            <label class="form-check-label" for="blog{{ $item->id }}">
                                                {{ $item->title }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-3">
                                <label for="name">Thumbnail <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="button" data-target="lfm" data-input="thumbnail"
                                        data-preview="thumbnail-preview" value="Upload">
                                    <input id="thumbnail" class="form-control" type="text" name="thumbnail"
                                        value="{{ old('thumbnail') }}" accept="image/png, image/gif, image/jpeg" required>
                                </div>
                                <div id="thumbnail-preview">

                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label for="name">Content Slide</label>
                                <div class="input-group">
                                    <input type="button" data-target="lfm" data-input="preview"
                                        data-preview="images-preview" value="Upload">
                                    <input id="preview" class="form-control" type="text" name="preview"
                                        value="{{ old('preview') }}" accept="image/png, image/gif, image/jpeg">
                                </div>
                                <div id="images-preview">

                                </div>
                            </div>
                        </div>


                        <div class="form-group row mt-50">
                            <div class="col-12 h2">Banner <span class="text-danger">*</span> <i
                                    class="fas fa-info pointer ml-2 text-danger" data-bs-toggle="tooltip"
                                    data-toggle="modal" data-target="#modal-note"></i></div>

                            <div class="col">
                                <label for="name">Background <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="button" data-target="lfm" data-input="background"
                                        data-preview="background-preview" value="Upload">
                                    <input id="background" name="banner[background]" class="form-control" type="text"
                                        accept="image/png, image/gif, image/jpeg" value="{{ old('banner.background') }}">
                                </div>
                                <div>{{ old('banner[background]') }}</div>
                                <div id="background-preview">

                                </div>
                            </div>
                            <div class="col">
                                <label for="name">Logo <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="button" data-target="lfm" data-input="logo"
                                        data-preview="logo-preview" value="Upload">
                                    <input id="logo" class="form-control" type="text" name="banner[logo]"
                                        value="{{ old('banner.logo') }}" accept="image/png, image/gif, image/jpeg"
                                        required>
                                </div>
                                <div id="logo-preview">

                                </div>
                            </div>

                            <div class="col">
                                <label for="name">Graphic</label>
                                <div class="input-group">
                                    <input type="button" data-target="lfm" data-input="graphic"
                                        data-preview="graphic-preview" value="Upload">
                                    <input id="graphic" class="form-control" type="text" name="banner[graphic]"
                                        value="{{ old('banner.graphic') }}" accept="image/png, image/gif, image/jpeg">
                                </div>
                                <div id="graphic-preview">

                                </div>
                            </div>

                            <div class="col" data-target="case-study">
                                <label class="font-weight-normal">Title color</label>
                                <input class="form-control" type="color" name="banner[color]"
                                    placeholder="ex: #f5f6fd" value="{{ old('banner.color') }}">
                            </div>

                        </div>

                        {{-- <div class="form-group row">
                            <div class="col">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" name="name" placeholder=""
                                    value="{{ old('name') }}" maxlength="255" required>
                            </div>
                            <div class="col">
                                <label for="name">Job title</label>
                                <input class="form-control" type="text" name="job_title" placeholder=""
                                    value="{{ old('name') }}" maxlength="255" required>
                            </div>
                            <div class="col">
                                <label for="name">Summary</label>
                                <input class="form-control" type="text" name="summary" placeholder=""
                                    value="{{ old('summary') }}" maxlength="255" required>
                            </div>
                            <div class="col">
                                <label class="font-weight-normal">Avatar</label>
                                <div class="input-group">
                                    <input type="button" data-target="lfm" data-input="avatar" value="Upload"
                                        data-preview="avatar-preview">
                                    <input id="avatar" class="form-control" type="text" name="avatar"
                                        value="{{ old('avatar') }}" accept="image/png, image/gif, image/jpeg" required>
                                </div>
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <div class="d-flex">
                                <label for="name" class="mr-auto">Content</label>
                                <span class="pointer text-primary ml-4 " data-toggle="modal" data-target="#ctaModal"><i
                                        class="fa-solid fa-circle-plus"></i> CTA</span>
                            </div>
                            <textarea id="content" name="content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary float-right" id="btn-submit">Create</button>
                        <button type="reset" class="btn btn-danger float-right mr-2">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="content-container" class="d-none"></div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Outline</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="table-of-content"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="submit-btn">Save</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modal-note" tabindex="-1" role="dialog">
        <div class="modal-xl modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="/themes/writerzen/img/note-banner.png" alt="">
                </div>
            </div>

        </div>
    </div>

    <!-- Modal CTA -->
    <div class="modal fade" id="ctaModal" tabindex="-1" aria-labelledby="ctaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ctaModalLabel">Insert CTA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex flex-column px-20" style="gap: 20px">
                        <div class="row align-items-center">
                            <div class="col-1">
                                <input type="radio" name="case-study" id="banner-1" class="form-check-input">
                            </div>
                            <div class="col-11 position-relative">
                                <label for="banner-1" class="position-absolute w-100 h-100" style="z-index: 2"></label>
                                <div class="row align-items-center p-20"
                                    style="background: linear-gradient(92.02deg, #DFE8FF -53.61%, #F4F7FF 117.39%); border-radius: 20px; ">
                                    <div class="col-4">
                                        <h5>How WriterZen help us do more with money</h5>
                                    </div>
                                    <div class="col-4">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et massa mi. Aliquam
                                            in
                                            hendrerit
                                            urna. Pellentesque sit amet sapien
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <img src="/themes/writerzen/img/case-study/circle.png" alt="bg"
                                            alt="bg">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col-1">
                                <input type="radio" name="case-study" id="banner-2" class="form-check-input">
                            </div>
                            <div class="col-11">
                                <label for="banner-2" class="position-absolute w-100 h-100" style="z-index: 2"></label>

                                <div class="row align-items-center p-20 text-white"
                                    style="background: linear-gradient(100.16deg, #2BC1C1 -7.86%, #295DFB 123.86%); border-radius: 20px;">
                                    <div class="col-4">
                                        <h5>How WriterZen help us do more with money</h5>
                                    </div>
                                    <div class="col-4 text-center border-right">
                                        <h4>20%</h4>
                                        <p>
                                            title thông số
                                        </p>
                                    </div>
                                    <div class="col-4 text-center">
                                        <h4>97/100</h4>
                                        <p>
                                            title thông số
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row align-items-center text-white">
                            <div class="col-1">
                                <input type="radio" name="case-study" id="banner-3" class="form-check-input">
                            </div>
                            <div class="col-11">
                                <label for="banner-3" class="position-absolute w-100 h-100" style="z-index: 2"></label>

                                <div class="row align-items-center p-20"
                                    style="background: linear-gradient(100.16deg, #2BC1C1 -7.86%, #295DFB 123.86%); border-radius: 20px; ">
                                    <div class="col-4 text-center border-right">
                                        <h4>20%</h4>
                                        <p>
                                            title thông số
                                        </p>
                                    </div>
                                    <div class="col-4 text-center border-right">
                                        <h4>20%</h4>
                                        <p>
                                            title thông số
                                        </p>
                                    </div>
                                    <div class="col-4 text-center">
                                        <h4>97/100</h4>
                                        <p>
                                            title thông số
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"
                        onclick="insertCta()">Insert</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('[name="title"]').keyup(function() {
            let slug = ChangeToSlug($(this).val())
            $('[name="slug"]').attr('value', slug)
        })

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.warning("{{ $error }}")
            @endforeach
        @endif
    </script>
    <script src="/vendor/laravel-filemanager/js/filemanager.min.js"></script>
    <script src="/themes/writerzen/js/rcms-custom.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="https://cdn.tiny.cloud/1/{{env('TINYMCE_API_KEY')}}/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
        rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap4-tagsinput@4.1.3/tagsinput.min.js"></script>
    <script>
        $('[data-target="lfm"]').filemanager('image');

        tinymce.init({
            selector: '#content',
            content_css: ["/themes/writerzen/css/app.css", "/themes/writerzen/css/lib/bootstrap.min.css"],
            content_style: "body { padding: 20px; }",
            height: 1000,
            plugins: [
                'a11ychecker', 'advlist', 'advcode', 'advtable', 'autolink', 'checklist', 'export',
                'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'searchreplace', 'visualblocks',
                'powerpaste', 'fullscreen', 'formatpainter', 'insertdatetime', 'media', 'table', 'help',
                'wordcount', 'code'
            ],
            toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
                'alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help | code',
            file_picker_callback: function(callback, value, meta) {
                var x = window.innerWidth || document.documentElement.clientWidth || document
                    .getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document
                    .getElementsByTagName('body')[0].clientHeight;

                var cmsURL = '/laravel-filemanager?editor=' + meta.fieldname;
                if (meta.filetype == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }
                tinyMCE.activeEditor.windowManager.openUrl({
                    url: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no",
                    onMessage: (api, message) => {
                        callback(message.content);
                    }
                });
            },
            extended_valid_elements: 'script[language|type|src]'
        });

        const radioButtons = document.querySelectorAll('input[name="case-study"]');
        let selectedValue = null;

        radioButtons.forEach(radioButton => {
            radioButton.addEventListener('change', function() {
                selectedValue = this.getAttribute('id')
            });
        });

        function insertCta() {
            let html = ``
            let bannerIndex = selectedValue.split('-')[1];
            console.log(bannerIndex);
            switch (bannerIndex) {
                case '1':
                        html = `
                                <div class="row gy-3 align-items-center"
                                    style="background: linear-gradient(92.02deg, #DFE8FF -53.61%, #F4F7FF 117.39%); border-radius: 20px; padding: 32px">
                                    <div class="col-lg-4 col-12 t">
                                        <h2 style="font-weight: 700" class="text-md-start text-center">How WriterZen help us do more with money</h2>
                                    </div>
                                    <div class="col-lg-4 col-12 t">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et massa mi. Aliquam
                                            in
                                            hendrerit
                                            urna. Pellentesque sit amet sapien
                                        </p>
                                    </div>
                                    <div class="col-lg-4 col-12 t">
                                        <img src="/themes/writerzen/img/case-study/circle.png" alt="bg"
                                            alt="bg">
                                    </div>
                                </div>
                       
                        `
                    break;

                case '2':
                    html = `
                            <div class="row gy-3 align-items-center p-20 text-white"
                                style="background: linear-gradient(100.16deg, #2BC1C1 -7.86%, #295DFB 123.86%); border-radius: 20px; padding: 32px; ">
                                <div class="col-lg-4 col-12 t">
                                    <h2 style="font-weight: 700" class="text-md-start text-center">How WriterZen help us do more with money</h2>
                                </div>
                                <div class="col-lg-4 col-12 t text-center" style="border-right: solid 1px #cfcfcf">
                                    <div style="font-size:60px; font-weight: 700">20%</div>
                                    <p>
                                        title thông số
                                    </p>
                                </div>
                                <div class="col-lg-4 col-12 t text-center">
                                    <div style="font-size:60px; font-weight: 700">97/100</div>
                                    <p>
                                        title thông số
                                    </p>
                                </div>
                            </div>
                            
				`
                    break;

                case '3':
                html = `
                            <div class="row gy-3 align-items-center p-20 text-white" 
                                style="background: linear-gradient(100.16deg, #2BC1C1 -7.86%, #295DFB 123.86%); border-radius: 20px; padding: 32px; ">
                                <div class="col-lg-4 col-12 text-center" style="border-right: solid 1px #cfcfcf">
                                    <div style="font-size:60px; font-weight: 700">20%</div>
                                    <p>
                                        title thông số
                                    </p>
                                </div>
                                <div class="col-lg-4 col-12 t text-center" style="border-right: solid 1px #cfcfcf">
                                    <div style="font-size:60px; font-weight: 700">20%</div>
                                    <p>
                                        title thông số
                                    </p>
                                </div>
                                <div class="col-lg-4 col-12 t text-center">
                                    <div style="font-size:60px; font-weight: 700">97/100</div>
                                    <p>
                                        title thông số
                                    </p>
                                </div>
                            </div>
                            
				`
                    break;
                default:
                    break;
            }
            tinymce.activeEditor.execCommand('mceInsertContent', true, html);
        }
    </script>
@endsection
