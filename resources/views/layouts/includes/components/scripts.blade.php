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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/addons/cleave-phone.i18n.js"></script>

@toastr_js
    <script>
        new Cleave('.cleave', {
            {{-- numeral: true, --}}
            numeralThousandsGroupStyle: 'thousand'
        });
        new Cleave('.phone', {
            phone: true,
            phoneRegionCode: '{country}'
        });
        new Cleave('.phones', {
            numericOnly: true,
            blocks: [0, 3, 0, 3, 4],
            delimiters: ["(", ")", " ", "-"]
        });

    </script>
    <script>
        var cleaveCumpleaños = new Cleave('.birthday', {
            date: true,
            delimiter: '-',
            datePattern: ['Y', 'm', 'd']
        });
    </script>
    <script>
        var code={BD:"880",BE:"32",BF:"226",BG:"359",BA:"387",BB:"1",WF:"681",BL:"590",BM:"1",BN:"673",BO:"591",BH:"973",BI:"257",BJ:"229",BT:"975",JM:"1",BW:"267",WS:"685",BQ:"599",BR:"55",BS:"1",JE:"44",BY:"375",BZ:"501",RU:"7",RW:"250",RS:"381",TL:"670",RE:"262",TM:"993",TJ:"992",RO:"40",TK:"690",GW:"245",GU:"1",GT:"502",GR:"30",GQ:"240",GP:"590",JP:"81",GY:"592",GG:"44",GF:"594",GE:"995",GD:"1",GB:"44",GA:"241",SV:"503",GN:"224",GM:"220",GL:"299",GI:"350",GH:"233",OM:"968",TN:"216",JO:"962",HR:"385",HT:"509",HU:"36",HK:"852",HN:"504",VE:"58",PR:"1",PS:"970",PW:"680",PT:"351",SJ:"47",PY:"595",IQ:"964",PA:"507",PF:"689",PG:"675",PE:"51",PK:"92",PH:"63",PN:"870",PL:"48",PM:"508",ZM:"260",EH:"212",EE:"372",EG:"20",ZA:"27",EC:"593",IT:"39",VN:"84",SB:"677",ET:"251",SO:"252",ZW:"263",SA:"966",ES:"34",ER:"291",ME:"382",MD:"373",MG:"261",MF:"590",MA:"212",MC:"377",UZ:"998",MM:"95",ML:"223",MO:"853",MN:"976",MH:"692",MK:"389",MU:"230",MT:"356",MW:"265",MV:"960",MQ:"596",MP:"1",MS:"1",MR:"222",IM:"44",UG:"256",TZ:"255",MY:"60",MX:"52",IL:"972",FR:"33",IO:"246",SH:"290",FI:"358",FJ:"679",FK:"500",FM:"691",FO:"298",NI:"505",NL:"31",NO:"47",NA:"264",VU:"678",NC:"687",NE:"227",NF:"672",NG:"234",NZ:"64",NP:"977",NR:"674",NU:"683",CK:"682",CI:"225",CH:"41",CO:"57",CN:"86",CM:"237",CL:"56",CC:"61",CA:"1",CG:"242",CF:"236",CD:"243",CZ:"420",CY:"357",CX:"61",CR:"506",CW:"599",CV:"238",CU:"53",SZ:"268",SY:"963",SX:"599",KG:"996",KE:"254",SS:"211",SR:"597",KI:"686",KH:"855",KN:"1",KM:"269",ST:"239",SK:"421",KR:"82",SI:"386",KP:"850",KW:"965",SN:"221",SM:"378",SL:"232",SC:"248",KZ:"7",KY:"1",SG:"65",SE:"46",SD:"249",DO:"1",DM:"1",DJ:"253",DK:"45",VG:"1",DE:"49",YE:"967",DZ:"213",US:"1",UY:"598",YT:"262",UM:"1",LB:"961",LC:"1",LA:"856",TV:"688",TW:"886",TT:"1",TR:"90",LK:"94",LI:"423",LV:"371",TO:"676",LT:"370",LU:"352",LR:"231",LS:"266",TH:"66",TG:"228",TD:"235",TC:"1",LY:"218",VA:"379",VC:"1",AE:"971",AD:"376",AG:"1",AF:"93",AI:"1",VI:"1",IS:"354",IR:"98",AM:"374",AL:"355",AO:"244",AS:"1",AR:"54",AU:"61",AT:"43",AW:"297",IN:"91",AX:"358",AZ:"994",IE:"353",ID:"62",UA:"380",QA:"974",MZ:"258"};
        var selectCountry = $('.select-country');
        var html = '';

        for (var i in code) {
            html += '<option value="+' + code[i] + '">' + i + '</option>';
        }

        selectCountry.html(html);
        selectCountry.val('+52');

        var cleavePhone = new Cleave('.input-phone', {
            phone:           true,
            phoneRegionCode: 'MX'
        });

        selectCountry.on('change', function () {
            cleavePhone.setPhoneRegionCode(this.value);
            cleavePhone.setRawValue(this.value);
            $('.input-phone').focus();
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
