@extends('rcms::layout.index')
@section('content')
    @component('rcms::components.breadcrumb')
        @slot('title')Thêm @endslot
        @slot('title2')
            <a href="{{route('rcms.posts.index')}}">Article</a>
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
                    <form id="form-create" action="{{route('rcms.posts.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="author_id" value="{{Auth::id()}}">
                    <div class="form-group">
                        <label for="name">Title</label>
                        <input class="form-control" type="text" name="title" placeholder="Tên tiêu đề " value="" required maxlength="255">
                    </div>
                    <div class="form-group row">
                        <div class="col-8">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="name">Slug</label>
                                    <input class="form-control" type="text" name="slug" placeholder="" value=""  >
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="name">Meta Description</label>
                        	        <input class="form-control" type="text" value="" name="meta_description" maxlength="160">
                                </div>
                                <div class="col-auto">
                                    <label>Status</label>
                                    <div class="d-flex align-items-center mb-2">
                                        <select name="status" class="custom-select custom-select-md">
                                            <option value="1" selected>Publish</option>
                                            <option value="2" >Draft</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <label for="name">Pin</label>
                                    <select class="custom-select custom-select-lg" name="special">
                                        <option value="0" selected>Normal</option>
                                        <option value="1">Blog</option>
                                        <option value="2">Blog (MAIN)</option>
                                        <option value="3">Category</option>
                                    </select>
                                </div>
                                <div class="col-3" data-target="category">
                                    <label for="name">Category</label>
                                    <select name="category_id"  class="custom-select custom-select-md" required>
                                        <option value="">Select</option>
                                        @foreach($categories as $item)
                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <div class="d-flex align-items-center mb-2">
                                        <input class="mr-2" type="radio" value="1" name="featured" id="featured">
                                        <label for="featured" class="mb-0">Featured</label>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <input class="mr-2" type="radio" value="0" name="featured" checked id="normal">
                                        <label for="normal" class="mb-0">Normal</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="name">Thumbnail Blog</label>
                            <div class="input-group">
								<input type="button" data-target="lfm" data-input="thumbnail" data-preview="thumbnail-preview" value="Upload">
								<input id="thumbnail" class="form-control" type="text" name="thumbnail" value="{{ old('thumbnail') }}" required accept="image/png, image/gif, image/jpeg">
							</div>
                            <div id="thumbnail-preview">
                                
                            </div>
                        </div>

                    </div>
                    <div class="form-group row">
						<div class="col-3">
							<label for="">Tags</label>
							<input type="text" id="search_tags" class="form-control form-control-sm mb-2" placeholder="search..">
							<div id="tags-selected">

							</div>
							<input type="hidden" value="{{$tags}}" id="tags-data">
							<div style="max-height: 200px;" class="rsolution-scrollbar" id="tags-container">
								@foreach($tags as $item)
								<div class="form-check mb-2" data-target="tag-item" data-value="{{$item->id}}" data-name="{{$item->name}}" data-id="tag{{$item->id}}" onclick="addSelectedTags(`tag{{$item->id}}`)">
									<input class="form-check-input" id="tag{{$item->id}}" type="checkbox" value="{{$item->id}}">
									<label class="form-check-label" for="tag{{$item->id}}">
										{{$item->name}}
									</label>
								</div>
								@endforeach
							</div>
						</div>
                        <div class="col-3">
                            <label for="">Related Article<span class="text-danger fs-18">*</span></label>
                            <input type="text" id="search_blog" class="form-control form-control-sm mb-2" placeholder="search...">
                            <div id="blog-selected">

                            </div>
                            <input type="hidden" value="{{$posts}}" id="blog-data">
                            <div style="max-height: 200px;" class="rsolution-scrollbar" id="blog-container">
                                @foreach($posts as $item)
                                <div class="form-check mb-2" data-target="blog-item" data-value="{{$item->id}}" data-title="{{$item->title}}" data-id="blog{{$item->id}}" onclick="addSelectedBlog(`blog{{$item->id}}`)">
                                    <input class="form-check-input" id="blog{{$item->id}}" type="checkbox" value="{{$item->id}}">
                                    <label class="form-check-label" for="blog{{$item->id}}">
                                        {{$item->title}}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <label for="name">Author</label>
                        </div>
                        <div class="col-2 mb-10">
                            <input class="form-control" type="text" placeholder="Name" name="author_info[name]" required>
                        </div>
                        <div class="col-2">
                            <input class="form-control" type="text" name="author_info[job_title]" placeholder="Job title" required>
                        </div>
                        <div class="col-2">
                            <input class="form-control" type="text" name="author_info[facebook]" placeholder="Facebook link">
                        </div>
                        <div class="col-2">
                            <input class="form-control" type="text" name="author_info[linkedin]" placeholder="Linkedin link">
                        </div>
                        <div class="col-2">
                            <input class="form-control" type="text" name="author_info[twitter]" placeholder="Twitter link">
                        </div>
                        <div class="col-2">
                            <input class="form-control" type="text" name="author_info[summary]" placeholder="Summary">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Content</label>
                        <textarea id="content" name="content" ></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary float-right" id="btn-submit" >Create</button>
                    <button type="reset"  class="btn btn-danger float-right mr-2" >Reset</button>
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
@endsection

@section('js')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"  />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap4-tagsinput@4.1.3/tagsinput.min.js"></script>
    <script>
        $('[name="title"]').keyup(function(){
            let slug = ChangeToSlug( $(this).val() )
            $('[name="slug"]').attr('value',slug)
        })

        @if ($errors->any())
            @foreach ($errors->all() as $error)
            toastr.warning("{{$error}}")
            @endforeach
        @endif

        let submit = false

        $('#form-create').submit(function(e){

            if(!submit){
                e.preventDefault();
            }
            // consle.log(submit)
            setTimeout(() => {
                $('#content-container').html( $('[name="content"]').val()  )
                let heading = $("#content-container h1, #content-container h2, #content-container h3")
                
                let countH1 = 0
                for(let item of heading)
                {   
                    if(item.tagName == "H1"){
                        countH1 ++
                        // console.log(countH1)
                    }
                    let elem = `<span  class="d-block mb-10 text-black  ">
                                    ${item.tagName +'. '+ item.textContent  }
                                </span>`
                    $('#table-of-content').append(elem)
                }
                if(countH1 > 1){
                    $('#table-of-content').append( `<span  class="d-block mb-10 text-danger">* Your article should includes only 1 H1 *</span>` )
                } 
                $('#exampleModal').modal('show')
            }, 1000);
            
            
        })
        
        $('#exampleModal').on('hidden.bs.modal', function (event) {
            $('#table-of-content').html('')
        })
        
        $('#submit-btn').click(function(){
            submit = true
            $('#form-create').submit()
        })
    </script>
    <script src="https://cdn.tiny.cloud/1/{{env('TINYMCE_API_KEY')}}/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
	$('[data-target="lfm"]').filemanager('image');
	tinymce.init({
		selector: '#content',
        content_css : ["/themes/wrierzen/css/app.css","/themes/writerzen/css/lib/bootstrap.min.css"],
        content_style: "body { padding: 20px; }",
		height: 1000,
		plugins: [
			'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
			'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
			'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount','code'
		],
		toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
			'alignleft aligncenter alignright alignjustify | ' +
			'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help | code',
		file_picker_callback : function(callback, value, meta) {
			var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL ='/laravel-filemanager?editor=' + meta.fieldname;
            if (meta.filetype == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }
			tinyMCE.activeEditor.windowManager.openUrl({
                url : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no",
                onMessage: (api, message) => {
                callback(message.content);
                }
            });
		},
		extended_valid_elements: 'script[language|type|src]'
	});
  </script>
  <script src="/themes/writerzen/js/rcms-custom.js?{{env('VERSION')}}"></script>
@endsection
