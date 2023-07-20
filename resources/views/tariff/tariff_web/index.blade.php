@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        @component('layouts.includes.components.breadcrumb')
            @slot('title') {{ config('app.name', 'Laravel') }} @endslot
            @slot('subtitle') TARIFAS WEB AG3 @endslot
            @slot('teme') LISTA @endslot
        @endcomponent

        <div class="row">
            @foreach ($currency as $cu)
                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded bg-soft-primary">
                                    <i class="font-24 avatar-title text-primary">{{  $cu->Symbol  }}</i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="text-dark mt-1">$<span data-plugin="counterup">{{ $cu->CurrencyValue }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">( {{ $cu->CurrencyISO }} )</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </div>
            @endforeach

        </div>

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
                                                    <table id="table_reg"  class="table table-sm table-centered table-bordered  text-center dt-responsive nowrap w-100  dtr-inline">
                                                        <thead>
                                                                <colgroup>
                                                                    <col class="text-center ">
                                                                    <col class="text-center " style="background-color:#E8F8F5">
                                                                    <col class="text-center " style="background-color:#FDF2E9">
                                                                    <col class="text-center " style="background-color:#E8F8F5">
                                                                    <col class="text-center " style="background-color:#FDF2E9">
                                                                </colgroup>
                                                            <tr>
                                                                <th rowspan="3" style="background-color:#FDFEFE">ZONA</th>
                                                                <th colspan="4" style="background-color:#FDFEFE">Tipo de unidad</th>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="2" style="background-color: #34495E" class="text-white">Suburban</th>
                                                                <th colspan="2" style="background-color: #F4D03F" class="text-dark">Van</th>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-uppercase text-primary">Sencillo</th>
                                                                <th class="text-uppercase text-primary">Redondo</th>
                                                                <th class="text-uppercase text-primary">Sencillo</th>
                                                                <th class="text-uppercase text-primary">Redondo</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($zonas as $z => $zona)
                                                                <tbody>
                                                                    <td class="text-center text-success" style="font-size: 15px"> Z{{$zona}} </td>
                                                                    @foreach ($tarifas as $t =>  $item)
                                                                        @if($zona == $item->id_zona )
                                                                        <td style="display:none;">{{ $item->id_zona}}</td>
                                                                        <td style="display:none;">{{ $item->type_unit_id }}</td>
                                                                        <td style="display:none;">{{ $item->type_trip_id }}</td>
                                                                        <td class="text-center text-dark">
                                                                            $<strong id="tarifa{!! $item->id_zona !!}">{{$item->MXN}}</strong> MXN
                                                                        </td>
                                                                        @endif
                                                                    @endforeach
                                                                    <td class="text-center text-success btnEdit" style="font-size: 15px">
                                                                        {{--  <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#editTarifas">
                                                                            <i class="fas fa-edit"></i>
                                                                        </button>  --}}
                                                                        <a href="{{ route('taf_hotels.show', $zona) }}" type="button" class="btn btn-xs btn-success">
                                                                            <i class="fas fa-edit"></i>
                                                                        </a>
                                                                    </td>
                                                                </tbody>
                                                            @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--  MODAL PARA EDITAR TARIFAS  --}}
    <div class="modal fade" id="editTarifas" tabindex="-1" role="dialog" aria-labelledby="editTarifasModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="editTarifasModal">ACTUALIZAR TARIFAS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <form>
                <div class="modal-body">
                    <div class="form-group">
                        <h2 class="text-center">ZONA</h2>

                        <div class="col-12 text-center">
                                    <h3>TARIFAS SUBURBAN</h3>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label>SENCILLO</label>
                                                <input id="taff" name="name" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>REDONDO</label>
                                                <input id="subredondo" name="paterno" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <h3>TARIFAS VAN</h3>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label>SENCILLO</label>
                                                <input id="vansencillo" name="name" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label >REDONDO</label>
                                                <input id="vanredondo" name="paterno" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-success waves-effect waves-light m-1"><i class="fe-check-circle mr-1"></i>Actualizar</button>
                                            <button class="btn btn-light waves-effect waves-light m-1" data-dismiss="modal" aria-label="Close"><i class="fe-x mr-1"></i>Cancelar</button>
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>
            </form>

            </div>
            </div>
        </div>


@push('scripts')
    <script>
        $("#table_reg").on('click','.btnEdit',function(){
        //SECTION En esta seccions se declaron las variables para la fila seleccionada
            let currentRow = $(this).closest("tr")[0];

            let currentRows = $(this).closest("tr");
            //var tarifa = document.getElementsByClassName('tarifa');
            //var col1=currentRows.find("td:eq(4)").html();

            let tarifa = currentRows.find(".tarifa").html();

            let cells = currentRow.cells;

            //NOTE - Data Suburban Sencillo
            let zoneSubFirstCell = cells[1].textContent;
            let subSencillaCell_typeunit = cells[2].textContent;
            let subSencillaCell_typetripid = cells[3].textContent;
            let subTarifaSencillaCell = cells[4].textContent;
            //NOTE - Data Suburban Redondo
            let zoneSubSecondCell = cells[5].textContent;
            let subRedondaCell_typeunit = cells[6].textContent;
            let subRedondaCell_typetripid = cells[7].textContent;
            let subTarifaRedondaCell = cells[8].textContent;
             //NOTE - Data Suburban Redondo
            let zoneVanFirstCell = cells[9].textContent;
            let vanSencillaCell_typeunit = cells[10].textContent;
            let vanSencillaCell_typetripid = cells[11].textContent;
            let vanTarifaSencillaCell = cells[12].textContent;
             //NOTE - Data Suburban Redondo
            let zoneVanSecondCell = cells[13].textContent;
            let vanRedondaCell_typeunit = cells[14].textContent;
            let vanRedondaCell_typetripid = cells[15].textContent;
            let vanTarifaRedondaCell = cells[16].textContent;

            console.log(tarifa);

            document.getElementById('taff').value= tarifa;


        });


        {{--  $(".btnEdit").click(function (evt) {
        //SECTION En esta seccions se declaron las variables para la fila seleccionada
            //NOTE - Data Suburban Sencillo
                let zoneSubFirstCell = $(evt.target).parent().parent("tr").find("td:nth-child(2)").text();
                let subSencillaCell_typeunit = $(evt.target).parent().parent("tr").find("td:nth-child(3)").text();
                let subSencillaCell_typetripid = $(evt.target).parent().parent("tr").find("td:nth-child(4)").text();
                let subTarifaSencillaCell = $(evt.target).parent().parent("tr").find("td:nth-child(5)").text();
            //NOTE - Data Suburban Redondo
                let zoneSubSecondCell = $(evt.target).parent().parent("tr").find("td:nth-child(6)").text();
                let subRedondaCell_typeunit = $(evt.target).parent().parent("tr").find("td:nth-child(7)").text();
                let subRedondaCell_typetripid = $(evt.target).parent().parent("tr").find("td:nth-child(8)").text();
                let subTarifaRedondaCell = $(evt.target).parent().parent("tr").find("td:nth-child(9)").text();
            //NOTE - Data Van Sencillo
                let zoneVanFirstCell = $(evt.target).parent().parent("tr").find("td:nth-child(10)").text();
                let vanSencillaCell_typeunit = $(evt.target).parent().parent("tr").find("td:nth-child(11)").text();
                let vanSencillaCell_typetripid = $(evt.target).parent().parent("tr").find("td:nth-child(12)").text();
                let vanTarifaSencillaCell = $(evt.target).parent().parent("tr").find("td:nth-child(13)").text();
            //NOTE - Data Van Redondo
                let zoneVanSecondCell = $(evt.target).parent().parent("tr").find("td:nth-child(14)").text();
                let vanRedondaCell_typeunit = $(evt.target).parent().parent("tr").find("td:nth-child(15)").text();
                let vanRedondaCell_typetripid = $(evt.target).parent().parent("tr").find("td:nth-child(16)").text();
                let vanTarifaRedondaCell = $(evt.target).parent().parent("tr").find("td:nth-child(17)").text();

                console.log( "Zona : "+ zoneSubFirstCell +
                        ", TipoUnidad : " + subSencillaCell_typeunit +
                        ", TipoViaje :" + subRedondaCell_typetripid +
                        ", Tarifa Sencilla :" + subTarifaSencillaCell +
                        "========================= "
                        +
                        "Zona : " + zoneSubSecondCell +
                        ", TipoUnidad : " + subRedondaCell_typeunit +
                        ", TipoViaje :" + subRedondaCell_typetripid +
                        ", Tarifa Sencilla :" + subTarifaRedondaCell  );
                });  --}}

    </script>
@endpush
@endsection
