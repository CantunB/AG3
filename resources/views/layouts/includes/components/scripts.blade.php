<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/chartist/chartist.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/libs/jquery-tabledit/jquery.tabledit.min.js' ) }}"></script>
<script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('assets/libs/flatpickr/l10n/es.js') }}"></script>
<script src="{{ asset('assets/libs/dropzone/min/dropzone.min.js') }}"></script>
<script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="{{ asset('js/airlines_iata.js') }}"></script>
<script src="{{ asset('assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>
<script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>
<script src="{{ asset('assets/libs/parsleyjs/i18n/es.js') }}"></script>
<script src="{{ asset('assets/libs/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>        <!-- jQuery -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('assets/libs/flexdatalist/jquery.flexdatalist.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js" integrity="sha512-KaIyHb30iXTXfGyI9cyKFUIRSSuekJt6/vqXtyQKhQP6ozZEGY8nOtRS6fExqE4+RbYHus2yGyYg1BrqxzV6YA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@toastr_js
    <script>
        var cleave = new Cleave('.cleave', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
    </script>
    <script>
        $('.selectpicker').selectpicker();
    </script>
    <script>
        $(".flatpickr").flatpickr({
            "locale": "es"
        });
    </script>
    <script>
        function mayus(e) {
            e.value = e.value.toUpperCase();
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    {{-- /* ------------------------------INPUT SPINNER-------------------------------------------- */ --}}
    <script>
        /////////////////// product +/-
        $(document).ready(function() {
            $('.num-in span').click(function () {
                var $input = $(this).parents('.num-block').find('input.in-num');
            if($(this).hasClass('minus')) {
                var count = parseFloat($input.val()) - 1;
                count = count < 1 ? 1 : count;
                if (count < 2) {
                $(this).addClass('dis');
                }
                else {
                $(this).removeClass('dis');
                }
                $input.val(count);
            }
            else {
                var count = parseFloat($input.val()) + 1
                $input.val(count);
                if (count > 1) {
                $(this).parents('.num-block').find(('.minus')).removeClass('dis');
                }
            }

            $input.change();
            return false;
            });

        });
        // product +/-
    </script>
@if($units <= 0)
    <script type="text/javascript">

        toastr.options = {
            "closeButton": true,
            "debug": true,
            "newestOnTop": false,
            "progressBar": false,
            "preventDuplicates": true,
            "onclick": false,
            "showDuration": 0,
            {{-- "showDuration": "100", --}}
            "hideDuration": 0,
            {{-- "hideDuration": "1000", --}}
            {{-- "timeOut": "5000", --}}
            "timeOut": 0,
            {{-- "extendedTimeOut": "1000", --}}
            "extendedTimeOut": 0,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "show",
            "hideMethod": "hide"
        };
        toastr.warning("No hay unidades registradas");
    </script>
@endif
@if ($hotels <= 0)
    <script type="text/javascript">
        toastr.warning("No hay hoteles registrados");
    </script>
@endif
@if ($airlines <= 0)
    <script type="text/javascript">
        toastr.warning("No hay aerolineas registradas");
    </script>
@endif
@if ($type_services <= 0)
    <script type="text/javascript">
        toastr.warning("No hay categorias de servicios");
    </script>
@endif
@if($operators <= 0)
    <script type="text/javascript">
        toastr.warning("No hay operadores registrados");
    </script>
@endif
@if($agencies <= 0)
    <script type="text/javascript">
        toastr.warning("No hay agencias registrados");
    </script>
@endif

@stack('scripts')
@livewireScripts
