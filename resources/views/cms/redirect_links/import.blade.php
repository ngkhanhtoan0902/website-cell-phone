@extends('rcms::layout.index')
@section('content')
    @component('rcms::components.breadcrumb')
        @slot('title')Import Redirect Link @endslot
    @endcomponent
 
    <div class="row ">
        <div class="col-10 col-xxl-10 mx-auto">
            <div class=" rsolution-card-shadow">
                <div class="rsolution-card-header border-bottom">
                    <div class="row d-flex align-items-center">
                        <div class="col">
                            <span class="title">Import Redirect Link Excel</span>
                        </div>
                    </div>
                </div>
                <div class="rsolution-card-body">
                    <form id="form-create" action="{{route('rcms.redirect.import')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="col-3 ">
                            <label for="name">Excel</label>
                            <input class="form-control" type="file" name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                        </div>
						<button type="submit" class="btn btn-primary float-right" id="btn-submit" >Import</button>
						<button type="reset"  class="btn btn-danger float-right mr-2" >Reset</button>
                	</form>
                </div>
            </div>
        </div>
    </div>
@endsection
