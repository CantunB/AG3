@extends('layouts.app')
@section('content')
<style>
    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color:#bfc8f1;
    }
    .divOculto {
        display: none;
    }
</style>
<div class="container-fluid">
    @component('layouts.includes.components.breadcrumb')
        @slot('title') {{ config('app.name', 'Laravel') }} @endslot
        @slot('subtitle') {{ __('translation.Services') }} @endslot
        @slot('teme') {{ __('translation.List') }} @endslot
    @endcomponent
<form id="form_register" method="POST" action="{{ route('registers.store') }}" data-parsley-validate>
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="form-group ">
                                <label>{{ __('translation.Date') }}</label>
                                <input type="text" class="form-control js-example-basic-single" id="date" name="date" placeholder="{{ date('Y-m-d') }}" required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="project-priority">{{ __('translation.Agency') }}</label>
                                <select id="agency" name="agency_id" class="form-control " required>
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
                                <select id="type_service" name="type_service_id" class="form-control" required>
                                    <option value="" disabled selected>Selecciona un servicio</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- <div id="div_airline" class="col-xl-4 divOculto">
                            <div class="form-group">
                                <label for="project-priority">{{ __('translation.Airlines') }}</label>
                                <div class="input-group">
                                    <input type='text'
                                    placeholder="Selecciona un destino"
                                    class='form-control flexdatalist'
                                    data-min-length='1'
                                    data-data='{!! route('origen_destiny.index') !!}'
                                    data-search-in='name'
                                    data-visible-properties='["name","category"]'
                                    data-selection-required='true' >
                                        <div class="input-group-append">
                                            <button class="btn btn-blue waves-effect waves-light" type="button"><i class="mdi mdi-plus"></i></button>
                                        </div>
                                    </div>
                            </div>
                        </div> --}}
                        {{-- <div id="div_hotel" class="col-xl-4 divOculto">
                            <div class="form-group">
                                <label for="project-priority">HOTEL</label>
                                <div class="input-group">
                                    <input type='text'
                                    placeholder="Selecciona un destino"
                                    class='form-control flexdatalist'
                                    data-min-length='1'
                                    data-data='{!! route('origen_destiny.index') !!}'
                                    data-search-in='name'
                                    data-visible-properties='["name","category"]'
                                    data-selection-required='true' id="origin">
                                        <div class="input-group-append">
                                            <button class="btn btn-blue waves-effect waves-light" type="button"><i class="mdi mdi-plus"></i></button>
                                        </div>
                                    </div>
                            </div>
                        </div> --}}
                        <div id="div_origin" class="col-xl-4 divOculto">
                            <div class="form-group">
                                <label for="project-priority">Origen</label>
                                <div class="input-group">
                                    <input type='text'
                                    placeholder="Selecciona un destino"
                                    class='form-control flexdatalist'
                                    data-min-length='1'
                                    data-data='{!! route('origen_destiny.index') !!}'
                                    data-search-in='name'
                                    data-visible-properties='["name","category"]'
                                    data-selection-required='true' id="origin" name="origin">
                                        <div class="input-group-append">
                                            <button class="btn btn-blue waves-effect waves-light" type="button"><i class="mdi mdi-plus"></i></button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div id="div_terminal" class="col-xl-2 divOculto">
                            <div class="form-group">
                                <label for="project-priority">{{ __('translation.Terminal') }}</label>
                                <select id="terminal" name="terminal" class="form-control" data-toggle="select2">
                                    <option value="" disabled selected>Selecciona una terminal</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>

                        <div id="div_fn" class="col-xl-2 divOculto">
                            <div class="form-group">
                                <label for="projectname">{{ __('translation.Flight number') }}</label>
                                <input id="flight_number"name="flight_number" type="text" class="form-control" placeholder="{{ __('Enter flight number') }}">
                            </div>
                        </div>
                        <div id="div_ft" class="col-xl-2 divOculto">
                            <div class="form-group">
                                <label>Hora de vuelo</label>
                                <input id="flight_time" name="flight_time" type="text" class="form-control select" placeholder="{{ date('H:i') }}" >
                            </div>
                        </div>
                        <div id="div_t" class="col-xl-2 divOculto">
                            <div class="form-group">
                                <label>Tiempo <em>(Horas)</em></label>
                                <input id="time" name="time" type="text" class="form-control select" placeholder="Horas" data-parsley-type="digits">
                            </div>
                        </div>
                        <div id="div_d" class="col-xl-2 divOculto">
                            <div class="form-group">
                                <label>Duracion <em>(Dias)</em></label>
                                <input id="days" name="days" type="text" class="form-control select" placeholder="Dias" data-parsley-type="digits">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{-- <div class="col-xl-4">
                            <div class="form-group">
                                <label for="project-priority">{{ __('translation.Origin') }}</label>
                                <input id="origin" name="origin" class="form-control" list="my_origin">
                                    <datalist id="my_origin">
                                        <option value="ALAYA TULUM">
                                        <option value="AEROPUERTO">
                                    </datalist>
                            </div>
                        </div> --}}
                        <div id="div_destiny" class="col-xl-4 divOculto">
                            <div class="form-group">
                                <label for="project-priority">{{ __('translation.Destiny') }}</label>
                                <div class="input-group">
                                <input type='text'
                                placeholder="Selecciona un destino"
                                class='form-control flexdatalist'
                                data-min-length='1'
                                data-data='{!! route('origen_destiny.index') !!}'
                                data-search-in='name'
                                data-visible-properties='["name","category"]'
                                data-selection-required='true' id="destiny" name='destiny'>

                                    <div class="input-group-append">
                                        <button class="btn btn-blue waves-effect waves-light" type="button"><i class="mdi mdi-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="div_pa" class="col-xl-6 divOculto">
                            <div class="form-group">
                                <label for="project-priority">{{ __('translation.Passenger') }}</label>
                                <input class="form-control" name="passenger" id="passenger">
                            </div>
                        </div>
                        <div id="div_pa_n" class="col-xl-2 divOculto">
                            <div class="form-group">
                                <label for="project-priority">{{ __('translation.Passenger number') }}</label>
                                <input type="number" class="form-control" name="passenger_number" id="passenger_number">
                            </div>
                        </div>
                        <div id="div_pickup" class="col-xl-4 divOculto">
                            <div class="form-group">
                                <label>{{ __('translation.Pick Up') }}</label>
                                <input type="text" class="form-control select" id="pickup" name="pickup" placeholder="{{ date('H:i') }}" required>
                            </div>
                        </div>
                        <div id="div_unit" class="col-xl-6 divOculto">
                            <div class="form-group">
                                <label for="project-priority">{{ __('translation.Requested unit') }}</label>
                                <select id="requested_unit" name="requested_unit" class="form-control" data-toggle="select2" required>
                                    <option value="" selected disabled>Selecciona una unidad</option>
                                    <option data-icon="mdi mdi-car-estate" value="1">Camioneta tipo Suburban</option>
                                    <option data-icon="mdi mdi-van-utility" value="2">Camioneta tipo VAN</option>
                                </select>
                            </div>
                        </div>
                        <div id="div_place" class="col-xl-4 divOculto">
                            <div class="form-group">
                                <label for="project-priority">{{ __('translation.Place of service') }}</label>
                                <select id="place_serve" name="place_service" class="form-control" data-toggle="select2" >
                                    <option value="" selected disabled>Selecciona un servicio</option>
                                    <option value="Local">Local</option>
                                    <option value="Corredor">Corredor</option>
                                </select>
                            </div>
                        </div>
                        <div id="div_obs" class="col-xl-12 divOculto">
                            <div class="form-group">
                                <label>{{ __('translation.Observations') }}</label>
                                <input type="text" class="form-control" id="observations" name="observations" >
                            </div>
                        </div>

                    </div>
                    <!-- end row -->
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
 </form>
</div>

<!-- end row-->
@push('scripts')
<script>
    document.getElementById("date").flatpickr({
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
        defaultDate: "{!! date('Y-m-d') !!}"
    });
    document.getElementById("flight_time").flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        //defaultDate: "{!!  date('H:i') !!}"
    });
    document.getElementById("pickup").flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
    });
</script>
<script>
    $(document).ready(function() {
        $("#agency").select2({
        });
    });
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
    $('.flexdatalist').flexdatalist({
        selectionRequired: true,
        minLength: 1,
        visibleProperties: ["name","category"],
        searchIn: 'name',
        data: "{!! route('origen_destiny.index') !!}"
    });
</script>
<script>
    $('#type_service').select2({
        }).on("change", function (e) {
            var selected = $(this).val();
            var opcion = $(this).children("option:selected").html();
            //console.log(opcion);
            //console.log(selected);
        /*
            if (selected == '1' || opcion == 'Salidas') { //SALIDA
                console.log('seleccionaste el servicio salida');
            }else if( selected == '2' || opcion == 'LLegadas' ){ //LLEGADA
                console.log('seleccionaste el servicio de llegada');
            }else if( selected == '3' || opcion == 'Servicio Abierto'){ //SERVICIO ABIERTO
                console.log('seleccionaste el servicio abierto');
            }else if( selected == '4' || opcion == 'Circuito' ){ //CIRCUITO
                console.log('seleccionaste el servicio de circuito');
            }else if( selected == '5' || opcion == 'Transfer' ){ //TRANSFER
                console.log('seleccionaste el servicio de transfer');
            }else if( selected == '6' || opcion == 'Tour'){ //TOUR
                console.log('seleccionaste el servicio de tour');
            }else if( selected == '7' || opcion == 'Eventos' ){ //EVENTOS
                console.log('seleccionaste el servicio de eventos');
            }else if( selected == '8' || opcion == 'Cortesias' ){ //CORTESIAS
                console.log('seleccionaste el servicio de cortesias');
            }else if( selected == '9' || opcion == 'Balance' ){ //BALANCE
                console.log('seleccionaste el servicio de balance');
            }
           */
        switch(opcion) {
            case('Salidas'):
            $('#div_origin').show();
            $('#div_terminal').show();
            $('#div_fn').show();
            $('#div_ft').show();
            $('#div_t').hide();
            $('#div_d').hide();
            $('#div_destiny').show();
            $('#div_pa').show();
            $('#div_pa_n').show();
            $('#div_pickup').show();
            $('#div_unit').show();
            $('#div_place').show();
            $('#div_obs').show();
            break;
            case('Llegadas'):
            $('#div_origin').show();
            $('#div_terminal').show();
            $('#div_fn').show();
            $('#div_ft').show();
            $('#div_t').hide();
            $('#div_d').hide();
            $('#div_destiny').show();
            $('#div_pa').show();
            $('#div_pa_n').show();
            $('#div_pickup').show();
            $('#div_unit').show();
            $('#div_place').show();
            $('#div_obs').show();
            break;
            case('Servicio Abierto'):
            $('#div_origin').show();
            $('#div_terminal').hide();
            $('#div_fn').hide();
            $('#div_ft').hide();
            $('#div_t').show();
            $('#div_d').hide();
            $('#div_destiny').hide();
            $('#div_pa').show();
            $('#div_pa_n').show();
            $('#div_pickup').show();
            $('#div_unit').show();
            $('#div_place').hide();
            $('#div_obs').show();
            break;
            case('Circuito'):
            $('#div_origin').show();
            $('#div_terminal').hide();
            $('#div_fn').hide();
            $('#div_ft').hide();
            $('#div_t').hide();
            $('#div_d').show();
            $('#div_destiny').hide();
            $('#div_pa').show();
            $('#div_pa_n').show();
            $('#div_pickup').show();
            $('#div_unit').show();
            $('#div_place').hide();
            $('#div_obs').show();
            break;
            case('Transfer'):
            $('#div_origin').show();
            $('#div_terminal').hide();
            $('#div_fn').hide();
            $('#div_ft').hide();
            $('#div_t').hide();
            $('#div_d').hide();
            $('#div_destiny').hide();
            $('#div_pa').hide();
            $('#div_pa_n').hide();
            $('#div_pickup').hide();
            $('#div_unit').hide();
            $('#div_place').hide();
            $('#div_obs').hide();
            break;
            case('Tour'):
            $('#div_origin').show();
            $('#div_terminal').hide();
            $('#div_fn').hide();
            $('#div_ft').hide();
            $('#div_t').hide();
            $('#div_d').hide();
            $('#div_destiny').hide();
            $('#div_pa').hide();
            $('#div_pa_n').hide();
            $('#div_pickup').hide();
            $('#div_unit').hide();
            $('#div_place').hide();
            $('#div_obs').hide();
            break;
            case('Eventos'):
            $('#div_origin').show();
            $('#div_terminal').hide();
            $('#div_fn').hide();
            $('#div_ft').hide();
            $('#div_t').hide();
            $('#div_d').hide();
            $('#div_destiny').hide();
            $('#div_pa').hide();
            $('#div_pa_n').hide();
            $('#div_pickup').hide();
            $('#div_unit').hide();
            $('#div_place').hide();
            $('#div_obs').hide();
            break;
            case('Cortesias'):
            $('#div_origin').show();
            $('#div_terminal').hide();
            $('#div_fn').hide();
            $('#div_ft').hide();
            $('#div_t').hide();
            $('#div_d').hide();
            $('#div_destiny').hide();
            $('#div_pa').hide();
            $('#div_pa_n').hide();
            $('#div_pickup').hide();
            $('#div_unit').hide();
            $('#div_place').hide();
            $('#div_obs').hide();
            break;case('Balance'):
            $('#div_origin').show();
            $('#div_terminal').hide();
            $('#div_fn').hide();
            $('#div_ft').hide();
            $('#div_t').hide();
            $('#div_d').hide();
            $('#div_destiny').hide();
            $('#div_pa').hide();
            $('#div_pa_n').hide();
            $('#div_pickup').hide();
            $('#div_unit').hide();
            $('#div_place').hide();
            $('#div_obs').hide();
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
