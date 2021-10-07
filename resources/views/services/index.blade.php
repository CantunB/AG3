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
                    <div class="row">
                        <div class="col-lg-8 order-lg-1 order-2">
                            <div class="card mb-2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <form class="form-inline">
                                                <div class="form-group">
                                                    <label for="inputPassword2" class="sr-only">Search</label>
                                                    <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="text-sm-right">
                                                <button type="button" class="btn btn-success waves-effect waves-light mr-1"><i class="mdi mdi-cog"></i></button>
                                                <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#custom-modal"><i class="mdi mdi-plus-circle mr-1"></i>{{ __('translation.Add New')}}</button>

                                            </div>
                                        </div><!-- end col-->
                                    </div>
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->

                            @foreach ($services as  $service)
                            <div class="card-box mb-2">

                                <div class="row align-items-center">
                                    <div class="avatar-lg">
                                        <p class="avatar-title bg-light text-dark font-22 rounded-circle">
                                            {{ Str::substr($service->name, 0, 2) }}
                                        </p>
                                    </div>
                                    <div class="col-sm-3">


                                        <div class="media">
                                            <div class="media-body">
                                                <h4 class="mt-0 mb-2 font-16">{{ $service->name }}</h4>
                                                <p class="mb-1"><b>{{ __('translation.Location') }}:</b> Seattle, Washington</p>
                                                <p class="mb-0"><b>{{ __('translation.Category') }}:</b> Ecommerce</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="text-center my-3 my-sm-0">
                                            <p class="mb-0 text-muted">{{ $service->created_at }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="text-center button-list">
                                            <a href="javascript: void(0);" class="btn btn-xs btn-primary waves-effect waves-light">Assign</a>
                                            <a href="javascript: void(0);" class="btn btn-xs btn-primary waves-effect waves-light">Call</a>
                                            <a href="javascript: void(0);" class="btn btn-xs btn-primary waves-effect waves-light">Email</a>
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="text-sm-right text-center mt-2 mt-sm-0">
                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                        </div>
                                    </div> <!-- end col-->
                                </div> <!-- end row -->
                            </div> <!-- end card-box-->
                            @endforeach

                        </div> <!-- end col -->

                        <div class="col-lg-4 order-lg-2 order-1">
                            <div class="card-box">
                                <h4 class="header-title mb-3">Leads Statics</h4>

                                <div class="text-center" dir="ltr">
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <h3 data-plugin="counterup">1,284</h3>
                                            <p class="text-muted font-13 mb-0 text-truncate">Leads Won</p>
                                        </div>
                                        <div class="col-6">
                                            <h3 data-plugin="counterup">7,841</h3>
                                            <p class="text-muted font-13 mb-0 text-truncate">Leads Lost</p>
                                        </div>
                                    </div>

                                    <div id="leads-statics" style="height: 280px;" class="morris-chart" data-colors="#4a81d4,#e3eaef"></div>

                                    <p class="text-muted font-15 font-family-secondary mb-0 mt-3">
                                        <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-blue"></i> Leads Won</span>
                                        <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-muted"></i> Leads Lost</span>
                                    </p>
                                </div>

                            </div> <!-- end card-box-->
                        </div> <!-- end col -->
                    </div>
                </div> <!-- end row -->
            </div> <!-- end card-box -->
        </div><!-- end col-->
    </div>
    <!-- end row -->


    <!-- end row -->
</div> <!-- container -->
@include('services.partials.create_modal')
@push('scripts')
<!--Morris Chart-->
    <script src="../assets/libs/morris.js06/morris.min.js"></script>
    <script src="../assets/libs/raphael/raphael.min.js"></script>
    <script src="../assets/js/pages/crm-leads.init.js"></script>
@endpush
@endsection
