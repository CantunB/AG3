<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                    <div class="row mb-2">
                            @include('commons.search')
                            @include('commons.alerts')
                    </div>

                    <div class="table-responsive-sm">
                        <div>
                            <table id="table_bookings" class="table table-sm table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>
                                            Reserva
                                            <button wire:click="sortable('id')" type="button" class="btn">
                                                <i class="fa fa{{ $campo ===  'id' ? $icon : '-circle' }}"></i>
                                            </button>
                                        </th>
                                        <th>
                                            Cliente
                                            <button wire:click="sortable('name')" type="button" class="btn">
                                                <i class="fa fa{{ $campo ===  'name' ? $icon : '-circle' }}"></i>
                                            </button>
                                        </th>
                                        <th>Fecha</th>
                                        <th>Total</th>
                                        <th>Metodo pago</th>
                                        <th>Estatus pago</th>
                                        <th>Estatus reserva</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($info as $r)
                                        <tr>
                                            <td>{{$r->slug}}</td>
                                            <td>{{$r->FullName}}</td>
                                            <td>{{$r->created_at}}</td>
                                            <td>{{$r->price}}</td>
                                            <td>{{$r->type_payment}}</td>
                                            <td>
                                                @if($r->status_payment == null)
                                                    <h5><span class="badge bg-soft-warning text-warning"><i class="mdi mdi-coin"></i> EN ESPERA</span></h5>
                                                @elseif ($r->status_payment == 1)
                                                    <h5><span class="badge bg-soft-success text-success"><i class="mdi mdi-coin"></i> PAGADO </span></h5>
                                                @elseif ($r->status_payment == 2)
                                                    <h5><span class="badge bg-soft-danger text-danger"><i class="mdi mdi-coin"></i>CANCELADO</span></h5>
                                                @endif
                                            </td>
                                            <td>
                                                @if($r->status_booking == null)
                                                    <h5><span class="badge badge-warning">SIN ASIGNAR</span></h5>
                                                @elseif ($r->status_booking == 1)
                                                    <h5><span class="badge badge-info">ASIGNADO</span></h5>
                                                @elseif ($r->status_booking == 2)
                                                    <h5><span class="badge badge-success">EN SERVICO</span></h5>
                                                @elseif ($r->status_booking == 4)
                                                    <h5><span class="badge badge-warning">CANCELADO</span></h5>
                                                @endif
                                            </td>
                                            <td>@include('commons.actions')</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <ul class="pagination pagination-rounded justify-content-end m-2">
                                {{ $info->links() }}
                            </ul>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
</div> <!-- container -->

<div class="modal {{$showModal}} " tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
</div>


@push('scripts')
    <script type="text/javascript">
        function Confirm(id)
        {
            let me = this
            Swal.fire({
                title: 'Desea eliminar ?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#DB0707',
                cancelButtonColor: '#7E7A7A',
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'Cancelar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log('ID ', id);
                    window.livewire.emit('deleteRow', id)
                    toastr.success('info', 'Se ha eliminado el registro')
                    swal.close()
                }
            })
        }
        document.addEventListener('DOMContentLoaded', function(){});
    </script>
@endpush
