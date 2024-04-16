@extends('rcms::layout.index')
@section('content')
    @component('rcms::components.breadcrumb')
        @slot('title')
            Blog Category
        @endslot
    @endcomponent
    <div class="row ">
        <div class="col-xxl-8 col-12 mx-auto">
            <div class="col-12">
                <form class="rsolution-card-shadow" method="get">
                    <div class="rsolution-card-body">
                        <div class="row">
                        </div>
                        <div class="row mt-3">
                            <div class="col-3">
                                <div class="row">
                                    <div class="col-auto d-flex align-items-center">
                                        <span class="font-weight-medium">Hiển thị</span>
                                    </div>
                                    <div class="col">
                                        <input class="form-control" type="number" min="1" name="limit"
                                            value="{{ !empty($_GET['limit']) ? $_GET['limit'] : 10 }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <select class="form-control" name="type">
                                    <option value="">Select</option>
                                    <option value="blog">Blog</option>
                                    <option value="material">Material</option>
                                    <option value="case_study">Case Study</option>
                                    <option value="webinar">Webinar Series</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <select class="form-control" name="status">
                                    <option value="">Select</option>
                                    <option value="1">Active</option>
                                    <option value="-1">Inactive</option>
                                </select>
                            </div>
                            <div class="col-auto float-end">
                                <button class="btn btn-primary btn-icon">
                                    <span class="fas fa-search"></span>
                                </button>
                                <a class="btn btn-white btn-icon" href="{{ route('rcms.newsletters.index') }}">
                                    <span class="fas fa-redo mt-2"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12">
                <div class="rsolution-card-shadow">
                    <div class="rsolution-card-header border-bottom">
                        <div class="row d-flex align-items-center">
                            <div class="col">
                                <span class="title">Danh sách</span>
                            </div>
                            <div class="col-auto float-end">
                                @component('rcms::components.modals.add')
                                    @slot('route')
                                        {{ route('rcms.categories.store') }}
                                    @endslot
                                    @slot('slot')
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Label</label>
                                            <input class="form-control" type="text" name="title" placeholder="Tên tiêu đề "
                                                value="" required maxlength="255">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Meta Title</label>
                                            <input class="form-control" type="text" name="meta_title" placeholder=""
                                                value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Meta Description</label>
                                            <textarea class="form-control" name="meta_description" cols="30" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Slug</label>
                                            <input class="form-control" type="text" name="slug" placeholder="" value=""
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Type</label>
                                            <select class="form-control" name="type" required>
                                                <option value="">Select</option>
                                                <option value="blog">Blog</option>
                                                <option value="material">Material</option>
                                                <option value="case_study">Case Study</option>
                                                <option value="webinar">Webinar Series</option>
                                            </select>
                                        </div>
                                    @endslot
                                @endcomponent
                            </div>
                        </div>
                    </div>
                    <div class="rsolution-card-body">
                        <table class="table rsolution-table border">
                            <thead>
                                <tr>
                                    <th class="id">#</th>
                                    <th class="text-center">Title</th>
                                    <th class="text-center">Type</th>
                                    <th class="text-center">ATTACHED</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="rsolution-scrollbar">

                                @foreach ($data as $index => $item)
                                    <tr class="align-middle">
                                        <td class="id">{{ $index + $data->firstItem() }}</td>
                                        <td class="text-center">{{ $item->title }} <br> <span
                                                class="text-info">{{ $item->slug }}</span> </td>
                                        <td class="text-center">{{ $item->type }}</td>
                                        <td class="text-center">
                                            @switch($item->type)
                                                @case('blog')
                                                    {{ count($item->posts) }}
                                                @break

                                                @case('material')
                                                    {{ count($item->materials) }}
                                                @break

                                                @case('case_study')
                                                    {{ count($item->caseStudies) }}
                                                @break

                                                @case('webinar')
                                                    {{ count($item->webinars) }}
                                                @break

                                                @default
                                            @endswitch
                                        </td>
                                        <td class="text-center">
                                            @switch($item->status)
                                                @case(1)
                                                    Active
                                                @break

                                                @case(-1)
                                                    Inactive
                                                @break
                                            @endswitch
                                        </td>
                                        <td class="text-right">
                                            @component('rcms::components.modals.update')
                                                @slot('id', $item->id)
                                                @slot('route') {{ route('rcms.categories.update', $item->id) }} @endslot
                                                @slot('slot')
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="name">Label</label>
                                                        <input class="form-control" type="text" name="title"
                                                            placeholder="Tên tiêu đề " value="{{ $item->title }}" required
                                                            maxlength="255">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Meta Title</label>
                                                        <input class="form-control" type="text" name="meta_title" placeholder=""
                                                            value="{{ $item->meta_title }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Meta Description</label>
                                                        <textarea class="form-control" name="meta_description" cols="30" rows="3">{{ $item->meta_description }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Slug</label>
                                                        <input class="form-control" type="text" name="slug" placeholder=""
                                                            value="{{ $item->slug }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Type</label>
                                                        <select class="form-control" name="type" required>
                                                            <option value="blog"
                                                                {{ $item->type == 'blog' ? 'selected' : null }}>Blog</option>
                                                            <option value="material"
                                                                {{ $item->type == 'material' ? 'selected' : null }}>Material
                                                            </option>
                                                            <option value="case_study"
                                                                {{ $item->type == 'case_study' ? 'selected' : null }}>Case Study
                                                            </option>
                                                            <option value="webinar"
                                                                {{ $item->type == 'webinar' ? 'selected' : null }}>Webinar
                                                                Series
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Status</label>
                                                        <select class="form-control" name="status" required>
                                                            <option value="1" {{ $item->status == 1 ? 'selected' : null }}>Active</option>
                                                            <option value="-1" {{ $item->status == -1 ? 'selected' : null }}>Inactive</option>
                                                        </select>
                                                    </div>
                                                @endslot
                                            @endcomponent

                                            @component('rcms::components.modals.destroy')
                                                @slot('id')
                                                    {{ $item->id }}
                                                @endslot
                                            @endcomponent
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Paginate -->
                        <div class="pt-3 text-center fit-content m-auto" style="width:fit-content">
                            {{ $data->appends(request()->input())->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('js')
    <script src="/themes/writerzen/js/rcms-custom.js"></script>
    <script>
        $('[name="title"]').keyup(function() {
            let slug = ChangeToSlug($(this).val())
            $('[name="slug"]').attr('value', slug)
        })
    </script>
@endsection
