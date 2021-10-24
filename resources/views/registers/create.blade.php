@extends('layouts.app')
@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    @component('layouts.includes.components.breadcrumb')
        @slot('title') {{ config('app.name', 'Laravel') }} @endslot
        @slot('subtitle') {{ __('translation.Services') }} @endslot
        @slot('teme') {{ __('translation.List') }} @endslot
    @endcomponent
    <!-- end page title -->
 <!-- end page title -->
 <form id="form_register" method="POST" action="{{ route('registers.store') }}">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="form-group ">
                                <label>{{ __('translation.Date') }}</label>
                                <input type="text" class="form-control select" id="date" name="date" placeholder="{{ date('Y-m-d') }}" required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="project-priority">{{ __('translation.Agency') }}</label>
                                <select id="agency" name="agency_id" class="form-control" data-toggle="select2">
                                    <option value="" disabled selected>Selecciona una agencia</option>
                                    @foreach ($agencies as $agency)
                                        <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="project-priority">{{ __('translation.Type of service') }}</label>
                                <select id="type_service" name="type_service_id" class="form-control" data-toggle="select2">
                                    <option value="" disabled selected>Selecciona un servicio</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="project-priority">{{ __('translation.Airlines') }}</label>
                                <select id="airline" name="airline_id" class="form-control" data-toggle="select2">
                                    <option value="" disabled selected>Selecciona una aerolinea</option>
                                    @foreach ($airlines as $airline)
                                        <option value="{{ $airline->id }}">{{ $airline->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label for="project-priority">{{ __('translation.Terminal') }}</label>
                                <select id="terminal" name="terminal" class="form-control" data-toggle="select2">
                                    <option value="" disabled selected>Selecciona una terminal</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-2">
                            <div class="form-group">
                                <label for="projectname">{{ __('translation.Flight number') }}</label>
                                <input id="flight_number"name="flight_number" type="text" class="form-control" placeholder="{{ __('Enter flight number') }}">
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label>{{ __('translation.Flight time') }}</label>
                                <input id="flight_time" name="flight_time" type="text" class="form-control select" placeholder="{{ date('H:i') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="project-priority">{{ __('translation.Origin') }}</label>
                                <input id="origin" name="origin" class="form-control" list="my_origin">
                                    <datalist id="my_origin">
                                        <option value="ALAYA TULUM">
                                        <option value="AEROPUERTO">
                                    </datalist>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="project-priority">{{ __('translation.Destiny') }}</label>
                                <input id="destiny" name="destiny" class="form-control" list="my_destiny">
                                    <datalist id="my_destiny">
                                        <option value="ALAYA TULUM">
                                        <option value="AEROPUERTO">
                                    </datalist>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="project-priority">{{ __('translation.Passenger') }}</label>
                                <input class="form-control" name="passenger" id="passenger">
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label for="project-priority">{{ __('translation.Passenger number') }}</label>
                                <input type="number" class="form-control" name="passenger_number" id="passenger_number">
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label>{{ __('translation.Pick Up') }}</label>
                                <input type="text" class="form-control select" id="pickup" name="pickup" placeholder="{{ date('H:i') }}" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="project-priority">{{ __('translation.Requested unit') }}</label>
                                <select id="requested_unit" name="requested_unit" class="form-control" data-toggle="select2">
                                    <option>Select</option>
                                    <option value="1">Suburbam</option>
                                    <option value="2">Van VW</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="project-priority">{{ __('translation.Place of service') }}</label>
                                <select id="place_serve" name="place_service" class="form-control" data-toggle="select2">
                                    <option>Select</option>
                                    <option value="Local">Local</option>
                                    <option value="Corredor">Corredor</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label>{{ __('translation.Observations') }}</label>
                                <input type="text" class="form-control" id="observations" name="observations" >
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-success waves-effect waves-light m-1"><i class="fe-check-circle mr-1"></i>{{ __('translation.Create') }}</button>
                            <a href="javascript: history.go(-1)" class="btn btn-light waves-effect waves-light m-1"><i class="fe-x mr-1"></i>{{ __('translation.Cancel') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </form>
</div>

<!-- end row-->
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
    document.getElementById("flight_time").flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        defaultDate: "{!!  date('H:i') !!}"

    });
</script>
<script>
    document.getElementById("pickup").flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
    });
</script>
<script>
    $(".destiny").select2({
        tags: true
    });
</script>

@endpush
@endsection
