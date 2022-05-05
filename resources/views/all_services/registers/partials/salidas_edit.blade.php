<form id="form_services_salidas" method="POST" autocomplete="none">
    @csrf
    <div id="services_salidas" class="card border">
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
                                            <option  {{ $register->origin === $hotel->hotel ? 'selected' : '' }}  value="{{ $hotel->hotel }}">{{ $hotel->hotel }}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" id="zo" name="zo" value=" {{$register->zo}} ">
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
                                            <option {{ $register->airline === $airline->airline ? 'selected' : '' }} value=" {{$airline->airline}} ">{{ $airline->iata_code }} - {{ $airline->airline }}</option>
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
                        <div class="col-md-3 col-md-3">
                            <div class="form-group">
                                <label>Hora de vuelo</label>
                                <input class="form-control" id="flight_time" name="flight_time" value=" {{$register->pickup}} ">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="project-priority">{{ __('translation.Terminal') }}</label>
                                <select name="terminal" class="form-control select2 services_salidas">
                                    <option {{ $register->terminal == 1 ? 'selected' : '' }} value="1">1</option>
                                    <option {{ $register->terminal == 2 ? 'selected' : '' }} value="2">2</option>
                                    <option {{ $register->terminal == 3 ? 'selected' : '' }} value="3">3</option>
                                    <option {{ $register->terminal == 4 ? 'selected' : '' }} value="4">4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
