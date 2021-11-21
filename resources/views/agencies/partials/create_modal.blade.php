  <!-- Modal -->
  <div class="modal fade" id="modal_agencies" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">{{ __('translation.Add New') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>

            <div id="errors"></div>
            <div class="modal-body p-4">
                <form id="form_agencies" method="POST" action="{{ route('agencies.store') }}" data-parsley-validate>
                    @csrf
                    <div class="form-group">
                        <label for="name">Razon Social</label>
                        <input type="text" class="form-control" id="business_name" name="business_name" placeholder="{{ __('translation.Enter') }} Razon Social" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Nombre Comercial</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('translation.Enter') }} Nombre Comercial">
                    </div>
                    <div class="form-group">
                        <label for="name">RFC</label>
                        <input type="text" class="form-control" id="rfc" name="rfc" placeholder="{{ __('translation.Enter') }} RFC" required minlength="10"	>
                    </div>
                    <div class="form-group">
                        <label for="address">{{ __('translation.Address') }}</label>
                        <input type="text" class="form-control" id="category" name="address" placeholder="{{ __('translation.Enter') }} {{ __('translation.Address') }}">
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('translation.Email') }}</label>
                        <input type="email" class="form-control" id="email"  name="email" placeholder="{{ __('translation.Enter') }} {{ __('translation.Email') }}" data-parsley-type="email">
                    </div>
                    <div class="form-group">
                        <label for="telephone">{{ __('translation.Phone') }}</label>
                        <input type="text" class="form-control" id="telephone" name="telephone" placeholder="{{ __('translation.Enter') }} {{ __('translation.Phone') }}" data-parsley-type="digits" >
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
