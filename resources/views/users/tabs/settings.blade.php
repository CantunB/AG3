<div class="tab-pane show active" id="settings">
    <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle mr-1"></i> Informacion personal</h5>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="paterno">Ap. Paterno</label>
                    <input type="text" class="form-control" id="paterno" name="paterno" value="{{ $user->paterno }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="materno">Ap. Materno</label>
                    <input type="text" class="form-control" id="materno" name="materno" value="{{ $user->materno }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="birthday_date">F. Nacimiento</label>
                    <input type="date" class="form-control" id="birthday_date" name="birthday_date" value="{{ $user->birthday_date }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Correo electronico</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                </div>
            </div>
        </div>
        <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building mr-1"></i>Direccion</h5>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="address">Direccion</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="cp">C.P.</label>
                    <input type="text" class="form-control" id="cp" name="cp" placeholder="{{ $user->cp }}">
                </div>
            </div>
        </div>
        <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth mr-1"></i> Perfil</h5>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="social-fb">Foto</label>
                    <div class="input-group">
                        <input type="file" class="dropify" id="photo_user" name="photo_user" data-default-file="{{ asset($user->photo_user) }}" />
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Actualizar</button>
        </div>
    </form>
</div>
