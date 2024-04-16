<div class="modal fade rsolution-scrollbar" id="modal-booking-demo" tabindex="-1" aria-labelledby="exampleModalLabel1"
    aria-hidden="true" style="padding-right: 0px;">
    <div class="modal-dialog " style="max-width:930px">
        <div class="popup-tks-custom">
            <div class="modal-content ">
                <div class="p-3 pb-0">
                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body pt-0 px-30 pb-30 text-start">
                    {{-- <form class="row" action="{{route('contacts.add')}}" method="post" id="form-submit" enctype="multipart/form-data"
                        modal-target="popup-contact" data-target='g-recaptcha-form'>
                        @csrf
                        <input type="hidden" name="content" value="demo booking">
                        <input type="hidden" name="type" value="2">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="form-group">
                                    <div class="mb-25 position-relative">
                                        <img class="position-absolute" src="/themes/writerzen/img/icon-error.svg"
                                            alt="error" style="top: 5px;right: 8px;">
                                        <input type="text"
                                            class="form-control error-auth border border-primary-medium"
                                            value="{{ ucfirst($error) }}" disabled readonly>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <input type="hidden" name="type" value="2">
                        <div class="field row">
                            <div class="field__label h5">First Name</div>
                            <div class="field__wrap">
								<input class="form-control form-control-lg"name="name" type="text" placeholder="Enter your first name" required>
                            </div>
                        </div>
                        <div class="field row">
                            <div class="field__label h5">Last Name</div>

                            <div class="field__wrap">
								<input class="form-control form-control-lg" name="info[last_name]" type="text" placeholder="Enter your last name" required>
                            </div>
                        </div>
                        <div class="field row">
                            <div class="field__label h5">Work Email</div>
                            <div class="field__wrap">
                                <input class="form-control form-control-lg" name="email" type="email" placeholder="Enter your email" required>
                            </div>
                        </div>

                        <div class="field row mb-30">
                            <div class="field__label h5">Phone Number</div>
                            <div class="position-relative">
                                <div class="position-absolute d-flex justify-content-center" onclick="toggleCountries()"
                                    style="width:60px;height:28px;left:28px;top:calc(50% - 14px);border-right:1px solid #bfc7da; cursor: pointer">
                                    <span id="base-flag">
                                        <span class="flag-icon flag-icon-us"></span>
                                    </span>
                                    <div id="arrow" class="ms-10">
                                        <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.6875 1.71875C10.9688 1.4375 11.0625 1 10.9062 0.625C10.75 0.25 10.375 0 10 0H2C1.59375 0 1.21875 0.25 1.0625 0.625C0.90625 1 1 1.4375 1.28125 1.71875L5.28125 5.71875C5.46875 5.90625 5.71875 6 6 6C6.25 6 6.5 5.90625 6.6875 5.71875L10.6875 1.71875Z"
                                                fill="#BFC7DA"></path>
                                        </svg>
                                    </div>
                                </div>
                                <input class="form-control form-control-lg ps-80" name="info[phone_number]"
                                    id="country-code-input" placeholder="+1 (415) 123-4567">

                                <div class="position-absolute px-10 py-10 bg-white d-none"
                                    id="countries-container"
                                    style="width:calc(100% - 24px);border: 1px solid #BFC7DA;box-shadow: -6px 6px 20px rgba(91, 111, 163, 0.15); border-radius: 10px;bottom:calc(100% + 10px);z-index:1">
                                    <div class="rsolution-scrollbar-xl" id="country-items" style="max-height:288px;">

                                    </div>
                                    <div class="mt-20 position-relative">
                                        <div class="position-absolute" style="top:calc(50% - 12px);left:15px">
                                            <i class="fa-light fa-magnifying-glass"
                                                style="color:#BFC7DA;font-size:20px"></i>
                                        </div>
                                        <input id="filter-countries" class="form-control form-control-lg ps-40"  type="text" placeholder="Search country">
                                    </div>
                                </div>
                            </div>
                            <div class="text-danger h8 px-20 mt-10 d-none" id="alert-phone-error">Invalid phone number
                            </div>
                        </div>

                        <div class="field row">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary-outline h7 px-70 py-10 w-100">
                                    <i class="fa-regular fa-paper-plane" style="font-size:15px"></i>&nbsp
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form> --}}
                    <div data-target="form-booking-demo-hubspot">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js-component')
    <script>
        hbspt.forms.create({
            target: '[data-target="form-booking-demo-hubspot"]',
            region: "na1",
            portalId: "24429155",
            formId: '12c865c3-6612-4309-9939-91c0868ae61e',
            submitButtonClass: "btn btn-primary h7 px-70 py-10 w-100",
            errorMessageClass: "text-danger",
            onFormSubmitted: function($form, data) {
                let url = new URL(window.location.href);
                window.location.href = url.origin + url.pathname + '?modal=thankscontact'
            },
        });
    </script>
    {{-- <script>
        let countries
        let countryCode = "+1"
        async function fetchCountries() {
            try {
                const response = await fetch(`{{ env('APP_URL').'/themes/writerzen/js/countries.json' }}`);
                if (response.ok) {
                    const data = await response.json();
                    return data;
                } else {
                    throw new Error('Error loading JSON file.');
                }
            } catch (error) {}
        }

        function toggleCountries() {
            $('#arrow').toggleClass('rotate-180')
            $('#countries-container').toggleClass('d-none')
        }

        document.addEventListener("DOMContentLoaded", async function(event) {
            countries = await fetchCountries()
            countries = countries.data.filter(e => e.dial_code !== undefined)
            renderListCountry(countries)
        });

        document.querySelector('#filter-countries').addEventListener('keyup', (event) => {
            $('#country-items').html('')
            let value = document.querySelector('#filter-countries').value
            let data = countries.filter((item) =>
                item.label.toLowerCase().includes(value.toLowerCase()) ||
                item.id.toLowerCase().includes(value.toLowerCase()) ||
                item.dial_code.toLowerCase().includes(value.toLowerCase())
            );
            renderListCountry(data)
        })

        document.querySelector('#form-submit').addEventListener('submit', (event) => {
            let phoneCode = document.querySelector('#country-code-input').value
            let validatePhone = validatePhoneNumber(phoneCode, countryCode)
            if (!validatePhone) {
                event.preventDefault();
                $('#alert-phone-error').removeClass('d-none')
            } else {
                $('#alert-phone-error').addClass('d-none')
            }
        })

        function renderListCountry(data) {
            let html = ``
            for (let i in data) {
                html += `
                    <div class="d-flex py-10 px-15 align-items-center countries-item" data-id="${data[i].id.toLowerCase()}" data-dial-code="${data[i].dial_code}"
                        onclick=setCountryCode('${data[i].dial_code}','${data[i].id.toLowerCase()}')
                        style="cursor:pointer">
                        <span class="flag-icon flag-icon-${data[i].id.toLowerCase()}"></span>
                        <div class="h7 mx-10">${data[i].label}</div>
                        <div class="h8">${data[i].dial_code}</div>
                    </div>
                `
            }
            $('#country-items').append(html)
        }

        function setCountryCode(dialCode, id) {
            toggleCountries()
            countryCode = dialCode
            document.querySelector('#country-code-input').value = dialCode
            document.querySelector('#country-code-input').setAttribute('placeholder', dialCode + " (415) 123-4567")
            document.querySelector('#base-flag').innerHTML = `<span class="flag-icon flag-icon-${id}" ></span>`
        }

        document.querySelector('#country-code-input').addEventListener('focus', (event) => {
            document.querySelector('#countries-container').classList.add('d-none')
        })
    </script> --}}
@endpush