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
                                            @include('commons.searcher')
                                            <div class="table-responsive">
                                                <table id="table_reg"  class="table table-sm table-centered border dt-responsive nowrap w-100 no-footer dtr-inline">
                                                    <thead>
                                                        <tr>
                                                            <th>Hora</th>
                                                            <th>Servicio</th>
                                                            <th>Origen</th>
                                                            <th>Destino</th>
                                                            <th>Comentarios</th>
                                                            <th>Tarifa</th>
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
                                        <form class="form-inline">
                                            <div class="form-group">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" class="form-control border-1 shadow flatpickr_range" id="search_date2" name="search_date" onclick="Example1.open();" placeholder="Selecciona una fecha">
                                                    <input type="hidden" id="ID_START1" >
                                                    <input type="hidden" id="ID_END1" >
                                                    <div class="input-group-append">
                                                            <button type="button" id="btnsearch1" class="btn btn-sm btn-dark"> <i class="mdi mdi-calendar-range"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" id="btnrefresh1" class="btn btn-dark btn-sm ml-2">
                                                <i class="mdi mdi-autorenew"></i>
                                            </button>
                                        </form>
                                    <div class="table-responsive">
                                        <table id="table_subs"  class="table table-sm table-centered border dt-responsive nowrap w-100 no-footer dtr-inline">
                                            <thead>
                                                <tr>
                                                    <th>Hora</th>
                                                    <th>Servicio</th>
                                                    <th>Origen</th>
                                                    <th>Destino</th>
                                                    <th>Comentarios</th>
                                                    <th>Tarifa</th>
                                                    <th>Unidad Solicitada</th>
                                                    <th>Unidad</th>
                                                    <th>Operador</th>
                                                    {{-- <th>Opciones</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                        </div>
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                    </div>

                    <div class="tab-pane" id="permissions">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form class="form-inline">
                                            <div class="form-group">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" class="form-control border-1 shadow flatpickr_range" id="search_date3" name="search_date" onclick="Example2.open();" placeholder="Selecciona una fecha">
                                                    <input type="hidden" id="ID_START2" >
                                                    <input type="hidden" id="ID_END2" >
                                                    <div class="input-group-append">
                                                            <button type="button" id="btnsearch2" class="btn btn-sm btn-dark"> <i class="mdi mdi-calendar-range"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" id="btnrefresh2" class="btn btn-dark btn-sm ml-2">
                                                <i class="mdi mdi-autorenew"></i>
                                            </button>
                                        </form>
                                        <div class="table-responsive">
                                            <table id="table_vans"  class="table table-sm table-centered border dt-responsive nowrap w-100 no-footer dtr-inline">
                                                <thead>
                                                    <tr>
                                                        <th>Hora</th>
                                                        <th>Servicio</th>
                                                        <th>Origen</th>
                                                        <th>Destino</th>
                                                        <th>Comentarios</th>
                                                        <th>Tarifa</th>
                                                        <th>Unidad Solicitada</th>
                                                        <th>Unidad</th>
                                                        <th>Operador</th>
                                                        {{-- <th>Opciones</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
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
        load_data();
        function load_data(from_date = '', to_date = ''){
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
                ajax: {
                    url: '{!! route('assign.index') !!}',
                    data : { from_date: from_date , to_date: to_date }
                },
                columns: [
                    {data:'hora', name: 'hora', orderable:false},
                    {data: 'service', name: 'service', className: 'text-wrap width-100', orderable: false},
                    {data: 'origin', name: 'origin', className: 'text-center text-wrap width-100', orderable: false},
                    {data: 'destiny', name: 'destiny', className: 'text-center text-wrap width-100', orderable: false},
                    {data: 'observations', name: 'observations', className: 'text-wrap width-100', orderable: false},
                    {data: 'tariff', name: 'tariff', className: 'text-wrap width-100', orderable: false, visible: false},
                    {data: 'requested_unit', name: 'requested_unit', className: 'text-wrap width-100', orderable: false},
                    {data: 'unit', name: 'unit', className:  'text-wrap width-100', orderable: false},
                    {data: 'operators', name: 'operators', className:'text-wrap width-100', orderable: false},
                    {data: 'options', name: 'options', className:'text-wrap', orderable: false},
            ],

        });
        $('#btnsearch').click(function(){
            var from_date = $('#ID_START').val();
            var to_date = $('#ID_END').val();
            if(from_date != '' & to_date != ''){
                $('#table_reg').DataTable().destroy();
                load_data(from_date,to_date);
            }else{
                Swal.fire({
                    icon: 'warning',
                    title: 'No has ingresado ninguna fecha',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        });

        $('#btnrefresh').click(function(){
            var from_date = $('#ID_START').val('');
            var to_date = $('#ID_END').val('');
            var searcher = $('#search_date').val('');
            $('#table_reg').DataTable().destroy();
            load_data();
        });

        var table = $('#table_reg').DataTable();
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
                    tariff: data.tariff
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

    }


    });
</script>
<script>
    function subsDataTables() {
        if(!$.fn.dataTable.isDataTable('#table_subs')){
        load_data_sub();
        function load_data_sub(from_date1 = '', to_date1 = ''){
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
            drawCallback: function() {
                $('.select2').select2();
            },
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            },
            ajax: {
                url: '{!! route('assign.subs') !!}',
                data : { from_date1: from_date1 , to_date1: to_date1 }
            },
            columns: [
                {data:'hora', name: 'hora', orderable:false},
                {data: 'service', name: 'service', className: 'text-center text-wrap width-100', orderable: false},
                {data: 'origin', name: 'origin', className: 'text-center text-wrap width-100', orderable: false},
                {data: 'destiny', name: 'destiny', className: 'text-center text-wrap width-100', orderable: false},
                {data: 'observations', name: 'observations', className: 'text-wrap width-100', orderable: false},
                {data: 'tariff', name: 'tariff', className: 'text-wrap width-100', orderable: false, visible: false},
                {data: 'requested_unit', name: 'requested_unit', className: 'text-wrap width-100', orderable: false},
                {data: 'unit', name: 'unit', className:  'text-wrap width-100', orderable: false},
                {data: 'operators', name: 'operators', className:'text-wrap width-100', orderable: false},
                {{-- {data: 'options', name: 'options', className:'text-wrap width-100', orderable: false}, --}}
                ],
            });

            $('#btnsearch1').click(function(){
                var from_date1 = $('#ID_START1').val();
                var to_date1 = $('#ID_END1').val();
                if(from_date1 != '' & to_date1 != ''){
                    $('#table_subs').DataTable().destroy();
                    load_data_sub(from_date1,to_date1);
                }else{
                    Swal.fire({
                        icon: 'warning',
                        title: 'No has ingresado ninguna fecha',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            });

            $('#btnrefresh1').click(function(){
                var from_date1 = $('#ID_START1').val('');
                var to_date1 = $('#ID_END1').val('');
                var searcher = $('#search_date1').val('');
                $('#table_subs').DataTable().destroy();
                load_data_sub();
            });
        }
        var table = $('#table_subs').DataTable();
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
            load_data_van();
            function load_data_van(from_date2 = '', to_date2 = ''){
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
                ajax: {
                    url: '{!! route('assign.vans') !!}',
                    data : { from_date2: from_date2 , to_date2: to_date2 }
                },
                columns: [
                    {data:'hora', name: 'hora', orderable:false},
                    {data: 'service', name: 'service', className: 'text-center text-wrap width-100', orderable: false},
                    {data: 'origin', name: 'origin', className: 'text-center text-wrap width-100', orderable: false},
                    {data: 'destiny', name: 'destiny', className: 'text-center text-wrap width-100', orderable: false},
                    {data: 'observations', name: 'observations', className: 'text-wrap width-100', orderable: false},
                    {data: 'tariff', name: 'tariff', className: 'text-wrap width-100', orderable: false, visible: false},
                    {data: 'requested_unit', name: 'requested_unit', className: 'text-wrap width-100', orderable: false},
                    {data: 'unit', name: 'unit', className:  'text-wrap width-100', orderable: false},
                    {data: 'operators', name: 'operators', className:'text-wrap width-100', orderable: false},
                    {{-- {data: 'options', name: 'options', className:'text-wrap width-100', orderable: false}, --}}
            ],
            });
            $('#btnsearch2').click(function(){
                var from_date2 = $('#ID_START2').val();
                var to_date2 = $('#ID_END2').val();
                if(from_date2 != '' & to_date2 != ''){
                    $('#table_vans').DataTable().destroy();
                    load_data_van(from_date2,to_date2);
                }else{
                    Swal.fire({
                        icon: 'warning',
                        title: 'No has ingresado ninguna fecha',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            });

            $('#btnrefresh2').click(function(){
                var from_date2 = $('#ID_START2').val('');
                var to_date2 = $('#ID_END2').val('');
                var searcher = $('#search_date2').val('');
                $('#table_vans').DataTable().destroy();
                load_data_van();
            });
            }
            var table = $('#table_vans').DataTable();
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
