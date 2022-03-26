<div class="modal fade" id="crearUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nuevo usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form method="POST" id="form_mcu" autocomplete="off">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" id="name" name="name" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="paterno" class="col-form-label">Ap.Paterno:</label>
                            <input type="text" class="form-control" id="paterno" name="paterno" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="materno" class="col-form-label">Ap.Materno:</label>
                            <input type="text" class="form-control" id="materno" name="materno" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 my-1">
                        <label for="phone" class="col-form-label">Telefono:</label>

                        <div class="input-group">
                          <div class="input-group-prepend">
                            <select class="form-control select2 select-country"></select>
                          </div>
                          <input class="form-control phones input-phone" id="phone" name="phone" autocomplete="off" required placeholder="XXX-XXX-XXXX" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email" class="col-form-label">Correo:</label>
                            <input type="email" class="form-control" id="email" name="email" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="password" class="col-form-label">Contraseña:</label>
                            <input type="password" class="form-control" id="password" name="password" autocomplete="off" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="birthday_date" class="col-form-label ">F. Nacimiento:</label>
                            <input class="form-control birthday" id="birthday_date" name="birthday_date" placeholder="XXXX-XX-XX">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cp" class="col-form-label">C.P</label>
                            <input type="number" class="form-control" id="cp" name="cp" maxlength="5" placeholder="XXXXX">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="rol" class="col-form-label">Rol</label>
                            <select class="form-control select2" name="rol" id="rol" required>
                                <option value="" disabled selected>Selecciona un rol</option>
                                @foreach ($roles as $rol)
                                    <option value="{{$rol->id}}">{{ $rol->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="address" class="col-form-label">Direccion:</label>
                            <input type="text" class="form-control" id="address" name="address" autocomplete="none">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="photo_user">Foto usuario</label>
                            <input type="file" class="dropify" id="photo_user" name="photo_user" data-default-file="{{ asset('assets/images/users/user-profile.png') }}" />

                            {{-- <span class="form-text text-muted"><small>If you want to change password please <a href="javascript: void(0);">click</a> here.</small></span> --}}
                        </div>
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
            </div>
                </div>
            </form>

    </div>
</div>
