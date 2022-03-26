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
                                                    {{-- <th>Opciones</th> --}}
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
                                                    {{-- <th>Opciones</th> --}}
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
                rowCallback : function( row, data, dataIndex){
                    if(data.is_assigned){
                        if( data.is_assigned.id_unit == 1)
                            $(row).find('td:eq(6)').addClass('assign_1 text-white');
                        else if(data.is_assigned.id_unit == 2)
                            $(row).find('td:eq(6)').addClass('assign_2 text-white');
                        else if(data.is_assigned.id_unit == 3)
                            $(row).find('td:eq(6)').addClass('assign_3 text-white');
                        else if(data.is_assigned.id_unit == 4)
                            $(row).find('td:eq(6)').addClass('assign_4 text-white');
                        else if(data.is_assigned.id_unit == 5)
                            $(row).find('td:eq(6)').addClass('assign_5 text-white');
                        else if(data.is_assigned.id_unit == 6)
                            $(row).find('td:eq(6)').addClass('assign_6 text-white');
                        else if(data.is_assigned.id_unit == 7)
                            $(row).find('td:eq(6)').addClass('assign_7 text-white');
                        else if(data.is_assigned.id_unit == 8)
                            $(row).find('td:eq(6)').addClass('assign_8 text-white');
                        else if(data.is_assigned.id_unit == 9)
                            $(row).find('td:eq(6)').addClass('assign_9 text-white');
                        else if(data.is_assigned.id_unit == 10)
                            $(row).find('td:eq(6)').addClass('assign_10 text-white');
                        else if(data.is_assigned.id_unit == 11)
                            $(row).find('td:eq(6)').addClass('assign_11 text-white');
                        else if(data.is_assigned.id_unit == 12)
                            $(row).find('td:eq(6)').addClass('assign_12 text-white');
                        else if(data.is_assigned.id_unit == 13)
                            $(row).find('td:eq(6)').addClass('assign_13 text-white');
                    }
                },
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
                    {data: 'origin', name: 'origin', className: 'text-center text-wrap width-100', orderable: false},
                    {data: 'destiny', name: 'destiny', className: 'text-center text-wrap width-100', orderable: false},
                    {data: 'observations', name: 'observations', className: 'text-wrap width-100', orderable: false},
                    {data: 'requested_unit', name: 'requested_unit', className: 'text-wrap width-100', orderable: false},
                    {data: 'unit', name: 'unit', className:  'text-wrap width-100', orderable: false},
                    {data: 'operators', name: 'operators', className:'text-wrap width-100', orderable: false},
                    {data: 'options', name: 'options', className:'text-wrap', orderable: false},
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
        $('#table_reg tbody').on( 'click', '.btncancel_update', function (){
            var data = table.row( $(this).parents('tr') ).data();
            $('#id_operator'+data.id).prop("disabled", true);
            $('#id_unit'+data.id).prop("disabled", true);
            $('#btnsuccess_up'+data.id).hide();
            $('#btncancel_up'+data.id).hide();
        });
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
            rowCallback : function( row, data, dataIndex){
                if(data.is_assigned){
                    if( data.is_assigned.id_unit == 1)
                            $(row).find('td:eq(6)').addClass('assign_1 text-white');
                    else if(data.is_assigned.id_unit == 2)
                        $(row).find('td:eq(6)').addClass('assign_2 text-white');
                    else if(data.is_assigned.id_unit == 3)
                        $(row).find('td:eq(6)').addClass('assign_3 text-white');
                    else if(data.is_assigned.id_unit == 4)
                        $(row).find('td:eq(6)').addClass('assign_4 text-white');
                    else if(data.is_assigned.id_unit == 5)
                        $(row).find('td:eq(6)').addClass('assign_5 text-white');
                    else if(data.is_assigned.id_unit == 6)
                        $(row).find('td:eq(6)').addClass('assign_6 text-white');
                    else if(data.is_assigned.id_unit == 7)
                        $(row).find('td:eq(6)').addClass('assign_7 text-white');
                    else if(data.is_assigned.id_unit == 8)
                        $(row).find('td:eq(6)').addClass('assign_8 text-white');
                    else if(data.is_assigned.id_unit == 9)
                        $(row).find('td:eq(6)').addClass('assign_9 text-white');
                    else if(data.is_assigned.id_unit == 10)
                        $(row).find('td:eq(6)').addClass('assign_10 text-white');
                    else if(data.is_assigned.id_unit == 11)
                        $(row).find('td:eq(6)').addClass('assign_11 text-white');
                    else if(data.is_assigned.id_unit == 12)
                        $(row).find('td:eq(6)').addClass('assign_12 text-white');
                    else if(data.is_assigned.id_unit == 13)
                        $(row).find('td:eq(6)').addClass('assign_13 text-white');
                }
                },
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
                {{-- {data: 'options', name: 'options', className:'text-wrap width-100', orderable: false}, --}}
        ],
            });

            var data = table.row( $(this).parents('tr') ).data();

            $('#table_subs tbody').on( 'click', '.btnassign_sub_sub', function () {
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
            $('#table_subs tbody').on( 'click', '.btncancel_sub', function (){
                var data = table.row( $(this).parents('tr') ).data();
                $('#id_operator'+data.id).prop("disabled", true);
                $('#id_unit'+data.id).prop("disabled", true);
                $('#btnsuccess'+data.id).hide();
                $('#btncancel'+data.id).hide();
            });
            $('#table_subs tbody').on( 'click', '.btncancel_update_sub', function (){
                var data = table.row( $(this).parents('tr') ).data();
                $('#id_operator'+data.id).prop("disabled", true);
                $('#id_unit'+data.id).prop("disabled", true);
                $('#btnsuccess_up'+data.id).hide();
                $('#btncancel_up'+data.id).hide();
            });
            $('#table_subs tbody').on( 'click', '.btnsuccess_sub', function (){
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
            $('#table_subs tbody').on( 'click', '.btnassign_update_sub', function (){
                var data = table.row( $(this).parents('tr') ).data();
                $('#id_operator'+data.id).prop("disabled", false);
                $('#id_unit'+data.id).prop("disabled", false);
                $('#btnsuccess_up'+data.id).show();
                $('#btncancel_up'+data.id).show();
            });
            $('#table_subs tbody').on( 'click', '.btnsuccess_update_sub', function (){
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
            rowCallback : function( row, data, dataIndex){
                if(data.is_assigned){
                    if( data.is_assigned.id_unit == 1)
                            $(row).find('td:eq(6)').addClass('assign_1 text-white');
                    else if(data.is_assigned.id_unit == 2)
                        $(row).find('td:eq(6)').addClass('assign_2 text-white');
                    else if(data.is_assigned.id_unit == 3)
                        $(row).find('td:eq(6)').addClass('assign_3 text-white');
                    else if(data.is_assigned.id_unit == 4)
                        $(row).find('td:eq(6)').addClass('assign_4 text-white');
                    else if(data.is_assigned.id_unit == 5)
                        $(row).find('td:eq(6)').addClass('assign_5 text-white');
                    else if(data.is_assigned.id_unit == 6)
                        $(row).find('td:eq(6)').addClass('assign_6 text-white');
                    else if(data.is_assigned.id_unit == 7)
                        $(row).find('td:eq(6)').addClass('assign_7 text-white');
                    else if(data.is_assigned.id_unit == 8)
                        $(row).find('td:eq(6)').addClass('assign_8 text-white');
                    else if(data.is_assigned.id_unit == 9)
                        $(row).find('td:eq(6)').addClass('assign_9 text-white');
                    else if(data.is_assigned.id_unit == 10)
                        $(row).find('td:eq(6)').addClass('assign_10 text-white');
                    else if(data.is_assigned.id_unit == 11)
                        $(row).find('td:eq(6)').addClass('assign_11 text-white');
                    else if(data.is_assigned.id_unit == 12)
                        $(row).find('td:eq(6)').addClass('assign_12 text-white');
                    else if(data.is_assigned.id_unit == 13)
                        $(row).find('td:eq(6)').addClass('assign_13 text-white');
                    }
                },
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
                    {{-- {data: 'options', name: 'options', className:'text-wrap width-100', orderable: false}, --}}
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
        function btndelete(id) {
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
                        url: "{{url('/assign')}}/" + id,
                        data: {
                            id: id,
                            _token: '{!! csrf_token() !!}'
                        },
                        type: 'DELETE',
                        dataType: 'JSON',
                        success: function (results) {
                            if (results.success === true) {
                                Swal.fire({
                                    title: "Hecho!",
                                    text: results.message,
                                    icon: "success",
                                    confirmButtonText: "Hecho!",
                                });
                                $('#table_reg').DataTable().ajax.reload();
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
@endpush
@endsection
