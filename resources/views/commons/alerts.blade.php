{{-- alerta para informar --}}
{{-- @if(session('info')) --}}
@if(session()->has('info'))
    {{-- <div style="text-align: center" class="alert alert-primary" id="alert">
    <h5>     {{ session('info') }}
        </h5>
    </div>
    --}}
    <script>
        toastr.info("{{ @session('info')}}", "info");
    </script>
@endif

{{-- alerta para actualizar --}}
@if(session('update'))
    {{-- <div style="text-align: center"class="alert alert-warning" id="alert">
        <h5>      {{ session('update') }}
        </h5>
    </div> --}}
    <script>
        toastr.warning("{{ @session('update')}}", "update");
    </script>
@endif

{{-- alerta para eliminar --}}
@if(session('destroy'))
    {{-- <div style="text-align: center" class="alert alert-danger" id="alert">
        <h5>  {{ session('destroy') }}
            </h5>
    </div> --}}
    <script>
        toastr.error("{{ @session('destroy')}}", "destroy");
    </script>
@endif

{{-- alerta para agregar --}}
@if(session('success'))
    {{-- <div style="text-align: center"class="alert alert-success" id="alert">
    <h5>    {{ session('success') }}
        </h5>
    </div> --}}
    <script>
        toastr.success("{{ @session('success')}}", "success");
    </script>
@endif

@if(session('status'))
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div style="text-align: center"class="alert alert-success" id="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ __('translation.Welcome', ['name' =>  Auth::user()->FullName] )}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
