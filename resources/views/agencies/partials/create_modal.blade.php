  <!-- Modal -->
  <div class="modal fade" id="modal_agencies" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">{{ __('translation.Add New') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>

            <div id="errors"></div>
            <div class="modal-body p-4">
                <form id="form_agencies" method="POST" action="{{ route('agencies.store') }}" data-parsley-validate enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label for="name">Razon Social</label>
                        <input data-parsley-trigger="keyup" type="text" class="form-control" id="business_name" name="business_name" placeholder="{{ __('translation.Enter') }} Razon Social" required autocomplete="off">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nombre Comercial</label>
                                <input type="text" class="form-control" id="name_agency" name="name_agency" placeholder="{{ __('translation.Enter') }} Nombre Comercial" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">RFC</label>
                                <input onkeyup="mayus(this);" data-parsley-trigger="keyup" type="text" class="form-control" id="rfc" name="rfc" placeholder="{{ __('translation.Enter') }} RFC" required minlength="10" autocomplete="off"	>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">{{ __('translation.Address') }}</label>
                        <input type="text" class="form-control" id="address" name="address" autocomplete="off" placeholder="{{ __('translation.Enter') }} {{ __('translation.Address') }}">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email_agency">Correo agencia</label>
                                <input type="email" class="form-control" id="email_agency"  name="email_agency" placeholder="sastl@gmail.com" data-parsley-type="email" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telephone">{{ __('translation.Phone') }}</label>
                                <input  autocomplete="off" type="text" class="form-control" id="telephone" name="telephone" placeholder="{{ __('translation.Enter') }} {{ __('translation.Phone') }}" data-parsley-type="digits" >
                            </div>
                        </div>
                    </div>
                    <h5 class="mb-4 text-uppercase">Contacto de la agencia</h5>
                    <div class="row">
                        <div class="col-md-12">
                            <div class=" form-group custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="contact" name="contact">
                                <label style="font-size: 19px" class="custom-control-label" for="contact">¿Agregar un contacto de la agencia ?</label>
                            </div>
                        </div>
                    </div>
                    <div id="divContact" class="divOculto">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Nombre:</label>
                                    <input onkeyup="mayus(this);" type="text" class="form-control" id="name" name="name" autocomplete="off" required>
                                    <input type="hidden" class="form-control" name="status" value="3">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="paterno" class="col-form-label">Ap.Paterno:</label>
                                    <input onkeyup="mayus(this);" type="text" class="form-control" id="paterno" name="paterno" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="materno" class="col-form-label">Ap.Materno:</label>
                                    <input onkeyup="mayus(this);" type="text" class="form-control" id="materno" name="materno" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 my-1">
                                <label for="phone" class="col-form-label">Telefono contacto:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <select class="form-control select2 select-country"></select>
                                    </div>
                                    <input class="form-control phones input-phone" id="phone" name="phone" autocomplete="off" required placeholder="XXX-XXX-XXXX" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email" class="col-form-label">Correo contacto:</label>
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
                    </div>
                    <h5 class="mb-4 text-uppercase">Documentos <span>(Subir archivos en formato .PDF) </span></h5>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="fiscal_situation">Situacion Fiscal</label>
                                <div class="input-group">
                                    <input type="file" class="dropify" id="fiscal_situation" name="fiscal_situation"  />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="current_rate">Tarifa Vigente</label>
                                <div class="input-group">
                                    <input type="file" class="dropify" id="current_rate" name="current_rate"  />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="proof_address">Comprobante de domicilio</label>
                                <div class="input-group">
                                    <input type="file" class="dropify" id="photo_user" name="proof_address"  />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="covenants">Convenios</label>
                                <div class="input-group">
                                    <input type="file" class="dropify" id="covenants" name="covenants"  />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-success waves-effect waves-light">{{ __('translation.Create') }}</button>
                        <button type="button" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">{{ __('translation.Cancel') }}</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
