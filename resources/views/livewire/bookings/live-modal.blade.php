<div>
    <div class="modal {{$showModal}}" id="custom-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title" id="myCenterModalLabel">Add New Customers</h4>
                    <button wire:click="closeModal" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input wire:model="fullname" type="text" class="form-control" id="name" placeholder="Enter full name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input wire:model="destiny" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="position">Phone</label>
                            <input type="text" class="form-control" id="position" placeholder="Enter phone number">
                        </div>
                        <div class="form-group">
                            <label for="category">Location</label>
                            <input type="text" class="form-control" id="category" placeholder="Enter Location">
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-success waves-effect waves-light">Actualizar</button>
                            <button wire:click="closeModal" type="button" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
