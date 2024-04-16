@extends('layouts.index')
@section('meta-title', 'WriterZen - ' . $data->title)
@section('meta-description',
    $data->description ??
    'Take your marketing game to the next level with WriterZen’s free,
    easy-to-access, and comprehensive guides. Browse our collection today.')
@section('content')
    <div class="container-fluid material">
        <div class="row">

            @if ($isSubmitted)
                <div class="col-12 mt-100 mb-50 thanks-message-container show" id="thanks-submit">
                    <div class="center text-center">
                        <img src="/themes/writerzen/img/materials-thanks.png" alt="thanks materials">
                        <div class="h1 mt-20">
                            Thank you for downloading!
                        </div>
                        <div class="mt-20 mx-auto" style="max-width:765px">
                            Your <strong>{{ @$data->category->title }}</strong> is on the way! Now you can access the
                            <strong>{{ $data->title }} {{ @$data->category->title }}</strong> at all times.
                        </div>
                        <a href="{{ route('materials.index') }}"
                            class="btn btn-primary border-radius-10 px-24 py-16 mt-20 fw-semibold">
                            Find more materials
                        </a>
                    </div>
                </div>
            @else
                <div class="col-12 thank-you-free position-relative" data-target="material-content">
                    <div class="position-absolute w-100"
                        style="background-color: #EFF5FF;bottom:0;left:0;height:calc(100% + 106px);z-index:-1">
                    </div>
                    <div class="center">
                        <div class="row gy-4">
                            <div class="col-12 col-md-6 d-flex flex-column" data-aos="animation-translate-up"
                                data-aos-duration="500">
                                <div class="text-center">
                                    <img src="{{ $data->graphic }}" alt="{{ $data->title }}">

                                    <h1 class="h2 mb-0 fw-semibold d-inline-block">{{ $data->title }}</h1>
                                    <div class="h2 mb-0 fw-semibold d-inline-block">{{ $data->subtitle ? ':' : null }}</div>
                                    <div class="h2 mb-0 fw-semibold">{{ $data->subtitle }}</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6" data-aos="animation-translate-up" data-aos-duration="500">
                                <div class="bg-white px-20 py-20 border-radius-20 h-100 d-flex flex-column justify-content-center"
                                    style="box-shadow: -6px 6px 20px 0px rgba(91, 111, 163, 0.15);">
                                    <div class="h3 mb-10 fw-semibold">Free Download</div>
                                    <div class="mb-20">Fill in this form to receive our well-crafted material in PDF
                                        format.</div>
                                    <input type="hidden" name="id-hs-form" value="{{ $data->form_submit }}">
                                    <input type="hidden" class="form-control" name="user_email"
                                        value="{{ @Auth::guard('member')->user()->email }}">
                                    <div id="form-submit-hubspot">

                                    </div>
                                    @if (!Auth::guard('member')->check())
                                        <div class="mt-20 text-center">
                                            Want to download immediately without filling out
                                            this form next time? <a class="fw-semibold"
                                                href="{{ env('MAIN_APP_URL') }}/login">Sign in</a> now!
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 thank-you-content" data-target="material-content">
                    <div class="center">
                        <div class="row content-spacing gy-4">
                            <div class="col-12 col-md-6 order-2 order-lg-1">
                                {!! $data->content !!}
                            </div>
                            <div class="col-12 col-md-6 order-1 order-lg-2">
                                @if (!empty($data->preview))
                                    <div class="row g-0">
                                        <div class="col d-flex align-items-center justify-content-end">
                                            <div id="btn-prev-preview"
                                                class="d-xl-flex d-none pointer align-items-center justify-content-center btn-slide btn-prev">
                                                <i class="fa-thin fa-arrow-left fs-24"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-12 mx-auto">
                                            <div class="owl-carousel owl-theme col-12 col-sm-6 mx-auto px-4"
                                                id="slide-preview"
                                                style="filter: drop-shadow(-6px 6px 20px rgba(91, 111, 163, 0.15));">
                                                @foreach ($data->preview as $img)
                                                    <img src="{{ $img }}" alt="preview material"
                                                        class="w-auto mx-auto" style="">
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col d-flex align-items-center justify-content-start">
                                            <div id="btn-next-preview"
                                                class="d-xl-flex d-none pointer align-items-center justify-content-center btn-slide btn-next">
                                                <i class="fa-thin fa-arrow-right fs-24"></i>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
        @if (count($related))
            <div class="row">
                <div class="col-12 thank-you-related">
                    <div class="center" data-aos="animation-translate-up" data-aos-duration="500">
                        <div class="row" style="filter: drop-shadow(-6px 6px 20px rgba(91, 111, 163, 0.15));">
                            <div class="col-12 h1 thank-you-read fw-normal">
                                Related Materials
                            </div>
                            <div class="position-relative">
                                <div id="btn-prev-material"
                                    class="d-xl-flex d-none pointer position-absolute d-flex align-items-center justify-content-center btn-slide btn-prev">
                                    <i class="fa-thin fa-arrow-left" style="font-size:24px;line-height:48px;"></i>
                                </div>
                                <div id="btn-next-material"
                                    class="d-xl-flex d-none pointer position-absolute d-flex align-items-center justify-content-center btn-slide btn-next">
                                    <i class="fa-thin fa-arrow-right" style="font-size:24px;line-height:48px"></i>
                                </div>
                                <div id="material-container">
                                    <div class="owl-carousel owl-theme stretch" id="slide-material">
                                        @foreach ($related as $item)
                                            <div
                                                class="blog__item bg-primary-ultra-light border-radius-10 overflow-hidden h-100 card-animation">
                                                <a href="{{ route('materials.show', $item->slug) }}">
                                                    <img src="{{ $item->thumbnail }}" />
                                                    <div class="px-16 py-16">
                                                        <div class="d-flex mb-20" style="gap:20px">
                                                            <div class="blog__tag secondary active">
                                                                {{ $item->category->title }}
                                                            </div>
                                                        </div>
                                                        <div class="h3 mb-0 fw-semibold text-black">
                                                            @if (isset($_GET['search']))
                                                                {!! preg_replace(
                                                                    '/' . $_GET['search'] . '/i',
                                                                    '<span class="px-1" style="background:rgba(248, 130, 106, .5)">$0</span>',
                                                                    $item->title,
                                                                ) !!}
                                                            @else
                                                                {{ $item->title }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if (count($blog))
            <div class="row">
                <div class="col-12">
                    <div class="center" data-aos="animation-translate-up" data-aos-duration="500">
                        <div class="row" style="filter: drop-shadow(-6px 6px 20px rgba(91, 111, 163, 0.15));">
                            <div class="col-12 h1 thank-you-read fw-normal">
                                Read More
                            </div>
                            <div class="position-relative">
                                <div id="btn-prev-blog"
                                    class="d-xl-flex d-none pointer position-absolute d-flex align-items-center justify-content-center btn-slide btn-prev">
                                    <i class="fa-thin fa-arrow-left" style="font-size:24px;line-height:48px;"></i>
                                </div>
                                <div id="btn-next-blog"
                                    class="d-xl-flex d-none pointer position-absolute d-flex align-items-center justify-content-center btn-slide btn-next">
                                    <i class="fa-thin fa-arrow-right" style="font-size:24px;line-height:48px"></i>
                                </div>
                                <div id="blog-container">
                                    <div class="owl-carousel owl-theme stretch" id="slide-blog">
                                        @foreach ($blog as $item)
                                            <div
                                                class="blog__item bg-white border-radius-20 overflow-hidden h-100 card-animation">
                                                <img src="{{ $item->thumbnail }}" />
                                                <div class="px-16 py-16">
                                                    <div class="d-flex mb-20" style="gap:20px">
                                                        <a href="/blog">
                                                            <div class="blog__tag secondary active">
                                                                BLOG
                                                            </div>
                                                        </a>
                                                        @if (!empty($item->category))
                                                            <a href="{{ route('blog.category', $item->category->slug) }}">
                                                                <div class="blog__tag secondary">
                                                                    {{ $item->category->title }}
                                                                </div>
                                                            </a>
                                                        @endif
                                                    </div>
                                                    <a href="{{ route('blog.detail', $item->slug) }}">
                                                        <div class="h3 mb-0 fw-semibold text-black">{{ $item->title }}
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
@section('js')
    <script>
        hbspt.forms.create({
            target: "#form-submit-hubspot",
            region: "na1",
            portalId: "24429155",
            formId: document.querySelector('[name="id-hs-form"]').value,
            submitButtonClass: "btn btn-primary h7 px-70 py-10 w-100",
            errorMessageClass: "text-danger",
            onFormSubmitted: function($form, data) {
                let url = "{{ route('materials.thankyou') }}?slug={{ $data->slug }}&isSubmitted=true";
                window.location.href = url
            },
            onFormReady: function($form, data) {
                let email = document.querySelector('[name="user_email"]').getAttribute('value')
                if (email) document.querySelector('[name="email"]').setAttribute('value', email)
            }
        });
    </script>
    <script>
        var owl3 = $('#slide-blog');
        owl3.owlCarousel({
            margin: 24,
            loop: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
        $('#btn-prev-blog').click(function() {
            owl3.trigger('prev.owl.carousel');
        })
        $('#btn-next-blog').click(function() {
            owl3.trigger('next.owl.carousel');
        })

        var owl4 = $('#slide-material');
        owl4.owlCarousel({
            margin: 24,
            loop: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
        $('#btn-prev-material').click(function() {
            owl4.trigger('prev.owl.carousel');
        })
        $('#btn-next-material').click(function() {
            owl4.trigger('next.owl.carousel');
        })
    </script>
    <script>
        var owl2 = $('#slide-preview');
        owl2.owlCarousel({
            margin: 25,
            responsive: {
                0: {
                    items: 1
                },
            },
            loop: true,
            autoplay: false,
            autoplayTimeout: 3500,
            autoplayHoverPause: true
        });
        $('#btn-prev-preview').click(function() {
            owl2.trigger('prev.owl.carousel');
        })
        $('#btn-next-preview').click(function() {
            owl2.trigger('next.owl.carousel');
        })
    </script>
@endsection
