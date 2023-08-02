@extends('layouts.app')
@section('content')
<style>
    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color:#FFD038;
    }
    table.dataTable tbody tr.selected {
        color: rgb(252, 252, 252);
        background-color: #F0CA63;  /* Not working */
    }
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
    <!-- Start Content-->
    <div class="container-fluid">
        @component('layouts.includes.components.breadcrumb')
            @slot('title')
                {{ config('app.name', 'Laravel') }}
            @endslot
            @slot('subtitle')
                {{ __('translation.Bookings') }}
            @endslot
            @slot('teme')
                {{ __('translation.List') }}
            @endslot
        @endcomponent

        <div class="row">
            <div class="col-xl-12">
                <div class="card-box">
                    {{--  <div>
                                    @livewire('bookings.bookings')
                            </div>  --}}
                    {{--  <table id="table_bookings" class="table table-centered table-nowrap mb-0">  --}}
                    <table id="table_bookings"
                        class="table table-sm table-centered border dt-responsive nowrap w-100 no-footer dtr-inline">

                        <thead class="thead-light">
                            <tr>
                                <th style="width: 20px;">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Folio Reserva</th>
                                <th>Servicio</th>
                                <th>Metodo pago</th>
                                <th>Estatus pago</th>
                                <th>Estatus reserva</th>
                                <th>Total</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#table_bookings').DataTable({
                    processing: true,
                    serverSide: true,
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                    },
                    ajax: '{!! route('bookings.index') !!}',
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false,
                            className: 'text-wrap width-100'
                        },
                        {
                            data: 'slug',
                            name: 'slug',
                            orderable: true,
                            searchable: true,
                            className: 'text-wrap width-100'
                        },
                        {
                            data: 'type_service',
                            name: 'type_service',
                            orderable: true,
                            searchable: true,
                            className: 'text-wrap width-100'
                        },
                        {
                            data: 'payment_method',
                            name: 'payment_method',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'payment_status',
                            name: 'payment_status',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'booking_status',
                            name: 'booking_status',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'total',
                            name: 'total',
                            orderable: false,
                            searchable: false,
                            className: 'text-center'
                        },
                        {
                            data: 'options',
                            name: 'options',
                            orderable: false,
                            searchable: false
                        }
                    ],
                });
            });
        </script>
    @endpush
    {{--  @push('modals')
        <livewire:bookings.live-modal>
    @endpush  --}}
@endsection
