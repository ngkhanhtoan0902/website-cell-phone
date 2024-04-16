@extends('layouts.index')
@section('meta-title', 'WriterZen - '. $data['article']->title)
@section('meta-description',$data['article']->meta_description )
@section('meta-thumbnail',asset($data['article']->thumbnail))

@section('content')
<div class="container-fluid blog position-relative" id="article">

	<div class="row py-60 position-relative" >
		<div class="position-absolute bg-primary-ultra-light w-100" style="bottom:0;z-index:-1;height: calc(100% + 106px)"></div>
		<div class="col-12">
			<div class="center">
				<div class="mb-40 h9">
					<a href="{{route('blog.index')}}" class="link text-secondary fw-semibold me-10 d-inline-flex align-items-center">
						Blog <i class="fa-light fa-angle-right ms-2"></i>
					</a>
					<span class="fw-semibold">{{$data['article']->title}}</span>
				</div>
				<div class="d-flex flex-wrap mb-20" style="gap:20px">
					@if($data['article']->featured)
						<div class="blog__tag static bg-warning">
							<i class="fa fa-star me-5 h10" style="line-height: 1;"></i>Featured
						</div>
					@endif
					@if($data['article']->category)
						<a href="{{route('blog.category', $data['article']->category->slug)}}">
							<div class="blog__tag text-center">
								{{$data['article']->category->title}}
							</div>
						</a>
					@endif
				</div>
				<h1 class="d5 fw-bold mb-20" >
					{{$data['article']->title}}
				</h1>
				<div class="d-flex flex-wrap align-items-center h5">
					<span>

					</span>
					<img src="/themes/writerzen/img/favicon.svg" width="40" alt="writerzen" class="me-10">
					{{$data['article']->author_info['name'] ?? 'WriterZen' }}
					@if(!empty($data['article']->author_info['job_title']))
						<div class="d-flex align-items-center fw-normal">
							<span class="mx-2 d-inline-block" style="width:5px;height:5px;border-radius:50%;background:#000"></span>
							{{$data['article']->author_info['job_title']}}
						</div>
					@endif
					<div class="d-inline-block">
						<span class="mx-10">|</span>
						<span class="h5 fw-semibold text-secondary mb-0">{{ date_format($data['article']->created_at, 'M d') }}</span>
						<span class="mx-10">|</span>
						<span class="h5 fw-semibold text-secondary mb-0">{{$data['article']->reading_time}} min read</span>
					</div>

				</div>

			</div>
		</div>
	</div>

    <div class="row pt-60 position-relative" id="content-wrapper">
		<div class="col-12">
			<div class="center" >
				<div class="row mb-120 position-relative">
					<div class="col-lg d-lg-block d-none position-relative">
						<div class="outline position-sticky mb-20" style="top: 120px" data-target="table-of-content">
							<div class="h7 text-secondary mb-10">
								Table of content
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-8">

						<div class="mb-20 border-radius-20 overflow-hidden">
							<img src="{{asset($data['article']->thumbnail)}}" alt="{{$data['article']->title}}">
						</div>

						<div class="row">
							<div class="col-lg-12" id="content-container">
								<article>
									{!! $data['article']->content !!}
								</article>
							</div>
						</div>

						<div class="line mt-50" style="background:#BFC7DA"></div>
						@if(count(explode(",",$data['article']->tag)))
							<div class="d-flex flex-wrap pt-50 align-items-center">
								<div class="me-10 mb-10">
									Tags:
								</div>
								@foreach( $data['article']->tags as $tag )
								<a href="{{route('blog.tag', $tag->slug)}}">
									<div class="blog__tag me-10 mb-10">
										{{$tag->name}}
									</div>
								</a>
								@endforeach
							</div>
						@endif
					</div>
					<div class="col-lg-1 d-lg-block d-none position-relative">
						<div class="row position-sticky " style="top: 120px">
							<div class="col-lg-12 col-3">
								<a class="btn-circle-outline mb-15 mx-auto me-0"
									onclick="shareButton(`https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}`)"
									href="javascript:void(0)" >
									<i class="fa-brands fa-facebook-f"></i>
								</a>
							</div>
							<div class="col-lg-12 col-3">
								<a class="btn-circle-outline mb-15 mx-auto me-0"
									onclick="shareButton(`https://twitter.com/share?text=&url={{url()->current()}}`)"
									href="javascript:void(0)">
									<i class="fa-brands fa-twitter"></i>
								</a>
							</div>
							<div class="col-lg-12 col-3">
								<a class="btn-circle-outline mb-15 mx-auto me-0"
									onclick="shareButton(`https://www.linkedin.com/sharing/share-offsite/?url={{url()->current()}}`)"
									href="javascript:void(0)">
									<i class="fa-brands fa-linkedin-in"></i>
								</a>
							</div>
							<div class="col-lg-12 col-3">
								<span class="btn-circle-outline mb-15 mx-auto me-0 cursor-pointer" data-copy="{{url()->current()}}"  id="btn-copy-link"
									data-bs-placement="bottom" title="Copied" >
									<i class="fa-light fa-share"></i>
								</span>
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>
    </div>

	@if(!empty($data['related']))
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
							class="d-flex pointer position-absolute d-flex align-items-center justify-content-center btn-slide btn-prev">
							<i class="fa-thin fa-arrow-left fs-24"></i>
						</div>
					
						<div id="btn-next-2"
							class="d-flex pointer position-absolute d-flex align-items-center justify-content-center btn-slide btn-next">
							<i class="fa-thin fa-arrow-right fs-24"></i>
						</div>
						<div class="owl-carousel owl-theme col-12 col-sm-6 col-md-10 col-lg-12 mx-auto"  id="slide-2">

							@foreach($data['related'] as $item)
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
	@endif

	{{-- Count me in --}}
	@include('/components/count_me_in')
@endsection

@section('content-extend')
<div class="w-100 position-sticky blog" style="z-index:999;bottom:0;left:0;">
	<div class="outline d-lg-none d-block w-100 px-20 py-20 bg-primary-ultra-light" style="border-radius: 20px 20px 0 0;height:fit-content">
		<div class="position-relative">
			<div class="btn btn-secondary-outline fw-semibold w-100 py-10" data-target="outline-toggle">
				Table of content
			</div>
			<div class="pointer position-absolute text-secondary d-none" style="right:0;top:0" data-target="outline-toggle">
				<i class="fa-regular fa-x"></i>
			</div>
		</div>
		<div class="outline-mobile" data-target="table-of-content">
			<div class="text-center text-secondary mb-20 fw-semibold" style="font-size: 26px">Table of content</div>
		</div>
	</div>
</div>
@endsection

@section('js-head')
<script type="application/ld+json">
	{
	  "@context": "https://schema.org",
	  "@type": "BlogPosting",
	  "mainEntityOfPage": {
		"@type": "WebPage",
		"@id": "{{url('/blog/')}}/{{$data['article']->slug}}"
	  },
	  "headline": "{{ $data['article']->title}}",
	  "description": "{{ $data['article']->meta_description}}",
	  "image": "{{asset($data['article']->thumbnail)}}",
	  "publisher": {
		"@type": "Organization",
		"name": "WriterZen",
		"logo": {
		  "@type": "ImageObject",
		  "url": "https://writerzen.net/themes/writerzen/img/logo.png"
		}
	  },
	  "datePublished": "{{$data['article']->created_at}}",
	  "dateModified": "{{$data['article']->updated_at}}"
	}
</script>
@endsection
@section('js')
<script src="/themes/writerzen/js/blog.js?version={{env('VERSION')}}"></script>
<script>
    gsap.registerPlugin(ScrollTrigger);

	//table of content
	let headings = document.querySelectorAll("#content-container h2")

    for(let i = 0; i < headings.length; i++)
    {
        let headingId = "_" + changeToSlug(headings[i].textContent)
		headings[i].setAttribute('id', headingId)        

        let outline = `<a href="javascript:void(0)" data-target="${headingId}" onclick="scrollToId('${headingId}')" class="h9 d-block mb-10 text-black outline-item">
                        ${headings[i].textContent}
                    </a>`

        $('[data-target="table-of-content"]').append(outline)

        // gsap bind outline when scroll content blog
        gsap.to(`#${headingId}`,{scrollTrigger:{
            trigger:`#${headingId}`,
            start:"top 20%",
            end:"top 20%",
            // markers:true,
            onEnter: () => {
				let id =  headings[i].getAttribute('id')
				$(`[data-target="${ id }"]`).addClass('active')
				if(i > 0){
					let previousId = headings[i-1].getAttribute('id')
					$(`[data-target="${ previousId }"]`).removeClass('active')
				}
			},
            onEnterBack: () => {
				let id =  headings[i].getAttribute('id')
				$(`[data-target="${ id }"]`).removeClass('active')
				if(i > 0){
					let previousId = headings[i-1].getAttribute('id')
					$(`[data-target="${ previousId }"]`).addClass('active')
				}
			},
        }})
    }
	//table of content ---------------


	$( document ).ready(function() {
		if ($(window).width() > 768) {
			handleScrollArticle()
		}
	});

	//progress content -------------


	$('[data-target="outline-toggle"]').click(function(){
		$('[data-target="outline-toggle"]').toggleClass('d-none')
		$('.outline-mobile[data-target="table-of-content"]').toggleClass('active')
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
@include('../components/seo_script_footer')

@endsection
