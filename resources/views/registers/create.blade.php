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
</style>
<div class="container-fluid">
    @component('layouts.includes.components.breadcrumb')
        @slot('title') {{ config('app.name', 'Laravel') }} @endslot
        @slot('subtitle') {{ __('translation.Services') }} @endslot
        @slot('teme') {{ __('translation.List') }} @endslot
    @endcomponent
<form id="form_register" method="POST" action="{{ route('registers.store') }}" data-parsley-validate autocomplete="none">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card border-w ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="form-group ">
                                <label>{{ __('translation.Date') }}</label>
                                <input type="text" class="form-control " id="date" name="date" placeholder="{{ date('Y-m-d') }}" required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="project-priority">{{ __('translation.Agency') }}</label>
                                <select id="agency" name="agency_id" class="form-control select2" required>
                                    <option value="" disabled selected>Selecciona una agencia</option>
                                    @foreach ($agencies as $agency)
                                        <option value="{{ $agency->id }}">{{ $agency->business_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="project-priority">{{ __('translation.Type of service') }}</label>
                                <select id="type_service" name="type_service_id" class="form-control select2" required>
                                    <option value="" disabled selected>Selecciona un servicio</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{---------------------------------------------------------------------------- */
            /* INICIO --- CARD SEERVICIO DE SALIDAS                                       */
            /* ----------------------------------------------------------------------------}}
            <div id="services_salidas" class="card border-w divOculto">
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
                                            <select id="origin" name="origin" class="form-control select2" required>
                                                <option value="" disabled selected>Selecciona un hotel</option>
                                                @foreach ($hotels as $hotel)
                                                    <option value="{{ $hotel->hotel }}">{{ $hotel->hotel }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="project-priority">Destino</label>
                                            <input  type="text" class="form-control" name="destiny" readonly="readonly" value="Aeropuerto Internacional de Cancun" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="project-priority">Aerolinea</label>
                                            <select  name="airline" class="form-control select2 airlines_departure" required>
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
                                        <input oninput="iata_code_departure()" required type="text" class="form-control " id="flight_number_departure" aria-describedby="icon-hashtag">
                                        <input  type="hidden" id="iata_airline_departure" name="flight_number">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="project-priority">{{ __('translation.Terminal') }}</label>
                                        <select id="terminal" name="terminal" class="form-control select2">
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
                                        <input id="flight_time" name="flight_time" type="text" class="form-control select" placeholder="{{ date('H:i') }}" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{---------------------------------------------------------------------------- */
            /* TERMINO --- CARD SEERVICIO DE SALIDAS                                       */
            /* ----------------------------------------------------------------------------}}

            {{---------------------------------------------------------------------------- */
            /* INICIO --- CARD SEERVICIO DE LLEGADAS                                       */
            /* ----------------------------------------------------------------------------}}
            <div id="services_llegadas" class="card border-w divOculto">
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
                                            <input  type="text" class="form-control" name="origin" readonly="readonly" value="Aeropuerto Internacional de Cancun" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="project-priority">Destino</label>
                                            <select id="destiny" name="destiny" class="form-control select2" required>
                                                <option value="" disabled selected>Selecciona un hotel</option>
                                                @foreach ($hotels as $hotel)
                                                    <option value="{{ $hotel->hotel }}">{{ $hotel->hotel }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="project-priority">Aerolinea</label>
                                            <select id="airline" name="airline" class="form-control select2 airlines_arrival" required>
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
                                        <input oninput="iata_code_arrival()" required type="text" class="form-control " id="flight_number_arrival" aria-describedby="icon-hashtag">
                                        <input  type="hidden" id="iata_airline_arrival" name="flight_number">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="project-priority">{{ __('translation.Terminal') }}</label>
                                        <select id="terminal" name="terminal" class="form-control select2">
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
                                        <input id="flight_time" name="flight_time" type="text" class="form-control select" placeholder="{{ date('H:i') }}" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             {{---------------------------------------------------------------------------- */
            /* TERMINO --- CARD SEERVICIO DE LLEGADAS                                       */
            /* ----------------------------------------------------------------------------}}

            {{---------------------------------------------------------------------------- */
            /* INICIO --- CARD SERVICIO ABIERTO                                            */
            /* ----------------------------------------------------------------------------}}
            <div id="services_abierto" class="card border-w divOculto">
                <div class="card-box mb-2">
                    <div class="card-title text-center">
                        <h3 class="card-title text-uppercase">Servicio Abierto</h3>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <div class="row justify-content-md-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="project-priority">{{ __('translation.Origin') }}</label>
                                        <input id="origin" name="origin" class="form-control" list="my_origin" required>
                                            <datalist id="my_origin">
                                                <option value="ALAYA TULUM">
                                                <option value="AEROPUERTO">
                                            </datalist>
                                    </div>
                                </div>
                                <div id="div_t" class="col-xl-2 divOculto">
                                    <div class="form-group">
                                        <label>Tiempo <em>(Horas)</em></label>
                                        <input id="time" name="time" type="text" class="form-control select" placeholder="Horas" data-parsley-type="digits" required>
                                    </div>
                                </div>
                                <div class="col-xl-4 divOculto">
                                    <div class="form-group">
                                        <label>Orden de servicio</label>
                                        <input id="service_orden" name="service_orden" type="text" class="form-control select" placeholder="Orden de servicio">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             {{---------------------------------------------------------------------------- */
            /* TERMINO --- CARD SEERVICIO ABIERTO                                           */
            /* ----------------------------------------------------------------------------}}


            {{---------------------------------------------------------------------------- */
            /* INICIO --- CARD SERVICIO CIRCUITO                                            */
            /* ----------------------------------------------------------------------------}}
            <div id="services_circuito" class="card border-w divOculto">
                <div class="card-box mb-2">
                    <div class="card-title text-center">
                        <h3 class="card-title text-uppercase">Servicio Circuito</h3>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <div class="row justify-content-md-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="project-priority">{{ __('translation.Origin') }}</label>
                                        <input id="origin" name="origin" class="form-control" list="my_origin" required>
                                            <datalist id="my_origin">
                                                <option value="ALAYA TULUM">
                                                <option value="AEROPUERTO">
                                            </datalist>
                                    </div>
                                </div>
                                <div class="col-xl-2 divOculto">
                                    <div class="form-group">
                                        <label>Duracion <em>(Dias)</em></label>
                                        <div class="input-group num-block num-in">
                                            <span class="input-group-text minus dis">-</span>
                                            <input type="text" class="form-control text-center in-num" value="1"
                                                aria-describedby="icon-passenger" required name="days" id="days" placeholder="Dias" data-parsley-type="digits" readonly="">
                                            <span class="input-group-text plus">+</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 divOculto">
                                    <div class="form-group">
                                        <label>Orden de servicio</label>
                                        <input id="service_orden" name="service_orden" type="text" class="form-control select" placeholder="Orden de servicio">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             {{---------------------------------------------------------------------------- */
            /* TERMINO --- CARD SEERVICIO CIRCUITO                                           */
            /* ----------------------------------------------------------------------------}}


            {{---------------------------------------------------------------------------- */
            /* INICIO --- CARD PASAJEROS                                       */
            /* ----------------------------------------------------------------------------}}
            <div id="card_passenger" class="card border-w" >
                <div class="card-box mb-2">
                    <div class="card-title text-center">
                        <h3 class="card-title text-uppercase">Informacion del pasajero</h3>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <div class="row">
                                <div id="div_pa" class="col-xl-6 divOculto">
                                    <div class="form-group">
                                        <label for="project-priority">Nombre completo del pasajero</label>
                                        <input  autocomplete="off" class="form-control" name="passenger" id="passenger" placeholder="Paul J. Friend" required>
                                    </div>
                                </div>
                                <div id="div_pa_n" class="col-xl-2 divOculto">
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
                                <div id="div_pickup" class="col-xl-4 divOculto">
                                    <div class="form-group">
                                        <label>{{ __('translation.Pick Up') }}</label>
                                        <input type="text" class="form-control select" id="pickup" name="pickup" placeholder="{{ date('H:i') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-md-center">
                                <div id="div_unit" class="col-xl-4 divOculto">
                                    <div class="form-group">
                                        <label for="project-priority">{{ __('translation.Requested unit') }}</label>
                                        <select id="requested_unit" name="requested_unit" class="form-control select2" required>
                                            <option value="" selected disabled>Selecciona una unidad</option>
                                            <option data-icon="mdi mdi-car-estate" value="1">SUBURBAN</option>
                                            <option data-icon="mdi mdi-van-utility" value="2">VAN (TC)</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="div_place" class="col-xl-4 divOculto">
                                    <div class="form-group">
                                        <label for="project-priority">{{ __('translation.Place of service') }}</label>
                                        <select id="place_serve" name="place_service" class="form-control select2" required>
                                            <option value="" selected disabled>Selecciona un servicio</option>
                                            <option value="Local">Local</option>
                                            <option value="Corredor">Corredor</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div id="div_obs" class="col-xl-12 divOculto">
                                    <div class="form-group">
                                        <label>{{ __('translation.Observations') }}</label>
                                        <input type="text" class="form-control" id="observations" name="observations" >
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-md-center">
                                <div class="row mt-3">
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-1"><i class="fe-check-circle mr-1"></i>{{ __('translation.Create') }}</button>
                                        <a href="javascript: history.go(-1)" class="btn btn-light waves-effect waves-light m-1"><i class="fe-x mr-1"></i>{{ __('translation.Cancel') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             {{---------------------------------------------------------------------------- */
            /* TERMINO --- CARD PASAJERO                                     */
            /* ----------------------------------------------------------------------------}}


        </div>
    </div>
</form>
</div>

<!-- end row-->
@push('scripts')
<script>
    document.getElementById("date").flatpickr({
        locale: 'es',
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
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
    $('#type_service').select2({
        }).on("change", function (e) {
            var selected = $(this).val();
            var opcion = $(this).children("option:selected").html();
        switch(opcion) {
            case('Salidas'):
                $("#services_salidas").show();

                {{-- ****** INICIO Ocultos ***** --}}
                $("#services_llegadas").hide();
                $("#services_abierto").hide();
                $("#services_circuito").hide();
                {{-- ****** TERMINO Ocultos ***** --}}
            break;

            case('Llegadas'):
                $("#services_llegadas").show();

                {{-- ****** INICIO Ocultos ***** --}}
                $("#services_salidas").hide();
                $("#services_abierto").hide();
                $("#services_circuito").hide();
                {{-- ****** TERMINO Ocultos ***** --}}
            break;

            case('Servicio Abierto'):
                $("#services_abierto").show();

                {{-- ****** INICIO Ocultos ***** --}}
                $("#services_llegadas").hide();
                $("#services_salidas").hide();
                $("#services_circuito").hide();
                {{-- ****** TERMINO Ocultos ***** --}}
            break;
            case('Circuito'):
                $("#services_circuito").show();

                {{-- ****** INICIO Ocultos ***** --}}
                $("#services_salidas").hide();
                $("#services_llegadas").hide();
                $("#services_abierto").hide();
                {{-- ****** TERMINO Ocultos ***** --}}
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
</script>
<script>
    $("#form_register").submit(function(e) {
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
               //console.log('Formulario enviado');
                Swal.fire({
                    title: "Registro creado!",
                    text: response.data,
                    icon: "success",
                    timer: 3500
                });
                window.location = '{!! route('registers.index') !!}';
            },
            error: function(response){
                //console.log(response);
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
});
</script>
@endpush
@endsection
