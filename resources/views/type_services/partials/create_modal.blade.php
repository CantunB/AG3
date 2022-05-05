  <!-- Modal -->
  <div class="modal fade" id="custom-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">{{ __('translation.Add New') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-4">
                <form id="form_agencies" method="POST" action="{{ route('type_services.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{ __('translation.Name') }}</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('translation.Enter') }} {{ __('translation.Name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">{{ __('translation.Description') }}</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="{{ __('translation.Enter') }} {{ __('translation.Description') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="status" name="status" value="1" readonly>
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
