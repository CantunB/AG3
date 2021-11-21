@extends('layouts.app')
@section('content')
<div class="container-fluid">
<!-- start page title -->
    @component('layouts.includes.components.breadcrumb')
        @slot('title') {{ config('app.name', 'Laravel') }} @endslot
        @slot('subtitle') {{ __('translation.Operators') }} @endslot
        @slot('teme') {{ __('translation.Create') }} @endslot
    @endcomponent
    <!-- end page title -->
<!-- end page title -->
<form id="form_register" method="POST" action="{{ route('operators.store') }}" enctype="multipart/form-data" data-parsley-validate>
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="form-group ">
                                <label>{{ __('translation.Name') }}</label>
                                <input id="name" name="name" type="text" class="form-control" placeholder="{{ __('Enter name') }}" required minlength="3" >
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="projectname">{{ __('translation.Last name') }}</label>
                                <input id="paterno" name="paterno" type="text" class="form-control"  placeholder="{{ __('Enter last name') }}" required minlength="3">
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label>{{ __('translation.Mother last name') }}</label>
                                <input id="materno" name="materno" type="text" class="form-control" placeholder="{{ __('Enter mother last name') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="project-priority">{{ __('translation.Phone') }}</label>
                                <input type="number" name="phone" id="phone" class="form-control" required placeholder="{{ __('Phone') }}" data-parsley-type="digits"
                                data-parsley-validation-threshold="1"   data-parsley-trigger="keyup" min="10" value="{{ old('phone') }}">
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="project-priority">{{ __('translation.Email') }}</label>
                                <input id="email" name="email" type="email" class="form-control" required placeholder="{{ __('Email') }}">
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="project-priority">{{ __('translation.Birthday Date') }}</label>
                                <input id="birthday_date" name="birthday_date" type="date" class="form-control" >
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="project-priority">{{ __('translation.Address') }}</label>
                                <input id="addres" name="address" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label for="project-priority">{{ __('translation.Postal code') }}</label>
                                <input id="cp" name="cp" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="project-priority">{{ __('translation.Birth Certificate') }}</label>
                                <input type="file" class="dropify" id="birth_certificate" name="birth_certificate" data-default-file="{{ asset('assets/images/attached-files/img-6.png') }}" />
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="project-priority">{{ __('translation.Proof address') }}</label>
                                <input type="file" class="dropify" id="proof_address" name="proof_address" data-default-file="{{ asset('assets/images/attached-files/img-7.png') }}" required />
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="project-priority">{{ __('NSS') }}</label>
                                <input type="file" class="dropify" id="nss" name="nss" data-default-file="{{ asset('assets/images/attached-files/img-8.jpg') }}" required/>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="project-priority">{{ __('CURP') }}</label>
                                <input type="file" class="dropify" id="curp" name="curp" data-default-file="{{ asset('assets/images/attached-files/img-9.jpg') }}" required />
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="project-priority">{{ __('RFC') }}</label>
                                <input type="file" class="dropify" id="rfc" name="rfc" data-default-file="{{ asset('assets/images/attached-files/img-10.png') }}" required/>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="project-priority">{{ __('INE') }}</label>
                                <input type="file" class="dropify" id="ine" name="ine" data-default-file="{{ asset('assets/images/attached-files/img-11.jpg') }}" required />
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="project-priority">{{ __('translation.Driver License') }}</label>
                                <input type="file" class="dropify" id="driver_license" name="driver_license" data-default-file="{{ asset('assets/images/attached-files/img-12.png') }}" required />
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="project-priority">{{ __('translation.Operator Photo') }}</label>
                                <input type="file" class="dropify" id="operator_photo" name="operator_photo" data-default-file="{{ asset('assets/images/attached-files/img-5.jpg') }}" required />
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
            url: "{!! route('operators.store') !!}",
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
                    timer: 3500
                });
                window.location = '{!! route('operators.index') !!}';
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
