@extends('layouts.app')
@section('content')
<style>
    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color:#bfc8f1;
    }
</style>
<div class="container-fluid">

    <!-- start page title -->
    @component('layouts.includes.components.breadcrumb')
        @slot('title') {{ config('app.name', 'Laravel') }} @endslot
        @slot('subtitle') {{ __('translation.Services') }} @endslot
        @slot('teme') {{ __('translation.Assign' ) }} servicio  @endslot
    @endcomponent
    <!-- end page title -->
 <!-- end page title -->
 <form id="form_register" method="POST" action="{{ route('assign.store') }}">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="form-group ">
                                <label>{{ __('translation.Date') }}</label>
                                <input type="text" class="form-control" readonly id="date" name="date" placeholder="{{ date('Y-m-d') }}"  required>
                            </div>
                        </div>
                        <input type="hidden" value="{{ $register->id }}" name="id_register" id="id_register">
                    </div>
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="project-priority">{{ __('translation.Units') }}</label>
                                <select id="id_unit" name="id_unit" class="form-control" data-toggle="select2">
                                    <option value="" disabled selected>Selecciona una unidad</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}"> {{ $unit->unit }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="project-priority">{{ __('translation.Operators') }}</label>
                                <select id="id_operator" name="id_operator" class="form-control" data-toggle="select2">
                                    <option value="" disabled selected>Selecciona un operdor</option>
                                    @foreach ($operators as $operator)
                                        <option value="{{ $operator->id }}"> {{ $operator->name }} {{ $operator->paterno }} {{ $operator->materno }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="project-priority">Precio del servicio</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"  id="inputGroupPrepend">$</span>
                                    <input id="price" name="price" class="form-control">
                                </div>
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
        noCalendar: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
        defaultDate: "{!! date('Y-m-d') !!}"
    });
</script>
<script>
    $(document).ready(function() {
        $('#id_unit').select2();
    });
    $(document).ready(function() {
        $('#id_operator').select2();
    });
</script>

@endpush
@endsection
