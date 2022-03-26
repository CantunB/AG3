<div class="modal fade" id="crearRol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nuevo usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form method="POST" id="form_mcr" autocomplete="off">
                @csrf
                @method('POST')
                <div class="row justify-content-md-center">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" id="name" name="name" autocomplete="off" required>
                            <input type="hidden" class="form-control" id="name" name="guard_name" autocomplete="off" required>
                        </div>
                    </div>
                </div>
                    <div class="modal-footer justify-content-md-center">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Registrar</button>
                    </div>
            </div>
                </div>
            </form>

    </div>
</div>
