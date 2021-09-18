@extends('layouts.app')
@section('content')
 <!-- Start Content-->
 <div class="container-fluid">
    <!-- start page title -->
    @component('layouts.includes.components.breadcrumb')
        @slot('title') {{ config('app.name', 'Laravel') }} @endslot
        @slot('subtitle') {{ __('Operators') }} @endslot
        @slot('teme') {{ __('List') }} @endslot
    @endcomponent
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <a href="{{ route('operators.create') }}" class="btn btn-danger waves-effect waves-light mb-2">{{ __('Add') }}</a>
                            </div>
                        </div><!-- end col-->
                    </div>
                    <div class="table-responsive">
                        <table id="table_operators" class="table table-centered table-nowrap table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>{{ __('Fullname') }}</th>
                                    <th>{{ __('Phone') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th style="width: 82px;">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->

    <!--    <div class="col-lg-4">
            <div class="card-box">
                <div class="media mb-3">
                    <img class="d-flex mr-3 rounded-circle avatar-lg" src="../assets/images/users/user-8.jpg" alt="Generic placeholder image">
                    <div class="media-body">
                        <h4 class="mt-0 mb-1">Jade M. Walker</h4>
                        <p class="text-muted">Branch manager</p>
                        <p class="text-muted"><i class="mdi mdi-office-building"></i> Vine Corporation</p>

                        <a href="javascript: void(0);" class="btn- btn-xs btn-info">Send Email</a>
                        <a href="javascript: void(0);" class="btn- btn-xs btn-secondary">Call</a>
                        <a href="javascript: void(0);" class="btn- btn-xs btn-secondary">Edit</a>
                    </div>
                </div>

                <h5 class="mb-3 mt-4 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle mr-1"></i> Personal Information</h5>
                <div class="">
                    <h4 class="font-13 text-muted text-uppercase">About Me :</h4>
                    <p class="mb-3">
                        Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                        1500s, when an unknown printer took a galley of type.
                    </p>

                    <h4 class="font-13 text-muted text-uppercase mb-1">Date of Birth :</h4>
                    <p class="mb-3"> March 23, 1984 (34 Years)</p>

                    <h4 class="font-13 text-muted text-uppercase mb-1">Company :</h4>
                    <p class="mb-3">Vine Corporation</p>

                    <h4 class="font-13 text-muted text-uppercase mb-1">Added :</h4>
                    <p class="mb-3"> April 22, 2016</p>

                    <h4 class="font-13 text-muted text-uppercase mb-1">Updated :</h4>
                    <p class="mb-0"> Dec 13, 2017</p>

                </div>

            </div>
        </div>
    </div>-->

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
                    {data: 'name', name:'name' },
                    {data: 'phone', name:'phone'},
                //    {data: 'celular', name:'celular', orderable: false },
                    {data: 'email', name:'email',orderable: false },
                //    {data: 'rol', name:'rol', orderable: false },
                    {data: 'options', name:'options',className: 'text-center' ,searchable: false, orderable: false},
            ],
        });
    });
</script>
@endpush
@endsection
