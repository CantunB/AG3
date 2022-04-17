@extends('layouts.app')
@section('content')

<div class="container-fluid">

    @component('layouts.includes.components.breadcrumb')
    @slot('title') {{ config('app.name', 'Laravel') }} @endslot
    @slot('subtitle') {{ __('translation.Operators') }} @endslot
    @slot('teme') {{ __('translation.Edit') }} @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-4 col-xl-4">
            <div class="card-box text-center">
                <img src="{{ $operator->operator_photo }}" class="rounded-circle avatar-xl img-thumbnail"
                    alt="profile-image">

                <h4 class="mb-0">{{ $operator->full_name }}</h4>
                <p class="text-muted"></p>
                @if (!$operator->isAssigned)
                <button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Disponible</button>
                @else
                <button type="button" class="btn btn-primary btn-xs waves-effect mb-2 waves-light">ASIGNADO</button>
                @endif
                <a href="javascript: history.go(-1)" class="btn btn-soft-danger btn-xs waves-effect mb-2 waves-light">Regresar</a>

                <div class="text-left mt-3">
                    <p class="text-muted mb-2 font-13"><strong>Telefono :</strong><span class="ml-2">{{ $operator->phone }}</span></p>

                    <p class="text-muted mb-2 font-13"><strong>Correo:</strong> <span class="ml-2 ">{{ $operator->email }}</span></p>

                    <p class="text-muted mb-1 font-13"><strong>Fecha Nac. :</strong> <span class="ml-2">{{ $operator->birthday_date }}</span></p>

                    <p class="text-muted mb-1 font-13"><strong>Direccion :</strong> <span class="ml-2">{{ $operator->address }}</span></p>

                </div>
            </div> <!-- end card-box -->

        </div> <!-- end col-->

        <div class="col-lg-8 col-xl-8">
            <div class="card-box">
                <ul class="nav nav-pills navtab-bg nav-justified">
                    {{-- <li class="nav-item">
                        <a href="#aboutme" data-toggle="tab" aria-expanded="false" class="nav-link">
                            About Me
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#timeline" data-toggle="tab" aria-expanded="true" class="nav-link active">
                            Timeline
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link active">
                            Configuracion
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    @include('operators.tabs.settings')
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-xl-">
            <div class="card-box text-center">
                <div class="table-responsive">
                    <table class="table table-borderless mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Agencia</th>
                                <th>Inicio</th>
                                <th>Termino</th>
                                <th>Status</th>
                                <th>Cliente</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
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
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div> <!-- end card-box -->

        </div> <!-- end col-->
    </div>
</div>

@push('scripts')
@include('commons.alerts')

<script>
    $('#form_operators_update').parsley();
</script>
@endpush
@endsection
