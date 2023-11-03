    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/simplebar.js') }}"></script>
    <script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>
    <script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2.js') }}"></script>

    @yield('js')

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });

        @if (count($errors) > 0)
            var list = {!! $errors !!};
            var values = '';
            jQuery.each(list, function(key, value) {
                values += value + '\n';
            });
            $(document).ready(function() {
                swal.fire({
                    // title: 'Error!',
                    text: values,
                    icon: 'error'
                });
            });
        @endif


        $(document).on('click', '.btn-modal', function(e) {
            e.preventDefault();
            var container = $(this).data('container');
            $.ajax({
                url: $(this).data('href'),
                dataType: 'html',
                success: function(result) {
                    $(container)
                        .html(result)
                        .modal('show');
                },
            });
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
