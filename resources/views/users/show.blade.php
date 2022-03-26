@extends('layouts.app')
@section('content')
<div class="container-fluid">
    @component('layouts.includes.components.breadcrumb')
        @slot('title') {{ config('app.name', 'Laravel') }} @endslot
        @slot('subtitle') Usuario @endslot
        @slot('teme') Perfil @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-4 col-xl-4">
            <div class="card-box text-center">
                <img src="{{ asset($user->photo_user) }}" class="rounded-circle avatar-xl img-thumbnail"
                    alt="profile-image">

                <h4 class="mb-0">{{ $user->name }}</h4>
                <p class="text-muted">{{ $user->roles[0]->name }}</p>

                <button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Follow</button>
                <a href="javascript: history.go(-1)" class="btn btn-soft-danger btn-xs waves-effect mb-2 waves-light">Regresar</a>

                <div class="text-left mt-3">

                    <p class="text-muted mb-2 font-13"><strong>Nombre Completo :</strong> <span class="ml-2">{{ $user->full_name }}</span></p>

                    <p class="text-muted mb-2 font-13"><strong>Telefono :</strong><span class="ml-2">{{ $user->phone }}</span></p>

                    <p class="text-muted mb-2 font-13"><strong>Correo Electronico :</strong> <span class="ml-2 ">{{ $user->email }}</span></p>

                    <p class="text-muted mb-1 font-13"><strong>Direccion :</strong> <span class="ml-2">{{ $user->address }} {{ $user->cp }}</span></p>
                </div>


            </div> <!-- end card-box -->


        </div> <!-- end col-->

        <div class="col-lg-8 col-xl-8">
            <div class="card-box">
                <ul class="nav nav-pills navtab-bg nav-justified">
                    {{-- <li class="nav-item">
                        <a href="#aboutme" data-toggle="tab" aria-expanded="false" class="nav-link">
                            Actividad
                        </a>
                    </li> --}}

                    <li class="nav-item">
                        <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link active">
                            Ajustes
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    @include('users.tabs.activity')
                    @include('users.tabs.settings')

                </div>
            </div>
        </div>
    </div>

</div>
@push('scripts')
    <script>
        $('#form_edit').parsley();
    </script>
<script>
    $('.dropify').dropify({
    messages: {
        'default': 'Arrastre y suelte un archivo aquí o haga clic',
        'replace': 'Arrastra y suelta o haz clic para reemplazar',
        'remove':  'Eliminar',
        'error':   'Vaya, sucedió algo mal.'
    }
});
</script>
<script>
    $("#form_edit").submit(function(e) {
        e.preventDefault();
        var id = $("#user_id").val();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: id,
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function(response){
                console.log(response.data);
                Swal.fire({
                    title: "Registro creado!",
                    text: response.data,
                    icon: "success",
                    timer: 3500
                });
                window.location = '/users' + id;
            },
            error: function(response){
                console.log(response);
                var errors = response.responseJSON;
                errorsHtml = '<ul>';
                $.each(errors.errors,function (k,v) {
                errorsHtml += '<li>'+ v + '</li>';
                });
                errorsHtml += '</ul>';
                Swal.fire({
                    title: "Ooops!",
                    html: errorsHtml,
                    icon: "error",
                    confirmButtonText: "Volver!",
                });
            }
        });
});
</script>
@endpush
@endsection
