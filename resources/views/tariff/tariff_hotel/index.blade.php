@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        @component('layouts.includes.components.breadcrumb')
            @slot('title') {{ config('app.name', 'Laravel') }} @endslot
            @slot('subtitle') Tarifas de hoteles @endslot
            @slot('teme') Lista @endslot
        @endcomponent

        <div class="row">
            <div class="col-xl-12">
                <div class="card-box">
            <!--        <h4 class="header-title mb-4">{{ __('Administrator') }}</h4>  -->
                    <div class="tab-content">
                        <div class="tab-pane show active" id="all">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                            <div class="card-body">
                                                {{-- <div class="row mb-2">
                                                    <div class="col-md-12">
                                                        <div class="text-md-right">
                                                            <a href="{{ route('registers.create') }}" class="btn btn-danger waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-plus mr-1"></i>{{ __('translation.Add New')}}</a>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                <div class="table-responsive">
                                                    <table id="table_reg"  class="table table-sm table-centered table-bordered  text-center dt-responsive nowrap w-100  dtr-inline">
                                                        <thead>
                                                            <colgroup>
                                                                <col class="text-center ">
                                                                <col class="text-center " style="background-color:#E8F8F5">
                                                                <col class="text-center " style="background-color:#FDF2E9">
                                                                <col class="text-center " style="background-color:#E8F8F5">
                                                                <col class="text-center " style="background-color:#FDF2E9">
                                                              </colgroup>
                                                            <tr>
                                                                <th rowspan="3" style="background-color:#FDFEFE">ZONA</th>
                                                                <th colspan="4" style="background-color:#FDFEFE">Tipo de unidad</th>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="2" style="background-color: #34495E" class="text-white">Suburban</th>
                                                                <th colspan="2" style="background-color: #F4D03F" class="text-dark">Van</th>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-uppercase text-primary">Sencillo</th>
                                                                <th class="text-uppercase text-primary">Redondo</th>
                                                                <th class="text-uppercase text-primary">Sencillo</th>
                                                                <th class="text-uppercase text-primary">Redondo</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($zonas as $z => $zona)
                                                                <tbody>
                                                                    <td class="text-center text-success" style="font-size: 15px"> Z{{$zona}} </td>
                                                                    @foreach ($tarifas as $t =>  $item)
                                                                        @if($zona == $item->id_zona )
                                                                        <td class="text-center text-dark">
                                                                            ${{$item->MXN}} MXN
                                                                        </td>
                                                                        @endif
                                                                    @endforeach
                                                                </tbody>
                                                            @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div> <!-- end card-box-->
            </div> <!-- end col -->
        </div>

    </div> <!-- container -->
@push('scripts')
<script>

    $(document).ready(function(){
        $('#table_users').DataTable({
                processing: true,
                serverSide: true,
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
                /*   {
                        extend: 'collection',
                        text: 'Export',
                        buttons: ['excel', 'pdf',  ],
                    }, */
                select: true,
                ajax: '{!! route('users.index') !!}',
                columns: [
                    {data: 'DT_RowIndex', name:'DT_RowIndex' ,className: 'text-center ', orderable:'false', searchable: 'false'},
                    {data: 'name', name:'name' },
                    {data: 'email', name:'email',orderable: false },
                    {data: 'phone', name:'phone', orderable: false },
                    {data: 'options', name:'options',className: 'text-center' ,searchable: false, orderable: false},
            ],
        });
    });
</script>
@endpush
@endsection
