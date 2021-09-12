@extends('layouts.app')
@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    @component('layouts.includes.components.breadcrumb')
        @slot('title') {{ config('app.name', 'Laravel') }} @endslot
        @slot('subtitle') {{ __('Airlines') }} @endslot
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

        <div class="row">
            @foreach ($airlines as $airline)
                <div class="col-lg-4">
                    <div class="card-box bg-pattern">
                        <div class="text-center">
                            <img src="https://cdn-icons-png.flaticon.com/512/284/284981.png" alt="logo" class="avatar-xl rounded-circle mb-3">
                            <h4 class="mb-1 font-18"></h4>
                            <p class="text-muted  font-14">{{ $airline->name }}</p>
                        </div>

                        <p class="font-14 text-center text-muted">
                            {{ $airline->address }}
                        </p>

                        <div class="text-center">
                            <a href="javascript:void(0);" class="btn btn-sm btn-light">{{ __('View more info') }}</a>
                        </div>

                        <div class="row mt-4 text-center">
                            <div class="col-6">
                                <h5 class="font-weight-normal text-muted">{{ __('Revenue') }}</h5>
                                <h4>17,786 cr</h4>
                            </div>
                            <div class="col-6">
                                <h5 class="font-weight-normal text-muted">{{ __('Services') }}</h5>
                                <h4>566k</h4>
                            </div>
                        </div>
                    </div> <!-- end card-box -->
                </div><!-- end col -->
            @endforeach
        </div>

    <div class="row">
        <div class="col-12">
            <div class="text-right">
                <ul class="pagination pagination-rounded justify-content-end">
                    {{ $airlines->links() }}
                </ul>
            </div>
        </div>
    </div>

    <!-- end row -->
</div> <!-- container -->
@include('airlines.partials.create_modal')
@endsection
