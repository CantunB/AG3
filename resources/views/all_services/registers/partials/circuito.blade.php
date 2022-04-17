
            {{---------------------------------------------------------------------------- */
            /* INICIO --- CARD SERVICIO CIRCUITO                                            */
            /* ----------------------------------------------------------------------------}}
            <form id="form_services_circuito" method="POST" data-parsley-validate autocomplete="none" autocomplete="none">
                @csrf
                <div id="services_circuito" class="card border divOculto">
                    <div class="card-box mb-2">
                        <div class="card-title text-center">
                            <h3 class="card-title text-uppercase">Servicio Circuito</h3>
                        </div>
                        <div class="card-body">
                            <div class="card-text">
                                <div class="row justify-content-md-center">
                                    <div class="col-md-5 col-xl-5">
                                        <div class="form-group">
                                            <label for="project-priority">{{ __('translation.Origin') }}</label>
                                            <input id="origin" name="origin" class="form-control services_circuito" list="my_origin" required>
                                                <datalist id="my_origin">
                                                    <option value="ALAYA TULUM">
                                                    <option value="AEROPUERTO">
                                                </datalist>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xl-3">
                                        <div class="form-group">
                                            <label>Duracion <em>(Dias)</em></label>
                                            <div class="input-group num-block num-in">
                                                <span class="input-group-text minus dis">-</span>
                                                <input type="text" class="form-control text-center in-num services_circuito" value="1"
                                                    aria-describedby="icon-passenger" required name="days" id="days" placeholder="Dias" data-parsley-type="digits" readonly="">
                                                <span class="input-group-text plus">+</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xl-4">
                                        <div class="form-group">
                                            <label>Orden de servicio</label>
                                            <input id="service_orden" name="service_orden" required type="text" class="form-control select services_circuito" placeholder="Orden de servicio">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
             {{---------------------------------------------------------------------------- */
            /* TERMINO --- CARD SEERVICIO CIRCUITO                                           */
            /* ----------------------------------------------------------------------------}}
