
@php $grecaptchaKey = config('services.google.grecaptchaKey'); @endphp

<script src="https://www.google.com/recaptcha/api.js?render=6Lc9zdobAAAAAMXFCqt1o_szSbH5bhJZExK8rbfz&lang=en"></script>
<script>
    //add attribute <data-target="g-recaptcha-form"> to form
    $("[data-target='g-recaptcha-form']").append('<input type="hidden" name="grecaptcha" data-sitekey="{{$grecaptchaKey}}" data-target="g-recaptcha-response">')
    let grecaptchaKey = $("[data-target='g-recaptcha-response']").attr('data-sitekey')
    if(grecaptchaKey) {
        grecaptcha.ready(function() {
            grecaptcha.execute(grecaptchaKey, {action: 'submit'}).then(function(token) {
                $("[data-target='g-recaptcha-response']").val(token)
            });
        });
    }

</script>
<style>
    .grecaptcha-badge{visibility: hidden;}
</style>