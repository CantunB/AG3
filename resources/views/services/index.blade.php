@extends('layouts.app')
@section('content')
<style>
    #chart1 {
    padding-top: 40px;
    }
    .ct-series-a .ct-bar {
        /* Colour of your bars */
        stroke: red;
        /* The width of your bars */
        stroke-width: 12px;
        /* Yes! Dashed bars! */
        stroke-dasharray: 1px;
        /* Maybe you like round corners on your bars? */
        stroke-linecap: round;
      }
      .ct-series-a .ct-line,
.ct-series-a .ct-point {
  stroke: blue;
}

.ct-series-b .ct-line,
.ct-series-b .ct-point {
  stroke: green;
}
</style>
<div class="container-fluid">

    <!-- start page title -->
    @component('layouts.includes.components.breadcrumb')
        @slot('title') {{ config('app.name', 'Laravel') }} @endslot
        @slot('subtitle') {{ __('Services') }} @endslot
        @slot('teme') Lista de servicios @endslot
    @endcomponent
    <!-- end page title -->


    <div class="row">
        <div class="col-lg-6">
            <div class="card-box">
                <div class="row">
                    <div class="row">
                        <div class="col-lg-12 order-lg-1 order-2">
                            @foreach ($services as  $service)
                            <div class="card-box mb-2">

                                <div class="row align-items-center">
                                    <div class="avatar-lg">
                                        <p class="avatar-title bg-light text-dark font-22 rounded-circle">
                                            {{ Str::substr($service->name, 0, 2) }}
                                        </p>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="media">
                                            <div class="media-body">
                                                <h4 class="mt-0 mb-2 font-16">{{ $service->name }}</h4>
                                                <p class="mb-1"><b>{{ __('translation.Description') }}:</b> {{ $service->description ?? 'Sin descripcion'}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="text-center my-3 my-sm-0">
                                            <p class="mb-0 text-muted">{{ Carbon\Carbon::createFromTimeString($service->created_at)->toFormattedDateString() }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="text-center button-list">
                                            {{-- <a href="javascript: void(0);" class="btn btn-xs btn-primary waves-effect waves-light">Assign</a> --}}
                                        <!--    <a href="javascript: void(0);" class="btn btn-xs btn-primary waves-effect waves-light">Call</a>
                                            <a href="javascript: void(0);" class="btn btn-xs btn-primary waves-effect waves-light">Email</a> -->
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="text-sm-right text-center mt-2 mt-sm-0">
                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                            <button type="button" onclick="deleteService({{ $service->id }})" class="btn action-icon"> <i class="mdi mdi-delete"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <ul class="pagination pagination-rounded justify-content-end mb-0">
                    {{-- {{ $services->links() }} --}}
                </ul>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card-box" dir="ltr">
                <h4 class="header-title">Grafica de servicios</h4>
                <div style="height: 800px;" id="chart1" class="ct-chart ct-perfect-fourth"></div>
            </div>
        </div>
    </div>
</div>
@include('services.partials.create_modal')
@push('scripts')
<script>
function deleteService(id) {
    Swal.fire({
        title: "Desea eliminar el servicio?",
        text: "Por favor asegúrese y luego confirme!",
        icon: 'warning',
        showCancelButton: !0,
        confirmButtonText: "¡Sí, borrar!",
        cancelButtonText: "¡No, cancelar!",
        reverseButtons: !0
    }).then(function (e) {
        if (e.value === true) {
            $.ajax({
                type: 'DELETE',
                url: "{{url('/services')}}/" + id,
                data: {
                    id: id,
                    _token: '{!! csrf_token() !!}'
                },
                dataType: 'JSON',
                success: function (results) {
                    if (results.success === true) {
                        Swal.fire({
                            title: "Hecho!",
                            text: results.message,
                            icon: "success",
                            confirmButtonText: "Hecho!",
                        });
                        location.reload();
                        //$('#table-sympathizers').DataTable().ajax.reload();
                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: results.message,
                            icon: "error",
                            confirmButtonText: "Cancelar!",
                        });
                    }
                },
                error: function(data) {
                    //Unblock the spinner
                    var errors = data.responseJSON;
                    console.log(errors);
                    //var errors = '';
                   // for(datos in data.responseJSON){
                    //    errors += data.responseJSON[datos] + '\n';
                   // }
                    //Display errors using sweet alert js library
                    /*Swal.fire({
                        title: "Ooops!",
                        text: errors.exception,
                        icon: "warning",
                        button: "Rectify",
                    });*/
                }
            });
        } else {
            e.dismiss;
        }
    }, function (dismiss) {
        return false;
    })
    }
</script>
<script>
    var services = {!! $services !!};
    const servicesname = services.map(function(service) {
        return service.name;
    });
    const countservices = services.map(function(service) {
        return  service.quantity.length;
        //console.log(service.quantity.length);
    });

    //console.log(servicesname);
    new Chartist.Bar('.ct-chart', {
        labels: servicesname,
        series: [
            countservices,
        ]
    }, {
        seriesBarDistance: 12,
        low: 0,
        high: 10,
        reverseData: true,
        horizontalBars: true,
        axisX:{
            onlyInteger: true,
        },
        axisY: {
            offset: 70,
        },
    });
</script>
@endpush
@endsection
