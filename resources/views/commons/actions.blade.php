<a wire:click="showModal( {{$r->id}} )"  class="action-icon" data-toggle="modal" data-target="#custom-modal"> <i class="mdi mdi-eye"></i></a>
<a class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
<a href="javascript:void(0)" onclick="Confirm('{{$r->id}}')" class="action-icon"> <i class="mdi mdi-delete"></i></a>

{{-- <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#custom-modal"><i class="mdi mdi-plus-circle mr-1"></i> Add Customers</button> --}}
