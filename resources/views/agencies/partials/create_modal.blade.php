  <!-- Modal -->
  <div class="modal fade" id="custom-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">{{ __('New Register') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-4">
                <form id="form_agencies" method="POST" action="{{ route('agencies.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Enter name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="address">{{ __('Address') }}</label>
                        <input type="text" class="form-control" id="category" name="address" placeholder="{{ __('Enter Address') }}">
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('Email address') }}</label>
                        <input type="email" class="form-control" id="email"  name="email" placeholder="{{ __('Enter email') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="telephone">{{ __('Phone') }}</label>
                        <input type="text" class="form-control" id="telephone" name="telephone" placeholder="{{ __('Enter phone number') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="status">{{ __('Status') }}</label>
                        <input type="text" class="form-control" id="status" name="status" value="1" readonly>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-success waves-effect waves-light">{{ __('Save') }}</button>
                        <button type="button" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">{{ __('Cancel') }}</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
