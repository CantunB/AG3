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
<div class="container-fluid">
    <!-- start page title -->
    @component('layouts.includes.components.breadcrumb')
        @slot('title') {{ config('app.name', 'Laravel') }} @endslot
        @slot('subtitle') {{ __('translation.Services') }} @endslot
        @slot('teme') {{ __('translation.List') }} @endslot
    @endcomponent
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card-box">
        <!--        <h4 class="header-title mb-4">{{ __('Administrator') }}</h4>  -->

                <ul class="nav nav-pills navtab-bg nav-justified">
                    <li class="nav-item">
                        <a href="#all" data-toggle="tab" aria-expanded="true" class="nav-link active">
                            TODOS
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#roles" data-toggle="tab" aria-expanded="false" class="nav-link" onclick="subsDataTables()">
                            SUBURBAN
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#permissions" data-toggle="tab" aria-expanded="false" class="nav-link" onclick="vansDataTables()">
                            VAN
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="all">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                        <div class="card-body">
                                            {{-- <div class="row mb-2">
                                                <div class="col-md-12">
                                                    <div class="text-md-right">
                                                        <a href="{{ route('registers.create') }}" class="btn btn-danger waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-plus mr-1"></i>{{ __('translation.Add New')}}</a>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="table-responsive">
                                                <table id="table_reg"  class="table table-sm table-centered border dt-responsive nowrap w-100 dataTable no-footer dtr-inline">
                                                    <thead>
                                                        <tr>
                                                            <th>Hora</th>
                                                            <th>Servicio</th>
                                                            <th>Origen</th>
                                                            <th>Destino</th>
                                                            <th>Comentarios</th>
                                                            <th>Unidad Solicitada</th>
                                                            <th>Unidad</th>
                                                            <th>Operador</th>
                                                            <th>Opciones</th>
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

                    <div class="tab-pane" id="roles">
                    <!-- end page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="table_subs"  class="table table-sm table-centered border dt-responsive nowrap w-100 dataTable no-footer dtr-inline">
                                            <thead>
                                                <tr>
                                                    <th>Hora</th>
                                                    <th>Servicio</th>
                                                    <th>Origen</th>
                                                    <th>Destino</th>
                                                    <th>Comentarios</th>
                                                    <th>Unidad Solicitada</th>
                                                    <th>Unidad</th>
                                                    <th>Operador</th>
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
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
                                        <table id="table_vans"  class="table table-sm table-centered border dt-responsive nowrap w-100 dataTable no-footer dtr-inline">
                                            <thead>
                                                <tr>
                                                    <th>Hora</th>
                                                    <th>Servicio</th>
                                                    <th>Origen</th>
                                                    <th>Destino</th>
                                                    <th>Comentarios</th>
                                                    <th>Unidad Solicitada</th>
                                                    <th>Unidad</th>
                                                    <th>Operador</th>
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
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

</div>

@push('scripts')
<script>
    $(document).ready(function(){

        var table = $('#table_reg').DataTable({
                processing: true,
                serverSide: true,
                paging: false,
                {{--  select: true,  --}}
                drawCallback: function() {
                    $('.select2').select2();
                },
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
                ajax: '{!! route('assign.index') !!}',
                columns: [
                    {data:'hora', name: 'hora', orderable:false},
                    {data: 'service', name: 'service', className: 'text-wrap width-100', orderable: false},
                    {data: 'origin', name: 'origin', className: 'text-wrap width-100', orderable: false},
                    {data: 'destiny', name: 'destiny', className: 'text-wrap width-100', orderable: false},
                    {data: 'observations', name: 'observations', className: 'text-wrap width-100', orderable: false},
                    {data: 'requested_unit', name: 'requested_unit', className: 'text-wrap width-100', orderable: false},
                    {data: 'unit', name: 'unit', className:  'text-wrap width-100', orderable: false},
                    {data: 'operators', name: 'operators', className:'text-wrap width-100', orderable: false},
                    {data: 'options', name: 'options', className:'text-wrap width-100', orderable: false},
            ],
        });
        var data = table.row( $(this).parents('tr') ).data();

        $('#table_reg tbody').on( 'click', '.btnassign', function () {
            var data = table.row( $(this).parents('tr') ).data();
            $('#id_operator'+data.id).prop("disabled", false);
                $('#id_unit'+data.id).prop("disabled", false);
                $('#btnsuccess'+data.id).show();
                $('#btncancel'+data.id).show();
            {{--  console.log(data);  --}}
            {{-- if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
                $('#id_operator'+data.id).prop("disabled", false);
                $('#id_unit'+data.id).prop("disabled", false);
                $('#btnsuccess'+data.id).show();
                $('#btncancel'+data.id).show();
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
                $('#id_operator'+data.id).prop("disabled", true);
                $('#id_unit'+data.id).prop("disabled", true);
                $('#btnsuccess'+data.id).hide();
                $('#btncancel'+data.id).hide();
            } --}}
        });
        $('#table_reg tbody').on( 'click', '.btncancel', function (){
            var data = table.row( $(this).parents('tr') ).data();
            $('#id_operator'+data.id).prop("disabled", true);
            $('#id_unit'+data.id).prop("disabled", true);
            $('#btnsuccess'+data.id).hide();
            $('#btncancel'+data.id).hide();
        });
        {{-- $('#table_reg tbody').on( 'click', '.btncancel_update', function (){
            var data = table.row( $(this).parents('tr') ).data();
            $('#id_operator'+data.id).prop("disabled", true);
            $('#id_unit'+data.id).prop("disabled", true);
            $('#btnsuccess_up'+data.id).hide();
            $('#btncancel_up'+data.id).hide();
        }); --}}
        $('#table_reg tbody').on( 'click', '.btnsuccess', function (){
            var data = table.row( $(this).parents('tr') ).data();
            console.log('Se enviara la asignacion...');
            $.ajax({
                type: 'POST',
                url: '{{ route('assign.store') }}',
                data:
                $.param({
                    id_register : data.id,
                    id_unit:  $('#id_unit'+data.id).val(),
                    id_operator: $('#id_operator'+data.id).val(),
                }),
                dataType: "json",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function(response){
                    console.log(response);
                    toastr.success("Servicio asignado correctamente!");
                    $('#table_reg').DataTable().ajax.reload();

                    {{--  Swal.fire({
                        title: "Registro creado!",
                        text: response.data,
                        icon: "success",
                        timer: 3500,
                        didDestroy: () => {
                            window.location = '{!! route('registers.index') !!}';
                        }
                    });  --}}
                },
                error: function(response){
                    var errors = response.responseJSON;
                    errorsHtml = '<ul>';
                    $.each(errors.errors,function (k,v) {
                    errorsHtml += '<li>'+ v + '</li>';
                    });
                    errorsHtml += '</ul>';
                    Swal.fire({
                        title: "Ooops!",
                        html: errorsHtml,
                        icon: "error",
                        confirmButtonText: "Volver!",
                    });
                }
            });
        });
        $('#table_reg tbody').on( 'click', '.btnassign_update', function (){
            var data = table.row( $(this).parents('tr') ).data();
            $('#id_operator'+data.id).prop("disabled", false);
            $('#id_unit'+data.id).prop("disabled", false);
            $('#btnsuccess_up'+data.id).show();
            $('#btncancel_up'+data.id).show();
        });
        $('#table_reg tbody').on( 'click', '.btnsuccess_update', function (){
            var data = table.row( $(this).parents('tr') ).data();
            console.log('Se actualizara la asignacion...');
            $.ajax({
                type: 'PUT',
                url: "assign/"+data.id,
                data:
                $.param({
                    id_register : data.id,
                    id_unit:  $('#id_unit'+data.id).val(),
                    id_operator: $('#id_operator'+data.id).val(),
                }),
                dataType: "json",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function(response){
                    console.log(response);
                    toastr.success("Servicio actualizado correctamente!");
                    $('#table_reg').DataTable().ajax.reload();
                },
                error: function(response){
                    var errors = response.responseJSON;
                    errorsHtml = '<ul>';
                    $.each(errors.errors,function (k,v) {
                    errorsHtml += '<li>'+ v + '</li>';
                    });
                    errorsHtml += '</ul>';
                    Swal.fire({
                        title: "Ooops!",
                        html: errorsHtml,
                        icon: "error",
                        confirmButtonText: "Volver!",
                    });
                }
            });
        });
    });
</script>
<script>
    function subsDataTables() {
        if(!$.fn.dataTable.isDataTable('#table_subs')){
        var table = $('#table_subs').DataTable({
            processing: true,
            serverSide: true,
            paging: false,
            {{--  select: true,  --}}
            drawCallback: function() {
                $('.select2').select2();
            },
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            },
            ajax: '{!! route('assign.subs') !!}',
            columns: [
                {data:'hora', name: 'hora', orderable:false},
                {data: 'service', name: 'service', className: 'text-wrap width-100', orderable: false},
                {data: 'origin', name: 'origin', className: 'text-wrap width-100', orderable: false},
                {data: 'destiny', name: 'destiny', className: 'text-wrap width-100', orderable: false},
                {data: 'observations', name: 'observations', className: 'text-wrap width-100', orderable: false},
                {data: 'requested_unit', name: 'requested_unit', className: 'text-wrap width-100', orderable: false},
                {data: 'unit', name: 'unit', className:  'text-wrap width-100', orderable: false},
                {data: 'operators', name: 'operators', className:'text-wrap width-100', orderable: false},
                {data: 'options', name: 'options', className:'text-wrap width-100', orderable: false},
        ],
            });

            var data = table.row( $(this).parents('tr') ).data();

            $('#table_subs tbody').on( 'click', '.btnassign', function () {
                var data = table.row( $(this).parents('tr') ).data();
                $('#id_operator'+data.id).prop("disabled", false);
                    $('#id_unit'+data.id).prop("disabled", false);
                    $('#btnsuccess'+data.id).show();
                    $('#btncancel'+data.id).show();
                {{--  console.log(data);  --}}
                {{-- if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                    $('#id_operator'+data.id).prop("disabled", false);
                    $('#id_unit'+data.id).prop("disabled", false);
                    $('#btnsuccess'+data.id).show();
                    $('#btncancel'+data.id).show();
                }
                else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                    $('#id_operator'+data.id).prop("disabled", true);
                    $('#id_unit'+data.id).prop("disabled", true);
                    $('#btnsuccess'+data.id).hide();
                    $('#btncancel'+data.id).hide();
                } --}}
            });
            $('#table_subs tbody').on( 'click', '.btncancel', function (){
                var data = table.row( $(this).parents('tr') ).data();
                $('#id_operator'+data.id).prop("disabled", true);
                $('#id_unit'+data.id).prop("disabled", true);
                $('#btnsuccess'+data.id).hide();
                $('#btncancel'+data.id).hide();
            });
            $('#table_subs tbody').on( 'click', '.btncancel_update', function (){
                var data = table.row( $(this).parents('tr') ).data();
                $('#id_operator'+data.id).prop("disabled", true);
                $('#id_unit'+data.id).prop("disabled", true);
                $('#btnsuccess_up'+data.id).hide();
                $('#btncancel_up'+data.id).hide();
            });
            $('#table_subs tbody').on( 'click', '.btnsuccess', function (){
                var data = table.row( $(this).parents('tr') ).data();
                console.log('Se enviara la asignacion...');
                $.ajax({
                    type: 'POST',
                    url: '{{ route('assign.store') }}',
                    data:
                    $.param({
                        id_register : data.id,
                        id_unit:  $('#id_unit'+data.id).val(),
                        id_operator: $('#id_operator'+data.id).val(),
                    }),
                    dataType: "json",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function(response){
                        console.log(response);
                        toastr.success("Servicio asignado correctamente!");
                        $('#table_subs').DataTable().ajax.reload();

                        {{--  Swal.fire({
                            title: "Registro creado!",
                            text: response.data,
                            icon: "success",
                            timer: 3500,
                            didDestroy: () => {
                                window.location = '{!! route('registers.index') !!}';
                            }
                        });  --}}
                    },
                    error: function(response){
                        var errors = response.responseJSON;
                        errorsHtml = '<ul>';
                        $.each(errors.errors,function (k,v) {
                        errorsHtml += '<li>'+ v + '</li>';
                        });
                        errorsHtml += '</ul>';
                        Swal.fire({
                            title: "Ooops!",
                            html: errorsHtml,
                            icon: "error",
                            confirmButtonText: "Volver!",
                        });
                    }
                });
            });
            $('#table_subs tbody').on( 'click', '.btnassign_update', function (){
                var data = table.row( $(this).parents('tr') ).data();
                $('#id_operator'+data.id).prop("disabled", false);
                $('#id_unit'+data.id).prop("disabled", false);
                $('#btnsuccess_up'+data.id).show();
                $('#btncancel_up'+data.id).show();
            });
            $('#table_subs tbody').on( 'click', '.btnsuccess_update', function (){
                var data = table.row( $(this).parents('tr') ).data();
                console.log('Se actualizara la asignacion...');
                $.ajax({
                    type: 'PUT',
                    url: "assign/"+data.id,
                    data:
                    $.param({
                        id_register : data.id,
                        id_unit:  $('#id_unit'+data.id).val(),
                        id_operator: $('#id_operator'+data.id).val(),
                    }),
                    dataType: "json",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function(response){
                        console.log(response);
                        toastr.success("Servicio actualizado correctamente!");
                        $('#table_subs').DataTable().ajax.reload();
                    },
                    error: function(response){
                        var errors = response.responseJSON;
                        errorsHtml = '<ul>';
                        $.each(errors.errors,function (k,v) {
                        errorsHtml += '<li>'+ v + '</li>';
                        });
                        errorsHtml += '</ul>';
                        Swal.fire({
                            title: "Ooops!",
                            html: errorsHtml,
                            icon: "error",
                            confirmButtonText: "Volver!",
                        });
                    }
                });
            });

        }
    }
</script>
<script>
    function vansDataTables() {
        if(!$.fn.dataTable.isDataTable('#table_vans')){
        var table = $('#table_vans').DataTable({
            processing: true,
                serverSide: true,
                paging: false,
                {{--  select: true,  --}}
                drawCallback: function() {
                    $('.select2').select2();
                },
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
                ajax: '{!! route('assign.vans') !!}',
                columns: [
                    {data:'hora', name: 'hora', orderable:false},
                    {data: 'service', name: 'service', className: 'text-wrap width-100', orderable: false},
                    {data: 'origin', name: 'origin', className: 'text-wrap width-100', orderable: false},
                    {data: 'destiny', name: 'destiny', className: 'text-wrap width-100', orderable: false},
                    {data: 'observations', name: 'observations', className: 'text-wrap width-100', orderable: false},
                    {data: 'requested_unit', name: 'requested_unit', className: 'text-wrap width-100', orderable: false},
                    {data: 'unit', name: 'unit', className:  'text-wrap width-100', orderable: false},
                    {data: 'operators', name: 'operators', className:'text-wrap width-100', orderable: false},
                    {data: 'options', name: 'options', className:'text-wrap width-100', orderable: false},
            ],
            });

            var data = table.row( $(this).parents('tr') ).data();

            $('#table_vans tbody').on( 'click', '.btnassign', function () {
                var data = table.row( $(this).parents('tr') ).data();
                $('#id_operator'+data.id).prop("disabled", false);
                    $('#id_unit'+data.id).prop("disabled", false);
                    $('#btnsuccess'+data.id).show();
                    $('#btncancel'+data.id).show();
                {{--  console.log(data);  --}}
                {{-- if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                    $('#id_operator'+data.id).prop("disabled", false);
                    $('#id_unit'+data.id).prop("disabled", false);
                    $('#btnsuccess'+data.id).show();
                    $('#btncancel'+data.id).show();
                }
                else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                    $('#id_operator'+data.id).prop("disabled", true);
                    $('#id_unit'+data.id).prop("disabled", true);
                    $('#btnsuccess'+data.id).hide();
                    $('#btncancel'+data.id).hide();
                } --}}
            });
            $('#table_vans tbody').on( 'click', '.btncancel', function (){
                var data = table.row( $(this).parents('tr') ).data();
                $('#id_operator'+data.id).prop("disabled", true);
                $('#id_unit'+data.id).prop("disabled", true);
                $('#btnsuccess'+data.id).hide();
                $('#btncancel'+data.id).hide();
            });
            $('#table_vans tbody').on( 'click', '.btncancel_update', function (){
                var data = table.row( $(this).parents('tr') ).data();
                $('#id_operator'+data.id).prop("disabled", true);
                $('#id_unit'+data.id).prop("disabled", true);
                $('#btnsuccess_up'+data.id).hide();
                $('#btncancel_up'+data.id).hide();
            });
            $('#table_vans tbody').on( 'click', '.btnsuccess', function (){
                var data = table.row( $(this).parents('tr') ).data();
                console.log('Se enviara la asignacion...');
                $.ajax({
                    type: 'POST',
                    url: '{{ route('assign.store') }}',
                    data:
                    $.param({
                        id_register : data.id,
                        id_unit:  $('#id_unit'+data.id).val(),
                        id_operator: $('#id_operator'+data.id).val(),
                    }),
                    dataType: "json",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function(response){
                        console.log(response);
                        toastr.success("Servicio asignado correctamente!");
                        $('#table_vans').DataTable().ajax.reload();

                        {{--  Swal.fire({
                            title: "Registro creado!",
                            text: response.data,
                            icon: "success",
                            timer: 3500,
                            didDestroy: () => {
                                window.location = '{!! route('registers.index') !!}';
                            }
                        });  --}}
                    },
                    error: function(response){
                        var errors = response.responseJSON;
                        errorsHtml = '<ul>';
                        $.each(errors.errors,function (k,v) {
                        errorsHtml += '<li>'+ v + '</li>';
                        });
                        errorsHtml += '</ul>';
                        Swal.fire({
                            title: "Ooops!",
                            html: errorsHtml,
                            icon: "error",
                            confirmButtonText: "Volver!",
                        });
                    }
                });
            });
            $('#table_vans tbody').on( 'click', '.btnassign_update', function (){
                var data = table.row( $(this).parents('tr') ).data();
                $('#id_operator'+data.id).prop("disabled", false);
                $('#id_unit'+data.id).prop("disabled", false);
                $('#btnsuccess_up'+data.id).show();
                $('#btncancel_up'+data.id).show();
            });
            $('#table_vans tbody').on( 'click', '.btnsuccess_update', function (){
                var data = table.row( $(this).parents('tr') ).data();
                console.log('Se actualizara la asignacion...');
                $.ajax({
                    type: 'PUT',
                    url: "assign/"+data.id,
                    data:
                    $.param({
                        id_register : data.id,
                        id_unit:  $('#id_unit'+data.id).val(),
                        id_operator: $('#id_operator'+data.id).val(),
                    }),
                    dataType: "json",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function(response){
                        console.log(response);
                        toastr.success("Servicio actualizado correctamente!");
                        $('#table_vans').DataTable().ajax.reload();
                    },
                    error: function(response){
                        var errors = response.responseJSON;
                        errorsHtml = '<ul>';
                        $.each(errors.errors,function (k,v) {
                        errorsHtml += '<li>'+ v + '</li>';
                        });
                        errorsHtml += '</ul>';
                        Swal.fire({
                            title: "Ooops!",
                            html: errorsHtml,
                            icon: "error",
                            confirmButtonText: "Volver!",
                        });
                    }
                });
            });

        }
    }
</script>
    <script>
        /** DESTROY ASSIGNMENT*/
        function btncancel_up(id) {
            Swal.fire({
                title: "Desea eliminar el servicio y la asignacion?",
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
                        url: "/registers/" + id,
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
                                $('#table_registers').DataTable().ajax.reload();
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
        /** DESTROY ASSIGNMENT*/
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
            else if(response.data['is_assigned'] !== null && response.data.is_assigned['status'] === 1){
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
