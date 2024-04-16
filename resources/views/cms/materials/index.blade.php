@extends('rcms::layout.index')
@section('content')
    @component('rcms::components.breadcrumb')
        @slot('title') Material @endslot
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
                             <div class="col-auto">
                                <button class="btn btn-primary btn-icon">
                                    <span class="fas fa-search"></span>
                                </button>
                                <a class="btn btn-white btn-icon" href="{{ route('rcms.materials.index') }}">
                                    <span class="fas fa-redo mt-2"></span>
                                </a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-3">
                                <div class="row">
                                    <div class="col-auto d-flex align-items-center">
                                        <span class="font-weight-medium">Hiển thị</span>
                                    </div>
                                    <div class="col">
                                        <input class="form-control" type="number" min="1" name="limit" value="{{ !empty($_GET['limit']) ? $_GET['limit'] : 10}}">
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
                            <div class="col-auto float-end">
                                <a href="{{route('rcms.materials.create')}}" class="btn btn-primary" target="_blank">Thêm</a>
                            </div>
                        </div>
                    </div>
                    <div class="rsolution-card-body">
                        <table class="table rsolution-table border">
                            <thead>
                                <tr>
                                    <th class="id">#</th>
                                    <th class="text-center">Tiêu đề</th>
                                    <th class="text-center">Url</th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody class="rsolution-scrollbar">
                                @foreach($data as $index => $item)
                                <tr class="align-middle">
                                    <td class="id">{{ $index + $data->firstItem() }}</td>
                                    <td class="text-center">{{$item->title}}</td>
                                    <td class="text-center">
                                        <a href="{{$item->url}}?ver={{$item->updated_at->getTimestamp()}}">{{$item->url}}?ver={{$item->updated_at->getTimestamp()}}</a>
                                    </td>
                                    <td class="text-right">
                                        <a class="btn btn-light btn-sm btn-icon" href="{{route('rcms.materials.edit',$item->id)}}" target="_blank"><i class="far fa-edit"></i></a>

                                        @component('rcms::components.modals.destroy')
                                        @slot('id') {{$item->id}} @endslot
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