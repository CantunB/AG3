@extends('layouts.app')
@section('content')
<style>
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
        <div class="col-4">
            <div class="card">
                <div class="card-body">
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
@endpush
@endsection
