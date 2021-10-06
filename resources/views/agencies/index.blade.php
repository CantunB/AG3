@extends('layouts.app')
@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    @component('layouts.includes.components.breadcrumb')
        @slot('title') {{ config('app.name', 'Laravel') }} @endslot
        @slot('subtitle') {{ __('translation.Agencies') }} @endslot
        @slot('teme') {{ __('translation.List') }} @endslot
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
                            <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#custom-modal"><i class="mdi mdi-plus-circle mr-1"></i>{{ __('translation.Add New')}}</button>
                        </div>
                    </div><!-- end col-->
                </div> <!-- end row -->
            </div> <!-- end card-box -->
        </div><!-- end col-->
    </div>
    <!-- end row -->

        <div class="row">
            @foreach ($agencies as $agencie)
                <div class="col-lg-4">
                    <div class="card-box bg-pattern">
                        <div class="text-center">
                            <img src="https://images.vexels.com/media/users/3/128923/isolated/preview/0f916b8448f91ec54ddde2efb8a74ddb-icono-redondo-de-maleta-de-aeropuerto-de-viaje.png" alt="logo" class="avatar-xl rounded-circle mb-3">
                            <h4 class="mb-1 font-18"></h4>
                            <p class="text-muted  font-14">{{ $agencie->name }}</p>
                        </div>

                        <p class="font-14 text-center text-muted">
                            {{ $agencie->address }}
                        </p>

                        <div class="text-center">
                            <a href="javascript:void(0);" class="btn btn-sm btn-light">{{ __('translation.View more info') }}</a>
                        </div>

                        <div class="row mt-4 text-center">
                            <div class="col-6">
                                <h5 class="font-weight-normal text-muted">{{ __('translation.Revenue') }}</h5>
                                <h4>17,786 cr</h4>
                            </div>
                            <div class="col-6">
                                <h5 class="font-weight-normal text-muted">{{ __('translation.Services') }}</h5>
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
                    {{ $agencies->links() }}
                </ul>
            </div>
        </div>
    </div>

    <!-- end row -->
</div> <!-- container -->
@include('agencies.partials.create_modal')
@endsection
