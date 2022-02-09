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
                <form id="form_agencies" method="POST" action="{{ route('agencies.store') }}" data-parsley-validate enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Razon Social</label>
                        <input onkeyup="mayus(this);" data-parsley-trigger="keyup" type="text" class="form-control" id="business_name" name="business_name" placeholder="{{ __('translation.Enter') }} Razon Social" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nombre Comercial</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('translation.Enter') }} Nombre Comercial">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">RFC</label>
                                <input onkeyup="mayus(this);" data-parsley-trigger="keyup" type="text" class="form-control" id="rfc" name="rfc" placeholder="{{ __('translation.Enter') }} RFC" required minlength="10"	>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">{{ __('translation.Address') }}</label>
                        <input type="text" class="form-control" id="category" name="address" placeholder="{{ __('translation.Enter') }} {{ __('translation.Address') }}">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">{{ __('translation.Email') }}</label>
                                <input type="email" class="form-control" id="email"  name="email" placeholder="{{ __('translation.Enter') }} {{ __('translation.Email') }}" data-parsley-type="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telephone">{{ __('translation.Phone') }}</label>
                                <input type="text" class="form-control" id="telephone" name="telephone" placeholder="{{ __('translation.Enter') }} {{ __('translation.Phone') }}" data-parsley-type="digits" >
                            </div>
                        </div>
                    </div>
                    <h5 class="mb-4 text-uppercase">Contacto de la agencia</h5>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="contact">Nombre de contacto</label>
                                <input onkeyup="mayus(this);" type="text" class="form-control" id="contact"  name="contact">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="telephone_contact">{{ __('translation.Phone') }}</label>
                                <input type="text" class="form-control" id="telephone_contact" name="telephone_contact" placeholder="{{ __('translation.Enter') }} {{ __('translation.Phone') }}" data-parsley-type="digits" >
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
