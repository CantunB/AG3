<!-- Modal -->
<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-uppercase" id="exampleModalLabel">Informacion de servicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="header-title mb-3" id="pas"></h3>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h5 class="mt-0">Origen</h5>
                                        <p id="origin"></p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h5 class="mt-0">Destino</h5>
                                        <p id="destiny"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h5 class="mt-0">Agencia</h5>
                                        <p id="agency"></p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h5 class="mt-0">Unidad Solictada</h5>
                                        <p id="unit"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="track-order-list">
                                <ul class="list-unstyled">
                                    <li id="registro">
                                        <span id="reg"></span>
                                        <h5 class="mt-0 mb-1">Registro</h5>
                                        <p style="text-transform:capitalize" id="date_reg" class="text-muted"></p>
                                    </li>
                                    <li id="asignado">
                                        <span id="asi"></span>
                                        <h5 class="mt-0 mb-1">Asignado</h5>
                                        <p style="text-transform:capitalize" id="date_asi" class="text-muted"></p>
                                    </li>
                                    <li id="en_curso">
                                        <span id="cur"></span>
                                        <h5 class="mt-0 mb-1">En curso</h5>
                                        {{-- <p class="text-muted">April 22 2019 <small class="text-muted">05:16 PM</small></p> --}}
                                        {{-- <p class="text-muted">April 22 2019 <small class="text-muted">05:16 PM</small></p> --}}
                                    </li>
                                    <li id="finalizado">
                                        <span id="fin"></span>
                                        <h5 class="mt-0 mb-1"> Finalizado</h5>
                                        {{-- <p class="text-muted">Estimated delivery within 3 days</p> --}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  data-dismiss="modal">Cerrar</button>
    </div>
    </div>
</div>
</div>
