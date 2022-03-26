@extends('layouts.app')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
    @component('layouts.includes.components.breadcrumb')
        @slot('title') {{ config('app.name', 'Laravel') }} @endslot
        @slot('subtitle') {{ __('translation.Settings') }} @endslot
        @slot('teme') {{ __('translation.Administrator') }} @endslot
    @endcomponent
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                <h3 class="text-uppercase">Actualizar permisos para el rol de <span class="text-primary"> {{$roles->name}} </span></h3>
                    <hr>
                    <div class="table-responsive">
                        <form action="{{ route('roles.update', $roles->id) }}" method="POST" class="form-group">
                            @csrf
                            @method('PUT')
                            <table class="table table-sm table-bordered mb-0">
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="text-align: center"></th>
                                        <th style="text-align: center">Crear</th>
                                        <th style="text-align: center">Leer</th>
                                        <th style="text-align: center">Actualizar</th>
                                        <th style="text-align: center">Eliminar</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                            @foreach ($permisos_cat as $i => $per_cat)
                                            <tr style="text-align: center">
                                                <td>{{$per_cat->category}}</td>
                                                @foreach ($permisos as $j => $per)
                                                    @if($per->category === $per_cat->category)
                                                        <td style="text-align: center">
                                                            <div class="checkbox checkbox-blue mb-2">
                                                                <input type="checkbox" id="chk{{ $per->id }}" name="permission[]"
                                                                    value="{{ $per->id }}" {{ $roles->permissions->pluck('id')->contains($per->id) ? 'checked' : '' }}>
                                                                <label for="chk{{ $per->id }}"></label>
                                                            </div>
                                                        </td>
                                                    @endif
                                                @endforeach
                                            </tr>
                                            @endforeach
                                    </tbody>
                            </table>
                            <hr>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success waves-effect waves-light">
                                    Actualizar<span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
                                </button>
                                <a  href="{{ url()->previous() }}" class="btn btn-danger waves-effect waves-light">
                                    Cancelar<span class="btn-label-right"><i class="mdi mdi-close-outline"></i></span>
                                </a>
                            </div>
                        </form>
                    </div> <!-- end table-responsive-->

                </div> <!-- end card-box -->
            </div> <!-- end col -->
        </div>
    </div>
@endsection
