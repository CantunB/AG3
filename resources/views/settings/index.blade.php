@extends('layouts.app')
@section('content')
     <!-- Start Content-->
     <div class="container-fluid">

        @component('layouts.includes.components.breadcrumb')
            @slot('title') {{ config('app.name', 'Laravel') }} @endslot
            @slot('subtitle') {{ __('Settings') }} @endslot
            @slot('teme') {{ __('Administrator') }} @endslot
        @endcomponent

        <div class="row">
            <div class="col-xl-12">
                <div class="card-box">
            <!--        <h4 class="header-title mb-4">{{ __('Administrator') }}</h4>  -->

                    <ul class="nav nav-pills navtab-bg nav-justified">
                        <li class="nav-item">
                            <a href="#users" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                {{ __('Users') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#roles" data-toggle="tab" aria-expanded="false" class="nav-link" onclick="rolesDataTables()">
                                {{ __('Roles') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#permissions" data-toggle="tab" aria-expanded="false" class="nav-link" onclick="permisosDataTables()">
                                {{ __('Permissions') }}
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="users">
                            <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                      <!--  <h4 class="header-title">Basic Data Table</h4>-->
                                   <!--     <p class="text-muted font-13 mb-4">
                                            DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction
                                            function:
                                            <code>$().DataTable();</code>.
                                        </p>
                                    -->
                                        <table id="table_users" class="table dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('#') }}</th>
                                                    <th>{{ __('Fullname') }}</th>
                                                    <th>{{ __('Email') }}</th>
                                                    <th>{{ __('Options') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->
                        </div>

                        <div class="tab-pane" id="roles">
                        <!-- end page title -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="table_roles" class="table dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('#') }}</th>
                                                        <th>{{ __('Name') }}</th>
                                                        <th>{{ __('Options') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div> <!-- end card body-->
                                    </div> <!-- end card -->
                                </div><!-- end col-->
                            </div>
                        </div>

                        <div class="tab-pane" id="permissions">
                            <!-- end page title -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="table_permissions" class="table dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('#') }}</th>
                                                        <th>{{ __('Name') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div> <!-- end card body-->
                                    </div> <!-- end card -->
                                </div><!-- end col-->
                            </div>

                        </div>
                    </div>
                </div> <!-- end card-box-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- container -->

@push('scripts')
<script>
    $(document).ready(function(){
        $('#table_users').DataTable({
                processing: true,
                serverSide: true,
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
                ajax: '{!! route('settings.users') !!}',
                columns: [
                    {data: 'DT_RowIndex', name:'DT_RowIndex' ,className: 'text-center'},
                    {data: 'name', name:'name' },
                //    {data: 'celular', name:'celular', orderable: false },
                    {data: 'email', name:'email',orderable: false },
                //    {data: 'rol', name:'rol', orderable: false },
                    {data: 'options', name:'options',className: 'text-center' ,searchable: false, orderable: false},
            ],
        });
    });
</script>
<script>
    function rolesDataTables() {
        if(!$.fn.dataTable.isDataTable('#table_roles')){
        $('#table_roles').DataTable({
            processing: true,
            serverSide: true,
            language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
            ajax: "{!! route('settings.roles') !!}",
            columns: [
                {data: 'DT_RowIndex', name:'DT_RowIndex' , width: '10px'},
                {data: 'name', name: 'name', width: '110px'},
            //    {data: 'permissions', name: 'permissions', className: 'text-center', width: '110px',searchable: false, orderable: false},
            //    {data: 'users', name: 'users', className: 'text-center', width: '110px',searchable: false, orderable: false},
                {data: 'options', name: 'options', className: 'text-center',width: '110px', searchable: false, orderable: false},
                ],
            });
        }
    }
</script>
<script>
    function permisosDataTables() {
        if (!$.fn.dataTable.isDataTable('#table_permissions')) {
            $('#table_permissions').DataTable({
                processing: true,
                serverSide: true,
                language: {
                        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                    },
                ajax: "{!! route('settings.permissions') !!}",
                columns: [
                    {data: 'DT_RowIndex', name:'DT_RowIndex' , width: '10px'},
                    {data: 'name', name: 'name', width: '110px'},
                    //{data: 'rol', name: 'rol', className: 'text-center', width: '110px',searchable: false, orderable: false},
                    //{data: 'options', name: 'options', className: 'text-center',width: '110px', searchable: false, orderable: false},
                    ],
            });
        }
    }
    </script>
@endpush
@endsection
