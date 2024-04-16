@php
    $urlApp = env('MAIN_APP_URL');
@endphp
<header class="header w-100">

    <!-- Header -->
    <div class="header__center" id="header-navigation">
        <div class="row g-0 justify-content-between align-items-center h-100">
            <div class="col-auto">
                <a class="px-20 d-flex justify-content-center align-items-center gap-5" href="{{ url('/blog') }}"
                    data-idpage="home">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12.0371 3.63252C7.6006 3.63252 4.00412 7.229 4.00412 11.6655C4.00412 14.1497 5.13005 16.3697 6.90492 17.8456C7.38524 18.2449 7.56378 18.9025 7.35145 19.49C7.13911 20.0774 6.58141 20.4689 5.95675 20.4689H1.48301C0.663965 20.4689 0 19.8049 0 18.9858C0 18.1668 0.663965 17.5028 1.48301 17.5028H2.71354C1.65252 15.8114 1.03811 13.8099 1.03811 11.6655C1.03811 5.59091 5.96251 0.666504 12.0371 0.666504C18.1116 0.666504 23.036 5.59091 23.036 11.6655C23.036 13.8099 22.4216 15.8114 21.3606 17.5028H22.517C23.336 17.5028 24 18.1668 24 18.9858C24 19.8049 23.336 20.4689 22.517 20.4689H18.1174C17.4927 20.4689 16.935 20.0774 16.7227 19.49C16.5104 18.9025 16.6889 18.2449 17.1692 17.8456C18.9441 16.3697 20.07 14.1497 20.07 11.6655C20.07 7.229 16.4736 3.63252 12.0371 3.63252Z"
                            fill="#066AFF" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12.2487 20.4976C12.1324 20.3793 11.9418 20.3793 11.8255 20.4976L9.46565 22.8996C8.85221 23.524 8.01361 23.8757 7.13831 23.8757H3.6334C2.81436 23.8757 2.15039 23.2118 2.15039 22.3927C2.15039 21.5737 2.81436 20.9097 3.6334 20.9097H7.13831C7.21788 20.9097 7.29411 20.8778 7.34988 20.821L9.70976 18.419C10.9884 17.1175 13.0858 17.1175 14.3644 18.419L16.7243 20.821C16.7801 20.8778 16.8563 20.9097 16.9359 20.9097H20.4161C21.2351 20.9097 21.8991 21.5737 21.8991 22.3927C21.8991 23.2118 21.2351 23.8757 20.4161 23.8757H16.9359C16.0606 23.8757 15.222 23.524 14.6086 22.8996L12.2487 20.4976Z"
                            fill="#066AFF" />
                        <path
                            d="M16.1647 10.5533C16.1647 12.8466 14.3056 14.7057 12.0123 14.7057C9.71897 14.7057 7.85986 12.8466 7.85986 10.5533C7.85986 8.25998 9.71897 6.40088 12.0123 6.40088C14.3056 6.40088 16.1647 8.25998 16.1647 10.5533Z"
                            fill="url(#paint0_linear_2051_241)" />
                        <defs>
                            <linearGradient id="paint0_linear_2051_241" x1="12.0123" y1="6.40088" x2="12.0123"
                                y2="14.7057" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#066AFF" />
                                <stop offset="1" stop-color="#066AFF" stop-opacity="0" />
                            </linearGradient>
                        </defs>
                    </svg>
                    <div class="h4 m-0 text-black">Doctopus</div>
                </a>
            </div>
            <div class="col-auto h-100 d-none d-xl-block">
                <ul class="header__nav nav h-100 d-lg">
                    <li class="nav-item me-4 h-100 d-flex align-items-center">
                        <a class="nav-link h8 link" href="{{ url('/product') }}">Product</a>
                    </li>
                </ul>
            </div>
            <div class="col-auto h-100 d-none d-xl-block">
                <ul class="header__nav nav h-100 d-lg">
                    <li class="nav-item me-4 h-100 d-flex align-items-center">
                        <a class="nav-link h8 link" href="{{ url('/solutions') }}">Solutions</a>
                    </li>
                </ul>
            </div>
            <div class="col-auto h-100 d-none d-xl-block">
                <ul class="header__nav nav h-100 d-lg">
                    <li class="nav-item me-4 h-100 d-flex align-items-center">
                        <a class="nav-link h8 link" href="{{ url('/pricing') }}">Pricing</a>
                    </li>
                </ul>
            </div>
            <div class="col-auto h-100 d-none d-xl-block">
                <ul class="header__nav nav h-100 d-lg">
                    <li class="nav-item me-4 h-100 d-flex align-items-center">
                        <a class="nav-link h8 link" href="{{ url('/blog') }}">Blog</a>
                    </li>
                </ul>
            </div>
            <div class="col-auto d-none d-xl-block">
                @if ($user)
                    <div class="pe-20 position-relative  d-flex align-items-center" id="login-area">
                        <a href="{{ $urlApp }}/user/dashboard">
                            <div class="btn btn-secondary-outline me-15 px-15">
                                Dashboard
                            </div>
                        </a>

                        <div class="dropdown-custom">
                            <img src="/themes/writerzen/img/ava-3@2x.png"
                                onerror="this.src='/themes/writerzen/img/ava-3@2x.png' " alt="avatar"
                                class="cursor-pointer" width="36" id="avatar">

                            <div id="login-dropdown"
                                class="avatar-dropdown position-absolute px-15 py-15 border-radius-10 box-shadow-16 bg-white"
                                style="top:calc(100% + 10px);right:20px;box-shadow: 0px 20px 20px rgba(91, 111, 163, 0.3);border: 1px solid #BFC7DA;">
                                <div class="d-flex" style="width: 180px;word-break:break-all">
                                    <div class="me-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16"
                                            viewBox="0 0 14 16" fill="none">
                                            <g clip-path="url(#clip0_2300_7907)">
                                                <path
                                                    d="M6.5625 8C8.63364 8 10.3125 6.32103 10.3125 4.25C10.3125 2.17897 8.63364 0.5 6.5625 0.5C4.49156 0.5 2.8125 2.17897 2.8125 4.25C2.8125 6.32103 4.49156 8 6.5625 8ZM6.5625 1.4375C8.11336 1.4375 9.375 2.69914 9.375 4.25C9.375 5.8008 8.11336 7.0625 6.5625 7.0625C5.01164 7.0625 3.75 5.8008 3.75 4.25C3.75 2.69914 5.01164 1.4375 6.5625 1.4375ZM8.0468 9.40625H5.0782C2.2737 9.40625 0 11.6797 0 14.4843C0 15.0452 0.454775 15.5 1.01555 15.5H12.1095C12.6702 15.5 13.125 15.0452 13.125 14.4843C13.125 11.6797 10.8515 9.40625 8.0468 9.40625ZM12.1095 14.5625H1.01555C0.994842 14.5625 0.974999 14.5542 0.960369 14.5395C0.94574 14.5249 0.937515 14.505 0.9375 14.4843C0.9375 12.2012 2.79498 10.3438 5.0782 10.3438H8.0468C10.33 10.3438 12.1875 12.2012 12.1875 14.4843C12.1875 14.505 12.1793 14.5249 12.1646 14.5395C12.15 14.5542 12.1302 14.5625 12.1095 14.5625Z"
                                                    fill="#4F4F4F"></path>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="h9" id="login-email">{{ $user->email }}</div>
                                </div>
                                <div class="my-10">
                                    <div class="line"></div>
                                </div>
                                <div class="d-flex">
                                    <a href="{{ $urlApp }}/user/profile-setting"
                                        class="text-secondary fw-semibold w-100">Profile</a>
                                </div>
                                <div class="my-10">
                                    <div class="line"></div>
                                </div>
                                <a class="d-flex justify-content-between align-items-center cursor-pointer"
                                    href="{{ $urlApp }}/logout">
                                    <span class="text-secondary fw-semibold">Sign out</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13"
                                        viewBox="0 0 12 13" fill="none">
                                        <g clip-path="url(#clip0_2300_7918)">
                                            <path
                                                d="M9.20564 1.75806C8.93952 1.58871 8.57661 1.68548 8.40726 1.95161C8.2379 2.21774 8.33468 2.58065 8.60081 2.75C9.97984 3.59677 10.8266 5.07258 10.8266 6.69355C10.8266 9.25806 8.72177 11.3387 6.18145 11.3387C3.61694 11.3387 1.53629 9.25806 1.53629 6.69355C1.53629 5.07258 2.35887 3.59677 3.7621 2.72581C4.02823 2.58065 4.125 2.21774 3.95565 1.92742C3.78629 1.66129 3.42339 1.58871 3.15726 1.73387C1.41532 2.79839 0.375 4.66129 0.375 6.69355C0.375 9.91129 2.96371 12.5 6.18145 12.5C9.375 12.5 11.9879 9.91129 11.9879 6.69355C11.9879 4.68548 10.9476 2.82258 9.20564 1.75806ZM6.18145 7.46774C6.49597 7.46774 6.7621 7.22581 6.7621 6.8871V1.08065C6.7621 0.766129 6.49597 0.5 6.18145 0.5C5.84274 0.5 5.60081 0.766129 5.60081 1.08065V6.8871C5.60081 7.22581 5.84274 7.46774 6.18145 7.46774Z"
                                                fill="#5B6FA3"></path>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @else
                    @include('components.check_login')
                    <div class="header__btns align-items-center h-100 d-flex" id="login-btn">
                        <a class="nav-link h8 link d-flex justify-content-center"
                            href="{{ $urlApp }}/login?redirect={{ $urlApp }}"
                            id="btn-login-header">Login</a>
                        <a class="btn btn-primary px-24 py-20 d-flex align-items-center text-white h8"
                            href="{{ $urlApp }}/register" id="btn-signup-header">Upload Document</a>
                    </div>
                @endif
            </div>
            <div class="col-auto d-block d-xl-none">
                <div class="nav__btn px-20 pointer">
                    <i class="fa-solid fa-bars fa-lg text-secondary"></i>
                </div>
            </div>
        </div>
    </div>

</header>
<!-- Mobile navigation -->
<div class="nav__mobile bg-white p-20">

    <div class="d-flex justify-content-between py-20 px-20">
        <a class="header__logo d-flex align-items-center gap-5" data-idpage="" href="{{ url('/blog') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M12.0371 3.63252C7.6006 3.63252 4.00412 7.229 4.00412 11.6655C4.00412 14.1497 5.13005 16.3697 6.90492 17.8456C7.38524 18.2449 7.56378 18.9025 7.35145 19.49C7.13911 20.0774 6.58141 20.4689 5.95675 20.4689H1.48301C0.663965 20.4689 0 19.8049 0 18.9858C0 18.1668 0.663965 17.5028 1.48301 17.5028H2.71354C1.65252 15.8114 1.03811 13.8099 1.03811 11.6655C1.03811 5.59091 5.96251 0.666504 12.0371 0.666504C18.1116 0.666504 23.036 5.59091 23.036 11.6655C23.036 13.8099 22.4216 15.8114 21.3606 17.5028H22.517C23.336 17.5028 24 18.1668 24 18.9858C24 19.8049 23.336 20.4689 22.517 20.4689H18.1174C17.4927 20.4689 16.935 20.0774 16.7227 19.49C16.5104 18.9025 16.6889 18.2449 17.1692 17.8456C18.9441 16.3697 20.07 14.1497 20.07 11.6655C20.07 7.229 16.4736 3.63252 12.0371 3.63252Z"
                    fill="#066AFF" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M12.2487 20.4976C12.1324 20.3793 11.9418 20.3793 11.8255 20.4976L9.46565 22.8996C8.85221 23.524 8.01361 23.8757 7.13831 23.8757H3.6334C2.81436 23.8757 2.15039 23.2118 2.15039 22.3927C2.15039 21.5737 2.81436 20.9097 3.6334 20.9097H7.13831C7.21788 20.9097 7.29411 20.8778 7.34988 20.821L9.70976 18.419C10.9884 17.1175 13.0858 17.1175 14.3644 18.419L16.7243 20.821C16.7801 20.8778 16.8563 20.9097 16.9359 20.9097H20.4161C21.2351 20.9097 21.8991 21.5737 21.8991 22.3927C21.8991 23.2118 21.2351 23.8757 20.4161 23.8757H16.9359C16.0606 23.8757 15.222 23.524 14.6086 22.8996L12.2487 20.4976Z"
                    fill="#066AFF" />
                <path
                    d="M16.1647 10.5533C16.1647 12.8466 14.3056 14.7057 12.0123 14.7057C9.71897 14.7057 7.85986 12.8466 7.85986 10.5533C7.85986 8.25998 9.71897 6.40088 12.0123 6.40088C14.3056 6.40088 16.1647 8.25998 16.1647 10.5533Z"
                    fill="url(#paint0_linear_2051_241)" />
                <defs>
                    <linearGradient id="paint0_linear_2051_241" x1="12.0123" y1="6.40088" x2="12.0123"
                        y2="14.7057" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#066AFF" />
                        <stop offset="1" stop-color="#066AFF" stop-opacity="0" />
                    </linearGradient>
                </defs>
            </svg>
            <div class="h4 m-0 text-black">Doctopus</div>
        </a>
        <div class="nav__btn pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                fill="none">
                <path
                    d="M16.462 17.7321L9 10.2701L1.53804 17.7321C1.20066 18.0695 0.625138 18.0695 0.267916 17.7321C-0.0893054 17.3749 -0.0893054 16.8192 0.267916 16.462L7.72988 9L0.267916 1.53804C-0.0893054 1.18082 -0.0893054 0.625138 0.267916 0.267916C0.625138 -0.0893054 1.18082 -0.0893054 1.53804 0.267916L9 7.72988L16.462 0.267916C16.8192 -0.0893054 17.3749 -0.0893054 17.7321 0.267916C18.0695 0.625138 18.0695 1.20066 17.7321 1.53804L10.2701 9L17.7321 16.462C18.0893 16.8192 18.0893 17.3749 17.7321 17.7321C17.3749 18.0695 16.7993 18.0695 16.462 17.7321Z"
                    fill="#5B6FA3" />
            </svg>
        </div>
    </div>

    <div class="accordion rsolution-scrollbar" id="accordionPanelsStayOpenExample"
        style="padding: 0 20px 20px 20px;max-height: calc(100vh - 148px - 72px)">
        <div class="accordion-item" style="padding: 15px 0">
            <a class="nav-link text-black h8 p-0" href="{{ url('/blog') }}">Product</a>
        </div>
        <div class="accordion-item" style="padding: 15px 0">
            <a class="nav-link text-black h8 p-0" href="{{ url('/solutions') }}">Solutions</a>
        </div>
        <div class="accordion-item" style="padding: 15px 0">
            <a class="nav-link text-black h8 p-0" href="{{ url('/pricing') }}">Pricing</a>
        </div>
        <div class="accordion-item" style="padding: 15px 0">
            <a class="nav-link text-black h8 p-0" href="{{ url('/blog') }}">Blog</a>
        </div>
    </div>
    <div class="px-20 py-20 text-center">
        <a href="{{ $urlApp }}/register"
            class="w-100 btn btn-pill btn-primary h8 py-3 mb-20 border-radius-16">Upload Document</a>
        <a class="h8 text-black link" href="{{ $urlApp }}/login?redirect={{ $urlApp }}">Sign up</a>
    </div>
</div>
{{-- --}}
