@extends('layouts.index')
@section('meta-title', 'WriterZen - Blog - Recent Articles')
@section('meta-description',
    "Need some guidance? We've got you covered. Check out our latest blogs to step up your SEO and content marketing games.")
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
                                <button type="submit" class="bg-transparent border-0 border-radius-10 text-secondary"
                                    data-target="btn-submit" disabled="disabled">
                                    <i class="fa-light fa-magnifying-glass" style="color:#BFC7DA"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Recent articles --}}
        <div class="row mb-40 mt-60">
            <div class="col-12">
                <div class="center">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="mb-40 h9">
                                <a href="{{ route('blog.index') }}"
                                    class="link text-secondary fw-semibold me-10 d-inline-flex align-items-center">
                                    Blog <i class="fa-light fa-angle-right ms-2"></i>
                                </a>
                                <span class="fw-semibold">Recent Articles</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <h1 class="h1 fw-semibold">Recent Articles</h1>
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

        <div class="row mb-20">
            <div class="col-12">
                <div class="center" id="articles-container">
                    @foreach ($data['posts'] as $item)
                        <div class="row g-0 py-20 px-20 blog__item blog__item-hover border-radius-20"
                            style="gap:20px;margin:0 -20px">
                            <div class="col-12 col-md-4">
                                <a href="{{ route('blog.detail', $item->slug) }}">
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
                                    @if ($item->category)
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
                                    <a class="text-black" href="{{ route('blog.detail', $item->slug) }}">
                                        {{ $item->title }}
                                    </a>
                                </div>
                                <div class="mb-20">{{ $item->meta_description }}</div>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="d-flex align-items-center fw-semibold ">
                                        <img src="/themes/writerzen/img/favicon.svg" width="16" alt="/writerzen"
                                            class="me-1 ">WriterZen
                                    </div>
                                    <div class="static text-secondary h9 fw-semibold">
                                        {{ date_format($item->created_at, 'M d') }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        @if ($data['posts']->lastPage() != 1)
            <div class="row mb-60">
                <div class="col-auto mx-auto">
                    <span class="btn-secondary-outline btn py-15 px-20 h7 border-radius-16" id="load-more-btn">
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
    <script>
        let page = 1
        let lastPage = 1
        let url = '/api/services/blog/recent-article';
        $("#load-more-btn").click(function() {
            if (lastPage >= page) {
                $.get(url + '?page=' + parseInt(page + 1), function(data, status) {
                    if (data.data.current_page < data.data.last_page)
                        page = page + 1
                    else
                        $('#load-more-btn').addClass('d-none')

                    lastPage = data.data.last_page
                    html = renderElem2(data.data.data)
                    var $content = $(html);
                    $('#articles-container').append($content);
                })
            }
        });
    </script>
@endsection
