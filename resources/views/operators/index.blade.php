@extends('layouts.app')
@section('content')
 <!-- Start Content-->
 <div class="container-fluid">
    <!-- start page title -->
    @component('layouts.includes.components.breadcrumb')
        @slot('title') {{ config('app.name', 'Laravel') }} @endslot
        @slot('subtitle') {{ __('translation.Operators') }} @endslot
        @slot('teme') {{ __('translation.List') }} @endslot
    @endcomponent
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <a href="{{ route('operators.create') }}" class="btn btn-danger waves-effect waves-light mb-2">{{ __('translation.Add New') }}</a>
                            </div>
                        </div><!-- end col-->
                    </div>
                    <div class="table-responsive">
                        <table id="table_operators" class="table table-sm table-centered table-nowrap table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>{{ __('translation.Fullname') }}</th>
                                    <th>{{ __('translation.Phone') }}</th>
                                    <th>{{ __('translation.Email') }}</th>
                                    <th>{{ __('translation.Status') }}</th>
                                    <th style="width: 82px;">{{ __('translation.Options') }}</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->

    <div class="col-lg-4">
            <div class="card-box">
                <div class="media mb-3">
                    <img class="d-flex mr-3 rounded-circle avatar-lg" id="getFoto" src="{{ asset('assets/images/users/user-12.png') }}" alt="Generic placeholder image">
                    <div class="media-body">
                        <h4 class="mt-0 mb-1" id="getNombre"></h4>
                        <p class="text-muted"><i class="mdi mdi-car-arrow-right"></i>Operador</p>
                        <span id="getStatus"></span>
                        {{-- <a href="javascript: void(0);" class="btn- btn-xs btn-secondary">Call</a>
                        <a href="javascript: void(0);" class="btn- btn-xs btn-secondary">Edit</a> --}}
                    </div>
                </div>

                <h5 class="mb-3 mt-4 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle mr-1"></i>{{ __('translation.Personal Information') }}</h5>
                <div class="">
                    <h4 class="font-13 text-muted text-uppercase mb-1">{{ __('translation.Date of Birth') }} :</h4>
                    <p class="mb-3" id="getDate"> </p>
                    <h4 class="font-13 text-muted text-uppercase mb-1">{{ __('translation.Email') }} :</h4>
                    <p class="mb-3" id="getEmail"></p>
                    <h4 class="font-13 text-muted text-uppercase mb-1">{{ __('translation.Phone') }}</h4>
                    <p class="mb-3" id="getPhone"></p>
                </div>

                <h5 class="card-title font-16 mb-3">{{ __('translation.Attachments') }}</h5>

                <div id="getFiles" class="card mb-1 shadow-none border">

                </div>

                {{-- <div class="card mb-1 shadow-none border">
                    <div class="p-1">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="avatar-sm">
                                    <span class="avatar-title badge-soft-primary text-primary rounded">
                                        doc
                                    </span>
                                </div>
                            </div>
                            <div class="col pl-0">
                                <a href="javascript:void(0);" class="text-muted font-weight-bold">paypal-statement.docs</a>
                                <p class="mb-0 font-12">0.25 MB</p>
                            </div>
                            <div class="col-auto">
                                <!-- Button -->
                                <a href="javascript:void(0);" class="btn btn-link font-16 text-muted">
                                    <i class="dripicons-download"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-0 shadow-none border">
                    <div class="p-1">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-secondary rounded">
                                        pdf
                                    </span>
                                </div>
                            </div>
                            <div class="col pl-0">
                                <a href="javascript:void(0);" class="text-muted font-weight-bold">visa-credit-card.pdf</a>
                                <p class="mb-0 font-12">1.05 MB</p>
                            </div>
                            <div class="col-auto">
                                <!-- Button -->
                                <a href="javascript:void(0);" class="btn btn-link font-16 text-muted">
                                    <i class="dripicons-download"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>

</div> <!-- container -->
@push('scripts')

<script>
    $(document).ready(function(){
        $('#table_operators').DataTable({
                processing: true,
                serverSide: true,
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
                ajax: '{!! route('operators.index') !!}',
                columns: [
                //    {data: 'DT_RowIndex', name:'DT_RowIndex' ,className: 'text-center'},
                    {data: 'name', name:'name',},
                    {data: 'phone', name:'phone',className:'text-center'},
                //    {data: 'celular', name:'celular', orderable: false },
                    {data: 'email', name:'email', className:'text-center', orderable: false },
                    {data: 'status', name: 'status', className: 'text-center'},
                //    {data: 'rol', name:'rol', orderable: false },
                    {data: 'options', name:'options',className: 'text-center' ,searchable: false, orderable: false},
            ],
        });
    });
</script>

<script>
    function btnInfo(id) {
        $.ajax({
            url: 'operators/'+ id,
            data: {
                 id : id
               // 'id': id,
              //  '_token': "{{ csrf_token() }}"
            },
            type: "GET",
            success: function (response){
            console.log(response);
            $('#getFoto').attr('src', response.data['operator_photo'] );
            $("#getNombre").html(response.fullname);
            $('#getEmail').html(response.data['email']);
            $('#getPhone').html(response.data['phone']);
            $('#getDate').html(response.data['birthday_date']);
            $('#getStatus').html(response.status);
            $.each( response, function( key, value ) {
                //console.log( key + ": " + value );
                $('#getFiles').html(value) ;
              });
            }

        });
    }
</script>

@endpush
@endsection
