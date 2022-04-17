@extends('layouts.app')
@section('content')
<style>

    .text-wrap{
        white-space:normal;
    }
    width-100{
        width:100px;
    }
    .width-200{
        width:200px;
    }
</style>
<div class="container-fluid">
    @component('layouts.includes.components.breadcrumb')
        @slot('title') {{ config('app.name', 'Laravel') }} @endslot
        @slot('subtitle') Operations @endslot
        @slot('teme') {{ __('translation.List') }} @endslot
    @endcomponent
<div class="row">
    <div class="col-12">
        <div class="card">
                <div class="card-body">
                    @include('commons.searcher')
                    <div class="table-responsive">
                        <table id="table_registers" class="table table-sm table-centered border table-striped dt-responsive nowrap w-100 dataTable no-footer dtr-inline">
                            <thead class="text-center">
                                <tr>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Servicio</th>
                                    <th>Origen</th>
                                    <th>Destino</th>
                                    <th>Pasajero</th>
                                    <th>Pax</th>
                                    <th>Comentarios</th>
                                    <th>Agencia</th>
                                    <th>Unidad</th>
                                    <th>Status</th>
                                    <th style="width: 82px;">{{ __('translation.Options') }}</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('all_services.registers.partials.show_modal')
    @push('scripts')
        <script></script>
    @endpush
@endsection
