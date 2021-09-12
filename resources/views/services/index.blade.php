@extends('layouts.app')
@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    @component('layouts.includes.components.breadcrumb')
        @slot('title') {{ config('app.name', 'Laravel') }} @endslot
        @slot('subtitle') {{ __('Services') }} @endslot
        @slot('teme') {{ __('List') }} @endslot
    @endcomponent
    <!-- end page title -->


    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="row">
            <!--    <div class="col-lg-8">
                        <form class="form-inline">
                            <div class="form-group">
                                <label for="inputPassword2" class="sr-only">Search</label>
                                <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                            </div>
                            <div class="form-group mx-sm-3">
                                <label for="status-select" class="mr-2">Sort By</label>
                                <select class="custom-select" id="status-select">
                                    <option>Select</option>
                                    <option>Date</option>
                                    <option selected>Name</option>
                                    <option>Revenue</option>
                                    <option>Employees</option>
                                </select>
                            </div>
                        </form>
                    </div> -->
                    <div class="col-lg-12">
                        <div class="text-lg-right mt-3 mt-lg-0">
                            <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#custom-modal"><i class="mdi mdi-plus-circle mr-1"></i>{{ __('Add New')}}</button>
                        </div>
                    </div><!-- end col-->
                </div> <!-- end row -->
            </div> <!-- end card-box -->
        </div><!-- end col-->
    </div>
    <!-- end row -->


    <!-- end row -->
</div> <!-- container -->
@include('services.partials.create_modal')
@endsection
