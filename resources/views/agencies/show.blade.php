@extends('layouts.app')
@section('content')
<div class="container-fluid">
    @component('layouts.includes.components.breadcrumb')
        @slot('title') {{ config('app.name', 'Laravel') }} @endslot
        @slot('subtitle') Usuario @endslot
        @slot('teme') Perfil @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-4 col-xl-4">
            <div class="card-box text-center">
                <img src=" {{ $agency->agency_logo ? asset($agency->agency_logo) : asset('assets/images/logo.png') }} " class="rounded-circle avatar-lg img-thumbnail"
                    alt="agency-logo">

                <h4 class="mb-0">{{$agency->business_name}}</h4>
                <p class="text-muted"> {{$agency->name_agency}} </p>

                <a href="javascript: history.go(-1)" class="btn btn-soft-danger btn-xs waves-effect mb-2 waves-light">Regresar</a>

                <div class="text-left mt-3">
                    <p class="text-muted mb-2 font-13"><strong>Telefono :</strong><span class="ml-2"> {{$agency->telephone}} </span></p>

                    <p class="text-muted mb-2 font-13"><strong>Correo electronico :</strong> <span class="ml-2 "> {{$agency->email_agency}} </span></p>

                    <p class="text-muted mb-1 font-13"><strong>Direccion :</strong> <span class="ml-2"> {{$agency->address}} </span></p>
                </div>
            </div>
            <div class="card-box">
                <h4 class="header-title mb-3">Contactos</h4>
                <div class="inbox-widget" data-simplebar style="max-height: 350px;">
                        @forelse ($agency->user_agency as $i => $user_asi)
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="{{ asset($user_asi['getUser']['photo_user']) }}" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author">  {{$user_asi['getUser']['fullname']}} </p>
                            <p class="inbox-item-text">{{$user_asi['getUser']['phone']}}</p>
                        </div>
                        @empty
                        <div class="inbox-item text-center">
                            <span class="badge badge-warning">SIN CONTACTOS</span>
                        </div>
                        @endforelse
                </div> <!-- end inbox-widget -->

            </div> <!-- end card-box-->

        </div> <!-- end col-->

        <div class="col-lg-8 col-xl-8">
            <div class="card-box">
                <ul class="nav nav-pills navtab-bg nav-justified">
                    <li class="nav-item">
                        <a href="#aboutme" data-toggle="tab" aria-expanded="false" class="nav-link active">
                            Servicios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
                            Configuraciones
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#contacts" data-toggle="tab" aria-expanded="false" class="nav-link">
                            Contactos
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="aboutme">
                        <h5 class="mb-3 mt-4 text-uppercase"><i class="mdi mdi-cards-variant mr-1"></i>
                            Lista</h5>
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Servicio</th>
                                        <th>Fecha</th>
                                        <th>Origen</th>
                                        <th>Destino</th>
                                        <th>Cliente</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($agency->services as $s => $service)
                                        <tr>
                                            <td> {{$loop->iteration}} </td>
                                            <td> {{$service->Type_service->name}} </td>
                                            <td> {{$service->date}} </td>
                                            <td> {{$service->origin}} </td>
                                            <td> {{$service->destiny}} </td>
                                            <td> {{$service->passenger}} </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- end tab-pane -->
                    <div class="tab-pane" id="settings">
                        <form id="update_agency" method="POST" action="{{ route('agencies.update', $agency->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building mr-1"></i> INFORMACION DE AGENCIA</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">RAZON SOCIAL</label>
                                        <textarea class="form-control" id="business_name" name="business_name" required rows="2"> {{$agency->business_name}} </textarea>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lastname">RFC</label>
                                        <input type="text" class="form-control" id="rfc" name="rfc" required value=" {{$agency->rfc}} ">
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="userbio">NOMBRE COMERCIAL</label>
                                        <textarea class="form-control" id="name_agency" name="name_agency" rows="2" > {{$agency->name_agency}} </textarea>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="userbio">DIRECCION</label>
                                        <textarea class="form-control" id="address" name="address" rows="2" > {{$agency->address}} </textarea>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="useremail">CORREO</label>
                                        <input type="email" class="form-control" id="email_agency" name="email_agency" value=" {{$agency->email_agency}} ">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="useremail">TELEFONO</label>
                                        <input type="text" class="form-control" id="telephone" name="telephone" value=" {{$agency->telephone}} ">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="userpassword">SITIO WEB</label>
                                        <input type="text" class="form-control" id="site_web" name="site_web" value=" {{$agency->site_web}} ">
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="agency_logo">LOGO DE AGENCIA</label>
                                        <div class="input-group">
                                            <input type="file" class="dropify" id="agency_logo" name="agency_logo" data-default-file="{{ asset($agency->agency_logo) }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth mr-1"></i> Documentos</h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="fiscal_situation">Situacion Fiscal</label>
                                        <div class="input-group">
                                            <input type="file" class="dropify" id="fiscal_situation" name="fiscal_situation" data-default-file="{{ asset($agency->fiscal_situation) }}">
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="proof_address">Comprobante domicilio</label>
                                        <div class="input-group">
                                            <input type="file" class="dropify" id="proof_address" name="proof_address" data-default-file="{{ asset($agency->proof_address) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="covenants">Convenios</label>
                                        <div class="input-group">
                                            <input type="file" class="dropify" id="covenants" name="covenants" data-default-file="{{ asset($agency->covenants) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i>Actualizar</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="contacts">
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <div class="text-md-right">
                                    <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-danger waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-plus mr-1"></i>{{ __('translation.Add New')}}</b>
                                </div>
                            </div>
                        </div>
                        <h5 class="mb-3 mt-4 text-uppercase"><i class="mdi mdi-cards-variant mr-1"></i>
                            Lista de contactos </h5>
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($agency->user_agency as $i => $asign)
                                        <tr class="text-center">
                                            <td> {{$loop->iteration}}</td>
                                            <td> {{$asign['getUser']['fullname']}} </td>
                                            <td>
                                                <a href=" {{ route('users.show', $asign['getUser']['id']) }} " class="btn btn-sm action-icon getInfo icon-dual-primary"><i class="mdi mdi-account-settings"></i></a>
                                                <button type="button" onclick="btnDeleteContact( {{$asign->id_agency }}, {{$asign['getUser']['id']}} )" class="btn btn-sm action-icon icon-dual-secondary"><i class="mdi mdi-trash-can"></i></button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td> 0</td>
                                            <td> SIN CONTACTO </td>
                                            <td></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-box-->

        </div> <!-- end col -->
    </div>
</div>

@include('agencies.partials.create_manager')
@push('scripts')
<script>
    $('#update_agency').on('submit', function(e){
        e.preventDefault();
        var form = new FormData(this);
        $.ajax({
            type: "POST",
            //url: "Empresas/",
            url: '{{ route('agencies.update', $agency->id) }}',
            //data: $('#form_mcu').serialize(),
            data: form,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function(response){
                console.log(response);
                Swal.fire({
                    title: "Hecho!",
                    html: response.data,
                    icon: "success",
                    timer: 5000
                });
                location.reload();

            },
            error: function(data){
                console.log(data);
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
    $('#contact_form').on('submit', function(e){
        e.preventDefault();
        var form = new FormData(this);

        $.ajax({
            type: "POST",
            url: '{{ route('agencies.add', $agency->id) }}',
            data:  form, // serializes the form's elements.
            dataType: "json",
            processData: false,
            contentType: false,
            success: function(response){
                console.log(response);
                Swal.fire({
                    title: "Hecho!",
                    html: response.data,
                    icon: "success",
                    timer: 5000
                });
                location.reload();

            },
            error: function(data){
                console.log(data);
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
    function btnDeleteContact(id_agency, id_manager) {
        console.log(id_manager);
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
                    url: "/agencies/remove/" + id_agency,
                    data: {
                        id_agency: id_agency,
                        id_manager: id_manager,
                        _token: '{!! csrf_token() !!}'
                    },
                    dataType: 'JSON',
                    success: function (response) {
                        console.log(response);
                            Swal.fire({
                                title: "Hecho!",
                                text: response.data,
                                icon: "success",
                                confirmButtonText: "Hecho!",
                            });
                            location.reload();

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
