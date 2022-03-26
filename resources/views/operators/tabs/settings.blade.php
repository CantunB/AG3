<div class="tab-pane show active" id="settings">
    <form method="POST" action="{{ route('operators.update', $operator->id) }}" data-parsley-validate>
        @csrf
        @method('PATCH')
        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle mr-1"></i>Informacion Personal</h5>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="firstname">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $operator->name }}" >
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="lastname">Ap.Paterno</label>
                    <input type="text" class="form-control" id="paterno" name="paterno" value="{{ $operator->paterno }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="lastname">Ap.Materno</label>
                    <input type="text" class="form-control" id="materno" name="materno" value="{{ $operator->materno }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="firstname">Telefono</label>
                    <input type="number" class="form-control" id="phone" name="phone" value="{{ $operator->phone }}" data-parsley-type="number">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="useremail">Correo electronico</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $operator->email }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="useremail">Fecha Nacimiento</label>
                    <input type="date" class="form-control flatpickr" id="birthday_date" name="birthday_date" value="{{ $operator->birthday_date }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="useremail">C.P</label>
                    <input type="text" class="form-control" id="cp" name="cp" value="{{ $operator->cp }}">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="useremail">Direccion</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $operator->address }}">
                </div>
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-warning waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i>Actualizar</button>
        </div>
    </form>
</div>
