@push('component')
    <div class="modal fade" id="modalVideo" tabindex="-1" aria-labelledby="modalVideo" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width:1024px">
            <div class="modal-content border-radius-30">
                <div class="modal-body">
                    <div class="d-flex justify-content-end">
                        <div class=" text-secondary pointer" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-regular fa-xmark h3 mb-10"></i>
                        </div>
                    </div>
                    <div class="position-relative" style="padding-top:56.25%">
                        <iframe id="video" class="border border-1 w-100 h-100 position-absolute"style="top: 0;left:0"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-pictur"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('js-component')
    <script>
        $(`[data-target="video"]`).click(function() {
            let url = $(this).data('url')
            $("#video").attr('src', url + '?autoplay=1')
            $("#modalVideo").modal('show')
        })
        $("#modalVideo").on('hide.bs.modal', function() {
            $("#video").attr('src', '');
        });
    </script>
    <script>
        const videoParams = new URLSearchParams(window.location.search);

        const modalVideo = videoParams.get('modal')
        const srcVideo = videoParams.get('src')

        if (modalVideo && srcVideo) {
            let modal
            switch (modalVideo) {
                case "video":
                    modal = new bootstrap.Modal(document.getElementById('modalVideo'))
                    $("#video").attr('src', srcVideo + '?autoplay=1')
                    break;
                default:
                    break;
            }
            modal.show();
        }
    </script>
@endpush
