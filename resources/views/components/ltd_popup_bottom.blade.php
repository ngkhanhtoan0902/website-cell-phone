{{-- data-target="ltd-bottom-message" --}}
@if (!empty($_SESSION['check_black_friday']))
    <div class="row popup-bottom bg-primary-ultra-light box-shadow align-items-center justify-content-between py-15 px-20"
        style="gap: 20px;max-width:904px;border-radius:20px 20px 0 0" data-target="ltd-bottom-message">
        <div class="col-xl-auto col-12 text-center order-2 order-xl-1">

            <img src="{{ url('/themes/writerzen/img/figure/figure-38.png') }}" alt="WriterZen Cookie" width="86"
                class="rounded-circle"
                style="box-shadow: 0px 4px 20px 0px rgba(255, 131, 131, 0.25), 4px -4px 20px 0px rgba(102, 108, 251, 0.25), 5px 0px 20px 0px rgba(224, 137, 255, 0.25), -4px 0px 20px 0px rgba(255, 182, 97, 0.25);">

        </div>
        <div class="col-xl col-12 order-3 order-xl-2">
            <div class="fw-semibold fs-20 mb-5">Black Friday LIFETIME DEAL 🔥 Never pay for SEO tools again!</div>
            Limited 500 offers for fast action takers.
        </div>
        <div class="col-xl-auto col-12 text-center order-4 order-xl-3">
            <a href="{{ route('ltd-black-friday') }}"
                class="btn btn-pill btn-black-friday h7 px-24 py-3 text-white w-100" data-target="ltd-message-btn">Grab
                it now!</a>
        </div>
        <div class="col-xl-auto col-12 mb-auto order-1 order-xl-4 text-end">
            <button class="btn btn-white btn-circle" data-target="ltd-message-btn">
                <i class="fa-regular fa-xmark text-secondary"></i>
            </button>
        </div>
    </div>
@elseif(!empty($_SESSION['check_christmas']))
    <div class="popup-bottom box-shadow py-15 px-10 g-0 row align-items-center justify-content-between bg-cover bg-center"
        style="gap: 20px;max-width:904px;border-radius:20px 20px 0 0; background-image: url('/themes/writerzen/img/background/bg-popup-bottom-christmas.png'); background-repeat: no-repeat;"
        data-target="ltd-bottom-message">
        <div class="col-xl-auto col-12 text-center order-2 order-xl-1">

            <img src="{{ url('/themes/writerzen/img/figure/figure-41.png') }}"
                srcset="{{ url('/themes/writerzen/img/figure/figure-41@2x.png') }} 2x" alt="WriterZen Cookie"
                width="86" class="rounded-circle"
                style="box-shadow: 0px 4px 20px 0px rgba(255, 131, 131, 0.25), 4px -4px 20px 0px rgba(102, 108, 251, 0.25), 5px 0px 20px 0px rgba(224, 137, 255, 0.25), -4px 0px 20px 0px rgba(255, 182, 97, 0.25);">

        </div>
        <div class="col-xl col-12 order-3 order-xl-2 text-white mb-10">
            <div class="fw-semibold fs-20 mb-5 popup-bottom-title">Make It a Merry Lifetime 🎄 Never pay for SEO tools
                again!</div>
            <div class="popup-bottom-subtitle">Hurry, Santa's List is Limited to 500 Quick Gift Grabbers</div>
        </div>
        <div class="col-xl-auto col-12 text-center order-4 order-xl-3">
            <a href="{{ route('ltd-christmas') }}" class="btn-christmas position-relative">
                <img src="/themes/writerzen/img/btn-christmas.png" style="width: 168px">
                <div class="position-absolute position-center text-white fw-semibold fs-18 text-center w-100"
                    data-target="ltd-message-btn">Grab
                    it now!</div>
            </a>
        </div>
        <div class="col-xl-auto col-12 mb-auto order-1 order-xl-4 text-end">
            <button class="btn btn-white btn-circle" data-target="ltd-message-btn">
                <i class="fa-regular fa-xmark text-secondary"></i>
            </button>
        </div>
    </div>
@endif

@if (!empty($_SESSION['check_new_year']))
    <div class="row popup-bottom newyear-popup-bottom box-shadow align-items-center justify-content-between py-15 px-10 g-0 bg-cover bg-center"
        style="gap: 20px;max-width:904px;border-radius:20px 20px 0 0; background-repeat: no-repeat;" data-target="ltd-bottom-message">
        <div class="col-xl-auto col-12 text-center order-2 order-xl-1">

            <img src="{{ url('/themes/writerzen/img/figure/figure-41.png') }}" alt="WriterZen Cookie" width="86"
                class="rounded-circle"
                style="box-shadow: 0px 4px 20px 0px rgba(255, 131, 131, 0.25), 4px -4px 20px 0px rgba(102, 108, 251, 0.25), 5px 0px 20px 0px rgba(224, 137, 255, 0.25), -4px 0px 20px 0px rgba(255, 182, 97, 0.25);">

        </div>
        <div class="col-xl col-12 order-3 order-xl-2 text-white popup-bottom-text">
            <div class="fw-semibold fs-20 mb-5 popup-bottom-title">New Year, New Deal 🌟 Never Pay For SEO Tools Again</div>
            <div class="popup-bottom-subtitle">Hurry, New Year's list is limited to 500 quick deal grabbers!</div>
        </div>
        <div class="col-xl-auto col-12 text-center order-4 order-xl-3">
            <a href="{{ route('ltd-new-year') }}" class="btn-christmas position-relative">
                <img src="/themes/writerzen/img/btn-newyear-2.png" style="width: 168px; border-radius: 15px">
                <div class="position-absolute position-center text-black fw-semibold fs-18 text-center w-100"
                    data-target="ltd-message-btn">Grab
                    it now!</div>
            </a>
        </div>
        <div class="col-xl-auto col-12 mb-auto order-1 order-xl-4 text-end">
            <button class="btn btn-circle" data-target="ltd-message-btn" style="background: #9294e1">
                <i class="fa-regular fa-xmark text-white"></i>
            </button>
        </div>
    </div>
@endif