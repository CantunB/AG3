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
                        <table id="table_status"  class="table table-sm table-centered table-bordered  nowrap w-100 no-footer dtr-inline">
                            <thead class="text-center">
                                <tr>
                                    <th>Origen</th>
                                    <th>Destino</th>
                                    <th>U|O</th>
                                    <th>Servicio</th>
                                    <th>Enterado</th>
                                    <th>Pendiente</th>
                                    <th >Abordo</th>
                                    <th>Pax|Mal</th>
                                    <th>Finalizado</th>
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
        <script>
            $(document).ready(function(){
                $('#table_status').DataTable({
                    processing: true,
                    serverSide: true,
                    paging: false,
                    {{-- select: true, --}}
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                    },
                    ajax: {
                        url: '{!! route('status.index') !!}',
                    },
                    columns: [
                        {data: 'origin', name:'origin',className: 'text-center text-wrap width-200' ,searchable: false, orderable: false},
                        {data: 'destiny', name:'destiny',className: 'text-center  text-wrap width-200' ,searchable: false, orderable: false},
                        {data: 'unit_operator', name:'unit_operator',className: 'text-center width-100' ,searchable: false, orderable: false},
                        {data: 'status', name:'status',className: 'text-center width-100' ,searchable: false, orderable: false},
                        {data: 'aware', name:'aware',className: 'text-center width-100' ,searchable: false, orderable: false},
                        {data: 'slope', name:'slope',className: 'text-center width-100' ,searchable: false, orderable: false},
                        {data: 'on_board', name:'on_board',className: 'text-center width-100' ,searchable: false, orderable: false},
                        {data: 'pax_bag', name:'pax_bag',className: 'text-center width-100' ,searchable: false, orderable: false},
                        {data: 'finalized', name:'finalized',className: 'text-center width-100' ,searchable: false, orderable: false},
                ],
                });
            });
        </script>
    @endpush
@endsection
