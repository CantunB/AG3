@extends('layouts.app')
@section('content')
<style>
    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color:#bfc8f1;
    }

    .Blanco {
        color: white;
    }.Plateado {
        color:rgb(192, 192, 192);
    }.Gris {
        color: rgb(155, 155, 155);
    }.Amarillo {
        color: rgb(255, 255, 0);
    }.Azul {
        color:#0000FF        ;
    }
    .Rojo {
        color: red;
    }
    .Negro {
        color: black;
    }
    .Azul oscuro{
        color: #00008B	;
    }
    .Dorado {
        color: rgb(239, 184, 16);
    }
</style>
<div class="container-fluid">
    @component('layouts.includes.components.breadcrumb')
        @slot('title') {{ config('app.name', 'Laravel') }} @endslot
        @slot('subtitle') {{ __('translation.Units') }} @endslot
        @slot('teme') {{ __('translation.Create') }} @endslot
    @endcomponent

<form id="form_register" method="POST" action="{{ route('units.store') }}" enctype="multipart/form-data" data-parsley-validate>
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <h4 class="mb-3 mt-0 font-18"> * DATOS FACTURACION</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label for="type">{{ __('translation.Type') }}</label>
                                <select id="type" name="type" class="form-control"  required >
                                    <option value="" disabled selected>Selecciona un tipo de unidad</option>
                                    <option data-icon="mdi mdi-car-estate" value="suburban">Camioneta tipo SUBURBAN</option>
                                    <option data-icon="mdi mdi-van-utility" value="van">Camioneta tipo VAN</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="brand">Marca</label>
                                <input id="brand" name="brand" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="model">Modelo</label>
                                <input id="model" name="model" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="color">Color</label>
                                <select id="color" name="color" class="form-control">
                                    <option value="" disabled selected>Selecciona un color</option>
                                    <option value="Blanco">Blanco</option>
                                    <option value="Plateado">Plateado</option>
                                    <option value="Gris">Gris</option>
                                    <option value="Amarillo">Amarillo</option>
                                    <option value="Azul">Azul</option>
                                    <option value="Rojo">Rojo</option>
                                    <option value="Negro">Negro</option>
                                    <option value="Azul oscuro">Azul oscuro</option>
                                    <option value="Dorado">Dorado</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="frame">Bastidor</label>
                                <input id="frame" name="frame" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="engine">Motor</label>
                                <input id="engine" name="engine" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="total_price">Precio</label>
                                <div class="input-group">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fe-dollar-sign"></i></span>
                                        <input id="total_price" name="total_price" class="form-control" step="0.01">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="file_contract">CONTRATO <em><b>(Subir solo archivo pdf)</b></em></label>
                                <input type="file" class="dropify" id="file_contract" name="file_contract" />
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="file_invoice_unit">FACTURA  <em><b>(Subir solo archivo pdf)</b></em></label>
                                <input type="file" class="dropify" id="file_invoice_unit" name="file_invoice_unit"/>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="file_invoice_letter">CARTA FACTURA <em><b>(Subir solo archivo pdf)</b></em></label>
                                <input type="file" class="dropify" id="file_invoice_letter" name="file_invoice_letter"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <h4 class="mb-3 mt-0 font-18"> * INFORMACION SCT (PERMISOS)</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sct_permissioon">No.permiso</label>
                                <input type="text" id="sct_permissioon" name="sct_permissioon" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label for="sct_plate_number">No.placa</label>
                                <input type="text" id="sct_plate_number" name="sct_plate_number" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sct_validity">Vigencia</label>
                                <input type="date" id="sct_validity" name="sct_validity" class="form-control">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="file_permission_sct">PERMISO SCT <em><b>(Subir solo archivo pdf)</b></em></label>
                                <input type="file" class="dropify" id="file_permission_sct" name="file_permission_sct" data-default-file="{{ asset('assets/images/attached-files/ejemplo_permiso.png') }}"/>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="file_sct_plate_number">PLACAS SCT  <em><b>(Subir solo archivo pdf)</b></em></label>
                                <input type="file" class="dropify" id="file_sct_plate_number" name="file_sct_plate_number" data-default-file="{{ asset('assets/images/attached-files/ejemplo_placa.jpg') }}"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <h4 class="mb-3 mt-0 font-18"> * POLIZA DE SEGURO</h4>
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="insurance_carrier">Aseguradora</label>
                                <input type="text" id="insurance_carrier" name="insurance_carrier" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label for="insurance_policy">No.poliza</label>
                                <input type="text" id="insurance_policy" name="insurance_policy" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="insurance_start_validity">Inicio de vigencia</label>
                                <input type="date" id="insurance_start_validity" name="insurance_start_validity" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="insurance_end_validity">Final de vigencia</label>
                                <input type="date" id="insurance_end_validity" name="insurance_end_validity" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="fiile_insurance_policy">Poliza de seguro <em><b>(Subir solo archivo pdf)</b></em> </label>
                                <input type="file" class="dropify" id="file_insurance_policy" name="file_insurance_policy" data-default-file="{{ asset('assets/images/attached-files/ejemplo_seguro.jpg') }}"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <h4 class="mb-3 mt-0 font-18"> * TARJETA DE CIRCULACION</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label for="circulation_card_number">Numero de tarjeta de circulacion</label>
                                <input id="circulation_card_number" name="circulation_card_number" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="file_circulation_card">Tarjeta de Circulacion <em><b>(Subir solo archivo pdf)</b></em></label>
                                <input type="file" class="dropify" id="file_circulation_card" name="file_circulation_card" data-default-file="{{ asset('assets/images/attached-files/ejemplo_tarjeta.jpg') }}"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <h4 class="mb-3 mt-0 font-18"> * TARJETA DE IDENTIFICACION AEROPUERTARIA (TIA)</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tia_number">No.Identificacion</label>
                                <input type="text" id="tia_number" name="tia_number" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="file_tia"> TIA <em><b>(Subir solo archivo pdf)</b></em></label>
                                <input type="file" class="dropify" id="file_tia" name="file_tia" />
                            </div>
                        </div>
                    </div>
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
@push('scripts')
<script>
    $(document).ready(function() {
        function formatText (icon) {
            return $('<span><i class="fas ' + $(icon.element).data('icon') + '"></i> ' + icon.text + '</span>');
        };
        $("#type").select2({
            width: "50%",
            templateSelection: formatText,
            templateResult: formatText
        });
    });

    function formatState (color) {
        //var baseUrl = "/user/pages/images/flags";
        var $state = $(
            '<span><i class="mdi mdi-checkbox-blank-circle mr-1 '+color.text+' "></i>' + color.text  + '</span>'
          //'<span><img src="' + baseUrl + '/' + state.element.value.toLowerCase() + '.png" class="img-flag" /> ' + state.text + '</span>'
        );
        return $state;
    };

    $("#color").select2({
        templateResult: formatState
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
    $("#form_register").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "{!! route('units.store') !!}",
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function(response){
                console.log(response.data);
                Swal.fire({
                    title: "Registro creado!",
                    text: response.data,
                    icon: "success",
                    timer: 3500
                });
                window.location = '{!! route('units.index') !!}';
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
