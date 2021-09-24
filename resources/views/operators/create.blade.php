@extends('layouts.app')
@section('content')
<div class="container-fluid">
<!-- start page title -->
    @component('layouts.includes.components.breadcrumb')
        @slot('title') {{ config('app.name', 'Laravel') }} @endslot
        @slot('subtitle') {{ __('Operator') }} @endslot
        @slot('teme') {{ __('Create') }} @endslot
    @endcomponent
    <!-- end page title -->
<!-- end page title -->
<form id="form_register" method="POST" action="{{ route('operators.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="form-group ">
                                <label>{{ __('Name') }}</label>
                                <input id="name" name="name" type="text" class="form-control"  required placeholder="{{ __('Enter name') }}">
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="projectname">{{ __('Last name') }}</label>
                                <input id="paterno" name="paterno" type="text" class="form-control" required placeholder="{{ __('Enter last name') }}">
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label>{{ __('Mother last name') }}</label>
                                <input id="materno" name="materno" type="text" class="form-control" required placeholder="{{ __('Enter mother last name') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="project-priority">{{ __('Phone') }}</label>
                                <input name="phone" id="phone" class="form-control" required placeholder="{{ __('Phone') }}">
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="project-priority">{{ __('Email') }}</label>
                                <input id="email" name="email" type="email" class="form-control" required placeholder="{{ __('Email') }}">
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="project-priority">{{ __('Password') }}</label>
                                <input id="password" name="password" type="password" class="form-control" required placeholder="{{ __('Password') }}">
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="project-priority">{{ __('Birthday Date') }}</label>
                                <input id="birthday_date" name="birthday_date" type="date" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="project-priority">{{ __('Address') }}</label>
                                <input id="addres" name="address" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label for="project-priority">{{ __('C.P.') }}</label>
                                <input id="cp" name="cp" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="project-priority">{{ __('Birth Certificate') }}</label>
                                <input type="file" class="dropify" id="birth_certificate" name="birth_certificate" data-default-file="{{ asset('assets/images/attached-files/img-6.png') }}" />
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="project-priority">{{ __('Proof address') }}</label>
                                <input type="file" class="dropify" id="proof_address" name="proof_address" data-default-file="{{ asset('assets/images/attached-files/img-7.png') }}" />
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="project-priority">{{ __('NSS') }}</label>
                                <input type="file" class="dropify" id="nss" name="nss" data-default-file="{{ asset('assets/images/attached-files/img-8.jpg') }}" />
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="project-priority">{{ __('CURP') }}</label>
                                <input type="file" class="dropify" id="curp" name="curp" data-default-file="{{ asset('assets/images/attached-files/img-9.jpg') }}" />
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="project-priority">{{ __('RFC') }}</label>
                                <input type="file" class="dropify" id="rfc" name="rfc" data-default-file="{{ asset('assets/images/attached-files/img-10.png') }}" />
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="project-priority">{{ __('INE') }}</label>
                                <input type="file" class="dropify" id="ine" name="ine" data-default-file="{{ asset('assets/images/attached-files/img-11.jpg') }}" />
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="project-priority">{{ __('Driver License') }}</label>
                                <input type="file" class="dropify" id="driver_license" name="driver_license" data-default-file="{{ asset('assets/images/attached-files/img-12.png') }}" />
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="project-priority">{{ __('Operator Photo') }}</label>
                                <input type="file" class="dropify" id="operator_photo" name="operator_photo" data-default-file="{{ asset('assets/images/attached-files/img-5.jpg') }}" />
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-success waves-effect waves-light m-1"><i class="fe-check-circle mr-1"></i>{{ __('Create') }}</button>
                            <a href="javascript: history.go(-1)" class="btn btn-light waves-effect waves-light m-1"><i class="fe-x mr-1"></i>{{ __('Cancel') }}</a>
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
    document.getElementById("birthday_date").flatpickr({
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
    //  defaultDate: "{!! date('Y-m-d') !!}"
    });
</script>
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
