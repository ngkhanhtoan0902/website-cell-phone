@extends('rcms::layout.index')
@section('content')
    @component('rcms::components.breadcrumb')
        @slot('title')
            {{ $data->title }}
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
                            <span class="title">Thông tin</span>
                        </div>
                    </div>
                </div>
                <div class="rsolution-card-body">
                    <form id="form-create" action="{{ route('rcms.materials.update', $data->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="name">Title<span class="text-danger fs-18">*</span></label>
                            <input class="form-control" type="text" name="title" placeholder="Tên tiêu đề "
                                value="{{ $data->title }}" required maxlength="255">
                        </div>
                        <div class="form-group">
                            <label for="name">Subtitle</label>
                            <input class="form-control" type="text" name="subtitle" placeholder="Tên tiêu đề "
                                value="{{ $data->subtitle }}" maxlength="255">
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label for="name">Slug<span class="text-danger fs-18">*</span></label>
                                <input class="form-control" type="text" name="slug" placeholder=""
                                    value="{{ $data->slug }}" required>
                            </div>
                            <div class="col">
                                <label for="name">Meta Description<span class="text-danger fs-18">*</span></label>
                                <input class="form-control" type="text" value="{{ $data->description }}"
                                    name="description" maxlength="160" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="">Type<span class="text-danger fs-18">*</span></label>
                                        <select name="category_id" class="form-control" required>
                                            @foreach ($categories as $cate)
                                                <option value="{{ $cate->id }}"
                                                    {{ $cate->id == $data->category_id ? 'selected' : '' }}>
                                                    {{ $cate->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="d-flex">
                                            <label for="">Form Id<span class="text-danger fs-18">*</span></label>
                                            <i class="fas fa-info pointer ml-2" data-bs-toggle="tooltip" data-toggle="modal"
                                                data-target="#modal-note"></i>
                                        </div>
                                        <div class="input-group">
                                            <textarea class="form-control" name="form_submit">{{ $data->form_submit }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="">Related Materials<span class="text-danger fs-18">*</span></label>
                                        <input type="text" id="search_materials" class="form-control mb-2"
                                            placeholder="search...">
                                        <div id="materials-selected">
                                            @if (!empty($data->related_ids))
                                                @foreach ($data->related_ids as $item)
                                                    <input name="related_ids[]" value="{{ $item }}" type="hidden"
                                                        data-target="selected-material"
                                                        data-id="material{{ $item }}">
                                                @endforeach
                                            @endif
                                        </div>
                                        <input type="hidden" value="{{ $materials }}" id="materials-data">
                                        <div style="max-height: 200px;" class="rsolution-scrollbar"
                                            id="materials-container">
                                            @foreach ($materials as $item)
                                                <div class="form-check mb-2" data-target="material-item"
                                                    data-value="{{ $item->id }}" data-title="{{ $item->title }}"
                                                    data-id="material{{ $item->id }}"
                                                    onclick="addSelectedMaterials(`material{{ $item->id }}`)">
                                                    <input class="form-check-input" id="material{{ $item->id }}"
                                                        type="checkbox" value="{{ $item->id }}" name="related_ids[]"
                                                        {{ $data->related_ids && in_array($item->id, $data->related_ids) ? 'checked' : null }}>
                                                    <label class="form-check-label" for="material{{ $item->id }}">
                                                        <span class="text-primary">{{ $item->title }}</span>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="">Related Blog<span class="text-danger fs-18">*</span></label>
                                        <input type="text" id="search_blog_material" class="form-control mb-2"
                                            placeholder="search...">
                                        <div id="blog-selected">
                                            @if (!empty($data->related_blog_ids))
                                                @foreach ($data->related_blog_ids as $item)
                                                    <input name="related_blog_ids[]" value="{{ $item }}"
                                                        type="hidden" data-target="selected-blog"
                                                        data-id="blog{{ $item }}">
                                                @endforeach
                                            @endif
                                        </div>
                                        <input type="hidden" value="{{ $blog }}" id="blog-data-material">
                                        <div style="max-height: 200px;" class="rsolution-scrollbar" id="blog-container-material">
                                            @foreach ($blog as $item)
                                                <div class="form-check mb-2" data-target="blog-item-material"
                                                    data-value="{{ $item->id }}" data-title="{{ $item->title }}"
                                                    data-id="blog{{ $item->id }}"
                                                    onclick="addSelectedBlog(`blog{{ $item->id }}`)">
                                                    <input class="form-check-input" id="blog{{ $item->id }}"
                                                        type="checkbox"
                                                        {{ $data->related_blog_ids && in_array($item->id, $data->related_blog_ids) ? 'checked' : null }}>
                                                    <label class="form-check-label" for="blog{{ $item->id }}">
                                                        {{ $item->title }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col">
                                        <label for="name">Thumbnail<span class="text-danger fs-18">*</span></label>
                                        <div class="input-group">
                                            <input type="button" data-target="lfm-image" data-input="thumbnail"
                                                data-preview="thumbnail-preview" value="Upload" re>
                                            <input id="thumbnail" class="form-control" type="text" name="thumbnail"
                                                value="{{ $data->thumbnail }}" required
                                                accept="image/png, image/gif, image/jpeg" required>
                                        </div>
                                        <div id="thumbnail-preview">
                                            <img id="thumbnail" width="100%" src="{{ $data->thumbnail }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="name">Graphic<span class="text-danger fs-18">*</span></label>
                                        <div class="input-group">
                                            <input type="button" data-target="lfm-image" data-input="graphic"
                                                data-preview="graphic-preview" value="Upload">
                                            <input id="graphic" class="form-control" type="text" name="graphic"
                                                value="{{ $data->graphic }}" required
                                                accept="image/png, image/gif, image/jpeg" required>
                                        </div>
                                        <div id="graphic-preview">
                                            <img id="thumbnail" width="100%" src="{{ $data->graphic }}"
                                                alt="">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-2">
                                <label for="name">Image Preview</label>
                                <div class="input-group">
                                    <input type="button" data-target="lfm-image" data-input="images"
                                        data-preview="images-preview" value="Upload">
                                    <input id="images" class="form-control" type="text" name="preview"
                                        value="{{ @implode(',', $data->preview) }}"
                                        accept="image/png, image/gif, image/jpeg">
                                </div>
                            </div>
                            @if (!empty($data->preview))
                                @foreach ($data->preview as $index => $preview)
                                    <div class="col-auto">
                                        <div id="images-preview-{{ $index }}"
                                            style="margin-top:15px;width:150px;">
                                            <img src="{{ $preview }}" alt="">
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-group row">
                            <div class="col-3">
                                <label for="name">File</label>
                                <div class="input-group mb-10">
                                    <input class="p-0" type="file" value="Upload" name="file" class="mb-2">
                                    <div class="px-3">
                                        <a href="{{ $data->url }}?ver={{$data->updated_at->getTimestamp()}}" target="_blank">{{ $data->url }}?ver={{$data->updated_at->getTimestamp()}}</a>
                                    </div>

                                </div>
                            </div>
                            <div class="col-4">
                                <label for="name">Url</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="material_folder"
                                        value="{{ !empty($data->url) ? explode('/', $data->url)[1] : '' }}"
                                        placeholder="Folder">
                                    <input class="form-control" type="text" name="material_file"
                                        value="{{ !empty($data->url) ? explode('.', explode('/', $data->url)[2])[0] : '' }}"
                                        placeholder="File name" readonly>
                                </div>
                            </div>
                            <div class="col ">
                                <label for="name">Url Preview</label>
                                <div class="text-info">
                                    {{ env('APP_URL') }}/<span data-target="material_folder"></span>/<span
                                        data-target="material_file"></span>.{file-type}
                                </div>
                            </div>
                            <div class="col ">
                                <label for="name">Status</label>
                                <select name="status" class=" custom-select custom-select-lg">
                                    <option value="-1" {{ $data->status == -1 ? 'Selected' : '' }}>Inactive</option>
                                    <option value="1" {{ $data->status == 1 ? 'Selected' : '' }}>Active</option>
                                    <option value="2" {{ $data->status == 2 ? 'Selected' : '' }}>Banner</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="d-flex align-items-center">
                                <label for="name">Content</label>
                                <span class="badge badge-primary pointer ml-3 mb-3" id="insert-content-btn">Insert
                                    sample</span>
                            </div>
                            <textarea id="content" name="content">{{ $data->content }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary float-right" id="btn-submit">Update</button>
                        <button type="reset" class="btn btn-danger float-right mr-2">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="content-container" class="d-none"></div>

    <div class="modal fade" id="modal-note" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="/themes/writerzen/img/note-form-id.png" alt="">
                </div>
            </div>

        </div>
    </div>
@endsection

@section('js')
    <script>
        $('[name="title"]').keyup(function() {
            let slug = ChangeToSlug($(this).val())
            $('[name="slug"]').val(slug)
            $('[name="material_file"]').val(slug)
            $('[data-target="material_file"]').text(slug)

        })

        $('[name="slug"]').keyup(function() {
            $('[name="material_file"]').val($(this).val())
            $('[data-target="material_file"]').text($(this).val())
        })

        $('[name="material_folder"]').keyup(function() {
            $('[data-target="material_folder"]').text($(this).val())
        })

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.warning("{{ $error }}")
            @endforeach
        @endif
    </script>
    <script src="/vendor/laravel-filemanager/js/filemanager.min.js"></script>
    <script src="/themes/writerzen/js/rcms-custom.js?{{ env('VERSION') }}"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="https://cdn.tiny.cloud/1/{{env('TINYMCE_API_KEY')}}/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
        rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap4-tagsinput@4.1.3/tagsinput.min.js"></script>
    <script>
        $('[data-target="lfm-image"]').filemanager('image');
        $('[data-target="lfm-file"]').filemanager('file');

        tinymce.init({
            selector: '#content',
            content_css: ["/themes/writerzen/css/app.css", "/themes/writerzen/css/lib/bootstrap.min.css",
                "/themes/writerzen/lib/fontawesome/css/all.min.css"
            ],
            content_style: "body { padding: 20px; }",
            height: 700,
            extended_valid_elements: 'i[class|style]',
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
        });

        $('#insert-content-btn').click(function() {
            html = `
				<div class="">
					<div class="h1 mb-20 fw-normal">About This Free Guide</div>
					<div class="h5 mb-20 fw-normal">A comprehensive eBook that covers the fundamentals of keyword research. It is ideal for beginners looking to improve their SEO knowledge and for experienced writers who want to refresh their skills.&nbsp;</div>
					<div class="h5 mb-20 fw-normal">Here are some of the key topics covered in the eBook:</div>
					<ul class="d-flex flex-column h5 mb-0 fw-semibold" style="gap:10px">
						<li><i class="fa-solid fa-badge-check h5 mb-0 me-2" style="color: #5e89fc;"></i>The basics of keyword research and why it's important for SEO</li>
						<li><i class="fa-solid fa-badge-check h5 mb-0 me-2" style="color: #5e89fc;"></i>The steps to do keyword research effectively</li>
						<li><i class="fa-solid fa-badge-check h5 mb-0 me-2" style="color: #5e89fc;"></i>How to find and evaluate relevant keywords for your website</li>
					</ul>
				</div>
			`
            tinymce.activeEditor.execCommand('mceInsertContent', true, html);
        })


        if ($("#blog-data-material").val()) {
            const BLOG = JSON.parse($("#blog-data-material").val());
            $("#search_blog_material").on("keyup", function() {
                $("#blog-container-material").html("");
                let search = $(this).val();
                let blog_filterd = BLOG.filter((obj) =>
                    JSON.stringify(obj)
                    .toLowerCase()
                    .includes(search.toString().toLowerCase())
                );
                blog_filterd.forEach((item) => {
                    let isChecked = $(
                            `[data-id="blog${item.id}"][data-target="selected-blog"]`
                        ).length ?
                        "checked" :
                        null;
                    let html = `
                            <div class="form-check mb-2" data-target="blog-item-material" data-id="blog${item.id}" data-value="${item.id}" data-title="${item.title}" onclick="addSelectedBlog('blog${item.id}')">
                                <input class="form-check-input" id="blog${item.id}" type="checkbox" value="${item.id}" name="related_blog_ids[]" ${isChecked}>
                                <label class="form-check-label" for="blog${item.id}">
                                    ${item.title}
                                </label>
                            </div>
                        `;
                    $("#blog-container-material").append(html);
                });
            });
        }

        function addSelectedBlog(id) {
            let element = $(`[data-id="${id}"]`);
            if ($(`#${id}`).is(":checked")) {
                let html = `
                        <label class="form-check-label text-primary" data-id="${element.data(
                            "id"
                        )}" data-target="selected-blog">
                            ${element.data("title")}
                        </label>
                        <input name="related_blog_ids[]" value="${element.data(
                            "value"
                        )}" type="hidden" data-target="selected-blog" data-id="${element.data(
            "id"
        )}" />
                    `;
                $("#blog-selected").append(html);
            } else {
                $(
                    `[data-target="selected-blog"][data-id="${element.data("id")}"]`
                ).remove();
            }
        }
    </script>
@endsection
