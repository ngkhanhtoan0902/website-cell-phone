@extends('rcms::layout.index')
@section('content')
    @component('rcms::components.breadcrumb')
        @slot('title') Redirect Links @endslot
    @endcomponent
    
    <div class="row ">
        <div class="col-xxl-10 col-12 mx-auto">
            <div class="col-12">
                <form class="rsolution-card-shadow" method="get">
                    <div class="rsolution-card-body">
                        <div class="row">
                            <div class="col">
                                <input placeholder="Enter issue link" class="form-control" name="search" value="{{ !empty($_GET['search']) ? $_GET['search'] : null}}">
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-primary btn-icon">
                                    <span class="fas fa-search"></span>
                                </button>
                                <a class="btn btn-white btn-icon" href="{{ route('rcms.redirect-links.index') }}">
                                    <span class="fas fa-redo mt-2"></span>
                                </a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-3">
                                <div class="row">
                                    <div class="col-auto d-flex align-items-center">
                                        <span class="font-weight-medium">Rows per page</span>
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
                                <span class="title">Table</span>
                            </div>
                            <div class="col-auto">
                                <a href="{{route('rcms.redirect-links-import')}}" class="btn btn-primary" target="_blank"><i class="fa fa-upload" aria-hidden="true"></i>Import Excel</a>
                            </div>
                            <div class="col-auto">
								@component('rcms::components.modals.add')
									@slot('route') {{route('rcms.redirect-links.store')}} @endslot
									@slot('slot')
										@csrf
										<div class="form-group">
											<label for="issue_link">Issue Link</label>
											<input class="form-control" type="text" name="issue_link" placeholder="Enter Issue Link" value="" required>
										</div>
										<div class="form-group">
											<label for="fix_link">Fix Link</label>
											<input class="form-control" type="text" name="fix_link" placeholder="Enter Fix Link" value="" required>
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
                                    <th class="text-center" width="40%">Issue Link</th>
                                    <th class="text-center" width="40%">Fix Link</th>
                                    <th class="text-right"  style="width: 15%;"></th>
                                </tr>
                            </thead>
                            <tbody class="rsolution-scrollbar">
                                @foreach($data as $index => $item)
                                <tr class="align-middle">
                                    <td class="id">{{ $index + 1 }}</td>
                                    <td class="text-center" width="40%">{{$item->issue_link}}</td>
                                    <td class="text-center" width="40%">{{$item->fix_link}}</td>
                                    <td class="text-right" width="15%">
										@component('rcms::components.modals.update')
											@slot('id', $item->id)
											@slot('route') {{route('rcms.redirect-links.update', $item->id)}} @endslot
											@slot('slot')
												@csrf
												<div class="form-group">
													<label for="name">Issue Link</label>
													<input class="form-control" type="text" name="issue_link" placeholder="Enter Issue Link" value="{{$item->issue_link}}" required>
												</div>
												<div class="form-group">
													<label for="name">Fix Link</label>
													<input class="form-control" type="text" name="fix_link" placeholder="Enter Fix Link" value="{{$item->fix_link}}" required>
												</div>
											@endslot
										@endcomponent
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