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
                        <table id="table_operations"  class="table table-sm table-centered table-bordered  nowrap w-100 no-footer dtr-inline mt-2">
                            <thead class="text-center">
                                <tr>
                                    <th rowspan="2">Unidad</th>
                                    <th colspan="2">INICIO</th>
                                    <th colspan="2">TERMINO</th>
                                </tr>
                                <tr>
                                    <th>Hora inicio</th>
                                    <th>KM inicio</th>
                                    <th>Hora termino</th>
                                    <th>KM termino</th>
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
                $('#table_operations').DataTable({
                    processing: true,
                    serverSide: true,
                    paging: false,
                    {{-- select: true, --}}
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                    },
                    ajax: {
                        url: '{!! route('operations.index') !!}',
                    },
                    columns: [
                        {data: 'unit', name:'unit',className: 'text-center text-wrap width-200' ,searchable: false, orderable: false},
                        {data: 'start', name:'start',className: 'text-center text-wrap width-200' ,searchable: false, orderable: false},
                        {data: 'start_mileage', name:'start_mileage',className: 'text-center text-wrap width-200' ,searchable: false, orderable: false},
                        {data: 'finish', name:'finish',className: 'text-center text-wrap width-200' ,searchable: false, orderable: false},
                        {data: 'finish_mileage', name:'finish_mileage',className: 'text-center text-wrap width-200' ,searchable: false, orderable: false},
                    ],
                });
            });
        </script>
    @endpush
@endsection
