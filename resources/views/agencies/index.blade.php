@extends('layouts.app')
@section('content')
<div class="container-fluid">
    @component('layouts.includes.components.breadcrumb')
        @slot('title') {{ config('app.name', 'Laravel') }} @endslot
        @slot('subtitle') {{ __('translation.Agencies') }} @endslot
        @slot('teme') {{ __('translation.List') }} @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-lg-right mt-3 mt-lg-0">
                            <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#modal_agencies"><i class="mdi mdi-plus-circle mr-1"></i>{{ __('translation.Add New')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table_agencies" class="table table-centered table-nowrap table-borderless table-hover mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Razon Social</th>
                                    <th style="width: 82px;">Opciones</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card-box">
                <h5 class="mb-1 mt-1 text-uppercase bg-light p-1"><i class="mdi icon-dual-primary mdi-airplane mr-1"></i>Detalles de la agencia</h5>
                <div class="">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="font-13 text-muted text-uppercase mb-1">Razon Social:</h4>
                            <p id="razon_social" class="mb-3"></p></div>
                        <div class="col-md-6">
                            <h4 class="font-13 text-muted text-uppercase mb-1">RFC :</h4>
                            <p id="rfc" class="mb-3"></p>
                        </div>
                    </div>
                    <h4 class="font-13 text-muted text-uppercase mb-1">NOMBRE :</h4>
                    <p id="nombre" class="mb-3"></p>
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="font-13 text-muted text-uppercase mb-1">Correo:</h4>
                            <p id="email" class="mb-3"></p></div>
                        <div class="col-md-6">
                            <h4 class="font-13 text-muted text-uppercase mb-1">Telefono :</h4>
                            <p id="telephone" class="mb-3"></p>
                        </div>
                    </div>
                <h5 class="mb-1 mt-1 text-uppercase bg-light p-1"><i class="mdi icon-dual-primary mdi-account-arrow-right mr-1"></i>Contacto de la agencia</h5>
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="font-13 text-muted text-uppercase mb-1">Nombre:</h4>
                        <div id="name_contact" class="mb-3"></div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="font-13 text-muted text-uppercase mb-1">Telefono :</h4>
                        <p id="telephone_contact" class="mb-3"></p>
                    </div>
                </div>
                <h5 class="mb-1 mt-1 text-uppercase bg-light p-1"><i class="mdi icon-dual-primary mdi-file-multiple mr-1"></i>Documentos</h5>
                <div id="getFiles" class="card mb-1 shadow-none border"></div>
                    <div style="text-align: center">
                        {{-- <span id="btndelete"></span> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('agencies.partials.create_modal')
@push('scripts')
<script>
    $('#form_register').parsley();
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
        $('#table_agencies').DataTable({
                processing: true,
                serverSide: true,
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
                ajax: '{!! route('agencies.index') !!}',
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'name_agency', name:'name_agency'},
                    {data: 'business_name', name:'business_name'},
                    {data: 'options', name:'options',className: 'text-center' ,searchable: false, orderable: false},
            ],
        });
    });
</script>
<script>
    $("#form_agencies").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "{!! route('agencies.store') !!}",
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function(response){
                Swal.fire({
                    title: "Registro creado!",
                    text: response.data,
                    icon: "success",
                    timer: 5000
                });
                //window.location = '{!! route('agencies.index') !!}';
                $('#form_agencies')[0].reset();
                $('#form_agencies').parsley().destroy();
                $('#table_agencies').DataTable().ajax.reload();
                $("#modal_agencies").modal('hide');
            },
            error: function(response){
                //console.log(response);
                var errors = response.responseJSON;
                errorsHtml = '<div id="errors-alert" class="container"><div class="alert alert-danger" role="alert"> ';
                $.each(errors.errors,function (k,v) {
                errorsHtml +='<ul> <li>'+ v + '</li></ul>';
                });
                errorsHtml += '</div></div>';
                $('#errors').html(errorsHtml);
            }
        });
    });
</script>
<script>
    $('#modal_agencies').on('hidden.bs.modal', function (e) {
        $(this)
        .find("input,textarea,select")
            .val('')
            .end()
        .find("input[type=checkbox], input[type=radio]")
            .prop("checked", "")
            .end();
        $('#form_agencies').parsley().reset();
        $("#errors-alert").hide();
    })
</script>
<script>
    $("#contact").click(function() {
        if($("#contact").is(':checked')) {
            $("#divContact").show();
        } else {
            $("#divContact").hide();
            $("#name").val('');
            $("#paterno").val('');
            $("#materno").val('');
            $("#phone").val('');
            $("#email").val('');
            $("#password").val('');
        }
    });
</script>
<script>
    /** DESTROY UNIT*/
    function deleteAgency(id) {
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
                    url: "/agencies/" + id,
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
                            $('#table_agencies').DataTable().ajax.reload();
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
    function btnInfo(id) {
        $.ajax({
            url: "{{url('/agencies')}}/" + id,
            data: {
                id : id
            },
            type: "GET",
            success: function (response){
            $('#btnedit').html(response.btnupdate);
            {{-- $('#btndelete').html(response.btndelete); --}}
            $('#razon_social').html(response.data['business_name']);
            $('#rfc').html(response.data['rfc']);
            $('#nombre').html(response.data['name_agency'] ?? 'Sin nombre comercial');
            $('#email').html(response.data['email_agency'] ?? 'Sin correo' );
            $('#telephone').html(response.data['telephone'] ?? 'Sin número');
            $('#name_contact').html("") ;
            $('#telephone_contact').html("") ;
            $.each( response, function( key, value ) {
                //console.log( key + ": " + value );
                $('#getFiles').html(value) ;
            });
            if(response.data.user_agency != ''){
                $.each( response.data.user_agency, function( key, contact ) {
                    $('#name_contact').append('<ul> <li>' +contact['user']+ '</li></ul>') ;
                    $('#telephone_contact').append('<ul> <li>' +contact.get_user.phone + '</li> </ul>') ;
                });
            }else{
                $('#name_contact').html("") ;
                $('#telephone_contact').html("") ;

                $('#name_contact').append('<p>Sin contacto </p>') ;
                $('#telephone_contact').append('<p>Sin contacto </p>') ;
            }
            }
        });
    }
</script>
@endpush

@endsection
