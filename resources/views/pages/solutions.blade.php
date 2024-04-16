@extends('layouts.index')
@section('meta-title', 'Doctopus Solutions - Unlock Insights in Every Field')
@section('meta-description',
    'Explore multiple document analysis solutions for students, businesses, and more with our AI chat app. Enhance research
    and efficiency for all document needs.')
@section('content')
    <div class="container-fluid">
        <div class="row g-0 pt-40 pb-80">
            <div class="col-12 position-relative">
                <div class="position-absolute w-100"
                    style="background: #F4F6F8; bottom:0;left:0; height:calc(100% + 210px); z-index:-1">
                </div>
                <div class="center">
                    <div class="row">
                        <div class="col-12 col-md-7 d-flex flex-column aos-init aos-animate" data-aos="animation-translate-up"
                            data-aos-duration="500">
                            <div class="text-center text-md-start">
                                <h1 class="h1 mb-20">Experience the power of
                                    document analysis with Doctopus</h1>
                                <div class="h6 mb-40 text-center text-md-start">Explore how our AI chatbot can
                                    guide you
                                    through these use cases and revolutionize your work with documents.
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-5 aos-init aos-animate position-relative"
                            data-aos="animation-translate-up" data-aos-duration="500">
                            <img class="position-absolute lazy" style="z-index: 1"
                                src="/themes/doctopus/img/solutions/solutions-main.webp"
                                srcset="/themes/doctopus/img/solutions/solutions-main@2x.webp 2x" alt="Doctopus Solutions">
                            <div class="position-relative" style="z-index: -1;filter: blur(100px);">
                                <img src="/themes/doctopus/img/solutions/solutions-shadow.webp" alt="Shadow">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row py-80 center">
            <div class="col-12 position-relative">
                <img class="position-absolute lazy" src="/themes/doctopus/img/solutions/solutions-gradient-bg.webp"
                    style="filter: blur(100px); z-index: -1; top: 50%; left: 50%; transform: translate(-50%, -50%)" alt="Solutions BG">
                <div class="row gx-4 gy-5">
                    <div class="col-12 col-lg-4" >
                        <div class="d-flex flex-column px-20 py-20 border-radius-10 position-relative h-100"
                            style="box-shadow: 0px 4px 8px 0px rgba(22, 28, 36, 0.10); background: #F9FAFB">
                            <img class="position-absolute" src="/themes/doctopus/img/icon/education-icon.png" style="top: -30px; box-shadow: 0px 4px 4px 0px rgba(91, 96, 204, 0.25);
                            backdrop-filter: blur(2px); border-radius: 10px;" alt="Education Icon">
                            <div class="d-flex justify-content-between align-items-center ga-10">
                                <div class="h4 mb-0">Education</div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20"
                                        viewBox="0 0 21 20" fill="none">
                                        <g clip-path="url(#clip0_20_18715)">
                                            <path
                                                d="M9.75825 18.1449H16.0595C16.9282 18.1449 17.2795 17.7924 17.2807 16.9111C17.2807 15.3836 17.2807 13.8549 17.2807 12.3261C17.2807 11.7299 17.6107 11.3611 18.132 11.3361C18.6945 11.3086 19.0895 11.6924 19.1007 12.3161C19.1157 13.1486 19.1007 13.9799 19.1007 14.8161C19.1007 15.5536 19.1007 16.2924 19.1007 17.0299C19.0895 18.7974 17.9095 19.9911 16.1432 19.9949C11.8707 20.0024 7.59783 20.0024 3.3245 19.9949C1.61575 19.9949 0.420747 18.8024 0.415747 17.0811C0.403247 12.797 0.403247 8.5132 0.415747 4.22987C0.415747 2.78987 1.1795 1.78862 2.5195 1.42862C2.86345 1.34785 3.2163 1.3113 3.5695 1.31987C4.99325 1.30737 6.41825 1.31237 7.842 1.31987C8.01904 1.32177 8.19556 1.33934 8.3695 1.37237C8.57538 1.40911 8.76193 1.5167 8.89684 1.6765C9.03176 1.8363 9.10654 2.03824 9.10825 2.24737C9.10538 2.46008 9.02513 2.66447 8.88248 2.8223C8.73984 2.98012 8.54459 3.08058 8.33325 3.10487C7.8895 3.14362 7.44075 3.14987 6.99575 3.15237C5.8095 3.15237 4.62075 3.15237 3.4395 3.15237C2.62825 3.15237 2.25325 3.52737 2.25325 4.33112C2.25325 8.54195 2.25325 12.7532 2.25325 16.9649C2.25325 17.7874 2.6095 18.1411 3.4295 18.1411L9.75825 18.1449Z"
                                                fill="#919EAB" />
                                            <path
                                                d="M17.0318 1.91482H16.6931C15.6118 1.91482 14.5306 1.91482 13.4493 1.91482C12.9931 1.91482 12.5656 1.81482 12.3718 1.33732C12.0981 0.664821 12.5443 0.064821 13.3306 0.052321C14.1831 0.037321 15.0356 0.052321 15.8881 0.052321C16.9906 0.052321 18.0927 0.052321 19.1943 0.052321C19.9206 0.052321 20.3668 0.439821 20.3568 1.18982C20.3318 3.16482 20.3568 5.14107 20.3468 7.11607C20.3468 7.84732 19.8306 8.26732 19.1718 8.09732C18.7593 7.99107 18.5331 7.67357 18.5306 7.14857C18.5231 6.01482 18.5306 4.88107 18.5306 3.74857C18.5306 3.62357 18.5093 3.48982 18.4918 3.29232C18.3531 3.40982 18.2643 3.47607 18.1868 3.55357C15.481 6.2569 12.7727 8.96107 10.0618 11.6661C9.90214 11.8283 9.72235 11.9695 9.52684 12.0861C9.35857 12.1826 9.16189 12.2175 8.97069 12.1846C8.77949 12.1518 8.60573 12.0533 8.47934 11.9061C8.22934 11.6398 8.15559 11.1673 8.34184 10.8623C8.45195 10.6868 8.5829 10.5252 8.73184 10.3811C11.4343 7.67524 14.1385 4.97107 16.8443 2.26857C16.9281 2.18607 17.0006 2.09232 17.0768 2.00357L17.0318 1.91482Z"
                                                fill="#919EAB" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_20_18715">
                                                <rect width="20" height="20" fill="white"
                                                    transform="translate(0.333374)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-15">
                                <div>No matter if you are a student or a professor. Doctopus can be your assistant.</div>
                                <div>Our sample case lets you chat with course materials and textbooks, making studying a
                                    breeze.</div>
                                <div>P/S: Don't forget to tell your fellows to visit us.</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4" >
                        <div class="d-flex flex-column px-20 py-20 border-radius-10 position-relative h-100" style="box-shadow: 0px 4px 8px 0px rgba(22, 28, 36, 0.10); background: #F9FAFB">
                            <img class="position-absolute" src="/themes/doctopus/img/icon/bussiness-icon.png" style="top: -30px; box-shadow: 0px 4px 4px 0px rgba(91, 96, 204, 0.25);
                            backdrop-filter: blur(2px); border-radius: 10px;" alt="Bussiness Icon">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="h4 mb-0">Business & Corporate</div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20"
                                        viewBox="0 0 21 20" fill="none">
                                        <g clip-path="url(#clip0_20_18715)">
                                            <path
                                                d="M9.75825 18.1449H16.0595C16.9282 18.1449 17.2795 17.7924 17.2807 16.9111C17.2807 15.3836 17.2807 13.8549 17.2807 12.3261C17.2807 11.7299 17.6107 11.3611 18.132 11.3361C18.6945 11.3086 19.0895 11.6924 19.1007 12.3161C19.1157 13.1486 19.1007 13.9799 19.1007 14.8161C19.1007 15.5536 19.1007 16.2924 19.1007 17.0299C19.0895 18.7974 17.9095 19.9911 16.1432 19.9949C11.8707 20.0024 7.59783 20.0024 3.3245 19.9949C1.61575 19.9949 0.420747 18.8024 0.415747 17.0811C0.403247 12.797 0.403247 8.5132 0.415747 4.22987C0.415747 2.78987 1.1795 1.78862 2.5195 1.42862C2.86345 1.34785 3.2163 1.3113 3.5695 1.31987C4.99325 1.30737 6.41825 1.31237 7.842 1.31987C8.01904 1.32177 8.19556 1.33934 8.3695 1.37237C8.57538 1.40911 8.76193 1.5167 8.89684 1.6765C9.03176 1.8363 9.10654 2.03824 9.10825 2.24737C9.10538 2.46008 9.02513 2.66447 8.88248 2.8223C8.73984 2.98012 8.54459 3.08058 8.33325 3.10487C7.8895 3.14362 7.44075 3.14987 6.99575 3.15237C5.8095 3.15237 4.62075 3.15237 3.4395 3.15237C2.62825 3.15237 2.25325 3.52737 2.25325 4.33112C2.25325 8.54195 2.25325 12.7532 2.25325 16.9649C2.25325 17.7874 2.6095 18.1411 3.4295 18.1411L9.75825 18.1449Z"
                                                fill="#919EAB" />
                                            <path
                                                d="M17.0318 1.91482H16.6931C15.6118 1.91482 14.5306 1.91482 13.4493 1.91482C12.9931 1.91482 12.5656 1.81482 12.3718 1.33732C12.0981 0.664821 12.5443 0.064821 13.3306 0.052321C14.1831 0.037321 15.0356 0.052321 15.8881 0.052321C16.9906 0.052321 18.0927 0.052321 19.1943 0.052321C19.9206 0.052321 20.3668 0.439821 20.3568 1.18982C20.3318 3.16482 20.3568 5.14107 20.3468 7.11607C20.3468 7.84732 19.8306 8.26732 19.1718 8.09732C18.7593 7.99107 18.5331 7.67357 18.5306 7.14857C18.5231 6.01482 18.5306 4.88107 18.5306 3.74857C18.5306 3.62357 18.5093 3.48982 18.4918 3.29232C18.3531 3.40982 18.2643 3.47607 18.1868 3.55357C15.481 6.2569 12.7727 8.96107 10.0618 11.6661C9.90214 11.8283 9.72235 11.9695 9.52684 12.0861C9.35857 12.1826 9.16189 12.2175 8.97069 12.1846C8.77949 12.1518 8.60573 12.0533 8.47934 11.9061C8.22934 11.6398 8.15559 11.1673 8.34184 10.8623C8.45195 10.6868 8.5829 10.5252 8.73184 10.3811C11.4343 7.67524 14.1385 4.97107 16.8443 2.26857C16.9281 2.18607 17.0006 2.09232 17.0768 2.00357L17.0318 1.91482Z"
                                                fill="#919EAB" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_20_18715">
                                                <rect width="20" height="20" fill="white"
                                                    transform="translate(0.333374)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-15">
                                <div>Are you tired of scrolling pages of these documents: </div>
                                    <ul class="ps-30 m-0" style="list-style-type: disc;">
                                        <li>Business and financial report</li>
                                        <li>Market research analysis</li>
                                        <li>Employee handbook </li>
                                        <li>Survey results</li>
                                    </ul>
                                
                                <div>Our AI crunches numbers and sifts through data, serving up the juiciest insights in a digestible format.</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4" >
                        <div class="d-flex flex-column px-20 py-20 border-radius-10 position-relative h-100"
                            style="box-shadow: 0px 4px 8px 0px rgba(22, 28, 36, 0.10); background: #F9FAFB">
                            <img class="position-absolute" src="/themes/doctopus/img/icon/journalism-icon.png" style="top: -30px; box-shadow: 0px 4px 4px 0px rgba(91, 96, 204, 0.25);
                            backdrop-filter: blur(2px); border-radius: 10px;" alt="Journalism & Media Icon">
                            <div class="d-flex justify-content-between align-items-center gap-15">
                                <div class="h4 mb-0">Journalism & Media</div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20"
                                        viewBox="0 0 21 20" fill="none">
                                        <g clip-path="url(#clip0_20_18715)">
                                            <path
                                                d="M9.75825 18.1449H16.0595C16.9282 18.1449 17.2795 17.7924 17.2807 16.9111C17.2807 15.3836 17.2807 13.8549 17.2807 12.3261C17.2807 11.7299 17.6107 11.3611 18.132 11.3361C18.6945 11.3086 19.0895 11.6924 19.1007 12.3161C19.1157 13.1486 19.1007 13.9799 19.1007 14.8161C19.1007 15.5536 19.1007 16.2924 19.1007 17.0299C19.0895 18.7974 17.9095 19.9911 16.1432 19.9949C11.8707 20.0024 7.59783 20.0024 3.3245 19.9949C1.61575 19.9949 0.420747 18.8024 0.415747 17.0811C0.403247 12.797 0.403247 8.5132 0.415747 4.22987C0.415747 2.78987 1.1795 1.78862 2.5195 1.42862C2.86345 1.34785 3.2163 1.3113 3.5695 1.31987C4.99325 1.30737 6.41825 1.31237 7.842 1.31987C8.01904 1.32177 8.19556 1.33934 8.3695 1.37237C8.57538 1.40911 8.76193 1.5167 8.89684 1.6765C9.03176 1.8363 9.10654 2.03824 9.10825 2.24737C9.10538 2.46008 9.02513 2.66447 8.88248 2.8223C8.73984 2.98012 8.54459 3.08058 8.33325 3.10487C7.8895 3.14362 7.44075 3.14987 6.99575 3.15237C5.8095 3.15237 4.62075 3.15237 3.4395 3.15237C2.62825 3.15237 2.25325 3.52737 2.25325 4.33112C2.25325 8.54195 2.25325 12.7532 2.25325 16.9649C2.25325 17.7874 2.6095 18.1411 3.4295 18.1411L9.75825 18.1449Z"
                                                fill="#919EAB" />
                                            <path
                                                d="M17.0318 1.91482H16.6931C15.6118 1.91482 14.5306 1.91482 13.4493 1.91482C12.9931 1.91482 12.5656 1.81482 12.3718 1.33732C12.0981 0.664821 12.5443 0.064821 13.3306 0.052321C14.1831 0.037321 15.0356 0.052321 15.8881 0.052321C16.9906 0.052321 18.0927 0.052321 19.1943 0.052321C19.9206 0.052321 20.3668 0.439821 20.3568 1.18982C20.3318 3.16482 20.3568 5.14107 20.3468 7.11607C20.3468 7.84732 19.8306 8.26732 19.1718 8.09732C18.7593 7.99107 18.5331 7.67357 18.5306 7.14857C18.5231 6.01482 18.5306 4.88107 18.5306 3.74857C18.5306 3.62357 18.5093 3.48982 18.4918 3.29232C18.3531 3.40982 18.2643 3.47607 18.1868 3.55357C15.481 6.2569 12.7727 8.96107 10.0618 11.6661C9.90214 11.8283 9.72235 11.9695 9.52684 12.0861C9.35857 12.1826 9.16189 12.2175 8.97069 12.1846C8.77949 12.1518 8.60573 12.0533 8.47934 11.9061C8.22934 11.6398 8.15559 11.1673 8.34184 10.8623C8.45195 10.6868 8.5829 10.5252 8.73184 10.3811C11.4343 7.67524 14.1385 4.97107 16.8443 2.26857C16.9281 2.18607 17.0006 2.09232 17.0768 2.00357L17.0318 1.91482Z"
                                                fill="#919EAB" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_20_18715">
                                                <rect width="20" height="20" fill="white"
                                                    transform="translate(0.333374)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-15">
                                <div>Try our sample case to chat with articles and quickly grasp the main ideas, key arguments, and important details. </div>
                                <div>Leave the heavy work for us and focus on improving the overall quality and coherence of the content.</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4" >
                        <div class="d-flex flex-column px-20 py-20 border-radius-10 position-relative h-100 "
                            style="box-shadow: 0px 4px 8px 0px rgba(22, 28, 36, 0.10); background: #F9FAFB">
                            <img class="position-absolute" src="/themes/doctopus/img/icon/legal-icon.png" style="top: -30px; box-shadow: 0px 4px 4px 0px rgba(91, 96, 204, 0.25);
                            backdrop-filter: blur(2px); border-radius: 10px;" alt="Legal & Compliance Icon">
                            <div class="d-flex justify-content-between align-items-center gap-15">
                                <div class="h4 mb-0">Legal & Compliance</div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20"
                                        viewBox="0 0 21 20" fill="none">
                                        <g clip-path="url(#clip0_20_18715)">
                                            <path
                                                d="M9.75825 18.1449H16.0595C16.9282 18.1449 17.2795 17.7924 17.2807 16.9111C17.2807 15.3836 17.2807 13.8549 17.2807 12.3261C17.2807 11.7299 17.6107 11.3611 18.132 11.3361C18.6945 11.3086 19.0895 11.6924 19.1007 12.3161C19.1157 13.1486 19.1007 13.9799 19.1007 14.8161C19.1007 15.5536 19.1007 16.2924 19.1007 17.0299C19.0895 18.7974 17.9095 19.9911 16.1432 19.9949C11.8707 20.0024 7.59783 20.0024 3.3245 19.9949C1.61575 19.9949 0.420747 18.8024 0.415747 17.0811C0.403247 12.797 0.403247 8.5132 0.415747 4.22987C0.415747 2.78987 1.1795 1.78862 2.5195 1.42862C2.86345 1.34785 3.2163 1.3113 3.5695 1.31987C4.99325 1.30737 6.41825 1.31237 7.842 1.31987C8.01904 1.32177 8.19556 1.33934 8.3695 1.37237C8.57538 1.40911 8.76193 1.5167 8.89684 1.6765C9.03176 1.8363 9.10654 2.03824 9.10825 2.24737C9.10538 2.46008 9.02513 2.66447 8.88248 2.8223C8.73984 2.98012 8.54459 3.08058 8.33325 3.10487C7.8895 3.14362 7.44075 3.14987 6.99575 3.15237C5.8095 3.15237 4.62075 3.15237 3.4395 3.15237C2.62825 3.15237 2.25325 3.52737 2.25325 4.33112C2.25325 8.54195 2.25325 12.7532 2.25325 16.9649C2.25325 17.7874 2.6095 18.1411 3.4295 18.1411L9.75825 18.1449Z"
                                                fill="#919EAB" />
                                            <path
                                                d="M17.0318 1.91482H16.6931C15.6118 1.91482 14.5306 1.91482 13.4493 1.91482C12.9931 1.91482 12.5656 1.81482 12.3718 1.33732C12.0981 0.664821 12.5443 0.064821 13.3306 0.052321C14.1831 0.037321 15.0356 0.052321 15.8881 0.052321C16.9906 0.052321 18.0927 0.052321 19.1943 0.052321C19.9206 0.052321 20.3668 0.439821 20.3568 1.18982C20.3318 3.16482 20.3568 5.14107 20.3468 7.11607C20.3468 7.84732 19.8306 8.26732 19.1718 8.09732C18.7593 7.99107 18.5331 7.67357 18.5306 7.14857C18.5231 6.01482 18.5306 4.88107 18.5306 3.74857C18.5306 3.62357 18.5093 3.48982 18.4918 3.29232C18.3531 3.40982 18.2643 3.47607 18.1868 3.55357C15.481 6.2569 12.7727 8.96107 10.0618 11.6661C9.90214 11.8283 9.72235 11.9695 9.52684 12.0861C9.35857 12.1826 9.16189 12.2175 8.97069 12.1846C8.77949 12.1518 8.60573 12.0533 8.47934 11.9061C8.22934 11.6398 8.15559 11.1673 8.34184 10.8623C8.45195 10.6868 8.5829 10.5252 8.73184 10.3811C11.4343 7.67524 14.1385 4.97107 16.8443 2.26857C16.9281 2.18607 17.0006 2.09232 17.0768 2.00357L17.0318 1.91482Z"
                                                fill="#919EAB" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_20_18715">
                                                <rect width="20" height="20" fill="white"
                                                    transform="translate(0.333374)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-15">
                                <div>Struggling to stay afloat in a sea of legal jargon and compliance documents?</div>
                                <div>Our AI navigates through the legalese and extracts the crucial details, making complex documents a breeze to digest.</div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-12 col-lg-4" >
                        <div class="d-flex flex-column px-20 py-20 border-radius-10 position-relative h-100 "
                            style="box-shadow: 0px 4px 8px 0px rgba(22, 28, 36, 0.10); background: #F9FAFB">
                            <img class="position-absolute" src="/themes/doctopus/img/icon/customer-icon.png" style="top: -30px; box-shadow: 0px 4px 4px 0px rgba(91, 96, 204, 0.25);
                            backdrop-filter: blur(2px); border-radius: 10px;" alt="Customer Support Icon">
                            <div class="d-flex justify-content-between align-items-center ga-15">
                                <div class="h4 mb-0">Customer Support</div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20"
                                        viewBox="0 0 21 20" fill="none">
                                        <g clip-path="url(#clip0_20_18715)">
                                            <path
                                                d="M9.75825 18.1449H16.0595C16.9282 18.1449 17.2795 17.7924 17.2807 16.9111C17.2807 15.3836 17.2807 13.8549 17.2807 12.3261C17.2807 11.7299 17.6107 11.3611 18.132 11.3361C18.6945 11.3086 19.0895 11.6924 19.1007 12.3161C19.1157 13.1486 19.1007 13.9799 19.1007 14.8161C19.1007 15.5536 19.1007 16.2924 19.1007 17.0299C19.0895 18.7974 17.9095 19.9911 16.1432 19.9949C11.8707 20.0024 7.59783 20.0024 3.3245 19.9949C1.61575 19.9949 0.420747 18.8024 0.415747 17.0811C0.403247 12.797 0.403247 8.5132 0.415747 4.22987C0.415747 2.78987 1.1795 1.78862 2.5195 1.42862C2.86345 1.34785 3.2163 1.3113 3.5695 1.31987C4.99325 1.30737 6.41825 1.31237 7.842 1.31987C8.01904 1.32177 8.19556 1.33934 8.3695 1.37237C8.57538 1.40911 8.76193 1.5167 8.89684 1.6765C9.03176 1.8363 9.10654 2.03824 9.10825 2.24737C9.10538 2.46008 9.02513 2.66447 8.88248 2.8223C8.73984 2.98012 8.54459 3.08058 8.33325 3.10487C7.8895 3.14362 7.44075 3.14987 6.99575 3.15237C5.8095 3.15237 4.62075 3.15237 3.4395 3.15237C2.62825 3.15237 2.25325 3.52737 2.25325 4.33112C2.25325 8.54195 2.25325 12.7532 2.25325 16.9649C2.25325 17.7874 2.6095 18.1411 3.4295 18.1411L9.75825 18.1449Z"
                                                fill="#919EAB" />
                                            <path
                                                d="M17.0318 1.91482H16.6931C15.6118 1.91482 14.5306 1.91482 13.4493 1.91482C12.9931 1.91482 12.5656 1.81482 12.3718 1.33732C12.0981 0.664821 12.5443 0.064821 13.3306 0.052321C14.1831 0.037321 15.0356 0.052321 15.8881 0.052321C16.9906 0.052321 18.0927 0.052321 19.1943 0.052321C19.9206 0.052321 20.3668 0.439821 20.3568 1.18982C20.3318 3.16482 20.3568 5.14107 20.3468 7.11607C20.3468 7.84732 19.8306 8.26732 19.1718 8.09732C18.7593 7.99107 18.5331 7.67357 18.5306 7.14857C18.5231 6.01482 18.5306 4.88107 18.5306 3.74857C18.5306 3.62357 18.5093 3.48982 18.4918 3.29232C18.3531 3.40982 18.2643 3.47607 18.1868 3.55357C15.481 6.2569 12.7727 8.96107 10.0618 11.6661C9.90214 11.8283 9.72235 11.9695 9.52684 12.0861C9.35857 12.1826 9.16189 12.2175 8.97069 12.1846C8.77949 12.1518 8.60573 12.0533 8.47934 11.9061C8.22934 11.6398 8.15559 11.1673 8.34184 10.8623C8.45195 10.6868 8.5829 10.5252 8.73184 10.3811C11.4343 7.67524 14.1385 4.97107 16.8443 2.26857C16.9281 2.18607 17.0006 2.09232 17.0768 2.00357L17.0318 1.91482Z"
                                                fill="#919EAB" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_20_18715">
                                                <rect width="20" height="20" fill="white"
                                                    transform="translate(0.333374)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-15">
                                <div>Chat with our sample case to see how it supports you - before you assist your customers. These work will be covered by Doctopus: </div>
                                
                                    <ul class="ps-30 m-0" style="list-style-type: disc;">
                                        <li>Summarize documents for quick understanding.</li>
                                        <li>Assist in citing and referencing relevant information.</li>
                                        <li>Extract specific data or details efficiently.</li>
                                    </ul>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4" >
                        <div class="d-flex flex-column px-20 py-20 border-radius-10 position-relative h-100"
                            style="box-shadow: 0px 4px 8px 0px rgba(22, 28, 36, 0.10); background: #F9FAFB">
                            <img class="position-absolute" src="/themes/doctopus/img/icon/consulting-icon.png" style="top: -30px; box-shadow: 0px 4px 4px 0px rgba(91, 96, 204, 0.25);
                            backdrop-filter: blur(2px); border-radius: 10px;" alt="Consulting Services Icon">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="h4 mb-0">Consulting Services</div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20"
                                        viewBox="0 0 21 20" fill="none">
                                        <g clip-path="url(#clip0_20_18715)">
                                            <path
                                                d="M9.75825 18.1449H16.0595C16.9282 18.1449 17.2795 17.7924 17.2807 16.9111C17.2807 15.3836 17.2807 13.8549 17.2807 12.3261C17.2807 11.7299 17.6107 11.3611 18.132 11.3361C18.6945 11.3086 19.0895 11.6924 19.1007 12.3161C19.1157 13.1486 19.1007 13.9799 19.1007 14.8161C19.1007 15.5536 19.1007 16.2924 19.1007 17.0299C19.0895 18.7974 17.9095 19.9911 16.1432 19.9949C11.8707 20.0024 7.59783 20.0024 3.3245 19.9949C1.61575 19.9949 0.420747 18.8024 0.415747 17.0811C0.403247 12.797 0.403247 8.5132 0.415747 4.22987C0.415747 2.78987 1.1795 1.78862 2.5195 1.42862C2.86345 1.34785 3.2163 1.3113 3.5695 1.31987C4.99325 1.30737 6.41825 1.31237 7.842 1.31987C8.01904 1.32177 8.19556 1.33934 8.3695 1.37237C8.57538 1.40911 8.76193 1.5167 8.89684 1.6765C9.03176 1.8363 9.10654 2.03824 9.10825 2.24737C9.10538 2.46008 9.02513 2.66447 8.88248 2.8223C8.73984 2.98012 8.54459 3.08058 8.33325 3.10487C7.8895 3.14362 7.44075 3.14987 6.99575 3.15237C5.8095 3.15237 4.62075 3.15237 3.4395 3.15237C2.62825 3.15237 2.25325 3.52737 2.25325 4.33112C2.25325 8.54195 2.25325 12.7532 2.25325 16.9649C2.25325 17.7874 2.6095 18.1411 3.4295 18.1411L9.75825 18.1449Z"
                                                fill="#919EAB" />
                                            <path
                                                d="M17.0318 1.91482H16.6931C15.6118 1.91482 14.5306 1.91482 13.4493 1.91482C12.9931 1.91482 12.5656 1.81482 12.3718 1.33732C12.0981 0.664821 12.5443 0.064821 13.3306 0.052321C14.1831 0.037321 15.0356 0.052321 15.8881 0.052321C16.9906 0.052321 18.0927 0.052321 19.1943 0.052321C19.9206 0.052321 20.3668 0.439821 20.3568 1.18982C20.3318 3.16482 20.3568 5.14107 20.3468 7.11607C20.3468 7.84732 19.8306 8.26732 19.1718 8.09732C18.7593 7.99107 18.5331 7.67357 18.5306 7.14857C18.5231 6.01482 18.5306 4.88107 18.5306 3.74857C18.5306 3.62357 18.5093 3.48982 18.4918 3.29232C18.3531 3.40982 18.2643 3.47607 18.1868 3.55357C15.481 6.2569 12.7727 8.96107 10.0618 11.6661C9.90214 11.8283 9.72235 11.9695 9.52684 12.0861C9.35857 12.1826 9.16189 12.2175 8.97069 12.1846C8.77949 12.1518 8.60573 12.0533 8.47934 11.9061C8.22934 11.6398 8.15559 11.1673 8.34184 10.8623C8.45195 10.6868 8.5829 10.5252 8.73184 10.3811C11.4343 7.67524 14.1385 4.97107 16.8443 2.26857C16.9281 2.18607 17.0006 2.09232 17.0768 2.00357L17.0318 1.91482Z"
                                                fill="#919EAB" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_20_18715">
                                                <rect width="20" height="20" fill="white"
                                                    transform="translate(0.333374)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-15">
                                <div>Do you often deal with a plethora of documents, such as financial reports, regulatory filings, legal contracts, and industry research papers? </div>
                                <div>Check to see how our product, Doctopus, can assist you in saving time and scaling efficiency.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row center bg-secondary-lighter border-radius-20 banner-padding" style="padding: 60px;">
            <div
                class="col-12 col-lg-9 d-flex flex-column justify-content-center align-items-md-start align-items-center gap-32 p-0 order-lg-2 order-2">
                <div class="h2 text-center text-md-start">Doctopus, your antidote to yawns. Try it now.</div>
                <a class="btn btn-primary px-24 py-16 d-flex justify-content-center align-items-center text-white h8 gap-10 text-center text-md-start border-radius-5"
                    href="https://app.writerzen.dev/register" id="btn-signup-header">
                    <i class="fa-solid fa-folder-arrow-up"></i>
                    <span>Upload your first document</span>
                </a>
            </div>
            <div class="col-12 col-lg-3 order-lg-2 order-1 rs-banner">
                <img class="lazy" src="/themes/doctopus/img/solutions/astronaut.webp"
                    srcset="/themes/doctopus/img/solutions/astronaut@2x.webp 2x" alt="Astronaut">
            </div>
        </div>
    </div>
@endsection


@section('css')
    <style>
        @media only screen and (max-width: 768px) {
            .banner-padding {
                padding: 40px 24px !important;
            }

            .rs-banner {
                padding: 30px;
            }

        }
    </style>
@endsection
