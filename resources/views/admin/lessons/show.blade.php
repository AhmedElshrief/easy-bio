@php
    $title = __('lang.show');
@endphp

<div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content ">
        <div class="modal-header">
            {{-- <h5 class="modal-title">
                {{ $title }}
            </h5> --}}
            <button type="button" id="closeModal" class="btn-close {{ isRtl() ? 'ms-1' : '' }}" data-bs-dismiss="modal"
                aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div id="loader" class="text-center">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>

            <iframe id="video" width="100%" height="500" src="https://www.youtube.com/embed/tFesMj3sYfA"
                style="display: none">
            </iframe>

        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#video').on('load', function() {
            $('#loader').hide();
            $('#video').show();
        });

        $('#closeModal').on('click', function (e) {
            $('#video').attr('src', '');
        });
    });
</script>
