@extends('layouts.app')
@section('content')
<div class="container-fluid">

    @component('layouts.includes.components.breadcrumb')
    @slot('title') {{ config('app.name', 'Laravel') }} @endslot
    @slot('subtitle') {{ __('translation.Bitacora') }} @endslot
    @slot('teme') {{ __('translation.Registro') }} @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-4 col-xl-4">
            <div class="card-box text-center">
                <div class="row align-items-center" style="margin-left: 37%; margin-right: 0; ">
                    <div class="avatar-lg">
                        <span class="avatar-title text-light font-22 rounded-circle"  style="background-color:{{$color}}">
                            {{ Str::substr($unit->unit,0,5) }}
                        </span>
                    </div>
                </div>
                {{-- <h4 class="mb-0">{{ $unit->unit }}</h4> --}}
                {{-- <p class="text-muted text-uppercase" style="font-size:25px">{{ $unit->type }}</p> --}}
{{--    
                <button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Follow</button>--}}
                {{-- <button type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Message</button>  --}}
               <p></p>
                <a href="javascript: history.go(-1)" class="btn btn-danger btn-xs waves-effect mb-2 waves-light"><i class="fe-chevrons-left mr-1"></i>REGRESAR</a>

                <div class="text-left mt-3">
                    <h4 class="font-13 text-uppercase">DETALLES:</h4>
                    {{-- <p class="text-muted font-13 mb-3">
                        Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                        1500s, when an unknown printer took a galley of type.
                    </p> --}}
                    <p class="text-muted mb-2 font-13"><strong>NUMERO DE PLACA :</strong> <span class="ml-2">{{ $unit->plate_number }}</span></p>

                    <p class="text-muted mb-2 font-13"><strong>TARJETA DE CIRCULACION :</strong><span class="ml-2">{{ $unit->circulation_card }}</span></p>

                    <p class="text-muted mb-2 font-13"><strong>NUMERO DE SEGURO :</strong> <span class="ml-2 ">{{ $unit->car_insurance }}</span></p>

                    <p class="text-muted mb-1 font-13"><strong>FECHA DE REGISTRO :</strong> <span class="ml-2">{{ $unit->created_at }}</span></p>

                   {{ $unit->galery[0]->photo_front_unit}}
                </div>

                {{-- <ul class="social-list list-inline mt-3 mb-0">
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i
                                class="mdi mdi-facebook"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i
                                class="mdi mdi-google"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class="social-list-item border-info text-info"><i
                                class="mdi mdi-twitter"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i
                                class="mdi mdi-github"></i></a>
                    </li>
                </ul> --}}
            </div> <!-- end card-box -->

        </div> <!-- end col-->

        <div class="col-lg-8 col-xl-8">
            <div class="card-box">
                <ul class="nav nav-pills navtab-bg nav-justified">
                    <li class="nav-item">
                        <a href="#settings" data-toggle="tab" aria-expanded="true" class="nav-link active">
                            BITACORA
                        </a>
                    </li>
                     <li class="nav-item">
                        <a href="#galeria" data-toggle="tab" aria-expanded="true" class="nav-link">
                            GALERIA
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="settings">

                        <form id="form_bitacora" method="POST" enctype="multipart/form-data" data-parsley-validate>
                            @csrf
                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building mr-1"></i>REGISTRAR SERVICIOS REALIZADOS</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="firstname">Fecha de servicio</label>
                                            <input type="text" class="form-control select" id="date" name="date" placeholder="{{ date('Y-m-d') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="firstname">Unidad</label>
                                            <input type="text" class="form-control select " readonly  placeholder="{{ $unit->unit }}" >
                                            <input type="hidden" class="form-control select " id="unit_id" name="unit_id" value="{{ $unit->id }}" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="lastname">Kilometraje</label>
                                        <input type="number" step="0.01" name="mileage" id="mileage" class="form-control" required>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="userbio">Trabajo y/o servicio realizado</label>
                                        <textarea class="form-control" id="service" name="service" rows="4" placeholder="Describe el servicio realizado..." required minlength="10" maxlength="120"></textarea>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="useremail">Taller</label>
                                        <input type="text" class="form-control" id="workshop" name="workshop" required  minlength="3">
                                        {{-- <span class="form-text text-muted"><small>If you want to change email please <a href="javascript: void(0);">click</a> here.</small></span> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="social-insta">Coste</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class=" fas fa-money-bill-wave"></i></span>
                                            </div>
                                            <input type="number" step="0.01" class="form-control" id="cost" name="cost" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="userpassword">Notas</label>
                                        <textarea class="form-control" id="notes" name="notes" rows="4" placeholder="Ingresa alguna nota..." minlength="15"></textarea>
                                        {{-- <span class="form-text text-muted"><small>If you want to change password please <a href="javascript: void(0);">click</a> here.</small></span> --}}
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="userpassword">Comprobante factura</label>
                                        <input type="file" class="dropify" id="file_invoice" name="file_circulation_card" data-default-file="{{ asset('assets/images/attached-files/ejemplo_tarjeta.jpg') }}" />
                                        {{-- <span class="form-text text-muted"><small>If you want to change password please <a href="javascript: void(0);">click</a> here.</small></span> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                            </div>
                        </form>
                    </div>
                       <div class="tab-pane" id="galeria">
                        <form id="form_galery" method="POST" enctype="multipart/form-data" data-parsley-validate>
                            @csrf
                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building mr-1"></i>GALERIA</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="userpassword">Frontal</label>
                                        <input type="file" class="dropify" id="photo_front_unit" name="photo_front_unit" data-default-file="{{ asset($unit->galery[0]->photo_front_unit) ?? asset('assets/images/attached-files/ejemplo_tarjeta.jpg') }}" />
                                        <input type="hidden" class="form-control select " id="unit_id" name="unit_id" value="{{ $unit->id }}" >
                                        
                                        {{-- <span class="form-text text-muted"><small>If you want to change password please <a href="javascript: void(0);">click</a> here.</small></span> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="userpassword">Trasera</label>
                                        <input type="file" class="dropify" id="photo_rear_unit" name="photo_rear_unit" data-default-file="{{ asset($unit->galery[0]->photo_rear_unit) ?? asset('assets/images/attached-files/ejemplo_tarjeta.jpg') }}" />
                                        {{-- <span class="form-text text-muted"><small>If you want to change password please <a href="javascript: void(0);">click</a> here.</small></span> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="userpassword">Lateral derecho</label>
                                        <input type="file" class="dropify" id="photo_right_unit" name="photo_right_unit" data-default-file="{{ asset($unit->galery[0]->photo_right_unit) ?? asset('assets/images/attached-files/ejemplo_tarjeta.jpg') }}" />
                                        {{-- <span class="form-text text-muted"><small>If you want to change password please <a href="javascript: void(0);">click</a> here.</small></span> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="userpassword">Lateral izquierdo</label>
                                        <input type="file" class="dropify" id="photo_left_unit" name="photo_left_unit" data-default-file="{{ asset( asset($unit->galery[0]->photo_left_unit) ?? 'assets/images/attached-files/ejemplo_tarjeta.jpg') }}" />
                                        {{-- <span class="form-text text-muted"><small>If you want to change password please <a href="javascript: void(0);">click</a> here.</small></span> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="userpassword">Interior 1</label>
                                        <input type="file" class="dropify" id="photo_inside_unit_1" name="photo_inside_unit_1" data-default-file="{{ asset($unit->galery[0]->photo_inside_unit_1) ?? asset('assets/images/attached-files/ejemplo_tarjeta.jpg') }}" />
                                        {{-- <span class="form-text text-muted"><small>If you want to change password please <a href="javascript: void(0);">click</a> here.</small></span> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="userpassword">Interior 2</label>
                                        <input type="file" class="dropify" id="photo_inside_unit_2" name="photo_inside_unit_2" data-default-file="{{ asset($unit->galery[0]->photo_inside_unit_2) ?? asset('assets/images/attached-files/ejemplo_tarjeta.jpg') }}" />
                                        {{-- <span class="form-text text-muted"><small>If you want to change password please <a href="javascript: void(0);">click</a> here.</small></span> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="userpassword">Interior 3</label>
                                        <input type="file" class="dropify" id="photo_inside_unit_3" name="photo_inside_unit_3" data-default-file="{{ asset($unit->galery[0]->photo_inside_unit_3) ?? asset('assets/images/attached-files/ejemplo_tarjeta.jpg') }}" />
                                        {{-- <span class="form-text text-muted"><small>If you want to change password please <a href="javascript: void(0);">click</a> here.</small></span> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                            </div>
                        </form>
                        </div> 
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="card-box text-center">
                <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building mr-1"></i>REGISTRO DE SERVICIOS REALIZADOS</h5>
                <div class="table-responsive">
                    <table id="table_service_units" class="table table-borderless mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Fecha de servicio</th>
                                <th>Kilometraje</th>
                                <th>Trabajo y/o servicio</th>
                                <th>Taller</th>
                                <th>Costo</th>
                                <th>Notas</th>
                                <th>Opciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            {{-- <tr>
                                <td>1</td>
                                <td>App design and development</td>
                                <td>01/01/2015</td>
                                <td>10/15/2018</td>
                                <td><span class="badge badge-info">Work in Progress</span></td>
                                <td>Halette Boivin</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Coffee detail page - Main Page</td>
                                <td>21/07/2016</td>
                                <td>12/05/2018</td>
                                <td><span class="badge badge-success">Pending</span></td>
                                <td>Durandana Jolicoeur</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Poster illustation design</td>
                                <td>18/03/2018</td>
                                <td>28/09/2018</td>
                                <td><span class="badge badge-pink">Done</span></td>
                                <td>Lucas Sabourin</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Drinking bottle graphics</td>
                                <td>02/10/2017</td>
                                <td>07/05/2018</td>
                                <td><span class="badge badge-blue">Work in Progress</span></td>
                                <td>Donatien Brunelle</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Landing page design - Home</td>
                                <td>17/01/2017</td>
                                <td>25/05/2021</td>
                                <td><span class="badge badge-warning">Coming soon</span></td>
                                <td>Karel Auberjo</td>
                            </tr> --}}

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> <!-- container -->

@push('scripts')
<script>
    document.getElementById("date").flatpickr({
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
        defaultDate: "{!! date('Y-m-d') !!}"
    });
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
    $("#form_bitacora").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "{!! route('bitacora.store', $unit->id) !!}",
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
                $('#form_bitacora')[0].reset();
                $('#form_bitacora').parsley().destroy();
                $('#table_service_units').DataTable().ajax.reload();

            },
            error: function(response){
                //console.log(response);
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
</script>
<script>
    $(document).ready(function(){
        $('#table_service_units').DataTable({
                processing: true,
                serverSide: true,
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
                ajax: '{!! route('bitacora.index', $unit->id) !!}',
                columns: [
                    {data: 'DT_RowIndex', name:'DT_RowIndex' ,className: 'text-center'},
                    {data: 'date', name:'date', className: 'text-center'},
                    {data: 'mileage', name:'mileage', className: 'text-center'},
                    {data: 'service', name:'service', className: 'text-center'},
                    {data: 'workshop', name:'workshop', className: 'text-center'},
                    {data: 'cost', name:'cost', className: 'text-center'},
                    {data: 'notes', name:'notes', className: 'text-center'},
                    {data: 'options', name:'options',className: 'text-center' ,searchable: false, orderable: false},
            ],
        });
    });
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
                    url: "/units/" + "{!! $unit->id!!}/"  +  "bitacora/" + id,
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
                            $('#table_service_units').DataTable().ajax.reload();
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
    $("#form_galery").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "{!! route('galery.store', $unit->id) !!}",
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function(response){
               //console.log('Formulario enviado');
                Swal.fire({
                    title: "Imagenes Almacenadas!",
                    text: response.data,
                    icon: "success",
                    timer: 5000
                });
            },
            error: function(response){
                //console.log(response);
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
</script>


@endpush
@endsection
