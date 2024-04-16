@extends('layouts.index')
@section('meta-title', isset($data['category']) ? $data['category']->meta_title : 'WriterZen eBooks, Whitepapers & Infographics')
@section('meta-description', isset($data['category']) ? $data['category']->meta_description : 'Take your marketing game to the next level with WriterZen’s free, easy-to-access, and comprehensive guides. Browse our collection today.')
@section('content')
    <div class="container-fluid">
        <div class="row main-info">
            <div class="col-12">
                <div class="center text-center " data-aos="animation-translate-up" data-aos-duration="500">
                    <h1 class="h1 mb-20">
                        eBooks, Whitepapers & Infographics
                    </h1>
                    <div class="mx-auto" style="max-width:738px">
                        Streamline your content creation with WriterZen's expertly crafted guides. Downloadable in PDF format for easy access and packed with valuable insights.
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="center" data-aos="animation-translate-up" data-aos-duration="500">
                    <form action="{{route('materials.index')}}">
                        <div class="row py-20 justify-content-between g-3">
                            <div class="col-12 col-lg-auto order-2 order-lg-1">
                                <div class="d-flex h-100 align-items-end" style="gap:20px">
                                    <a href="{{route('materials.index')}}" class="">
                                        <div class="category__tag {{ isset($data['category']) ? null : 'active' }}">
                                            All
                                        </div>
                                    </a>
									@foreach($data['categories'] as $item)
                                        @if(count($item->materials()->where('status', 1)->get()))
                                        <a href="{{route('materials.category', $item->slug)}}">
                                            <div
                                                class="category__tag {{ isset($data['category']) && $data['category']->slug == $item->slug ? 'active' : '' }}">
                                                {{$item->title}}
                                            </div>
                                        </a>
                                        @endif
									@endforeach
                                </div>
                            </div>
                            <div class="col-12 col-lg-5 order-1 order-lg-2">
                                <div class="input position-relative">
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
                            </div>
                        </div>
                    </form>
                    <div class="line"></div>
                </div>
            </div>
        </div>

		@if(isset($_GET['search']))
			<div class="row">
				<div class="col-12">
					<div class="center" data-aos="animation-translate-up" data-aos-duration="500">
						<div class="row py-50">
							<div class="col-12">
								<div class="h3 fw-semibold mb-20">Search Results for “{{$_GET['search']}}"</div>
								<div class="h4 fw-normal">{{$data['materials']->total()}} result{{$data['materials']->total() > 1 ? 's' : ''}}</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endif

        {{-- Material banner --}}
        @if(!isset($data['category']) && !isset($_GET['search']) && !empty($data['special']))
            @foreach($data['special'] as $item)
                <div class="row pt-40">
                    <div class="col-12">
                        <div class="center" data-aos="animation-translate-up" data-aos-duration="500">
                            <a href="{{route('materials.show', $item->slug)}}">
                                <div class="row ebook-item ebook-item-banner g-0 bg-cover bg-center border-radius-20 justify-content-center justify-content-lg-between"
                                    style="background-image: url('/themes/writerzen/img/background/bg-ebooks.png');">
                                    <div class="col-12 col-lg">
                                        <img src="{{$item->graphic}}" alt="ebook">
                                    </div>
                                    <div class="col-12 col-lg-6 d-flex flex-column justify-content-center">
                                        <div class="category__tag__static mb-20 text-center bg-warning"><i class="fa fa-star me-5 h10"></i>Featured</div>
                                        <h2 class="h2 mb-20 text-black">{{$item->title}}</h2>
                                        <div class="h5 mb-0 fw-normal text-black">{{$item->description}}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
		@endif
        {{----}}

        <div class="row">
            <div class="col-12">
                <div class="center" data-aos="animation-translate-up" data-aos-duration="500">
                    <div class="row pt-40 pb-80 g-4 row-cols-lg-3 row-cols-sm-2 row-cols-1" >
                        @foreach($data['materials'] as $item)
                            @if(!isset($data['category']) ) 
                                @if($item->status != 2 )
                                    <div class="col">
                                        <a href="{{route('materials.show', $item->slug)}}">
                                            <div class="ebook-item h-100 d-flex flex-column border-radius-10 overflow-hidden">
                                                <img src="{{$item->thumbnail}}" alt="{{$item->title}}">
                                                <div class="px-16 py-16 bg-primary-ultra-light flex-fill">
                                                    <div class="mb-20">
                                                        <div class="category__tag__static">
                                                            {{$item->category->title}}
                                                        </div>
                                                    </div>
                                                    <div class="h3 mb-0 fw-semibold text-black">
                                                        @if(isset($_GET['search']))
                                                            {!! preg_replace("/".$_GET['search']."/i", '<span style="background:rgba(248, 130, 106, .5)">$0</span>', $item->title); !!}
                                                        @else
                                                            {{$item->title}}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @else
                                <div class="col">
                                    <a href="{{route('materials.show', $item->slug)}}">
                                        <div class="ebook-item h-100 d-flex flex-column border-radius-10 overflow-hidden">
                                            <img src="{{$item->thumbnail}}" alt="{{$item->title}}">
                                            <div class="px-16 py-16 bg-primary-ultra-light flex-fill">
                                                <div class="mb-20">
                                                    <div class="category__tag__static">
                                                        {{$item->category->title}}
                                                    </div>
                                                </div>
                                                <div class="h3 mb-0 fw-semibold text-black">
                                                    @if(isset($_GET['search']))
                                                        {!! preg_replace("/".$_GET['search']."/i", '<span style="background:rgba(248, 130, 106, .5)">$0</span>', $item->title); !!}
                                                    @else
                                                        {{$item->title}}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    {{ $data['materials']->onEachSide(1)->appends(request()->query())->links() }}
                </div>
            </div>
        </div>

        {{-- CTA LTD banner --}}
        @if(!empty($_SESSION['check_new_year']))
            @include('./components/banner_ltd_newyear')
        @endif
        
    </div>
@endsection
@section('css')
<style>
	.main-info{
		padding: 90px 0 40px 0
	}

	@media only screen and (max-width: 475px) {
		.main-info{
			padding: 30px 0 30px 0
		}
    }
    .form-control {
        background-color: transparent
    }
    .ebook-item {
        box-shadow: -6px 6px 20px 0px rgba(91, 111, 163, 0.15);
        transition: all .25s ease;
    }
    .ebook-item:hover{
        box-shadow: 0px 20px 20px 0px rgba(91, 111, 163, 0.30);
    }
</style>
@endsection