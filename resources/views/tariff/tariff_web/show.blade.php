@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        @component('layouts.includes.components.breadcrumb')
            @slot('title') {{ config('app.name', 'Laravel') }} @endslot
            @slot('subtitle') TARIFAS WEB AG3 @endslot
            @slot('teme') ACTUALIZAR @endslot
        @endcomponent

        <div class="row">
            <div class="col-xl-12">
                <div class="card-box">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="all">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                            <div class="card-body">
                                                <form id="form_tarifas" action="{{ route('taf_hotels.update', $zona) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <h2 class="text-center">ZONA {{ $zona }}</h2>
                                                                <div class="col-12 text-center">
                                                                    <h3>TARIFAS SUBURBAN</h3>
                                                                    <div class="row mt-3">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label>SENCILLO</label>
                                                                                <input id="subsencillo_zona" name="subsencillo_zona" type="hidden" value="{{ $tarifas_sub[0]->id_zona }}">
                                                                                <input id="subsencillo_unit" name="subsencillo_unit" type="hidden" value="{{ $tarifas_sub[0]->type_unit_id }}">
                                                                                <input id="subsencillo_trip" name="subsencillo_trip" type="hidden" value="{{ $tarifas_sub[0]->type_trip_id }}">
                                                                                <input id="subsencillo_tarifa" name="subsencillo_tarifa" type="text" class="form-control text-center" value="{{ $tarifas_sub[0]->MXN }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>REDONDO</label>
                                                                                <input id="subredondo_zona" name="subredondo_zona" type="hidden" value="{{ $tarifas_sub[1]->id_zona }}">
                                                                                <input id="subredondo_unit" name="subredondo_unit" type="hidden" value="{{ $tarifas_sub[1]->type_unit_id }}">
                                                                                <input id="subredondo_trip" name="subredondo_trip" type="hidden" value="{{ $tarifas_sub[1]->type_trip_id }}">
                                                                                <input id="subredondo_tarifa" name="subredondo_tarifa" type="text" class="form-control text-center" value="{{ $tarifas_sub[1]->MXN }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <h3>TARIFAS VAN</h3>
                                                                    <div class="row mt-3">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label>SENCILLO</label>
                                                                                <input id="vansencillo_zona" name="vansencillo_zona" type="hidden" value="{{ $tarifas_van[0]->id_zona }}">
                                                                                <input id="vansencillo_unit" name="vansencillo_unit" type="hidden" value="{{ $tarifas_van[0]->type_unit_id }}">
                                                                                <input id="vansencillo_trip" name="vansencillo_trip" type="hidden" value="{{ $tarifas_van[0]->type_trip_id }}">
                                                                                <input id="vansencillo_tarifa" name="vansencillo_tarifa" type="text" class="form-control text-center" value="{{ $tarifas_van[0]->MXN }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label >REDONDO</label>
                                                                                <input id="vanredondo_zona" name="vanredondo_zona" type="hidden" value="{{ $tarifas_van[1]->id_zona }}">
                                                                                <input id="vanredondo_unit" name="vanredondo_unit" type="hidden" value="{{ $tarifas_van[1]->type_unit_id }}">
                                                                                <input id="vanredondo_trip" name="vanredondo_trip" type="hidden" value="{{ $tarifas_van[1]->type_trip_id }}">
                                                                                <input id="vanredondo_tarifa" name="vanredondo_tarifa" type="text" class="form-control text-center" value="{{ $tarifas_van[1]->MXN }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-12 text-center">
                                                                            <button type="submit" class="btn btn-success waves-effect waves-light m-1"><i class="fe-check-circle mr-1"></i>Actualizar</button>
                                                                            <a href="javascript: history.go(-1)" class="btn btn-light waves-effect waves-light m-1" data-dismiss="modal" aria-label="Close"><i class="fe-x mr-1"></i>Cancelar</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
