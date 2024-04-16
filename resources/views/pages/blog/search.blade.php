@php
 $search = isset($_GET['search']) ? $_GET['search'] : '';
@endphp
@extends('layouts.index')
@section('meta-title','Blog - Search results for "'. $search   .'"')
@section('meta-description', 'From SEO knowledge to the latest industry news, WriterZen blogs cover everything you need to step up your SEO and content marketing games.')
@section('content')
	<div  class="container-fluid blog" id="blog">

		<div class="search-popup hide" >
			<div class="row center" >
				<div class="col-12 mt-65 mb-40 ">
					<span id="closeSearch" class="btn-circle-outline mx-auto cursor-pointer">
						<i class="fa-light fa-close" style="font-size:18px"></i> 
					</span>
				</div>
				<div class="col-12">
					<form action="{{route('blog.search')}}" data-target="form-search" >
						<div class="input-primary-medium position-relative" style="border-radius: 34px">
							@if(!empty($data['tag']))
								<input type="hidden" name="tag" value="{{$data['tag']->slug}}" data-target="tag-search">
							@endif
							<input data-target="input-search" class="form-control ps-20 py-20" style="border-radius:34px" name="search" value="{{isset($_GET['search']) ? $_GET['search'] : '' }}" type="text" placeholder='Enter keyword' >
							<div class="position-absolute col-auto" style="top:calc(50% - 15px);right:24px">
								<button type="submit" class="bg-transparent border-0 border-radius-10 text-secondary" data-target="btn-submit" disabled="disabled" >
									<i class="fa-light fa-magnifying-glass" style="color:#BFC7DA"></i>
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="row pt-60 mb-40">
			<div class="col-12">
				<div class="center">
					<div class="row gy-3">
						@if(!empty($data['tag']))
							<div class="col-auto">
								<a href="{{route('blog.index')}}" class="link text-secondary fw-semibold me-10 d-inline">
									Blog <i class="fa-light fa-angle-right"></i>
								</a>
								<span class="fw-semibold h9">Tag archives: {{$data['tag']->name}}</span>
							</div>
						@else
							<div class="col-auto">
								<a href="{{url('/blog')}}">
									<div class="blog__tag active">
										All
									</div>
								</a>
							</div>
							@foreach($data['categories'] as $cate)
								<div class="col-auto"  >
									<a href="{{route('blog.category', $cate['slug'])}}">
										<div class="blog__tag">
											{{ $cate['title'] }}
										</div>
									</a>
								</div>
							@endforeach
						@endif
					</div>
				</div>
			</div>
		</div>

		<div class="row mb-40">
			<div class="col-12">
				<div class="center">
					<div class="row">
						<div class="col-12 mb-40">
							<div class="row align-items-center">
								<div class="col-auto">
									<h1 class="h1 fw-semibold"> @if(!empty($data['tag'])) {{$data['tag']->name}} @else WriterZen’s Blog @endif</h1>
								</div>
								<div class="col">
									<div class="line"></div>
								</div>
								<div class="col-auto">
									<div class="d-md-none d-block">
										<span id="openSearch" class="btn-circle-outline mx-auto cursor-pointer">
											<i class="fa-light fa-magnifying-glass" style="font-size:18px"></i> 
										</span>
									</div>
									<form action="" class="d-md-block d-none" data-target="form-search">
										<div class="input position-relative" style="width: 357px">
											@if(!empty($data['tag']))
												<input  name="tag" value="{{$data['tag']->slug}}" type="hidden">
											@endif
											<input data-target="input-search" class="form-control form-control-lg ps-20 pe-40 py-15"
												style="border-radius:34px" name="search" value="{{@$_GET['search']}}" type="text" required
												placeholder="Search by title">
											<div class="position-absolute col-auto" style="top:calc(50% - 15px);right:24px">
												<button type="submit"
													class="bg-transparent border-0 border-radius-10 text-secondary">
													<i class="fa-light fa-magnifying-glass" style="color:#BFC7DA"></i>
												</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="h3 mb-20 fw-normal">Search Results for “{{ $search }}"</div>
							<div class="h5 fw-normal">{{$data['posts']->total()}} @if($data['posts']->total() > 1 ) results @else result @endif</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row mb-20">
			<div class="col-12">
				<div class="center" id="articles-container">
					@foreach ($data['posts'] as $item)
						<div class="row g-0 py-20 px-20 blog__item blog__item-hover border-radius-20" style="gap:20px;margin:0 -20px">
							<div class="col-12 col-md-4">
								<a href="{{route('blog.detail', $item->slug)}}">
									<img class="border-radius-10" src="{{ $item->thumbnail }}" alt="{{ $item->title }}"
										onerror="this.src='/themes/writerzen/img/background/course-default-bg.png' ">
								</a>
							</div>
							<div class="col-12 col-md align-self-center">
								<div class="d-flex align-items-center gap-4 mb-20">
									@if ($item->featured)
										<div class="blog__tag static bg-warning">
											<i class="fa fa-star me-5 h10" style="line-height: 1;"></i>Featured
										</div>
									@endif
									@if($item->category)
										<a href="{{ route('blog.category', $item->category->slug) }}">
											<div class="blog__tag text-center">
												{{ $item->category->title }}
											</div>
										</a>
									@endif
									<div class="static text-secondary h9 fw-semibold">
										{{ $item->reading_time }} min read
									</div>
								</div>
								<div class="h4 mb-10">
									<a class="text-black" href="{{route('blog.detail', $item->slug)}}">
										{!! preg_replace("/".$_GET['search']."/i", '<span style="background:#FBC0B4">$0</span>', $item->title); !!}
									</a>	
								</div>
								<div class="mb-20">
									{!! preg_replace("/".$_GET['search']."/i", '<span style="background:#FBC0B4">$0</span>', $item->meta_description); !!}
								</div>
								<div class="d-flex align-items-center gap-3">
									<div class="d-flex align-items-center fw-semibold ">
										<img src="/themes/writerzen/img/favicon.svg" width="16" alt="/writerzen"
											class="me-1 ">WriterZen
									</div>
									<div class="static text-secondary h9 fw-semibold">{{ date_format($item->created_at, 'M d') }}</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>	
			</div>
		</div>

		@if( $data['posts']->lastPage() != 1 )
			<div class="row mb-80">
				<div class="col-auto mx-auto">
					<span class="btn-secondary-outline btn py-15 px-20 h7 border-radius-16" id="load-more-btn">
						Load more
					</span>
				</div>
			</div>
		@endif

		<div class="row mb-80">
			<div class="col-12">
				<div class="center">
					<div class="row mb-40">
						<div class="col-12">
							<div class="row align-items-center">
								<div class="col-auto">
									<div class="h1 fw-normal">You might be interested in...</div>
								</div>
								<div class="col">
									<div class="line"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="row position-relative">
						<div id="btn-prev-2"
							class="d-xl-flex d-none pointer position-absolute d-flex align-items-center justify-content-center btn-slide btn-prev">
							<i class="fa-thin fa-arrow-left fs-24"></i>
						</div>
					
						<div id="btn-next-2"
							class="d-xl-flex d-none pointer position-absolute d-flex align-items-center justify-content-center btn-slide btn-next">
							<i class="fa-thin fa-arrow-right fs-24"></i>
						</div>
						<div class="owl-carousel owl-theme col-12 col-sm-6 col-md-10 col-lg-12 mx-auto"  id="slide-2">
							@foreach($data['mostView'] as $item)
								
								<div class="blog__item bg-primary-ultra-light border-radius-10 overflow-hidden h-100">
									<a href="{{route('blog.detail', $item->slug)}}">
										<img src="{{$item->thumbnail}}" alt="{{$item->title}}" onerror="this.src='/themes/writerzen/img/background/course-default-bg.png' ">
									</a>
									<div class="px-20 py-20">
										<div class="d-flex flex-wrap mb-10" style="gap:16px">
											@if($item->featured)
												<div class="blog__tag static bg-warning">
													<i class="fa fa-star me-5 h10" style="line-height: 1;"></i>Featured
												</div>
											@endif
											@if($item->category)
												<a href="{{route('blog.category', $item->category->slug ) }}">
													<div class="blog__tag text-center">
														{{$item->category->title}}
													</div>
												</a>
											@endif
											<div class="h9 text-secondary fw-semibold">{{$item->reading_time}} min read</div>
										</div>
										<div class="h3 mb-10">
											<a class="text-black" href="{{route('blog.detail', $item->slug)}}">
												{{$item->title}}
											</a>
										</div>
										<div class="mb-20">
											{{$item->meta_description}}
										</div>
										<div class="d-flex align-items-center h9 fw-semibold">
											<img src="/themes/writerzen/img/favicon.svg" width="16" alt="/writerzen" class="me-1" style="width:16px">											
											<span class="">{{isset($item->author_info->name) ? $item->author_info->name : 'WriterZen' }}</span> 
											<span class="text-secondary ms-20">{{ date_format($item->created_at, 'M d') }}</span>
										</div>
									</div>
								</div>
								
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>

		{{-- Count me in --}}
		@include('/components/count_me_in')

	</div>
@endsection

@section('js')
	<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
	<script src="/themes/writerzen/js/blog.js?version={{env('VERSION')}}"></script>
	<script>

		let page = 1
		let lastPage = 1
		let search = $('[data-target="input-search"]').val()
		let tag = $('[data-target="tag-search"]').val()
		let url = `/api/services/blog/search-article?${tag ? 'tag='+ tag +'&' : '' }search=${search}&page=`
		
		$('#load-more-btn').click(function(){
			if( lastPage >= page )
			{
				$.get(url + parseInt(page+1), function(data,status){
					if( data.data.current_page < data.data.last_page)
					{
						page = page + 1
					}else{
						$('#load-more-btn').addClass('d-none')
						stop = true
					}
					
					lastPage = data.data.last_page
					
					html = renderElem2(data.data.data, search)
					var $content = $( html );
					$('#articles-container').append( $content );

				})
			}
		})

	</script>
	<script>
		var owl2 = $('#slide-2');
        owl2.owlCarousel({
            margin: 25,
            responsive: {
                992: {
                    items: 3
                },
				575: {
                    items: 2
                },
				0: {
					items: 1
				}
            },
            loop: true,
        });
        $('#btn-prev-2').click(function() {
            owl2.trigger('prev.owl.carousel');
        })
        $('#btn-next-2').click(function() {
            owl2.trigger('next.owl.carousel');
        })
	</script>
@endsection