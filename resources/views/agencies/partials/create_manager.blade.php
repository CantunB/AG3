<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Asignar contactos</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <form id="contact_form"  method="POST" action="{{ route('agencies.add', $agency->id) }}">
                    @method('POST')
                    @csrf

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="mb-3 mt-4 text-uppercase text-center">
                                {{$agency->business_name}}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <select class="form-control select2" id="contact" name="contact">
                                <option selected value="" disabled>Selecciona un usuario</option>
                                @foreach ($users as $user)
                                    <option {{$user->assigned_agency->pluck('id_manager')->contains($user->id) ? 'disabled' : '' }} value="{{$user->id}}"> {{ $user->full_name}} </option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Asignar</button>
                </div>
            </form>
        </div>
    </div>
</div>
