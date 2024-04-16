@php
    $theme = config('app.theme');
    $version = env('VERSION');
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="version" content="{{ $version }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <title> @yield('meta-title', 'Doctopus') </title>
    <meta name="title" content="@yield('meta-title', 'The Ultimate Solution for Content Writers')">
    <meta name="description" content="@yield('meta-description', 'doctopus is a pioneer toolset that solves the most pressing creative problems by combining all forms of content research into a single platform. Exploring precise keywords, accurate topics and relevant content references can be performed in a matter of minutes!')">
    <meta name="viewport" content="width=device-width, initial-scale=0.1">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="https://doctopus.io">
    <meta name="twitter:title" content="@yield('meta-title', 'doctopus - The Ultimate Solution for Content Writers')">
    <meta name="twitter:description" content="@yield('meta-description', 'doctopus is a pioneer toolset that solves the most pressing creative problems by combining all forms of content research into a single platform. Exploring precise keywords, accurate topics and relevant content references can be performed in a matter of minutes!')">
    <meta name="twitter:image" content="@yield('meta-thumbnail', asset('/themes/doctopus/img/opengraph.png'))?version={{ $version }}">
    <meta name="twitter:site" content="doctopus">

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://doctopus.io">
    <meta property="og:title" content="@yield('meta-title', 'The Ultimate Solution for Content Writers')">
    <meta property="og:description" content="@yield('meta-description', 'doctopus is a pioneer toolset that solves the most pressing creative problems by combining all forms of content research into a single platform. Exploring precise keywords, accurate topics and relevant content references can be performed in a matter of minutes!')">
    <meta property="og:image" content="@yield('meta-thumbnail', asset('/themes/doctopus/img/opengraph.png'))?version={{ $version }}">
    <meta property="og:site_name" content="doctopus">

    <!-- Facebook ads domain verification -->
    <meta name="facebook-domain-verification" content="zdfkup189zyqhqnc8f5esxvmtlboiq" />

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/themes/doctopus/img/favicon.svg') }}">

    <link rel="stylesheet" media="print" onload="this.onload=null;this.removeAttribute('media');"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="preload" href="{{ asset('/themes/doctopus/css/font.css') }}?version={{ $version }}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">

    <link rel="preload" href="{{ asset('/themes/doctopus/css/lib/bootstrap.min.css') }}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">

    <link rel="preload" href="{{ asset('/themes/doctopus/css/lib/aos.css') }}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <link rel="stylesheet" media="print" onload="this.onload=null;this.removeAttribute('media');"
        href="{{ asset('/themes/doctopus/css/lib/owl.carousel.css') }}">

    <link rel="stylesheet" href="{{ asset('/themes/doctopus/css/app.css') }}?version={{ $version }}">

    <link rel="preload" href="{{ asset('/themes/doctopus/css/lib/flag-icon-css-master/css/flag-icon.min.css') }}"
        as="style" onload="this.onload=null;this.rel='stylesheet'">

    <link rel="stylesheet" media="print" onload="this.onload=null;this.removeAttribute('media');"
        href="{{ asset('/themes/doctopus/lib/fontawesome/css/all.min.css') }}" />

    <link rel="canonical" href="{{ url()->current() }}">

    <link rel="preload" href="{{ asset('/themes/doctopus/font/segoeui/segoeui.woff2') }}" as="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap"
        rel="stylesheet">
    <script>
        var viewportmeta = document.querySelector('meta[name="viewport"]');
        if (viewportmeta) {
            if (screen.width < 375) {
                var newScale = screen.width / 375;
                viewportmeta.content = 'width=375, minimum-scale=' + newScale +
                    ', maximum-scale=5.0, user-scalable=no, initial-scale=' + newScale + '';
            } else {
                viewportmeta.content = 'width=device-width, maximum-scale=5.0, initial-scale=1.0';
            }
        }
    </script>
    @yield('css')
    @yield('js-head')
    @include('layouts.tracking')
    @stack('css-component')
</head>

<body class="rsolution-scrollbar-xl position-relative pt-65" data-aos-easing="ease" data-aos-duration="400"
    data-aos-delay="0">
    @include('layouts.header')
    <main>
        @yield('content')
    </main>
    @include('layouts.footer')
    @include('components.cookies')
    @yield('content-extend')
    <!-- scripts-->
    <script src="{{ asset('/themes/doctopus/js/lib/aos.js') }}"></script>
    <script src="{{ asset('/themes/doctopus/js/lib/jquery.min.js') }}"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
    <script src="{{ asset('/themes/doctopus/js/lib/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/themes/doctopus/js/lib/svg4everybody.min.js') }}"></script>
    <script src="{{ asset('/themes/doctopus/js/lib/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/themes/doctopus/js/app.js') }}?version={{ $version }}"></script>

    <script src="{{ asset('/themes/doctopus/js/custom.js') }}?version={{ $version }}"></script>

    {{-- HubSpot --}}
    <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>

    {{-- gsap --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js"></script>

    @yield('js')

    @stack('component')
    @stack('js-component')

    @include('components.modals.thanks_newsletter')
    @include('components.modals.thanks_contact')
    @include('layouts.grecaptcha')

    <script src="{{ asset('/themes/doctopus/js/layout_index.js') }}?version={{ $version }}"></script>

    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TS5DTP2" height="0" width=" 0"
            style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
</body>

</html>
