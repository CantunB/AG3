@extends('layouts.app')
@section('content')

    <!-- Start Content-->
    <div class="container-fluid">
        @component('layouts.includes.components.breadcrumb')
            @slot('title') {{ config('app.name', 'Laravel') }} @endslot
            @slot('subtitle') {{ __('translation.Settings') }} @endslot
            @slot('teme') {{ __('translation.Administrator') }} @endslot
        @endcomponent

        <div class="row">
            <div class="col-xl-12">
                <div class="card-box">
            <!--        <h4 class="header-title mb-4">{{ __('Administrator') }}</h4>  -->

                    <ul class="nav nav-pills navtab-bg nav-justified">
                        @if (Auth::user()->can('read_users'))
                        <li class="nav-item">
                            <a href="#users" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                {{ __('translation.Users') }}
                            </a>
                        </li>
                        @endif
                        @if (Auth::user()->can('read_roles'))

                        <li class="nav-item">
                            <a href="#roles" data-toggle="tab" aria-expanded="false" class="nav-link" onclick="rolesDataTables()">
                                {{ __('translation.Roles') }}
                            </a>
                        </li>
                        @endif
                        @if (Auth::user()->can('create_permissions'))

                        <li class="nav-item">
                            <a href="#permissions" data-toggle="tab" aria-expanded="false" class="nav-link" onclick="permisosDataTables()">
                                {{ __('translation.Permissions') }}
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="#information" data-toggle="tab" aria-expanded="false" class="nav-link" onclick="permisosDataTables()">
                                Información
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
                                    <p>
                                        @if (Auth::user()->can('create_users'))
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#crearUsuario">Nuevo <i class="fas fa-user-alt"></i></button>
                                        @endif
                                    </p>
                                        <table id="table_users" class="table table-sm dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('#') }}</th>
                                                    <th>{{ __('translation.Fullname') }}</th>
                                                    <th>{{ __('translation.Email') }}</th>
                                                    <th>{{ __('translation.Phone') }}</th>
                                                    <th>{{ __('translation.Options') }}</th>
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
                                            @if (Auth::user()->can('create_roles'))
                                            <p>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#crearRol">Nuevo <i class="mdi mdi-shield-lock"></i></button>
                                            </p>
                                            @endif
                                            <table id="table_roles" class="table table-sm dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('#') }}</th>
                                                        <th>{{ __('translation.Name') }}</th>
                                                        <th>{{ __('translation.Options') }}</th>
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
                                            <table id="table_permissions" class="table table-sm dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('#') }}</th>
                                                        <th>Categoria</th>
                                                        <th>{{ __('translation.Name') }}</th>
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

                        <div class="tab-pane" id="information">
                            <!-- end page title -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-header bg-info text-white text-center text-uppercase">
                                                            Entorno
                                                        </div>
                                                        <div class="card-body">
                                                            <blockquote class="card-bodyquote mb-2">
                                                                <ul class="list-group">
                                                                    <li class="list-group-item">PHP version:  {{$environment['php']}} </li>
                                                                    <li class="list-group-item">Laravel version: {{$environment['version']}} </li>
                                                                    <li class="list-group-item">Server:</li>
                                                                    <li class="list-group-item">Cache driver: {{$environment['cache']}}</li>
                                                                    <li class="list-group-item">Session driver: {{$environment['session']}}</li>
                                                                    <li class="list-group-item">Timezone:  {{$environment['time']}}</li>
                                                                    <li class="list-group-item">Locale:  {{$environment['lang']}}</li>
                                                                </ul>
                                                                {{-- <footer>Someone famous in <cite title="Source Title">Source Title</cite>
                                                                </footer> --}}
                                                            </blockquote>
                                                        </div>
                                                    </div> <!-- end card-box-->
                                                </div> <!-- end col -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div> <!-- end card-box-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- container -->
    @include('settings.components.mcu')
    @include('settings.components.mcr')
    @include('settings.roles.modal_show')
@push('scripts')
    <script>
        $('#form_mcu').parsley();
    </script>
    <script>
        $('#crearUsuario').on('hidden.bs.modal', function (e) {
            $(this)
            .find("input,textarea,select")
                .val('')
                .end()
            .find("input[type=checkbox], input[type=radio]")
                .prop("checked", "")
                .end();
            $('#form_mcu').parsley().reset();
            $("#errors-alert").hide();
        })
    </script>
<script>
    $('.dropify').dropify({
    messages: {
        'default': 'Arrastre y suelte un archivo aquí o haga clic',
        'replace': 'Arrastra y suelta o haz clic para reemplazar',
        'remove':  'Eliminar',
        'error':   'Vaya, sucedió algo mal.'
    }
});
</script>
<script>

    $(document).ready(function(){
        $('#table_users').DataTable({
                processing: true,
                serverSide: true,
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
                /*   {
                        extend: 'collection',
                        text: 'Export',
                        buttons: ['excel', 'pdf',  ],
                    }, */
                select: true,
                ajax: '{!! route('users.index') !!}',
                columns: [
                    {data: 'DT_RowIndex', name:'DT_RowIndex' ,className: 'text-center ', orderable:'false', searchable: 'false'},
                    {data: 'name', name:'name' },
                    {data: 'email', name:'email',orderable: false },
                    {data: 'phone', name:'phone', orderable: false },
                    {data: 'options', name:'options',className: 'text-center' ,searchable: false, orderable: false},
            ],
        });
    });
</script>
<script>
    function rolesDataTables() {
        if(!$.fn.dataTable.isDataTable('#table_roles')){
        table = $('#table_roles').DataTable({
            processing: true,
            serverSide: true,
            language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
            ajax: "{!! route('roles.index') !!}",
            columns: [
                {data: 'DT_RowIndex', width: '10px', orderable:'false', searchable: 'false'},
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
    function btnRolInfo(id){
        $('#modal_roles_permissions').on('show.bs.modal', function (e) {
            $.ajax({
                type: "GET",
                url: "roles/"+id,
                data: {
                    '_token': '{{csrf_token()}}',
                    "id" :id
                },
                dataType: "json",
                processData: false,
                contentType: false,
                success: function(response){
                    console.log(response);
                    var category = response.category;
                    var permisos = response.permisos;
                    $.each(category, function(i, cat) {
                        var tr_cat ="<tr><td>"+ category[i].category +" </td></tr>";
                            $(tr_cat).appendTo('#table_rolesinfo');
                    });
                },
            });
        });
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
                ajax: "{!! route('permissions.index') !!}",
                columns: [
                    {data: 'DT_RowIndex', name:'DT_RowIndex' , width: '10px'},
                    {data: 'category', name: 'category', width: '110px'},
                    {data: 'name', name: 'name', width: '110px'},

                    //{data: 'rol', name: 'rol', className: 'text-center', width: '110px',searchable: false, orderable: false},
                    //{data: 'options', name: 'options', className: 'text-center',width: '110px', searchable: false, orderable: false},
                    ],
            });
        }
    }
</script>
<script>
        $('#form_mcr').on('submit', function(e){
            e.preventDefault();
            var form = new FormData($('#form_mcr')[0]);
            $.ajax({
                type: "POST",
                //url: "Empresas/",
                url: '{{ route('roles.store') }}',
                //data: $('#form_mcu').serialize(),
                data: form,
                dataType: "json",
                processData: false,
                contentType: false,
                success: function(response){
                    Swal.fire({
                        title: "Hecho!",
                        html: response.message,
                        icon: "success",
                        timer: 5000
                    });
                    $('#table_roles').DataTable().ajax.reload();
                    $('#form_mcr')[0].reset();
                    $('#crearRol').modal('toggle');

                },
                error: function(data){
                var errors = data.responseJSON;
                    errorsHtml = '<ul>';
                $.each(errors.errors,function (k,v) {
                        errorsHtml += '<li>'+ v + '</li>';
                });
                errorsHtml += '</ul>';
                    Swal.fire({
                        title: "Ooops!",
                        html: errorsHtml,
                        icon: "error"
                    });
                }
            });
        });
</script>
<script>
        $('#form_mcu').on('submit', function(e){
            e.preventDefault();
            var form = new FormData($('#form_mcu')[0]);
            $.ajax({
                type: "POST",
                //url: "Empresas/",
                url: '{{ route('users.store') }}',
                //data: $('#form_mcu').serialize(),
                data: form,
                dataType: "json",
                processData: false,
                contentType: false,
                success: function(response){
                    Swal.fire({
                        title: "Hecho!",
                        html: response.message,
                        icon: "success",
                        timer: 5000
                    });
                    $('#table_users').DataTable().ajax.reload();
                    $('#form_mcu')[0].reset();
                    $('#crearUsuario').modal('toggle');

                },
                error: function(data){
                var errors = data.responseJSON;
                    errorsHtml = '<ul>';
                $.each(errors.errors,function (k,v) {
                        errorsHtml += '<li>'+ v + '</li>';
                });
                errorsHtml += '</ul>';
                    Swal.fire({
                        title: "Ooops!",
                        html: errorsHtml,
                        icon: "error"
                    });
                }
            });
        });
</script>
<script>
    /** DESTROY UNIT*/
    function btnDeleteUser(id) {
        Swal.fire({
            title: "Desea eliminar?",
            text: "Por favor asegúrese y luego confirme!",
            icon: 'warning',
            showCancelButton: !0,
            confirmButtonText: "¡Sí, borrar!",
            cancelButtonText: "¡No, cancelar!",
            reverseButtons: !0
        }).then(function (e) {
            if (e.value === true) {
                $.ajax({
                    type: 'DELETE',
                    url: "{{url('/users')}}/" + id,
                    {{-- url: '{!! route("users.destroy", 'id' ) !!}', --}}
                    data: {
                        id: id,
                        _token: '{!! csrf_token() !!}'
                    },
                    dataType: 'JSON',
                    success: function (results) {
                        if (results.success === true) {
                            Swal.fire({
                                title: "Hecho!",
                                text: results.message,
                                icon: "success",
                                confirmButtonText: "Hecho!",
                            });
                            $('#table_users').DataTable().ajax.reload();
                        } else {
                            Swal.fire({
                                title: "Error!",
                                text: results.message,
                                icon: "error",
                                confirmButtonText: "Cancelar!",
                            });
                        }
                    }
                });
            } else {
                e.dismiss;
            }
        }, function (dismiss) {
            return false;
        })
    }
    /** DESTROY UNIT*/
</script>
<script>
    /** DESTROY UNIT*/
    function btnDeleteRol(id) {
        Swal.fire({
            title: "Desea eliminar?",
            text: "Por favor asegúrese y luego confirme!",
            icon: 'warning',
            showCancelButton: !0,
            confirmButtonText: "¡Sí, borrar!",
            cancelButtonText: "¡No, cancelar!",
            reverseButtons: !0
        }).then(function (e) {
            if (e.value === true) {
                $.ajax({
                    type: 'DELETE',
                    url: "{{url('/roles')}}/" + id,
                    data: {
                        id: id,
                        _token: '{!! csrf_token() !!}'
                    },
                    dataType: 'JSON',
                    success: function (results) {
                        if (results.success === true) {
                            Swal.fire({
                                title: "Hecho!",
                                text: results.message,
                                icon: "success",
                                confirmButtonText: "Hecho!",
                            });
                            $('#table_roles').DataTable().ajax.reload();
                        } else {
                            Swal.fire({
                                title: "Error!",
                                text: results.message,
                                icon: "error",
                                confirmButtonText: "Cancelar!",
                            });
                        }
                    }
                });
            } else {
                e.dismiss;
            }
        }, function (dismiss) {
            return false;
        })
    }
    /** DESTROY UNIT*/
</script>

<script>
    function btnRestore(id) {
        Swal.fire({
            title: "Desea restaurar el usuario?",
            text: "Por favor asegúrese y luego confirme!",
            icon: 'question',
            showCancelButton: !0,
            confirmButtonText: "¡Sí, restaurar!",
            cancelButtonText: "¡No, cancelar!",
            reverseButtons: !0
        }).then(function (e) {
            if (e.value === true) {
                $.ajax({
                    type: 'POST',
                    url: "{{url('/restore/users')}}/" + id,
                    data: {
                        id: id,
                        _token: '{!! csrf_token() !!}'
                    },
                    dataType: 'JSON',
                    success: function (results) {
                        if (results.success === true) {
                            Swal.fire({
                                title: "Hecho!",
                                text: results.message,
                                icon: "success",
                                confirmButtonText: "Hecho!",
                            });
                            {{-- location.reload(); --}}
                            //$('#table-sympathizers').DataTable().ajax.reload();
                            $('#table_users').DataTable().ajax.reload();

                        } else {
                            Swal.fire({
                                title: "Error!",
                                text: results.message,
                                icon: "error",
                                confirmButtonText: "Cancelar!",
                            });
                        }
                    }
                });
            } else {
                e.dismiss;
            }
        }, function (dismiss) {
            return false;
        })
        }
</script>
@endpush
@endsection
