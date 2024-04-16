@extends('layouts.index')
@section('meta-title', $data['category']['meta_title'] ?? 'WriterZen - Blog - '.$data['category']['title'] )
@section('meta-description', $data['category']['meta_description'] ?? "Need some guidance? We've got you covered. Check out our blogs to find everything you want to know about ".$data['category']['title'].".")
@section('content')
	<input type="hidden" name="categorySlug" value="{{$data['category']['slug']}}">
	<div  class="container-fluid blog" id="blog">
		
		<div class="search-popup hide" >
			<div class="center row" >
				<div class="col-12 mt-65 mb-40 ">
					<span id="closeSearch" class="btn-circle-outline mx-auto cursor-pointer" >
						<i class="fa-light fa-close" style="font-size:18px"></i> 
					</span>
				</div>
				<div class="col-12">
					<form action="{{route('blog.search')}}" data-target="form-search" >
						<div class="input-primary-medium position-relative" style="border-radius: 34px">
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
						<div class="col-auto">
							<a href="{{url('/blog')}}">
								<div class="blog__tag">
									All
								</div>
							</a>
						</div>
						@foreach($data['categories'] as $cate)
							<div class="col-auto"  >
								<a href="{{route('blog.category', $cate['slug'])}}">
									<div class="blog__tag {{$cate['slug'] == $data['category']['slug'] ? 'active' : '' }}">
										{{ $cate['title'] }}
									</div>
								</a>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>

		<div class="row mb-40">
			<div class="col-12">
				<div class="center">
					<div class="row g-0">
						<div class="col-12">
							<div class="row align-items-center">
								<div class="col-auto">
									<h1 class="h1 fw-semibold">{{$data['category']['title']}}</h1>
								</div>
								<div class="col">
									<div class="line"></div>
								</div>
								<div class="col-auto">
									<span id="openSearch" class="btn-circle-outline mx-auto cursor-pointer">
										<i class="fa-light fa-magnifying-glass" style="font-size:18px"></i> 
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		@if($data['special_top'])
		<div class="row mb-60">
			<div class="col-12">
				<div class="center">
					<div class="row g-0 border-radius-10 overflow-hidden blog__item">
						<div class="col-lg-6 col-12">
							<a class="text-black" href="{{route('blog.detail', $data['special_top']->slug)}}">
								<img src="{{$data['special_top']->thumbnail}}" alt="{{$data['special_top']->title}}" onerror="this.src='/themes/writerzen/img/background/course-default-bg.png' ">
							</a>	
						</div>
						<div class="col-lg-6 col-12">
							<div class="py-20 px-20 bg-primary-ultra-light h-100">
								<div class="d-flex flex-wrap mb-20" style="gap:10px">
									<div class="blog__tag static bg-warning">
										<i class="fa fa-star me-5 h10" style="line-height: 1;"></i>Featured
									</div>
									<a href="{{route('blog.category', $data['special_top']->category->slug)}}">
										<div class="blog__tag text-center">
											{{$data['special_top']->category->title}}
										</div>
									</a>
								</div>
								<div class="h3 fw-semibold mb-0">
									<a class="text-black" href="{{route('blog.detail', $data['special_top']->slug)}}">
										{{$data['special_top']->title}}
									</a>
								</div>
								<div class="mb-20">
									{{$data['special_top']->meta_description}}
								</div>
								<div class="d-flex align-items-center h9 fw-semibold" style="gap:20px">
									<span>
										<img src="/themes/writerzen/img/favicon.svg" width="16" alt="/writerzen">
										<span class="">{{isset($data['special_top']->author_info->name) ? $data['special_top']->author_info->name : 'WriterZen' }}</span> 
									</span>
									<span class="text-secondary">{{ date_format($data['special_top']->created_at, 'M d') }}</span>
									<span class="text-secondary fw-semibold">{{$data['special_top']->reading_time}} min read</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endif

		{{-- Material banner --}}
		<div class="row mb-60">
			<div class="col-12">
				<div class="center" data-aos="animation-translate-up" data-aos-duration="500">
					<a href="{{route('materials.show', $data['material']->slug)}}">
						<div class="row ebook-item ebook-item-banner g-0 bg-cover bg-center border-radius-20 justify-content-center justify-content-lg-between"
							style="background-image: url('/themes/writerzen/img/background/bg-ebooks.png');">
							<div class="col-12 col-lg">
								<img src="{{$data['material']->graphic}}" alt="ebook">
							</div>
							<div class="col-12 col-lg-6 d-flex flex-column justify-content-center">
								<div class="category__tag__static mb-20 text-center bg-warning"><i class="fa fa-star me-5 h10"></i>Featured</div>
								<h2 class="h2 mb-20 text-black">{{$data['material']->title}}</h2>
								<div class="h5 mb-0 fw-normal text-black">{{$data['material']->description}}</div>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>

		{{-- Articles --}}
		<div class="row mb-60">
			<div class="col-12">
				<div class="center">
					<div class="row gy-4" id="articles-container">
						@foreach($data['posts'] as $item)
							<div class="col-md-6 col-lg-4 col-12">
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
											<a href="{{route('blog.category', $data['category']['slug'])}}">
												<div class="blog__tag text-center">
													{{$data['category']['title']}}
												</div>
											</a>
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
											<img src="/themes/writerzen/img/favicon.svg" width="16" alt="/writerzen" class="me-1">
											<span class="">{{isset($item->author_info->name) ? $item->author_info->name : 'WriterZen' }}</span> 
											<span class="text-secondary ms-20">{{ date_format($item->created_at, 'M d') }}</span>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>

		@if( $data['posts']->lastPage() != 1 )
			<div class="row mb-60">
				<div class="col-auto mx-auto">
					<span class="btn-secondary-outline btn py-15 px-20 h7 border-radius-16" id="show-more-btn">
						Load more
					</span>
				</div>
			</div>
		@endif

		{{-- Count me in --}}
		@include('/components/count_me_in')


	</div>
@endsection

@section('js')
	<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
	<script src="/themes/writerzen/js/blog.js?ver={{env('VERSION')}}"></script>
	<script>
		let perPage = 6
		let page = 1
		let lastPage = 1
		let categorySlug = $('[name="categorySlug"]').val()
		let url = `/api/services/blog/get-article-by-category?category=${categorySlug}&limit=${perPage}&page=`
		$('#show-more-btn').click(function(){
			if( lastPage >= page )
			{
				$.get( url + parseInt(page+  1),function(data, status){
					
					if( data.data.current_page < data.data.last_page)
						page = page + 1
					else{
						$('#show-more-btn').addClass('d-none')
					}
					
					lastPage = data.data.last_page
					html = renderElem(data.data.data)
					var $content = $( html );
					$('#articles-container').append( $content );

				})
			}
		})
		
	</script>

	@include('../components/seo_script_footer')
@endsection