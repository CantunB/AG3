@extends('layouts.app')
@section('content')

    <!-- Start Content-->
    <div class="container-fluid">
        @component('layouts.includes.components.breadcrumb')
            @slot('title') {{ config('app.name', 'Laravel') }} @endslot
            @slot('subtitle') {{ __('translation.Bookings') }} @endslot
            @slot('teme') {{ __('translation.List') }} @endslot
        @endcomponent

        <!-- end page title -->

                            <div>
                                    @livewire('bookings.bookings')
                            </div>
                            {{-- <table id="table_bookings" class="table table-centered table-nowrap mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width: 20px;">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>Reserva ID</th>
                                        <th>Fecha</th>
                                        <th>Origen</th>
                                        <th>Destino</th>
                                        <th>Total</th>
                                        <th>Metodo pago</th>
                                        <th>Estatus pago</th>
                                        <th>Estatus reserva</th>
                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>

                            </table> --}}

{{-- @push('scripts')
    <script>
        $(document).ready(function(){
            $('#table_bookings').DataTable({
                    processing: true,
                    serverSide: true,
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                    },
                    ajax: '{!! route('bookings.index') !!}',
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                        {data: 'booking_id', name: 'booking_id', orderable: true, searchable: true},
                        {data: 'created_at', name: 'created_at', orderable: true, searchable: true},
                        {data: 'origin', name: 'origin', orderable: false, searchable: false},
                        {data: 'destiny', name: 'destiny', orderable: false, searchable: false},
                        {data: 'total', name: 'total', orderable: false, searchable: false},
                        {data: 'payment_method', name: 'payment_method', orderable: false, searchable: false},
                        {data: 'payment_status', name: 'payment_status', orderable: false, searchable: false},
                        {data: 'booking_status', name: 'booking_status', orderable: false, searchable: false},

                ],
            });
        });
    </script>
@endpush --}}
    @push('modals')
        <livewire:bookings.live-modal>
    @endpush
@endsection

