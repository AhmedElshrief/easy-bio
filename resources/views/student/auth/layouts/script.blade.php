<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>
<script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>


@yield('js')

<script>
    $(document).ready(function() {
        $('.select2').select2();
    });

    function changeImage(element, id) {
        if (element.files && element.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.image-preview-' + id).attr('src', e.target.result);
            }

            reader.readAsDataURL(element.files[0]);
        }
    }
</script>
