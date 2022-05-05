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
                                        <input type="text" class="form-control " id="date" name="date" value=" {{$register->date}} " required>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xl-4">
                                    <div class="form-group">
                                        <label for="project-priority">{{ __('translation.Type of service') }}</label>
                                        <select id="type_service" name="type_service_id" class="form-control select2 sel_sl sel_ll" required>
                                            <option value="" disabled selected>Selecciona un servicio</option>
                                            @foreach ($services as $service)
                                                <option {{$register->Type_service()->pluck('id')->contains($service->id) ? 'selected' : '' }} value="{{ $service->id }}">{{ $service->name }}</option>
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
                                            <option {{$register->Agency()->pluck('id')->contains($agency->id) ? 'selected' : '' }}  value="{{ $agency->id }}">{{ $agency->name_agency }} ( <p style="color:blue">{{ $agency->business_name}}</p> )</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
            </form>

            @switch($register->type_service_id)
                @case(1)
                    @include('all_services.registers.partials.salidas_edit')
                @break
                @case(2)
                    @include('all_services.registers.partials.llegadas_edit')

                @break
                @default

            @endswitch

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
                                                <input onkeyup="mayus(this);" autocomplete="off" class="form-control" name="passenger" id="passenger" value=" {{$register->passenger}} " required>
                                            </div>
                                        </div>
                                        <div id="div_pa_n" class="col-md-3 col-xl-2">
                                            <div class="form-group">
                                                <label for="project-priority">{{ __('translation.Passenger number') }}</label>
                                                <div class="input-group num-block num-in">
                                                    <span class="input-group-text minus dis">-</span>
                                                    <input type="text" class="form-control text-center in-num" value="{{$register->passenger_number}} "
                                                        aria-describedby="icon-passenger" required name="passenger_number" id="passenger_number" >
                                                    <span class="input-group-text plus">+</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="div_pickup" class="col-md-3 col-xl-4">
                                            <div class="form-group">
                                                <label>{{ __('translation.Pick Up') }}</label>
                                                <input type="text" class="form-control select" id="pickup" name="pickup" value="{{ $register->pickup }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-md-center">
                                        <div id="div_unit" class="col-md-3 col-xl-3">
                                            <div class="form-group">
                                                <label for="project-priority">{{ __('translation.Requested unit') }}</label>
                                                <select id="requested_unit" name="requested_unit" class="form-control select2 sel_sl sel_ll" required>
                                                    <option value="" selected disabled>Selecciona una unidad</option>
                                                    @foreach ($type_units as $tp_u)
                                                    <option {{ $register->type_unit()->pluck('id')->contains($tp_u->id) ? 'selected' : ''  }} > {{$tp_u->type_units}} </option>
                                                    @endforeach
                                                    {{-- <option data-icon="mdi mdi-car-estate" {{ $register->type_unit()->pluck('id')->contains($agency->id) ? 'selected' : ''  }} value="1">SUBURBAN</option> --}}
                                                    {{-- <option data-icon="mdi mdi-van-utility" value="2">VAN (TP)</option> --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div id="div_place" class="col-md-3 col-xl-3">
                                            <div class="form-group">
                                                <label for="project-priority">{{ __('translation.Place of service') }}</label>
                                                <input id="place_service" name="place_service" class="form-control" value=" {{$register->place_service}} " required>
                                                    {{-- <option value="" selected disabled>Selecciona un servicio</option>
                                                    <option value="Local">Local</option>
                                                    <option value="Corredor">Corredor</option>
                                                </input> --}}
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-xl-3">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="tariff">Tarifa</label>
                                                    <input type="text" id="tariff" name="tariff" class="form-control"  value=" {{$register->tariff}} "  autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-xl-3">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="tariff">Metodo de pago</label>
                                                    <select name="method_payment" class="form-control select2" autocomplete="off">
                                                        <option disabled selected value="">Selecciona un metodo de pago</option>
                                                            @foreach ($methods as $method)
                                                                <option {{ $register->payment_method()->pluck('id')->contains($method->id) ? 'selected' : ''  }} value="{{ $method->id}}" > {{$method->method}} </option>
                                                            @endforeach
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div id="div_obs" class="col-xl-12">
                                            <div class="form-group">
                                                <label>{{ __('translation.Observations') }}</label>
                                                <input type="text" class="form-control" id="observations" name="observations"  value=" {{$register->observations}} " >
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

@endpush
@endsection
