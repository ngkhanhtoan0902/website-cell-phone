$(function () {
    $(".lazy").lazy({});
});

if (sessionStorage.getItem("ltd_source")) {
    let source = sessionStorage.getItem("ltd_source");
    let urlApp = `{{ env('MAIN_APP_URL') }}`;
    let urlLogin = `${urlApp}/login?source=${source}`;
    let urlReg = `${urlApp}/register?source=${source}`;
    let link = document.querySelectorAll("a");
    for (let i = 0; i < link.length; i++) {
        let href = link[i].href;
        let url = new URL(href);
        let params = new URLSearchParams(url.search);
        if (href.includes(`${urlApp}/login`)) {
            if (params.get("redirect")) {
                link[i].setAttribute(
                    "href",
                    urlLogin + "&redirect=" + params.get("redirect")
                );
            } else link[i].setAttribute("href", urlLogin);
        }
        if (href.includes(`${urlApp}/register`)) {
            if (params.get("redirect")) {
                link[i].setAttribute(
                    "href",
                    urlReg + "&redirect=" + params.get("redirect")
                );
            } else link[i].setAttribute("href", urlReg);
        }
    }
}

//Modal handler
const urlParams = new URLSearchParams(window.location.search);
const modalParams = urlParams.get("modal");
if (modalParams) {
    let modal;
    switch (modalParams) {
        case "bookingdemo":
            modal = new bootstrap.Modal(
                document.getElementById("modal-booking-demo")
            );
            break;
        case "thankscontact":
            modal = new bootstrap.Modal(
                document.getElementById("modal-thanks-contact")
            );
            break;
        case "thanksnewsletter":
            modal = new bootstrap.Modal(
                document.getElementById("modal-thanks-newsletter")
            );
            break;
        case "pricing":
            modal = new bootstrap.Modal(
                document.getElementById("modal-plan-another")
            );
            break;
        default:
            break;
    }
    if (modal) modal.show();
}
//---

//Check Audience Type
const getAudienceType = async () => {
    let url = encodeURIComponent(
        window.location.origin + window.location.pathname
    );
    let result = await fetch(
        `/api/services/url-configs/find-or-create?url=${url}&key=audience_type`
    );
    return result.json();
};

(async () => {
    let audienceType = await getAudienceType();
    const div = document.createElement("div");
    div.setAttribute("data-audience-type", audienceType.data.value ?? "b2c");
    document.body.appendChild(div);
})();
//--