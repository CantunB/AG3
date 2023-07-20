@extends('layouts.app')
@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        {{--  <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>  --}}
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hoteles</a></li>
                        <li class="breadcrumb-item active">Crear Hotel</li>
                    </ol>
                </div>
                <h4 class="page-title">Registrar Hotel</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="projectname">ZONA</label>
                                    <select class="form-control" name="id_zona" id="id_zona" required>
                                        <option value="{{ $hotel->id_zona }}" >ZONA {{ $hotel->id_zona }}</option>
                                        @foreach ($zonas as $z)
                                            <option value="{{ $z->zona }}" >ZONA {{ $z->zona }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <label for="countries" class="form-label"> {{__('PAIS')}} </label>
                            <div class="input-group">
                                <select required id="countries" name="country_id" class="form-control countries">
                                    <option selected value="null" disabled> {{__('Selecciona un pais')}} </option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3 mb-3">
                            <label for="states" class="form-label">{{__('ESTADO')}}</label>
                            <div class="input-group">
                                <select required id="states" name="state_id" class="form-control states">
                                    <option selected value="null" disabled> {{ $hotel->state}} </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3 mb-3">
                            <label for="states" class="form-label">{{__('CIUDAD')}}</label>
                            <div class="input-group">
                                <select required id="cities" name="city_id" class="form-control cities">
                                    <option selected value="null" disabled> {{ $hotel->ciudad}} </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="projectname">DIRECCION</label>
                                    <input type="text" id="direccion" name="address" class="form-control" value="{{ old('direccion') ?? $hotel->address }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="projectname">LOCALIDAD</label>
                                    <input type="text" id="localidad" name="localidad" class="form-control" value="{{ old('localidad') ?? $hotel->localidad }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="projectname">CP</label>
                                    <input type="text" id="cp" name="cp" class="form-control" value="{{ old('cp') ?? $hotel->cp }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="projectname">TELEFONO</label>
                                    <input type="text" id="projectname" name="telephone" class="form-control" value="{{ old('direccion') ?? $hotel->telephone }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="projectname">HOTEL</label>
                                    <input type="text" id="hotel" name="hotel" class="form-control" value="{{ old('hotel') ?? $hotel->hotel }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="projectname"></label>
                                    <input type="hidden" id="projectname" name="latitude" class="form-control" placeholder="Enter project name">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="projectname"></label>
                                    <input type="hidden" id="projectname" name="longitude" class="form-control" placeholder="Enter project name">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <a href="{{ url()->previous() }}" type="button" class="btn btn-light waves-effect waves-light m-1"><i class="fe-x mr-1"></i> Cancelar</a>
                            <button type="button" class="btn btn-success waves-effect waves-light m-1"><i class="fe-check-circle mr-1"></i> Crear</button>
                        </div>
                    </div>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row-->

</div>
@push('scripts')
    <script>
        $(document).ready(function () {
            $('.countries').on('change', function () {
                var idCountry = this.value;
                $("#states").html('');

                //Mostramos los valores en consola:
                //var userLanguage = window.navigator.userLanguage || window.navigator.language;
                $.ajax({
                    url:    "{{route('fetchState')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        //_token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function (result) {
                        $('.states').html('<option value="">Selecciona un Estado</option>');
                        $.each(result.states, function (key, value) {
                            $(".states").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.states').on('change', function () {
                var idState = this.value;
                $("#cities").html('');

                //Mostramos los valores en consola:
                //var userLanguage = window.navigator.userLanguage || window.navigator.language;
                $.ajax({
                    url:    "{{route('fetchCities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        //_token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function (result) {
                        $('.cities').html('<option value="">Selecciona una Ciudad</option>');
                        $.each(result.cities, function (key, value) {
                            $(".cities").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endpush

@endsection
