<div class="row">
	<div class="col-12">
		<div class="center">
			<div class="border-radius-20 px-15 py-60" style="box-shadow: 0px 3px 20px 0px rgba(91, 111, 163, 0.11);border: 1px solid  #D4E3FE;" id="count-me-in">
				<div class="row g-0 center justify-content-center">
					<div class="col-lg-auto col-12 offer__preview text-center order-1 order-lg-2">
						<img src="/themes/writerzen/img/home-offer.png" srcset="/themes/writerzen/img/home-offer@2x.png 2x" alt="blog">
					</div>
					<div class="col-lg-7 col-12 d-flex flex-column justify-content-center order-2 order-lg-1">
						<div class="h1 mb-20">
							Get the latest content delivered straight to your inbox!
						</div>
						<div class="fw-semibold mb-40">
							Subscribe to get our best content in your inbox. One post at a time. No spam, ever!
						</div>
						<form action="{{ route('add-newsletters') }}" data-target="g-recaptcha-form" method="post">
							@csrf
							<div class="" style="gap:1rem">
								{{-- <div class="flex-fill">
									<input class=" form-control form-control-lg h-100" type="email" name="email" placeholder="Your Email Address" required >
								</div> --}}
								<div id="newsletter-hubspot">

								</div>
								{{-- <button class="btn btn-primary-outline h7 border-radius-16" type="submit">
									<i class="fa-regular fa-paper-plane"></i>&nbsp
									<span>Count me in</span>
								</button> --}}
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@push('js-component')
<script>
	hbspt.forms.create({
        target: "#newsletter-hubspot",
        region: "na1",
        portalId: "24429155",
        formId: "c17c2d80-ebf9-496d-a2bf-5cab9df2f5e2",
        submitButtonClass: "btn btn-primary-outline h7 border-radius-16",
		errorMessageClass: "text-danger",
		onFormSubmitted: function($form, data) {
			let modal = new bootstrap.Modal(document.getElementById('modal-thanks-newsletter'))
			modal.show()
        },
    });
</script>
@endpush