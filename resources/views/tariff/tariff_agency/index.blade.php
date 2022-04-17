@extends('layouts.app')
@section('content')

    <!-- Start Content-->
    <div class="container-fluid">
        @component('layouts.includes.components.breadcrumb')
            @slot('title') {{ config('app.name', 'Laravel') }} @endslot
            @slot('subtitle') Tarifas de agencias @endslot
            @slot('teme') Lista @endslot
        @endcomponent

        <div class="row">
            <div class="col-xl-12">
                <div class="card-box">
            <!--        <h4 class="header-title mb-4">{{ __('Administrator') }}</h4>  -->
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

                                                    @foreach ($agencies as $i =>  $agencia)
                                                            <table id="table_tariff_agencies"  class="table table-sm table-centered text-center table-bordered dt-responsive nowrap w-100  dtr-inline">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="background-color: #576572"  class="text-white" rowspan="3">ZONA</th>
                                                                        <th  style="background-color: #576572"  class="text-white" rowspan="3">LUGAR DE SERVICIO</th>
                                                                        <th  style="background-color: #576572" class="text-white" colspan="2">
                                                                            {{$agencia->agency->name_agency ? $agencia->agency->name_agency : ""}}
                                                                            <hr>
                                                                            {{$agencia->agency->business_name}}

                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        @foreach ($agencia->getUnit($agencia->zona, $agencia->id_agency) as $getUnits)
                                                                        <td class="text-dark"> <strong> {{ $getUnits->unit->type_units }}</strong> </td>
                                                                        @endforeach

                                                                    </tr>
                                                                </thead>
                                                                @foreach ($zonas as $z => $zona)
                                                                        <tbody>
                                                                            <td class="text-danger"> <strong>Z{{ $zona }}</strong> </td>
                                                                            <td> {{$agencia->getPlace($zona, $agencia->id_agency)->first()}} </td>
                                                                            @foreach ($agencia->getTariff($zona, $agencia->id_agency) as $getTariff)
                                                                            <td class="text-dark"> ${{ $getTariff->tariff }} MXN </td>
                                                                            @endforeach
                                                                        </tbody>
                                                                @endforeach
                                                            </table>
                                                            <hr>
                                                    @endforeach

                                                    {{-- <table id="table_tariff_agencies"  class="table table-sm table-centered table-bordered dt-responsive nowrap w-100  dtr-inline">
                                                        <thead>
                                                            <tr>
                                                                <th rowspan="2">ZONA</th>
                                                                <th rowspan="2">LUGAR DE SERVICIO</th>
                                                                <th colspan="2">AGENCIA</th>
                                                            </tr>
                                                            <tr>
                                                                <td> Suburban </td>
                                                                <td> VAN </td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <td>1</td>
                                                            <td>LOCAL</td>
                                                            <td>4000</td>
                                                            <td>2000</td>
                                                        </tbody>
                                                    </table> --}}


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div> <!-- end card-box-->
            </div> <!-- end col -->
        </div>

    </div> <!-- container -->
@push('scripts')
<script>

    $(document).ready(function(){
        {{-- $('#table_tariff_agencies').DataTable({
                processing: true,
                serverSide: true,
                paginate: false,
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
                dom: 'Bfrtil',
                buttons: [
                    {
                        extend: 'colvis',
                        text: '<i class="fa fa-wrench"></i>',
                        init: function (api, node, config) {
                            $(node).removeClass('btn-secondary')
                            $(node).addClass('btn-outline-secondary')
                        },
                        columnText: function (dt, idx, title) {
                            return title;
                        }
                    },
                    {{-- {
                        extend: 'copyHtml5',
                        text: '<i class="fa fa-copy"></i>',
                        titleAttr: 'Kopie naar klembord',
                        init: function (api, node, config) {
                            $(node).removeClass('btn-secondary')
                            $(node).addClass('btn-outline-secondary')
                        }
                    }, --}}
                    {{-- {
                        extend: 'excelHtml5',
                        text: '<i class="fa fa-file-excel"></i>',
                        titleAttr: 'Excel',
                        init: function (api, node, config) {
                            $(node).removeClass('btn-secondary')
                            $(node).addClass('btn-outline-secondary')
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf"></i>',
                        titleAttr: 'PDF',
                        init: function (api, node, config) {
                            $(node).removeClass('btn-secondary')
                            $(node).addClass('btn-outline-secondary')
                        }

                    }, --}}
                    {{-- {
                        extend: 'csvHtml5',
                        text: '<i class="fas fa-code"></i>',
                        titleAttr: 'CSV',
                        init: function (api, node, config) {
                            $(node).removeClass('btn-secondary')
                            $(node).addClass('btn-outline-secondary')
                        }
                    } --}}
                ],

        });
    }); --}}
</script>
@endpush
@endsection
