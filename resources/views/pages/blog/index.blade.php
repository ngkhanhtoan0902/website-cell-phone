@extends('layouts.index')
@section('meta-title', 'Latest Blogs & Resources to Boost Productivity | Doctopus')
@section('meta-description', 'Unlock the full power of Doctopus! Find productivity hacks, research tips, tutorials, and
    use cases. Learn how to work smarter, not harder, with your documents.')
@section('content')
    <div class="container-fluid blog" id="blog">
        <div class="search-popup hide">
            <div class="row center">
                <div class="col-12 mt-65 mb-40 ">
                    <span id="closeSearch" class="btn-circle-outline mx-auto cursor-pointer">
                        <i class="fa-light fa-close" style="font-size:18px"></i>
                    </span>
                </div>
                <div class="col-12">
                    <form action="{{ route('blog.search') }}" data-target="form-search">
                        <div class="input-primary-medium position-relative" style="border-radius: 34px">
                            <input data-target="input-search" class="form-control ps-20 py-20" style="border-radius:34px"
                                name="search" value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}" type="text"
                                placeholder='Enter keyword'>
                            <div class="position-absolute col-auto" style="top:calc(50% - 15px);right:24px">
                                <div type="submit" class="bg-transparent border-0 border-radius-10 text-secondary"
                                    data-target="btn-submit" disabled="disabled"
                                    onclick="document.querySelector(`[data-target='form-search']`).submit()">
                                    <i class="fa-light fa-magnifying-glass" style="color:#BFC7DA"></i>
                                </div>
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
                            <a href="{{ url('/blog') }}">
                                <div class="blog__tag active">
                                    All
                                </div>
                            </a>
                        </div>
                        @foreach ($data['categories'] as $cate)
                            <div class="col-auto">
                                <a href="{{ route('blog.category', $cate['slug']) }}">
                                    <div class="blog__tag">
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
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <h1 class="h1 fw-semibold">WriterZen’s Blog</h1>
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

        {{-- Special post --}}
        <div class="row mb-60">
            <div class="col-12">
                <div class="center">
                    <div class="row">
                        @if ($data['special_top'])
                            <div class="col-md-6 col-12">
                                <div class="blog__item bg-primary-ultra-light border-radius-10 overflow-hidden">
                                    <a href="{{ route('blog.detail', $data['special_top']->slug) }}">
                                        <img data-src="{{ $data['special_top']->thumbnail }}"
                                            alt="{{ $data['special_top']->title }}"
                                            onerror="this.src='/themes/writerzen/img/background/course-default-bg.png' "
                                            class="lazy">
                                    </a>
                                    <div class="px-20 py-20">
                                        <div class="d-flex flex-wrap mb-20" style="gap:20px">
                                            @if ($data['special_top']->featured)
                                                <div class="blog__tag static bg-warning">
                                                    <i class="fa fa-star me-5 h10" style="line-height: 1;"></i>Featured
                                                </div>
                                            @endif
                                            @if ($data['special_top']->category)
                                                <a
                                                    href="{{ route('blog.category', $data['special_top']->category->slug) }}">
                                                    <div class="blog__tag text-center">
                                                        {{ $data['special_top']->category->title }}
                                                    </div>
                                                </a>
                                            @endif
                                            <div class="h9 text-secondary fw-semibold">
                                                {{ $data['special_top']->reading_time }} min read</div>
                                        </div>
                                        <div class="h3 mb-20">
                                            <a class="text-black"
                                                href="{{ route('blog.detail', $data['special_top']->slug) }}">
                                                {{ $data['special_top']->title }}
                                            </a>
                                        </div>
                                        <div class="mb-20">
                                            {{ $data['special_top']->meta_description }}
                                        </div>
                                        <div class="d-flex align-items-center h9 fw-semibold">
                                            <img src="/themes/writerzen/img/favicon.svg" width="16" alt="/writerzen"
                                                class="me-1">
                                            <span
                                                class="">{{ isset($item->author_info->name) ? $item->author_info->name : 'WriterZen' }}</span>
                                            <span
                                                class="text-secondary ms-20">{{ date_format($data['special_top']->created_at, 'M d') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="col-md col-12 d-flex flex-column" style="gap:20px">
                            @foreach ($data['special'] as $item)
                                <div class="px-20 py-20" style="border-bottom:1px solid #E4ECFA">
                                    <div class="d-flex flex-wrap mb-20" style="gap:20px">
                                        @if ($item->featured)
                                            <div class="blog__tag static bg-warning">
                                                <i class="fa fa-star me-5 h10" style="line-height: 1;"></i>Featured
                                            </div>
                                        @endif
                                        @if ($item->category)
                                            <a href="{{ route('blog.category', $item->category->slug) }}">
                                                <div class="blog__tag text-center">
                                                    {{ $item->category->title }}
                                                </div>
                                            </a>
                                        @endif
                                        <div class="h9 text-secondary fw-semibold">{{ $item->reading_time }} min read</div>
                                    </div>
                                    <div class="h5 mb-10">
                                        <a class="text-black" href="{{ route('blog.detail', $item->slug) }}">
                                            {{ $item->title }}
                                        </a>
                                    </div>
                                    <div class="mb-20">
                                        {{ $item->meta_description }}
                                    </div>
                                    <div class="d-flex align-items-center h9 fw-semibold">
                                        <img src="/themes/writerzen/img/favicon.svg" width="16" alt="/writerzen"
                                            class="me-1">
                                        <span class="">WriterZen</span>
                                        <span
                                            class="text-secondary ms-20">{{ date_format($item->created_at, 'M d') }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Recent articles --}}
        <div class="row mb-60">
            <div class="col-12">
                <div class="center">
                    <div class="row g-3">
                        <div class="col-12 mb-40">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <h2 class="h1 fw-semibold">Recent Articles</h2>
                                </div>
                                <div class="col">
                                    <div class="line"></div>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ route('blog.recent') }}" aria-label="Recent Articles page">
                                        <span class="btn-circle-outline mx-auto cursor-pointer">
                                            <i class="fa-light fa-angle-right" style="font-size:26px"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @foreach ($data['recent'] as $item)
                            <div class="col-md-6 col-lg-4 col-12">
                                <div class="blog__item bg-primary-ultra-light border-radius-10 overflow-hidden h-100">
                                    <a href="{{ route('blog.detail', $item->slug) }}">
                                        <img data-src="{{ $item->thumbnail }}" alt="{{ $item->title }}"
                                            onerror="this.src='/themes/writerzen/img/background/course-default-bg.png' "
                                            class="lazy">
                                    </a>
                                    <div class="px-20 py-20">
                                        <div class="d-flex flex-wrap mb-10" style="gap:16px">
                                            @if ($item->featured)
                                                <div class="blog__tag static bg-warning">
                                                    <i class="fa fa-star me-5 h10" style="line-height: 1;"></i>Featured
                                                </div>
                                            @endif
                                            @if ($item->category)
                                                <a href="{{ route('blog.category', $item->category['slug']) }}">
                                                    <div class="blog__tag text-center">
                                                        {{ $item->category->title }}
                                                    </div>
                                                </a>
                                            @endif
                                            <div class="h9 text-secondary fw-semibold">{{ $item['reading_time'] }} min
                                                read</div>
                                        </div>
                                        <div class="h3 mb-10">
                                            <a class="text-black" href="{{ route('blog.detail', $item['slug']) }}">
                                                {{ $item->title }}
                                            </a>
                                        </div>
                                        <div class="mb-10">
                                            {{ $item->meta_description }}
                                        </div>
                                        <div class="d-flex align-items-center h9 fw-semibold">
                                            <img src="/themes/writerzen/img/favicon.svg" width="16" alt="/writerzen"
                                                class="me-1">
                                            <span
                                                class="">{{ isset($item->author_info->name) ? $item->author_info->name : 'WriterZen' }}</span>
                                            <span
                                                class="text-secondary ms-20">{{ date_format($item->created_at, 'M d') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- Categories --}}
        @foreach ($data['categories'] as $index => $cate)
            <div class="row mb-60">
                <div class="col-12">
                    <div class="center">
                        <div class="row g-3">
                            <div class="col-12 mb-30">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <h2 class="h1 fw-semibold mb-0">{{ $cate['title'] }}</h2>
                                    </div>
                                    <div class="col">
                                        <div class="line"></div>
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{ route('blog.category', $cate['slug']) }}"
                                            aria-label="{{ $cate['title'] }} page">
                                            <span class="btn-circle-outline mx-auto cursor-pointer">
                                                <i class="fa-light fa-angle-right" style="font-size:26px"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @foreach ($cate['posts'] as $item)
                                <div class="col-md-6 col-lg-4 col-12">
                                    <div class="blog__item bg-primary-ultra-light border-radius-10 overflow-hidden h-100">
                                        <a href="{{ route('blog.detail', $item->slug) }}">
                                            <img data-src="{{ $item->thumbnail }}" alt="{{ $item->title }}"
                                                onerror="this.src='/themes/writerzen/img/background/course-default-bg.png' "
                                                class="lazy">
                                        </a>
                                        <div class="px-20 py-20">
                                            <div class="d-flex flex-wrap mb-10" style="gap:16px">
                                                @if ($item->featured)
                                                    <div class="blog__tag static bg-warning">
                                                        <i class="fa fa-star me-5 h10"
                                                            style="line-height: 1;"></i>Featured
                                                    </div>
                                                @endif
                                                <a href="{{ route('blog.category', $cate['slug']) }}">
                                                    <div class="blog__tag text-center">
                                                        {{ $cate['title'] }}
                                                    </div>
                                                </a>
                                                <div class="h9 text-secondary fw-semibold">{{ $item->reading_time }} min
                                                    read</div>
                                            </div>
                                            <div class="h3 mb-10">
                                                <a class="text-black" href="{{ route('blog.detail', $item->slug) }}">
                                                    {{ $item->title }}
                                                </a>
                                            </div>
                                            <div class="mb-20">
                                                {{ $item->meta_description }}
                                            </div>
                                            <div class="d-flex align-items-center h9 fw-semibold">
                                                <img src="/themes/writerzen/img/favicon.svg" width="16"
                                                    alt="/writerzen" class="me-1">
                                                <span
                                                    class="">{{ isset($item->author_info->name) ? $item->author_info->name : 'WriterZen' }}</span>
                                                <span
                                                    class="text-secondary ms-20">{{ date_format($item->created_at, 'M d') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- Material banner --}}
            @if ($index < 1)
                <div class="row mb-60">
                    <div class="col-12">
                        <div class="center" data-aos="animation-translate-up" data-aos-duration="500">
                            <a href="{{ route('materials.show', $data['material']->slug) }}">
                                <div class="row ebook-item ebook-item-banner g-0 bg-cover bg-center border-radius-20 justify-content-center justify-content-lg-between"
                                    style="background-image: url('/themes/writerzen/img/background/bg-ebooks.png');">
                                    <div class="col-12 col-lg">
                                        <img data-src="{{ $data['material']->graphic }}" alt="ebook" class="lazy">
                                    </div>
                                    <div class="col-12 col-lg-6 d-flex flex-column justify-content-center">
                                        <div class="category__tag__static mb-20 text-center bg-warning"><i
                                                class="fa fa-star me-5 h10"></i>Featured</div>
                                        <h2 class="h2 mb-20 text-black">{{ $data['material']->title }}</h2>
                                        <div class="h5 mb-0 fw-normal text-black">{{ $data['material']->description }}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach



        {{-- Count me in --}}
        @include('/components/count_me_in')

        {{-- CTA LTD banner --}}
        @if (!empty($_SESSION['check_new_year']))
            @include('./components/banner_ltd_newyear')
        @endif

    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
        integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async>
    </script>
    <script src="/themes/writerzen/js/blog.js?ver={{ env('VERSION') }}"></script>
    <script>
        $('[data-target="input-search"]').hover(function() {
            if ($(this).val().length > 0)
                $('[data-target="btn-submit"]').attr('disabled', false)
            else
                $('[data-target="btn-submit"]').attr('disabled', 'disabled')
        });
    </script>
@endsection
