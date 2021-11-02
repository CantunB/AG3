@extends('layouts.app')
@section('content')
 <div class="container-fluid">
    @component('layouts.includes.components.breadcrumb')
        @slot('title') {{ config('app.name', 'Laravel') }} @endslot
        @slot('subtitle') {{ __('translation.Units') }} @endslot
        @slot('teme') {{ __('translation.List') }} @endslot
    @endcomponent
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <div class="text-md-right">
                                <a href="{{ route('units.create') }}" class="btn btn-danger waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-plus mr-1"></i>{{ __('translation.Add New')}}</a>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table id="table_units" class="table table-sm table-nowrap table-borderless table-hover mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>{{ __('translation.Units') }}</th>
                                    <th>{{ __('translation.License plate') }}</th>
                                    <th>{{ __('translation.Circulation card') }}</th>
                                    <th>{{ __('translation.Status') }}</th>
                                    <th style="width: 82px;">{{ __('translation.Options') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card-box">
                <div class="media mb-3">
                    <div id="getImages"></div>
                    <div class="media-body">
                        <h4 class="mt-0 mb-1" id="getNombre"></h4>
                        {{-- <p class="text-muted"><i class="mdi mdi-car-arrow-right"></i>Operador</p> --}}
                        <span id="getStatus"></span>
                        {{-- <a href="javascript: void(0);" class="btn- btn-xs btn-secondary">Call</a>
                        <a href="javascript: void(0);" class="btn- btn-xs btn-secondary">Edit</a> --}}
                    </div>
                </div>

                {{-- <h5 class="mb-3 mt-4 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle mr-1"></i>{{ __('translation.Personal Information') }}</h5> --}}
                <div class="">
                    {{-- <h4 class="font-13 text-muted text-uppercase mb-1">{{ __('translation.Date of Birth') }} :</h4>
                    <p class="mb-3" id="getDate"> </p>
                    <h4 class="font-13 text-muted text-uppercase mb-1">{{ __('translation.Email') }} :</h4>
                    <p class="mb-3" id="getEmail"></p>
                    <h4 class="font-13 text-muted text-uppercase mb-1">{{ __('translation.Phone') }}</h4>
                    <p class="mb-3" id="getPhone"></p> --}}
                </div>

                <h5 class="card-title font-16 mb-3">{{ __('translation.Attachments') }}</h5>

                <div id="getFiles" class="card mb-1 shadow-none border">

                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $('#form_register').parsley();
  </script>
<script>
    $(document).ready(function(){
        $('#table_units').DataTable({
                processing: true,
                serverSide: true,
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
                ajax: '{!! route('units.index') !!}',
                columns: [
                    //{data: 'DT_RowIndex', name:'DT_RowIndex' ,className: 'text-center'},
                    {data: 'unit', name:'unit', className: 'text-center'},
                    {data: 'plate_number', name:'plate_number', className:'text-center'},
                    {data: 'circulation_card', name: 'circulation_card', className: 'text-center'},
                    {data: 'status', name:'status', className: 'text-center'},
                    {data: 'options', name:'options',className: 'text-center' ,searchable: false, orderable: false},
            ],
        });
    });
</script>
<script>
    function btnInfo(id) {
        $.ajax({
            url: 'units/'+ id,
            data: {
                 id : id
            },
            type: "GET",
            success: function (response){
                

                var files = response.files;
                var images = response.galery;
            //console.log(response);
            //files.forEach(function(file, index) {
                 $('#getFiles').html(files);
                 $('#getImages').html(images);

                //$('#getFiles').remove();
                //$('#getImages').remove();
                //console.log("Persona " + index + " | Nombre: " + persona.nombre + " Edad: " + persona.Edad)
              //  });
            //$.each( response.files, function( key, val ) {
                //console.log( key + ": " + file );
              //  $('#getFiles').html(val);
             // });
            //$.each( response.galery, function( key, val ) {
                //console.log( key + ": " + galery );
            //    $('#getImages').html(val);
             // });
            }
        });
    }
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
                    url: "{{url('/units')}}/" + id,
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
                            $('#table_units').DataTable().ajax.reload();
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
