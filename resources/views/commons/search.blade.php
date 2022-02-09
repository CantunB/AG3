
<div class="col-lg-8">
    <form class="form-inline">

    <div class="form-group mb-2">
        <label for="inputPassword2" class="sr-only">Search</label>
        <input type="search" wire:model="search" class="form-control" id="inputPassword2" placeholder="Buscar reservas...">
        <select  class="custom-select m-2" wire:model="perStatusP">
            <option selected>Selecciona una opcion</option>
            <option value="">TODOS</option>
            <option value="1">PAGADO</option>
        </select>
        <button wire:click="clear" type="button" class="btn btn-light waves-effect m-2"><i class="fa fa-eraser"></i></button>
    </div>

</form>
</div>
<div class="col-lg-4">
    <div class="text-lg-right">
        <button wire:click="doAction(2)" type="button" class="btn btn-danger waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-basket mr-1"></i> Add New Order</button>
        <button type="button" class="btn btn-light waves-effect mb-2">Export</button>

    </div>
</div><!-- end col-->
