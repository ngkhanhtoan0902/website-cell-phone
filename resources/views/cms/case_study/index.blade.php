@extends('rcms::layout.index')
@section('content')
    @component('rcms::components.breadcrumb')
        @slot('title')
            Article
        @endslot
    @endcomponent
    <div class="row ">
        <div class="col-xxl-10 col-12 mx-auto">
            <div class="col-12">
                <form class="rsolution-card-shadow" method="get">
                    <div class="rsolution-card-body">
                        <div class="row">
                            <div class="col">
                                <input placeholder="Nhập tiêu đề" class="form-control" name="search"
                                    value="{{ !empty($_GET['search']) ? $_GET['search'] : null }}">
                            </div>

                            <div class="col-3">
                                <select class="custom-select custom-select-lg" name="status">
                                    <option value="" selected>All</option>
                                    <option value="1" @if (!empty($_GET['status']) && $_GET['status'] == 1) selected @endif>Active</option>
                                    <option value="2" @if (!empty($_GET['status']) && $_GET['status'] == 2) selected @endif>Inactive
                                    </option>
                                </select>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-primary btn-icon">
                                    <span class="fas fa-search"></span>
                                </button>
                                <a class="btn btn-white btn-icon" href="{{ route('rcms.case-study.index') }}">
                                    <span class="fas fa-redo mt-2"></span>
                                </a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-3">
                                <div class="row">
                                    <div class="col-auto d-flex align-items-center">
                                        <span class="font-weight-medium">Ngày đăng = </span>
                                    </div>
                                    <div class="col">
                                        <input class="form-control" type="date" name="created_at"
                                            value="{{ !empty($_GET['created_at']) ? $_GET['created_at'] : null }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="row">
                                    <div class="col-auto d-flex align-items-center">
                                        <span class="font-weight-medium">Special</span>
                                    </div>
                                    <div class="col">
                                        <select class="custom-select custom-select-lg" name="special">
                                            <option value="0">All</option>
                                            <option value="1" @if (!empty($_GET['special']) && $_GET['special'] == 1) selected @endif>Pinned
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
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
                            <div class="col-auto">
                                <a href="{{ route('rcms.case-study.create') }}" class="btn btn-primary"
                                    target="_blank">Thêm</a>
                            </div>
                        </div>
                    </div>
                    <div class="rsolution-card-body">
                        <table class="table rsolution-table border">
                            <thead>
                                <tr>
                                    <th class="id">#</th>
                                    <th width="15%"></th>
                                    <th class="text-center" width="25%">Tiêu đề</th>
                                    <th class="text-center"></th>
                                    <th class="text-center" style="width: 15%;">Ngày đăng <i class="fas fa-info"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Vị trí hiển thị ngoài trang Blog => thứ tự ngày đăng"></i></th>
                                    <th class="text-center"></th>
                                    <th class="text-right" style="width: 15%;"></th>
                                </tr>
                            </thead>
                            <tbody class="rsolution-scrollbar">
                                @foreach ($data as $index => $item)
                                    <tr class="align-middle">
                                        <td class="id">{{ $index + $data->firstItem() }}</td>
                                        <td width="15%">
                                            <img width="100px" class="mb-10"
                                                src="{{ $item['banner'] ? asset($item['banner']['logo']) : '' }}"
                                                alt="">
                                            <img width="100px" class="" src="{{ asset($item->thumbnail) ?? '' }}"
                                                alt="">
                                        </td>
                                        <td class="text-center" width="25%"><a
                                                href=" {{ $item->type == 1 ? '/blog' : '/case-study' }}/{{ $item->slug }}"
                                                target="_blank">{{ $item->title }}</a></td>
                                        <td class="text-left">
                                            {{-- {{$item->user['name']}} <br> <br>
									@if ($item->type == 1) <span class="text-success">Blog</span> @else <span class="text-info">Case Study</span> @endif --}}
                                        </td>
                                        <td class="text-center" style="width: 15%;">
                                            <span
                                                data-id="{{ $item->id }}">{{ $item->created_at->format('d/m/Y') }}</span>
                                            <input data-id="{{ $item->id }}" class="d-none form-control"
                                                type="date" name="created_at">
                                            <button data-id="{{ $item->id }}" class="btn btn-light btn-sm btn-icon"
                                                data-target="btn-edit-date" onclick="editData({{ $item->id }})"><i
                                                    class="far fa-edit"></i></button>
                                            <div data-id="{{ $item->id }}"
                                                class="row d-none justify-content-center mt-2">
                                                <div class="col-3 btn-danger btn-sm btn-icon float-right mr-2"
                                                    style="cursor:pointer" onclick="cancelEdit({{ $item->id }})">
                                                    X
                                                </div>
                                                <div class="col-3 btn-primary btn-sm btn-icon float-right"
                                                    style="cursor:pointer" data-target="btn-save"
                                                    onclick="saveData({{ $item->id }})">
                                                    <i class="far fa-save"></i>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <select name="status" id-post="{{ $item->id }}" data-target="status"
                                                class="custom-select custom-select-md">
                                                <option value="1" {{ $item->status == 1 ? 'Selected' : '' }}>Hiện
                                                </option>
                                                <option value="2" {{ $item->status == 2 ? 'Selected' : '' }}>Ẩn
                                                </option>
                                            </select>
                                        </td>

                                        <td class="text-center">
                                            @if ($item->special === 1)
                                                <div class="text-info">Pinned</div>
                                            @endif
                                        </td>

                                        <td class="text-right">
                                            <a class="btn btn-light btn-sm btn-icon"
                                                href="{{ route('rcms.case-study.edit', $item->id) }}" target="_blank"><i
                                                    class="far fa-edit"></i></a> &emsp;
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap4-tagsinput@4.1.3/tagsinput.min.js"></script>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

        //Show update form
        function editData(id) {
            $('[data-id=' + id + ']').toggleClass('d-none')

            $('[data-target="btn-edit-date"]').each(function() {
                $(this).attr('disabled', true)
            })

        }

        //Cancel update form
        function cancelEdit(id) {
            $('[data-target="btn-edit-date"]').each(function() {
                $(this).attr('disabled', false)
            })
            $('[data-id=' + id + ']').toggleClass('d-none')
        }

        //Update date
        function saveData(id) {
            let date = $('input[data-id="' + id + '"]').val()
            if (Date.parse(date)) {
                updateField(id, {
                    _token: $('input[name=_token]').val(),
                    created_at: date
                })
            }
        }

        //Update status
        $('[data-target="status"]').change(function() {
            let status = $(this).val()
            let id = $(this).attr('id-post')
            updateField(id, {
                _token: $('input[name=_token]').val(),
                status
            })
        })

        function updateField(id, params) {
            $.ajax({
                type: "PATCH",
                url: "/rcms/case-study/" + id + "/update-fillable",
                data: params,
                success: function(data, status) {
                    toastr.success("Success");
                    setTimeout(() => {
                        location.reload()
                    }, 1000);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    toastr.warning("Some error");
                }
            })
        }

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.warning("{{ $error }}")
            @endforeach
        @endif
    </script>
@endsection
