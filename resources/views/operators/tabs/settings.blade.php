<div class="tab-pane show active" id="settings">
    <form id="form_operators_update" method="POST" action="{{route('operators.update', $operator->id)}}" enctype="multipart/form-data" data-parsley-validate>
        @csrf
        @method('PUT')
        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle mr-1"></i>Informacion Personal</h5>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="firstname">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $operator->name }}" required  required minlength="3" data-parsley-pattern="^[a-zA-Z]+$">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="lastname">Ap.Paterno</label>
                    <input type="text" class="form-control" id="paterno" name="paterno" value="{{ $operator->paterno }}" required required minlength="3" data-parsley-pattern="^[a-zA-Z]+$">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="lastname">Ap.Materno</label>
                    <input type="text" class="form-control" id="materno" name="materno" value="{{ $operator->materno }}" required minlength="3" data-parsley-pattern="^[a-zA-Z]+$">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                        <label for="phone" class="col-form-label">{{ __('translation.Phone') }}:</label>
                        <div class="input-group">
                                <div class="input-group-prepend">
                                    <select class="form-control select2 select-country"></select>
                                </div>
                                <input class="form-control phones input-phone" id="phone" name="phone" autocomplete="off" required placeholder="XXX-XXX-XXXX" value="{{ old('phone') ?? $operator->phone }}"
                                data-parsley-validation-threshold="1"   data-parsley-trigger="keyup">
                        </div>
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
                    <input class="form-control birthday" id="birthday_date" name="birthday_date" value="{{ $operator->birthday_date }}" placeholder="XXXX-XX-XX">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="useremail">C.P</label>
                    <input type="text" class="form-control" id="cp" name="cp" value="{{ $operator->cp }}" maxlength="5" minlength="5" >
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
