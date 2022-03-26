<div>
    <div class="modal {{$showModal}}" id="custom-modal" tabindex="-1" role="dialog" aria-modal="true" >
        <div class="modal-dialog  modal-lg">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content text-center">
                <div class="modal-header d-flex justify-content-center">
                <h4 class="heading"> {{$slug}} </h4>
                    <button wire:click="closeModal" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="header-title text-uppercase font-weight-semibold mr-2 mb-4"> {{$fullname}} </h2>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-4 text-left">
                                                <h5 class="font-weight-semibold mr-2 mt-0">Cliente:</h5>
                                                {{-- <p>#VL2537</p> --}}
                                                <p class="mb-2"><span class="font-weight-semibold mr-2">Correo:</span> {{$email}} </p>
                                                <p class="mb-2"><span class="font-weight-semibold mr-2">Telefono:</span> {{$phone}} </p>
                                                <p class="mb-2"><span class="font-weight-semibold mr-2">Ciudad:</span> {{$country}} </p>
                                                <p class="mb-2"><span class="font-weight-semibold mr-2">Estado:</span> {{$state}} </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-4  text-left">
                                                <h5 class="font-weight-semibold mr-2 mt-0">Reserva:</h5>
                                                <p class="mb-2"><span class="font-weight-semibold mr-2">Tipo/reserva:</span> {{$type_service}} </p>
                                                <p class="mb-2"><span class="font-weight-semibold mr-2">Origen:</span> {{$origin}} </p>
                                                <p class="mb-2"><span class="font-weight-semibold mr-2">Destino:</span> {{$destiny}} </p>
                                                <p class="mb-2"><span class="font-weight-semibold mr-2">Pasajeros:</span> {{$passengers}} </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        @if ($type_service === 'Aeropuerto a Hotel')
                                            <div class="col-lg-12 border border-primary rounded">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="header-title mb-3">Informacion de reservas</h4>
                                                        <h5 class="font-family-primary font-weight-semibold">Servicio de llegada</h5>
                                                        <p class="mb-2"><span class="font-weight-semibold mr-2">Aerolinea:</span> {{$airline_arrival}} </p>
                                                        <p class="mb-2"><span class="font-weight-semibold mr-2">Numero de vuelo:</span> {{$flight_number_arrival}} </p>
                                                        <p class="mb-0"><span class="font-weight-semibold mr-2">Fecha:</span>{{$date_arrival}} <span class="font-weight-semibold mr-2"> Hora:</span>{{$time_arrival}} </p>
                                                        <p class="mb-2"><span class="font-weight-semibold mr-2">Comentarios:</span> {{$comments_arrival}} </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif ($type_service === 'Hotel a Aeropuerto')
                                            <div class="col-lg-12 border border-primary rounded">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="header-title mb-3">Informacion de reservas</h4>
                                                        <h5 class="font-family-primary font-weight-semibold">Servicio de salidas</h5>
                                                        <p class="mb-2"><span class="font-weight-semibold mr-2">Aerolinea:</span> {{$airline_departure}} </p>
                                                        <p class="mb-2"><span class="font-weight-semibold mr-2">Numero de vuelo:</span> {{$flight_number_departure}} </p>
                                                        <p class="mb-0"><span class="font-weight-semibold mr-2">Fecha:</span>{{$date_departure}} <span class="font-weight-semibold mr-2"> Hora:</span>{{$time_departure}} </p>
                                                        <p class="mb-2"><span class="font-weight-semibold mr-2">Comentarios:</span> {{$comments_departure}} </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif ($type_service === 'Aeropuerto a Hotel a Aeropuerto')
                                            <div class="col-lg-6 text-left border border-primary rounded">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="header-title mb-3">Informacion de reserva</h4>
                                                        <h5 class="font-family-primary font-weight-semibold">Servicio de llegada</h5>
                                                        <p class="mb-2"><span class="font-weight-semibold mr-2">Aerolinea:</span> {{$airline_arrival}} </p>
                                                        <p class="mb-2"><span class="font-weight-semibold mr-2">Numero de vuelo:</span> {{$flight_number_arrival}} </p>
                                                        <p class="mb-0"><span class="font-weight-semibold mr-2">Fecha:</span>{{$date_arrival}} <span class="font-weight-semibold mr-2"> Hora:</span>{{$time_arrival}} </p>
                                                        <p class="mb-2"><span class="font-weight-semibold mr-2">Comentarios:</span> {{$comments_arrival}} </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 text-left border border-primary rounded">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="header-title mb-3">Informacion de reserva</h4>
                                                        <h5 class="font-family-primary font-weight-semibold">Servicio de salida</h5>
                                                        <p class="mb-2"><span class="font-weight-semibold mr-2">Aerolinea:</span> {{$airline_departure}} </p>
                                                        <p class="mb-2"><span class="font-weight-semibold mr-2">Numero de vuelo:</span> {{$flight_number_departure}} </p>
                                                        <p class="mb-0"><span class="font-weight-semibold mr-2">Fecha:</span>{{$date_departure}} <span class="font-weight-semibold mr-2"> Hora:</span>{{$time_departure}} </p>
                                                        <p class="mb-2"><span class="font-weight-semibold mr-2">Comentarios:</span> {{$comments_departure}} </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    {{-- <div class="track-order-list">
                                        <div class="text-center mt-4">
                                            <a href="#" class="btn btn-primary">Show Details</a>
                                        </div>
                                    </div> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <div class="text-right">
                        <button wire:click="closeModal" type="button" class="btn btn-info waves-effect waves-light" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
