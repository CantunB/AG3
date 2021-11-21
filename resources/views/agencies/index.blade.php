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
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table_agencies" class="table table-centered table-nowrap table-borderless table-hover mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Contacto</th>
                                    <th>Razon Social</th>
                                    <th>Services</th>
                                    <th>Create Date</th>
                                    <th style="width: 82px;">Opciones</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('agencies.partials.create_modal')
@push('scripts')
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
                    {data: 'contact', name:'contact'},
                    {data: 'business_name', name:'business_name'},
                    {data: 'services', name:'services' ,className: 'text-center'},
                    {data: 'created', name:'created' ,className: 'text-center'},
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
               //console.log('Formulario enviado');
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
        $('#form_agencies').parsley().reset();
        $("#errors-alert").hide();
    })
</script>
<script>
    /** DESTROY UNIT*/
    function btnDelete(id) {
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
@endpush

@endsection
