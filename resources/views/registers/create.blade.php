@extends('layouts.app')
@section('content')
<style>
    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color:#FFD038;
    }
    .divOculto {
        display: none;
    }
    .border-w {
        border: 2px solid #E7C010;
    }
    .dropdown-menu > li > a {
        font-weight: 700;
        padding: 10px 20px;
    }

    .bootstrap-select.btn-group .dropdown-menu li small {
        display: block;
        padding: 6px 0 0 0;
        font-weight: 100;
    }

</style>
<div class="container-fluid">
    @component('layouts.includes.components.breadcrumb')
        @slot('title') {{ config('app.name', 'Laravel') }} @endslot
        @slot('subtitle') {{ __('translation.Services') }} @endslot
        @slot('teme') {{ __('translation.List') }} @endslot
    @endcomponent
    {{-- <form id="form_register" method="POST" action="{{ route('registers.store') }}" data-parsley-validate autocomplete="none"> --}}

    <div class="row">
        <div class="col-12">
            <form id="form_principal" method="POST" autocomplete="none">
                @csrf
                    <div class="card border">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-xl-4">
                                    <div class="form-group ">
                                        <label>{{ __('translation.Date') }}</label>
                                        <input type="text" class="form-control " id="date" name="date" placeholder="{{ date('Y-m-d') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xl-4">
                                    <div class="form-group">
                                        <label for="project-priority">{{ __('translation.Type of service') }}</label>
                                        <select id="type_service" name="type_service_id" class="form-control select2 sel_sl sel_ll" required>
                                            <option value="" disabled selected>Selecciona un servicio</option>

                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xl-4">
                                    <div class="form-group">
                                        <label for="project-priority">{{ __('translation.Agency') }}</label>
                                        <select id="agency" name="agency_id" class="form-control select2 sel_sl sel_ll" required>
                                            <option value="" disabled selected>Selecciona una agencia</option>
                                            @foreach ($agencies as $agency)
                                                <option  value="{{ $agency->id }}">{{ $agency->name }} ( <p style="color:blue">{{ $agency->business_name}}</p> )</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
            </form>
            {{---------------------------------------------------------------------------- */
            /* INICIO --- CARD SEERVICIO DE SALIDAS                                       */
            /* ----------------------------------------------------------------------------}}
            <form id="form_services_salidas" method="POST" autocomplete="none">
                @csrf
                <div id="services_salidas" class="card border divOculto">
                    <div class="card-box mb-2">
                        <div class="card-title text-center">
                            <h3 class="card-title text-uppercase">Servicio de salida</h3>
                        </div>
                        <div class="card-body">
                            <div class="card-text">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="project-priority">Origen</label>
                                                <select id="origin" name="origin" name="origin" class="form-control select2 services_salidas sel_sl" required>
                                                    <option value="" disabled selected>Selecciona un hotel</option>
                                                    @foreach ($hotels as $hotel)
                                                        <option value="{{ $hotel->hotel }}">{{ $hotel->hotel }}</option>
                                                    @endforeach
                                                </select>
                                                <input type="hidden" id="zo" name="zo" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="destiny">Destino</label>
                                                <input  type="text" class="form-control services_salidas" name="destiny" readonly="readonly" value="Aeropuerto Internacional de Cancun" required>
                                                <input type="hidden" id="zd" name="zd" value="Z0">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="project-priority">Aerolinea</label>
                                                <select  name="airline" class="form-control select2 airlines_departure services_salidas" >
                                                    <option value="" disabled selected>Selecciona una aerolinea</option>
                                                    @foreach ($airlines as $airline)
                                                        <option value=" {{$airline->airline}} ">{{ $airline->airline }}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="flight-number">{{ __('translation.Flight number') }}</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="icon-hashtag"><i
                                                    class="fas fa-hashtag input__icon"></i></span>
                                            <span class="input-group-text iata" id="iata_departure"></span>
                                            <input oninput="iata_code_departure()"  type="text" class="form-control services_salidas" id="flight_number_departure" aria-describedby="icon-hashtag" autocomplete="off">
                                            <input  type="hidden" id="iata_airline_departure" name="flight_number">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="project-priority">{{ __('translation.Terminal') }}</label>
                                            <select name="terminal" class="form-control select2 services_salidas">
                                                <option value="" disabled selected>Selecciona una terminal</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="div_ft" class="col-md-3 divOculto">
                                        <div class="form-group">
                                            <label>Hora de vuelo</label>
                                            <input id="flight_time" name="flight_time" type="text" class="form-control select services_salidas" placeholder="{{ date('H:i') }}" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            {{---------------------------------------------------------------------------- */
            /* TERMINO --- CARD SEERVICIO DE SALIDAS                                       */
            /* ----------------------------------------------------------------------------}}

            {{---------------------------------------------------------------------------- */
            /* INICIO --- CARD SEERVICIO DE LLEGADAS                                       */
            /* ----------------------------------------------------------------------------}}
            <form id="form_services_llegadas" method="POST" data-parsley-validate autocomplete="none">
                @csrf
                <div id="services_llegadas" class="card border divOculto">
                    <div class="card-box mb-2">
                        <div class="card-title text-center">
                            <h3 class="card-title text-uppercase">Servicio de llegadas</h3>
                        </div>
                        <div class="card-body">
                            <div class="card-text">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="project-priority">Origen</label>
                                                <input  type="text" class="form-control services_llegadas" name="origin" readonly="readonly" value="Aeropuerto Internacional de Cancun" required>
                                                <input type="hidden" id="zo" name="zo" value="Z0">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="project-priority">Destino</label>
                                                <select id="destiny" name="destiny" class="form-control select2 services_llegadas sel_ll" required>
                                                    <option value="" disabled selected>Selecciona un hotel</option>
                                                    @foreach ($hotels as $hotel)
                                                        <option value="{{ $hotel->hotel }}">{{ $hotel->hotel }}</option>
                                                    @endforeach
                                                </select>
                                            <input type="hidden" id="zd_llegadas" name="zd" value="">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="project-priority">Aerolinea</label>
                                                <select id="airline" name="airline" class="form-control select2 airlines_arrival services_llegadas">
                                                    <option value="" disabled selected>Selecciona una aerolinea</option>
                                                    @foreach ($airlines as $airline)
                                                        <option value=" {{$airline->airline}} ">{{ $airline->airline }}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="flight-number">{{ __('translation.Flight number') }}</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="icon-hashtag"><i
                                                    class="fas fa-hashtag input__icon"></i></span>
                                            <span class="input-group-text iata" id="iata_arrival"></span>
                                            <input oninput="iata_code_arrival()" type="text" class="form-control services_llegadas" id="flight_number_arrival" aria-describedby="icon-hashtag" autocomplete="off">
                                            <input  type="hidden" id="iata_airline_arrival" name="flight_number">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="project-priority">{{ __('translation.Terminal') }}</label>
                                            <select id="terminal" name="terminal" class="form-control select2 services_llegadas">
                                                <option value="" disabled selected>Selecciona una terminal</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="div_ft" class="col-md-3 divOculto">
                                        <div class="form-group">
                                            <label>Hora de vuelo</label>
                                            <input id="flight_time" name="flight_time" type="text" class="form-control select services_llegadas" placeholder="{{ date('H:i') }}" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
             {{---------------------------------------------------------------------------- */
            /* TERMINO --- CARD SEERVICIO DE LLEGADAS                                       */
            /* ----------------------------------------------------------------------------}}

            {{---------------------------------------------------------------------------- */
            /* INICIO --- CARD SERVICIO ABIERTO                                            */
            /* ----------------------------------------------------------------------------}}
            <form id="form_services_abierto" method="POST" data-parsley-validate  autocomplete="none">
                @csrf
                <div id="services_abierto" class="card border divOculto">
                    <div class="card-box mb-2">
                        <div class="card-title text-center">
                            <h3 class="card-title text-uppercase">Servicio Abierto</h3>
                        </div>
                        <div class="card-body">
                            <div class="card-text">
                                <div class="row justify-content-md-center">
                                    <div class="col-md-5 col-xl-5">
                                        <div class="form-group">
                                            <label for="project-priority">{{ __('translation.Origin') }}</label>
                                            <input id="origin" name="origin" class="form-control services_abierto" list="my_origin" required>
                                                <datalist id="my_origin">
                                                    <option value="ALAYA TULUM">
                                                    <option value="AEROPUERTO">
                                                </datalist>
                                        </div>
                                    </div>
                                    <div id="div_pa_n" class="col-md-3 col-xl-3">
                                        <div class="form-group">
                                            <label>Tiempo <em>(Horas)</em></label>
                                            <div class="input-group num-block num-in">
                                                <span class="input-group-text minus dis">-</span>
                                                <input type="number"  class="form-control text-center in-num services_abierto" value="1" min="1" max="24"
                                                    aria-describedby="icon-passenger" required name="time" id="time" readonly="">
                                                <span class="input-group-text plus">+</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xl-4">
                                        <div class="form-group">
                                            <label>Orden de servicio</label>
                                            <input id="service_orden" name="service_orden" type="text" class="form-control services_abierto" placeholder="Orden de servicio">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
             {{---------------------------------------------------------------------------- */
            /* TERMINO --- CARD SEERVICIO ABIERTO                                           */
            /* ----------------------------------------------------------------------------}}


            {{---------------------------------------------------------------------------- */
            /* INICIO --- CARD SERVICIO CIRCUITO                                            */
            /* ----------------------------------------------------------------------------}}
            <form id="form_services_circuito" method="POST" data-parsley-validate autocomplete="none" autocomplete="none">
                @csrf
                <div id="services_circuito" class="card border divOculto">
                    <div class="card-box mb-2">
                        <div class="card-title text-center">
                            <h3 class="card-title text-uppercase">Servicio Circuito</h3>
                        </div>
                        <div class="card-body">
                            <div class="card-text">
                                <div class="row justify-content-md-center">
                                    <div class="col-md-5 col-xl-5">
                                        <div class="form-group">
                                            <label for="project-priority">{{ __('translation.Origin') }}</label>
                                            <input id="origin" name="origin" class="form-control services_circuito" list="my_origin" required>
                                                <datalist id="my_origin">
                                                    <option value="ALAYA TULUM">
                                                    <option value="AEROPUERTO">
                                                </datalist>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xl-3">
                                        <div class="form-group">
                                            <label>Duracion <em>(Dias)</em></label>
                                            <div class="input-group num-block num-in">
                                                <span class="input-group-text minus dis">-</span>
                                                <input type="text" class="form-control text-center in-num services_circuito" value="1"
                                                    aria-describedby="icon-passenger" required name="days" id="days" placeholder="Dias" data-parsley-type="digits" readonly="">
                                                <span class="input-group-text plus">+</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xl-4">
                                        <div class="form-group">
                                            <label>Orden de servicio</label>
                                            <input id="service_orden" name="service_orden" required type="text" class="form-control select services_circuito" placeholder="Orden de servicio">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
             {{---------------------------------------------------------------------------- */
            /* TERMINO --- CARD SEERVICIO CIRCUITO                                           */
            /* ----------------------------------------------------------------------------}}


            {{---------------------------------------------------------------------------- */
            /* INICIO --- CARD PASAJEROS                                       */
            /* ----------------------------------------------------------------------------}}
            <form id="form_pasajeros" method="POST" data-parsley-validate autocomplete="none">
                @csrf
                    <div id="card_passenger" class="card border" >
                        <div class="card-box mb-2">
                            <div class="card-title text-center">
                                <h3 class="card-title text-uppercase">Informacion del pasajero</h3>
                            </div>
                            <div class="card-body">
                                <div class="card-text">
                                    <div class="row">
                                        <div id="div_pa" class="col-md-6 col-xl-6">
                                            <div class="form-group">
                                                <label for="project-priority">Nombre completo del pasajero</label>
                                                <input onkeyup="mayus(this);" autocomplete="off" class="form-control" name="passenger" id="passenger" placeholder="Paul J. Friend" required>
                                            </div>
                                        </div>
                                        <div id="div_pa_n" class="col-md-3 col-xl-2">
                                            <div class="form-group">
                                                <label for="project-priority">{{ __('translation.Passenger number') }}</label>
                                                <div class="input-group num-block num-in">
                                                    <span class="input-group-text minus dis">-</span>
                                                    <input type="text" class="form-control text-center in-num" value="1"
                                                        aria-describedby="icon-passenger" required name="passenger_number" id="passenger_number" readonly="">
                                                    <span class="input-group-text plus">+</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="div_pickup" class="col-md-3 col-xl-4">
                                            <div class="form-group">
                                                <label>{{ __('translation.Pick Up') }}</label>
                                                <input type="text" class="form-control select" id="pickup" name="pickup" placeholder="{{ date('H:i') }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-md-center">
                                        <div id="div_unit" class="col-md-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="project-priority">{{ __('translation.Requested unit') }}</label>
                                                <select id="requested_unit" name="requested_unit" class="form-control select2 sel_sl sel_ll" required>
                                                    <option value="" selected disabled>Selecciona una unidad</option>
                                                    <option data-icon="mdi mdi-car-estate" value="1">SUBURBAN</option>
                                                    <option data-icon="mdi mdi-van-utility" value="2">VAN (TP)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="div_place" class="col-md-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="project-priority">{{ __('translation.Place of service') }}</label>
                                                <input id="place_service" name="place_service" class="form-control" required>
                                                    {{-- <option value="" selected disabled>Selecciona un servicio</option>
                                                    <option value="Local">Local</option>
                                                    <option value="Corredor">Corredor</option>
                                                </input> --}}
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xl-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="tariff">Tarifa</label>
                                                    <input type="text" id="tariff" name="tariff" class="form-control cleave" list="my_tariff" autocomplete="off">
                                                        <datalist id="my_tariff">
                                                        </datalist>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div id="div_obs" class="col-xl-12">
                                            <div class="form-group">
                                                <label>{{ __('translation.Observations') }}</label>
                                                <input type="text" class="form-control" id="observations" name="observations" >
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-md-center">
                                        <div class="row mt-3">
                                            <div class="col-12 text-center">
                                                <button type="submit" id="btn_create" class="btn btn-success waves-effect waves-light m-1"><i class="fe-check-circle mr-1"></i>{{ __('translation.Create') }}</button>
                                                <a href="javascript: history.go(-1)" class="btn btn-light waves-effect waves-light m-1"><i class="fe-x mr-1"></i>{{ __('translation.Cancel') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
             {{---------------------------------------------------------------------------- */
            /* TERMINO --- CARD PASAJERO                                     */
            /* ----------------------------------------------------------------------------}}


        </div>
    </div>
</div>

<!-- end row-->
@push('scripts')
<script>
    document.getElementById("date").flatpickr({
        locale: 'es',
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
        minDate: "today",
        defaultDate: "{!! date('Y-m-d') !!}"
    });
    document.getElementById("flight_time").flatpickr({
        locale: "es",
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        //defaultDate: "{!!  date('H:i') !!}"
    });
    document.getElementById("pickup").flatpickr({
        locale: "es",
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
    });
</script>
<script>
    $(document).ready(function() {
        function formatText (icon) {
            return $('<span><i class="fas ' + $(icon.element).data('icon') + '"></i> ' + icon.text + '</span>');
        };
        $("#requested_unit").select2({
            width: "50%",
            templateSelection: formatText,
            templateResult: formatText
        });
    });
</script>
<script>
$(document).ready(function() {
    $('#type_service').select2({
    }).on("change", function (e) {
        var selected = $(this).val();
        var opcion = $(this).children("option:selected").html();
    switch(opcion) {
        case('Salidas'):
            console.log('Se selecciono el servicio de salidas...');
            $("#services_salidas").show();
            $(".services_salidas").attr('name');
            {{-- ****** INICIO Ocultos ***** --}}
            $("#services_llegadas").hide();
            $(".services_llegadas").removeAttr('name', false);
            $("#services_abierto").hide();
            $(".services_abierto").removeAttr('name', false);
            $("#services_circuito").hide();
            $(".services_circuito").removeAttr('name', false);
            {{-- ****** TERMINO Ocultos ***** --}}
            {{-- SE INICIA EL ENVIO DE DATOS POR AJAX --}}
            $('.sel_sl').on('change',function(){
                $('#my_tariff').empty();

                $.ajax({
                    type: "POST",
                    url: "{!! route('fetchTariff') !!}",
                    data: {
                        'service' : $("#type_service").val(),
                        'agency' : $("#agency").val(),
                        'origen' : $("#origin").val(),
                        'request_unit' : $("#requested_unit").val(),
                    },
                    dataType: "json",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function(response){
                        console.log(response);
                        $.each(response, function(k, data) {
                            console.log(data.place_service);
                            $("#zo").val("Z"+data.zona);
                            $("#place_service").val(data.place_service);
                            $('#my_tariff').append("<option value='" + data.tariff + "'>");

                            {{-- $.each(this, function(k, v) {
                                console.log(v);
                            }); --}}
                        });
                    },
                });
            });
                $("#btn_create").click(function(e) {
                    e.preventDefault();
                    var principal = $('#form_principal').parsley().validate();
                    var passenger = $('#form_pasajeros').parsley().validate();
                    var selected_form = $('#form_services_salidas').parsley().validate();
                    if ( $('#form_principal').parsley().isValid() && $('#form_services_salidas').parsley().isValid() &&  $('#form_pasajeros').parsley().isValid()){
                        console.log('Validacion de formularios completa...');
                        $.ajax({
                            type: "POST",
                            url: "{!! route('registers.store') !!}",
                            data: $('#form_principal, #form_services_salidas, #form_pasajeros').serialize(),
                            dataType: "json",
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            success: function(response){
                            console.log(response);
                                Swal.fire({
                                    title: "Registro creado!",
                                    text: response.data,
                                    icon: "success",
                                    timer: 3500,
                                    didDestroy: () => {
                                        window.location = '{!! route('registers.index') !!}';
                                    }
                                });
                            },
                            error: function(response){
                                var errors = response.responseJSON;
                                errorsHtml = '<ul>';
                                $.each(errors.errors,function (k,v) {
                                errorsHtml += '<li>'+ v + '</li>';
                                });
                                errorsHtml += '</ul>';
                                Swal.fire({
                                    title: "Ooops!",
                                    html: errorsHtml,
                                    icon: "error",
                                    confirmButtonText: "Volver!",
                                });
                            }
                        });
                    }
                });
            {{-- TERMINA EL ENVIO DE DATOS --}}
        break;

        case('Llegadas'):
            console.log('Se selecciono el servicio de llegadas...');
            $("#services_llegadas").show();
            $(".services_llegadas").attr('name');

            {{-- ****** INICIO Ocultos ***** --}}
            $("#services_salidas").hide();
            $(".services_salidas").removeAttr('name', false);
            $("#services_abierto").hide();
            $(".services_abierto").removeAttr('name', false);
            $("#services_circuito").hide();
            $(".services_circuito").removeAttr('name', false);
            {{-- ****** TERMINO Ocultos ***** --}}

            {{-- SE INICIA EL ENVIO DE DATOS POR AJAX --}}
            $('.sel_ll').on('change',function(){
                $('#my_tariff').empty();
                $.ajax({
                    type: "POST",
                    url: "{!! route('fetchTariff') !!}",
                    data: {
                        'service' : $("#type_service").val(),
                        'agency' : $("#agency").val(),
                        'destiny' : $("#destiny").val(),
                        'request_unit' : $("#requested_unit").val(),
                    },
                    dataType: "json",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function(response){
                        $('#my_tariff').val("");

                        console.log(response);
                        $.each(response, function(k, data) {
                            $("#zd_llegadas").val("Z"+data.zona);
                            $("#place_service").val(data.place_service);
                            $('#my_tariff').append("<option value='" + data.tariff + "'>");

                            {{-- $.each(this, function(k, v) {
                                console.log(v);
                            }); --}}
                        });
                    },
                });
            });
            $("#btn_create").click(function(e) {
                e.preventDefault();
                var principal = $('#form_principal').parsley().validate();
                var passenger = $('#form_pasajeros').parsley().validate();
                var selected_form = $('#form_services_llegadas').parsley().validate();
                if ( $('#form_principal').parsley().isValid() && $('#form_services_llegadas').parsley().isValid() &&  $('#form_pasajeros').parsley().isValid()){
                    console.log('Validacion de formularios completa...');
                    $.ajax({
                        type: "POST",
                        url: "{!! route('registers.store') !!}",
                        data: $('#form_principal, #form_services_llegadas, #form_pasajeros').serialize(),
                        dataType: "json",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function(response){
                        console.log(response);
                            Swal.fire({
                                title: "Registro creado!",
                                text: response.data,
                                icon: "success",
                                timer: 3500,
                                didDestroy: () => {
                                    window.location = '{!! route('registers.index') !!}';
                                }
                            });
                        },
                        error: function(response){
                            var errors = response.responseJSON;
                            errorsHtml = '<ul>';
                            $.each(errors.errors,function (k,v) {
                            errorsHtml += '<li>'+ v + '</li>';
                            });
                            errorsHtml += '</ul>';
                            Swal.fire({
                                title: "Ooops!",
                                html: errorsHtml,
                                icon: "error",
                                confirmButtonText: "Volver!",
                            });
                        }
                    });
                }
            });
            {{-- TERMINA EL ENVIO DE DATOS --}}
        break;

        case('Servicio Abierto'):
            console.log('Se selecciono el servicio abierto...');
            $("#services_abierto").show();
            $(".services_abierto").attr('name');

            {{-- ****** INICIO Ocultos ***** --}}
            $("#services_llegadas").hide();
            $(".services_llegadas").removeAttr('name', false);
            $("#services_salidas").hide();
            $(".services_salidas").removeAttr('name', false);
            $("#services_circuito").hide();
            $(".services_circuito").removeAttr('name', false);
            {{-- ****** TERMINO Ocultos ***** --}}

            {{-- SE INICIA EL ENVIO DE DATOS POR AJAX --}}
                $("#btn_create").click(function(e) {
                    e.preventDefault();
                    var principal = $('#form_principal').parsley().validate();
                    var passenger = $('#form_pasajeros').parsley().validate();
                    var selected_form = $('#form_services_abierto').parsley().validate();
                    if ( $('#form_principal').parsley().isValid() && $('#form_services_abierto').parsley().isValid() &&  $('#form_pasajeros').parsley().isValid()){
                        console.log('Validacion de formularios completa...');
                        $.ajax({
                            type: "POST",
                            url: "{!! route('registers.store') !!}",
                            data: $('#form_principal, #form_services_abierto, #form_pasajeros').serialize(),
                            dataType: "json",
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            success: function(response){
                            console.log(response);
                                Swal.fire({
                                    title: "Registro creado!",
                                    text: response.data,
                                    icon: "success",
                                    timer: 3500,
                                    didDestroy: () => {
                                        window.location = '{!! route('registers.index') !!}';
                                    }
                                });
                            },
                            error: function(response){
                                var errors = response.responseJSON;
                                errorsHtml = '<ul>';
                                $.each(errors.errors,function (k,v) {
                                errorsHtml += '<li>'+ v + '</li>';
                                });
                                errorsHtml += '</ul>';
                                Swal.fire({
                                    title: "Ooops!",
                                    html: errorsHtml,
                                    icon: "error",
                                    confirmButtonText: "Volver!",
                                });
                            }
                        });
                    }
                });
            {{-- TERMINA EL ENVIO DE DATOS --}}
        break;

        case('Circuito'):
            console.log('Se selecciono el servicio circuito...');
            $("#services_circuito").show();
            $(".services_salidas").attr('name');

            {{-- ****** INICIO Ocultos ***** --}}
            $("#services_salidas").hide();
            $(".services_salidas").removeAttr('name', false);
            $("#services_llegadas").hide();
            $(".services_llegadas").removeAttr('name', false);
            $("#services_abierto").hide();
            $(".services_abierto").removeAttr('name', false);
            {{-- ****** TERMINO Ocultos ***** --}}

            {{-- SE INICIA EL ENVIO DE DATOS POR AJAX --}}
            $("#btn_create").click(function(e) {
                e.preventDefault();
                var principal = $('#form_principal').parsley().validate();
                var passenger = $('#form_pasajeros').parsley().validate();
                var selected_form = $('#form_services_circuito').parsley().validate();
                if ( $('#form_principal').parsley().isValid() && $('#form_services_circuito').parsley().isValid() &&  $('#form_pasajeros').parsley().isValid()){
                    console.log('Validacion de formularios completa...');
                    $.ajax({
                        type: "POST",
                        url: "{!! route('registers.store') !!}",
                        data: $('#form_principal, #form_services_circuito, #form_pasajeros').serialize(),
                        dataType: "json",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function(response){
                        console.log(response);
                            Swal.fire({
                                title: "Registro creado!",
                                text: response.data,
                                icon: "success",
                                timer: 3500,
                                didDestroy: () => {
                                    window.location = '{!! route('registers.index') !!}';
                                }
                            });
                        },
                        error: function(response){
                            var errors = response.responseJSON;
                            errorsHtml = '<ul>';
                            $.each(errors.errors,function (k,v) {
                            errorsHtml += '<li>'+ v + '</li>';
                            });
                            errorsHtml += '</ul>';
                            Swal.fire({
                                title: "Ooops!",
                                html: errorsHtml,
                                icon: "error",
                                confirmButtonText: "Volver!",
                            });
                        }
                    });
                }
            });
        {{-- TERMINA EL ENVIO DE DATOS --}}
        break;
        case('Transfer'):

            {{-- ****** INICIO Ocultos ***** --}}
            $("#services_circuito").hide();
            $("#services_salidas").hide();
            $("#services_llegadas").hide();
            $("#services_abierto").hide();
            {{-- ****** TERMINO Ocultos ***** --}}
        break;
        case('Tour'):

            {{-- ****** INICIO Ocultos ***** --}}
            $("#services_circuito").hide();
            $("#services_salidas").hide();
            $("#services_llegadas").hide();
            $("#services_abierto").hide();
            {{-- ****** TERMINO Ocultos ***** --}}
        break;
        case('Eventos'):

            {{-- ****** INICIO Ocultos ***** --}}
            $("#services_circuito").hide();
            $("#services_salidas").hide();
            $("#services_llegadas").hide();
            $("#services_abierto").hide();
            {{-- ****** TERMINO Ocultos ***** --}}
        break;
        case('Cortesias'):

            {{-- ****** INICIO Ocultos ***** --}}
            $("#services_circuito").hide();
            $("#services_salidas").hide();
            $("#services_llegadas").hide();
            $("#services_abierto").hide();
            {{-- ****** TERMINO Ocultos ***** --}}
        break;
        case('Balance'):

            {{-- ****** INICIO Ocultos ***** --}}
            $("#services_circuito").hide();
            $("#services_salidas").hide();
            $("#services_llegadas").hide();
            $("#services_abierto").hide();
            {{-- ****** TERMINO Ocultos ***** --}}
        break;
    }

    });

{{-- $("#form_register").submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        type: "POST",
        url: "{!! route('registers.store') !!}",
        data: formData,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function(response){
        console.log(response);
             Swal.fire({
                title: "Registro creado!",
                text: response.data,
                icon: "success",
                timer: 3500,
                didDestroy: () => {
                    window.location = '{!! route('registers.index') !!}';
                }
            });
        },
        error: function(response){
            var errors = response.responseJSON;
            errorsHtml = '<ul>';
            $.each(errors.errors,function (k,v) {
            errorsHtml += '<li>'+ v + '</li>';
            });
            errorsHtml += '</ul>';
            Swal.fire({
                title: "Ooops!",
                html: errorsHtml,
                icon: "error",
                confirmButtonText: "Volver!",
            });
        }
    });
}); --}}


});

</script>
@endpush
@endsection
