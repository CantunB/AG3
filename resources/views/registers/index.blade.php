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
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <div class="text-md-right">
                                <a href="{{ route('registers.create') }}" class="btn btn-danger waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-plus mr-1"></i>{{ __('Add New')}}</a>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table table-sm table-nowrap table-borderless table-hover mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Pick up') }}</th>
                                    <th>{{ __('Agency') }}</th>
                                    <th>{{ __('Service') }}</th>
                                    <th>{{ __('Origin') }}</th>
                                    <th>{{ __('Destiny') }}</th>
                                    <th>{{ __('Terminal') }}</th>
                                    <th>{{ __('Airline') }}</th>
                                    <th>{{ __('Flight number') }}</th>
                                    <th>{{ __('Flight time') }}</th>
                                    <th>{{ __('Passenger') }}</th>
                                    <th>{{ __('Passenger number') }}</th>
                                    <th>{{ __('Requested unit') }}</th>
                                    <th>{{ __('Place of service') }}</th>
                                    <th>{{ __('Observations') }}</th>
                                    <th style="width: 82px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($registers as $register)
                                <tr>
                                    <td>{{ Carbon\Carbon::createFromTimeString($register->pickup)->toFormattedDateString()  }}</td>
                                    <td>{{ Carbon\Carbon::createFromTimeString($register->pickup)->format('g:i a')  }}</td>
                                    <td>{{ $register->agency->name }}</td>
                                    <td>{{ $register->type_service->name }}</td>
                                    <td>{{ $register->origin }}</td>
                                    <td>{{ $register->destiny }}</td>
                                    <td>{{ $register->terminal }}</td>
                                    <td>{{ $register->airline->name }}</td>
                                    <td>{{ $register->flight_number }}</td>
                                    <td>{{ Carbon\Carbon::createFromTimeString($register->flight_time)->format('g:i a')  }}</td>
                                    <td>{{ $register->passenger }}</td>
                                    <td>{{ $register->passenger_number }}</td>
                                    <td>
                                        @if($register->requested_unit == 1)
                                        Suburbam
                                        @else
                                        VAN
                                        @endif
                                    </td>
                                    <td>
                                        @if($register->place_service == 1)
                                        LOCAL
                                        @else
                                        CORREDOR
                                        @endif
                                    </td>
                                    <td>{{ $register->observations }}</td>
                                    <td>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- container -->


@endsection
