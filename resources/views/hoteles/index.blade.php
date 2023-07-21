@extends('layouts.app')
@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hoteles</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Lista</a></li>
                        {{--  <li class="breadcrumb-item active">Sellers</li>  --}}
                    </ol>
                </div>
                <h4 class="page-title">Hoteles</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6">
                            <div class="text-md-right">
                                <a href="{{ route('hoteles.create') }}" type="button" class="btn btn-danger waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-domain mr-1"></i> Nuevo</a>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table id="table_hotel" class="table table-sm table-centered table-nowrap table-bordered table-hover mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Zona</th>
                                    <th>Municipio</th>
                                    <th>Cabecera</th>
                                    <th>Hotel</th>
                                    <th>Raitings</th>
                                    {{--  <th>Servicios</th>
                                    <th>Fecha creacion</th>  --}}
                                    {{--  <th>Revenue</th>  --}}
                                    <th style="width: 82px;">Opciones</th>
                                </tr>
                            </thead>
                            {{--  <tbody>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td class="table-user">
                                        <img src="../assets/images/users/user-2.jpg" alt="table-user" class="mr-2 rounded-circle">
                                        <a href="javascript:void(0);" class="text-body font-weight-medium">Paul J. Friend</a>
                                    </td>
                                    <td>
                                        Homovee
                                    </td>
                                    <td>
                                        <i class="mdi mdi-star text-warning"></i> 4.9
                                    </td>
                                    <td>
                                        <span class="font-weight-medium">128</span>
                                    </td>
                                    <td>
                                        $128,250
                                    </td>
                                    <td>
                                        07/07/2018
                                    </td>
                                    <td>
                                        $258.26k
                                    </td>

                                    <td>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck3">
                                            <label class="custom-control-label" for="customCheck3">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td class="table-user">
                                        <img src="../assets/images/users/user-3.jpg" alt="table-user" class="mr-2 rounded-circle">
                                        <a href="javascript:void(0);" class="text-body font-weight-medium">Bryan J. Luellen</a>
                                    </td>
                                    <td>
                                        Execucy
                                    </td>
                                    <td>
                                        <i class="mdi mdi-star text-warning"></i> 3.5
                                    </td>
                                    <td>
                                        <span class="font-weight-medium">09</span>
                                    </td>
                                    <td>
                                        $78,410
                                    </td>
                                    <td>
                                        09/12/2018
                                    </td>
                                    <td>
                                        $152.3k
                                    </td>

                                    <td>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck4">
                                            <label class="custom-control-label" for="customCheck4">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td class="table-user">
                                        <img src="../assets/images/users/user-4.jpg" alt="table-user" class="mr-2 rounded-circle">
                                        <a href="javascript:void(0);" class="text-body font-weight-medium">Kathryn S. Collier</a>
                                    </td>
                                    <td>
                                        Epiloo
                                    </td>
                                    <td>
                                        <i class="mdi mdi-star text-warning"></i> 4.1
                                    </td>
                                    <td>
                                        <span class="font-weight-medium">78</span>
                                    </td>
                                    <td>
                                        $89,458
                                    </td>
                                    <td>
                                        06/30/2018
                                    </td>
                                    <td>
                                        $178.6k
                                    </td>

                                    <td>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck5">
                                            <label class="custom-control-label" for="customCheck5">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td class="table-user">
                                        <img src="../assets/images/users/user-1.jpg" alt="table-user" class="mr-2 rounded-circle">
                                        <a href="javascript:void(0);" class="text-body font-weight-medium">Timothy Kauper</a>
                                    </td>
                                    <td>
                                        Uberer
                                    </td>
                                    <td>
                                        <i class="mdi mdi-star text-warning"></i> 4.9
                                    </td>
                                    <td>
                                        <span class="font-weight-medium">847</span>
                                    </td>
                                    <td>
                                        $258,125
                                    </td>
                                    <td>
                                        09/08/2018
                                    </td>
                                    <td>
                                        $368.2k
                                    </td>

                                    <td>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck6">
                                            <label class="custom-control-label" for="customCheck6">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td class="table-user">
                                        <img src="../assets/images/users/user-5.jpg" alt="table-user" class="mr-2 rounded-circle">
                                        <a href="javascript:void(0);" class="text-body font-weight-medium">Zara Raws</a>
                                    </td>
                                    <td>
                                        Symic
                                    </td>
                                    <td>
                                        <i class="mdi mdi-star text-warning"></i> 5.0
                                    </td>
                                    <td>
                                        <span class="font-weight-medium">235</span>
                                    </td>
                                    <td>
                                        $56,210
                                    </td>
                                    <td>
                                        07/15/2018
                                    </td>
                                    <td>
                                        $89.5k
                                    </td>

                                    <td>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck7">
                                            <label class="custom-control-label" for="customCheck7">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td class="table-user">
                                        <img src="../assets/images/users/user-6.jpg" alt="table-user" class="mr-2 rounded-circle">
                                        <a href="javascript:void(0);" class="text-body font-weight-medium">Annette P. Kelsch</a>
                                    </td>
                                    <td>
                                        Insulore
                                    </td>
                                    <td>
                                        <i class="mdi mdi-star text-warning"></i> 4.0
                                    </td>
                                    <td>
                                        <span class="font-weight-medium">485</span>
                                    </td>
                                    <td>
                                        $330,251
                                    </td>
                                    <td>
                                        09/05/2018
                                    </td>
                                    <td>
                                        $597.8k
                                    </td>

                                    <td>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck8">
                                            <label class="custom-control-label" for="customCheck8">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td class="table-user">
                                        <img src="../assets/images/users/user-7.jpg" alt="table-user" class="mr-2 rounded-circle">
                                        <a href="javascript:void(0);" class="text-body font-weight-medium">Jenny C. Gero</a>
                                    </td>
                                    <td>
                                        Susadmin
                                    </td>
                                    <td>
                                        <i class="mdi mdi-star text-warning"></i> 4.3
                                    </td>
                                    <td>
                                        <span class="font-weight-medium">38</span>
                                    </td>
                                    <td>
                                        $12,000
                                    </td>
                                    <td>
                                        08/02/2018
                                    </td>
                                    <td>
                                        $29.3k
                                    </td>

                                    <td>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck9">
                                            <label class="custom-control-label" for="customCheck9">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td class="table-user">
                                        <img src="../assets/images/users/user-8.jpg" alt="table-user" class="mr-2 rounded-circle">
                                        <a href="javascript:void(0);" class="text-body font-weight-medium">Edward Roseby</a>
                                    </td>
                                    <td>
                                        Hyperill
                                    </td>
                                    <td>
                                        <i class="mdi mdi-star text-warning"></i> 5.0
                                    </td>
                                    <td>
                                        <span class="font-weight-medium">77</span>
                                    </td>
                                    <td>
                                        $45,216
                                    </td>
                                    <td>
                                        08/23/2018
                                    </td>
                                    <td>
                                        $48.6k
                                    </td>

                                    <td>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck10">
                                            <label class="custom-control-label" for="customCheck10">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td class="table-user">
                                        <img src="../assets/images/users/user-9.jpg" alt="table-user" class="mr-2 rounded-circle">
                                        <a href="javascript:void(0);" class="text-body font-weight-medium">Anna Ciantar</a>
                                    </td>
                                    <td>
                                        Vicedel
                                    </td>
                                    <td>
                                        <i class="mdi mdi-star text-danger"></i> 2.7
                                    </td>
                                    <td>
                                        <span class="font-weight-medium">347</span>
                                    </td>
                                    <td>
                                        $7,815
                                    </td>
                                    <td>
                                        05/06/2018
                                    </td>
                                    <td>
                                        $12.1k
                                    </td>

                                    <td>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck11">
                                            <label class="custom-control-label" for="customCheck11">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td class="table-user">
                                        <img src="../assets/images/users/user-10.jpg" alt="table-user" class="mr-2 rounded-circle">
                                        <a href="javascript:void(0);" class="text-body font-weight-medium">Dean Smithies</a>
                                    </td>
                                    <td>
                                        Circumous
                                    </td>
                                    <td>
                                        <i class="mdi mdi-star text-warning"></i> 4.9
                                    </td>
                                    <td>
                                        <span class="font-weight-medium">506</span>
                                    </td>
                                    <td>
                                        $68,143
                                    </td>
                                    <td>
                                        04/09/2018
                                    </td>
                                    <td>
                                        $78.2k
                                    </td>

                                    <td>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                            </tbody>  --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function(){
            $('#table_hotel').DataTable({
                    processing: true,
                    serverSide: true,
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                    },
                    ajax: '{!! route('hoteles.index') !!}',
                    columns: [
                        {data: 'zona', name:'zona'},
                        {data: 'municipio', name:'municipio'},
                        {data: 'localidad', name:'localidad'},
                        {data: 'hotel', name:'hotel'},
                        {data: 'raitings', name:'raitings'},
                        {{--  {data: 'status', name: 'status', className: 'text-center'},  --}}
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
                        url: "/hoteles/" + id,
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
                                $('#table_hotel').DataTable().ajax.reload();
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
