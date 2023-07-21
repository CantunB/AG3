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
                    <div class="card-box">
                        <i class="fa fa-edit text-muted float-right" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit"></i>
                        <h4 class="mt-0 font-16">Tarifas pagina web</h4>
                        <h2 class="text-success my-3 text-center">{{ $cu->Symbol }}<span data-plugin="counterup">{{ $cu->CurrencyValue }}</span></h2>
                        <p class="text-muted mb-0"> {{ $cu->CurrencyName }}  <span class="float-right">{{ $cu->CurrencyISO }}</span> </p>
                            {{--  <span class="float-right"><i class="fa fa-caret-up text-success mr-1"></i>10.25%</span></p>  --}}
                    </div>
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
                                                <h2 class="text-center text-primary text-uppercase  header-title mb-4">tarifas en pesos</h2>

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
                                                                <th rowspan="3" style="background-color:#FDFEFE"></th>
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
                                                                            ${{$item->MXN}} MXN
                                                                        </td>
                                                                        <td class="tarifas" style="display: none">
                                                                            {{$item->MXN}}
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

                                                <h2 class="text-center mt-3 text-primary text-uppercase  header-title mb-4">Conversion de tarifas en DOLAR</h2>

                                                <div class="table-responsive">
                                                    <table id="table_reg"  class="table table-sm table-centered table-bordered  text-center dt-responsive nowrap w-100  dtr-inline">
                                                        <thead>
                                                                <colgroup>
                                                                    <col class="text-center ">
                                                                    <col class="text-center " >
                                                                    <col class="text-center " >
                                                                    <col class="text-center " >
                                                                    <col class="text-center " >
                                                                </colgroup>
                                                            <tr>
                                                                <th rowspan="3" >ZONA</th>
                                                                <th colspan="4" >Tipo de unidad</th>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="2" class="text-dark">Suburban</th>
                                                                <th colspan="2" class="text-dark">Van</th>
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
                                                                        <td class="text-center text-dark dolar">
                                                                            $<strong>{{$item->MXN}}</strong>
                                                                        </td>
                                                                        @endif
                                                                    @endforeach
                                                            @endforeach
                                                    </table>
                                                </div>

                                                <h2 class="text-center mt-3 text-primary text-uppercase header-title mb-4">Conversion de tarifas en EURO </h2>


                                                <div class="table-responsive">
                                                    <table id="table_reg"  class="table table-sm table-centered table-bordered  text-center dt-responsive nowrap w-100  dtr-inline">
                                                        <thead>
                                                                <colgroup>
                                                                    <col class="text-center ">
                                                                    <col class="text-center ">
                                                                    <col class="text-center ">
                                                                    <col class="text-center ">
                                                                    <col class="text-center ">
                                                                </colgroup>
                                                            <tr>
                                                                <th rowspan="3" style="background-color:#FDFEFE">ZONA</th>
                                                                <th colspan="4" style="background-color:#FDFEFE">Tipo de unidad</th>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="2" class="text-dark">Suburban</th>
                                                                <th colspan="2" class="text-dark">Van</th>
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
                                                                        <td class="text-center text-dark euro">
                                                                            ${{$item->MXN}}
                                                                        </td>
                                                                        @endif
                                                                    @endforeach
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
@push('scripts')
    <script>
        const formatterDolar = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD'
        });
        let peso = 1;
        let dolar = {!! $currency[1]->CurrencyValue !!};
        window.addEventListener('load', function(){
            var array = new Array();
            var array_etiqutas = new Array();
            var array_inputs = new Array();
            var array_inputs_mx = new Array();
            var array_divisas_inputs = new Array();
            //alert("Hola, soy una alerta que sólo aparecerá 1 vez.");
            const elements = document.querySelectorAll('.tarifas');
            Array.from(elements).forEach((element, index) => {
                //console.log(element.innerHTML);
                array.push(parseFloat(element.innerHTML));
                //console.log(precio);
            });

            etiquetas = document.querySelectorAll('.dolar');
            Array.from(etiquetas).forEach((etiqueta, index) => {
                array_etiqutas.push(etiqueta);
            });

            inputs = document.querySelectorAll('.dolar');
            Array.from(inputs).forEach((input, index) => {
                array_inputs.push(input);
            });

            inputs_mx = document.querySelectorAll('.dolar');
            Array.from(inputs_mx).forEach((input_mx, index) => {
                array_inputs_mx.push(input_mx);
            });

            divas_inputs = document.querySelectorAll('.dolar');
            Array.from(divas_inputs).forEach((divisa_input, index) => {
                array_divisas_inputs.push(divisa_input);
            });

                /*Aqui ira el script cuando mi idioma detectado es ingles */
                Array.from(array).forEach((element, index) => {

                    divisa = Math.round(element/dolar * 100) / 100;
                    //console.log(formatterDolar.format(divisa))
                    new_divisa = formatterDolar.format(divisa)
                    array_etiqutas[index].innerHTML = new_divisa + " USD"
                    array_inputs[index].value = divisa
                    array_inputs_mx[index].value = element
                    array_divisas_inputs[index].value = "USD"

                });

        }, false);
    </script>
    <script>
        const formatterEuro = new Intl.NumberFormat('de-DE', {
            style: 'currency',
            currency: 'EUR'
        });
        let pesos = 1 // Valor de divisa Peso
        let euro = {!!  $currency[3]->CurrencyValue  !!} //Valor de divisa Euro
        window.addEventListener('load', function(){
            var array = new Array();
            var array_etiqutas = new Array();
            var array_inputs = new Array();
            var array_inputs_mx = new Array();
            var array_divisas_inputs = new Array();
            //alert("Hola, soy una alerta que sólo aparecerá 1 vez.");
            const elements = document.querySelectorAll('.tarifas');
            Array.from(elements).forEach((element, index) => {
                //console.log(element.innerHTML);
                array.push(parseFloat(element.innerHTML));
                //console.log(precio);
            });

            etiquetas = document.querySelectorAll('.euro');
            Array.from(etiquetas).forEach((etiqueta, index) => {
                array_etiqutas.push(etiqueta);
            });

            inputs = document.querySelectorAll('.euro');
            Array.from(inputs).forEach((input, index) => {
                array_inputs.push(input);
            });

            inputs_mx = document.querySelectorAll('.euro');
            Array.from(inputs_mx).forEach((input_mx, index) => {
                array_inputs_mx.push(input_mx);
            });

            divas_inputs = document.querySelectorAll('.euro');
            Array.from(divas_inputs).forEach((divisa_input, index) => {
                array_divisas_inputs.push(divisa_input);
            });

                /*Aqui ira el script cuando mi idioma detectado es ingles */
                Array.from(array).forEach((element, index) => {
                    divisa = Math.round(element/euro * 100) / 100;
                    //console.log(formatterEuro.format(divisa));
                    new_divisa = formatterEuro.format(divisa)
                    array_etiqutas[index].innerHTML = new_divisa
                    array_inputs[index].value = divisa
                    array_inputs_mx[index].value = element
                    array_divisas_inputs[index].value = "EUR"

                });

        }, false);
    </script>
@endpush
@endsection
