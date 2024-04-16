@extends('rcms::layout.index')
@section('content')
    @component('rcms::components.breadcrumb')
        @slot('title')
            Tags
        @endslot
    @endcomponent
    @component('academy::custom.css')
    @endcomponent
    <div class="row ">
        <div class="col-xxl-10 col-12 mx-auto">
            <div class="col-12">
                <form onsubmit="showLoading()" class="rsolution-card-shadow" method="get">
                    <div class="rsolution-card-body">
                        <h6 style="margin-bottom: 16px;">Filters</h6>
                        <div class="form-row">
                            <div class="form-group col-4">
                                <label for="inputTitle">Name</label>
                                <div class="input-group">
                                    <input id="inputTitle" placeholder="Search..."
                                        class="form-control border-right-0 border" name="search" type="search"
                                        value="{{ !empty($_GET['search']) ? $_GET['search'] : null }}">
                                    <span class="input-group-append">
                                        <button class="input-group-text bg-transparent"><i
                                                class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group col-auto">
                                <label for="inputType">Type</label>
                                <select id="inputType" class="form-control" name="type">
                                    <option value="">Select</option>
                                </select>
                            </div>

                            <div class="form-group col-auto">
                                <label for="inputLimit">Rows per page:</label>
                                <input id="inputLimit" class="form-control" type="number" min="1" name="limit"
                                    value="{{ !empty($_GET['limit']) ? $_GET['limit'] : 10 }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-auto d-flex">
                                <button class="btn btn-primary">Apply</button>
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
                                <span class="title">List</span>
                            </div>
                            <div class="col-auto float-end">
                                @component('rcms::components.modals.add')
                                    @slot('route')
                                        {{ route('rcms.tags.store') }}
                                    @endslot
                                    @slot('slot')
                                        @csrf
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Title</label>
                                            <input class="form-control" type="text" name="name" placeholder="Name"
                                                value="" required maxlength="255">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Meta title</label>
                                            <input class="form-control" type="text" name="meta_title" placeholder="Name"
                                                value="" maxlength="255">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Meta description</label>
                                            <input class="form-control" type="text" name="meta_description" placeholder="Name"
                                                value="" maxlength="160">
                                        </div>
                                        <div class="form-group">
                                            <label>Slug</label>
                                            <input class="form-control" type="text" name="slug" placeholder="" value=""
                                                readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Type</label>
                                            <select class="custom-select custom-select-lg" name="type" required>
                                                <option value="">Select</option>
                                                <option value="1">Blog</option>
                                            </select>
                                        </div>
                                    @endslot
                                @endcomponent

                                <a class="btn btn-primary btn-sm" type="button" href="{{ route('rcms.tags.index') }}"><i
                                        class="fas fa-sync-alt"></i>Reload</a>
                            </div>
                        </div>
                    </div>
                    <div class="rsolution-card-body">
                        <table class="table rsolution-table border">
                            <thead>
                                <tr>
                                    <th class="id">#</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Slug</th>
                                    <th class="text-center">Total attached</th>
                                    <th class="text-center">Attached</th>
                                    <th class="text-right"></th>
                                </tr>
                            </thead>
                            <tbody class="rsolution-scrollbar">
                                @foreach ($data as $index => $item)
                                    <tr class="align-middle">
                                        <td class="id">{{ $index + $data->firstItem() }}</td>
                                        <td class="text-center">{{ $item->name }}</td>
                                        <td class="text-center">{{ $item->slug }}</td>
                                        <td class="text-center">
                                            @switch($item->type)
                                                @case(1)
                                                    {{ count($item->posts) }}
                                                    @break
                                                @default
                                            @endswitch
                                        </td>
                                        <td class="text-center">
                                            <div class="list-group overflow-auto" style="max-height:150px;">
                                                @switch($item->type)
                                                    @case(1)
                                                        @foreach ($item->posts as $post)
                                                            <a type="button"
                                                                class="d-flex list-group-item list-group-item-action"
                                                                href="{{ route('rcms.posts.edit', $post->id) }}">
                                                                <div class="d-flex align-items-center">#{{ $loop->index + 1 }}
                                                                </div>
                                                                <div class="d-flex align-items-center ml-1">
                                                                    {{ $post->title }}</div>
                                                            </a>
                                                        @endforeach
                                                    @break

                                                    @default
                                                @endswitch
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            @component('rcms::components.modals.update')
                                                @slot('id', $item->id)
                                                @slot('route') {{ route('rcms.tags.update', $item->id) }} @endslot
                                                @slot('slot')
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="name">Title</label>
                                                        <input class="form-control" type="text" name="name"
                                                            placeholder="Tên tiêu đề " value="{{ $item->name }}" required
                                                            maxlength="255">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Meta title</label>
                                                        <input class="form-control" type="text" name="meta_title"
                                                            placeholder="Name" value="{{ $item->meta_title }}" maxlength="255">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Meta description</label>
                                                        <input class="form-control" type="text" name="meta_description"
                                                            placeholder="Name" value="{{ $item->meta_description }}"
                                                            maxlength="160">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Slug</label>
                                                        <input class="form-control" type="text" name="slug" placeholder=""
                                                            value="{{ $item->slug }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Type</label>
                                                        <select class="custom-select custom-select-lg" name="type" required>
                                                            <option value="">Select</option>
                                                            <option value="1" {{ $item->type == '1' ? 'selected' : '' }} 1>
                                                                Blog</option>
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


    @component('academy::components.spinner_loading')
    @endcomponent
@endsection

@section('js')
    <script src="https://cdn.tiny.cloud/1/{{env('TINYMCE_API_KEY')}}/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="/themes/academy/js/rcms-custom.js?ver={{ env('ACADEMY_VERSION') }}"></script>
    <script>
        $('[name="name"]').keyup(function() {
            let slug = ChangeToSlug($(this).val())
            $('[name="slug"]').attr('value', slug)
        })
    </script>
@endsection
