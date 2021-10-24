@extends('layouts.app')
@section('content')
<div class="container-fluid">
<!-- start page title -->
    @component('layouts.includes.components.breadcrumb')
        @slot('title') {{ config('app.name', 'Laravel') }} @endslot
        @slot('subtitle') {{ __('translation.Units') }} @endslot
        @slot('teme') {{ __('translation.Create') }} @endslot
    @endcomponent
    <!-- end page title -->
<!-- end page title -->
<form id="form_register" method="POST" action="{{ route('units.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label for="type">{{ __('translation.Type') }}</label>
                                <select id="type" name="type" class="form-control" >
                                    <option value="" disabled selected>Selecciona un tipo de unidad</option>
                                    <option value="suburban">Tipo Suburban</option>
                                    <option value="van" >Tipo Van Camioneta</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label for="plate_number">{{ __('translation.Plate number') }}</label>
                                <input id="plate_number" name="plate_number" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label for="circulation_card">{{ __('translation.Circulation card') }}</label>
                                <input id="circulation_card" name="circulation_card" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label for="car_insurance">{{ __('translation.Car insurance') }}</label>
                                <input id="car_insurance" name="car_insurance" class="form-control">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="file_invoice_unit">{{ __('translation.Invoice unit') }}</label>
                                <input type="file" class="dropify" id="file_invoice_unit" name="file_invoice_unit" data-default-file="{{ asset('assets/images/attached-files/ejemplo_factura.jpg') }}" />
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="file_permission_sct">{{ __('translation.Permission SCT') }}</label>
                                <input type="file" class="dropify" id="file_permission_sct" name="file_permission_sct" data-default-file="{{ asset('assets/images/attached-files/ejemplo_permiso.png') }}" />
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="file_plate_sct">{{ __('Plate SCT') }}</label>
                                <input type="file" class="dropify" id="file_plate_sct" name="file_plate_sct" data-default-file="{{ asset('assets/images/attached-files/ejemplo_placa.jpg') }}" />
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="file_contract">{{ __('Contract') }}</label>
                                <input type="file" class="dropify" id="file_contract" name="file_contract" data-default-file="{{ asset('assets/images/attached-files/ejemplo_contrato.png') }}" />
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="file_car_insurance">{{ __('Car insurance') }}</label>
                                <input type="file" class="dropify" id="file_car_insurance" name="file_car_insurance" data-default-file="{{ asset('assets/images/attached-files/ejemplo_seguro.jpg') }}" />
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="file_circulation_card">{{ __('Circulation card') }}</label>
                                <input type="file" class="dropify" id="file_circulation_card" name="file_circulation_card" data-default-file="{{ asset('assets/images/attached-files/ejemplo_tarjeta.jpg') }}" />
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
    $('.dropify').dropify({
    messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happended.'
    }
});
</script>
@endpush

@endsection
