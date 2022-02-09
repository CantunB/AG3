@extends('layouts.app')
@section('content')
<style>
    table.dataTable tbody tr.selected {
        color: rgba(7, 14, 75, 0.856);
        background-color: #94A5EE;  /* Not working */
    }
</style>
<div class="container-fluid">
    <!-- start page title -->
    @component('layouts.includes.components.breadcrumb')
        @slot('title') {{ config('app.name', 'Laravel') }} @endslot
        @slot('subtitle') {{ __('translation.Services') }} @endslot
        @slot('teme') {{ __('translation.List') }} @endslot
    @endcomponent
    <!-- end page title -->
<div class="row">
    <div class="col-8">
        <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <div class="text-md-right">
                                <a href="{{ route('registers.create') }}" class="btn btn-danger waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-plus mr-1"></i>{{ __('translation.Add New')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="table_registers" class="table table-centered border table-striped dt-responsive nowrap w-100 dataTable no-footer dtr-inline">
                            <thead>
                                <tr>
                                    <th>{{ __('translation.Date') }}</th>
                                    <th>{{ __('translation.Service') }}</th>
                                    <th>{{ __('translation.Units') }}</th>
                                    <th>{{ __('translation.Status') }}</th>
                                    <th style="width: 82px;">{{ __('translation.Options') }}</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Seguimiento del servicio</h4>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <h5 class="mt-0">Agencia:</h5>
                                <p style="font-size:small" id="agency"></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <h5 class="mt-0">Origen:</h5>
                                <p id="origin"></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <h5 class="mt-0">Destino:</h5>
                                <p id="destiny"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <h5 class="mt-0">Pasajero:</h5>
                                <p id="pas"></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <h5 class="mt-0">Numero pasajero:</h5>
                                <p id="pas_n"></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <h5 class="mt-0">Pick Up:</h5>
                                <p id="pck"></p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <h5 class="mt-0">Observaciones:</h5>
                                <p id="obs"></p>
                            </div>
                        </div>
                    </div>

                    <div class="track-order-list">
                        <ul class="list-unstyled">
                            <li id="registro">
                                <span id="reg"></span>
                                <h5 class="mt-0 mb-1">Registro</h5>
                                <p style="text-transform:capitalize" id="date_reg" class="text-muted"></p>
                            </li>
                            <li id="asignado">
                                <span id="asi"></span>
                                <h5 class="mt-0 mb-1">Asignado</h5>
                                <p style="text-transform:capitalize" id="date_asi" class="text-muted"></p>
                            </li>
                            <li id="en_curso">
                                <span id="cur"></span>
                                <h5 class="mt-0 mb-1">En curso</h5>
                                <p class="text-muted">April 22 2019 <small class="text-muted">05:16 PM</small></p>
                            </li>
                            <li id="finalizado">
                                <span id="fin"></span>
                                <h5 class="mt-0 mb-1"> Finalizado</h5>
                                <p class="text-muted">Estimated delivery within 3 days</p>
                            </li>
                        </ul>

                        <div class="text-center mt-4" id="action">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function(){
        $('#table_registers').DataTable({
                processing: true,
                serverSide: true,
                select: true,
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
                ajax: '{!! route('registers.index') !!}',
                columns: [
                    {data: 'date', name:'date' ,className: 'text-center'},
                    {data: 'service', name: 'service'},
                    {data: 'requested_unit', name:'requested_unit' ,className: 'text-center'},
                    {data: 'status', name:'status' ,className: 'text-center'},
                    {data: 'options', name:'options',className: 'text-center' ,searchable: false, orderable: false},
            ],
        });
    });
</script>
<script>
    function btnInfo(id) {
        $.ajax({
            url: 'registers/'+ id,
            data: {
                 id : id
            },
            type: "GET",
            success: function (response){
            console.log(response);
            var id = response.data['id'];
            //$("ul:not([class*='bbox'])").addClass("bbox");
            const reg = $("#reg").append("<span id=reg></span>");
            const li_reg = $("#registro").removeClass("completed");
            const li_asi = $("#asignado").removeClass("completed");
            const asi  = $("#asi").append("<span id=asi></span>");
            const li_cur = $("#en_curso").removeClass("completed");
            const cur = $("#cur").append("<span id=asi></span>");
            const li_fin = $("#finalizado").removeClass("completed");
            const fin = $("#fin").append("<span id=fin></span>");

            $("#agency").html(response.data.agency['business_name']);
            $("#origin").html(response.data['origin']);
            $("#destiny").html(response.data['destiny']);
            $("#pas").html(response.data['passenger']);
            $("#pas_n").html(response.data['passenger_number']);
            $("#pck").html(response.data['pickup']);
            $("#obs").html(response.data['observations']);

            if(response.data['is_assigned'] === null){
                li_reg;
                reg.addClass("active-dot dot" );
                li_asi;
                asi.removeClass("active-dot dot");
                li_cur;
                cur;
                li_fin;
                fin

                $("#date_reg").html(response.reg);
                $("#date_asi").html('');

                //$( "#registro").addClass("completed");
            }
            else if(response.data['is_assigned'] !== null && response.data.is_assigned['trip_status'] === null){
                li_reg.addClass("completed");
                reg.removeClass("active-dot dot");
                li_asi;
                asi.addClass("active-dot dot");
                li_cur;
                cur;
                li_fin;
                fin

                $("#date_reg").html(response.reg);
                $("#date_asi").html(response.data.is_assigned['created_at']);

            }
            }
        });
    }
</script>
@endpush
@endsection
