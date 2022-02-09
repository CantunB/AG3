<?php

namespace App\Http\Livewire\Bookings;

use App\Models\Booking;
use Livewire\{Component, WithPagination, Bootstrap};

class Bookings extends Component
{
    use WithPagination;
    /** Propiedades publicas  para el databinding*/
    public $search = '';
    public $perPage = 5;
    public $perStatusP = '';

    public $campo = null;
    public $order = null;
    public $icon = '-circle';

    public $showModal = '';

    public $origin;
    public $destiny;
    public $select_id;

    public $action = 1; // Para movernos entre formulario

    private $pages = 10;

    protected $paginationTheme = 'bootstrap';
    /** Listeners / escuchar eventos y ejecutar acciones */
    protected $listeners = [
        'deleteRow' => 'destroy'
    ];
    //Es el primero en ejecutarse al iniciar el componente
    public function mount(){
        // Inicializa variables o data
    }

    //Se ejecuta despues del mount
    public function render()
    {
        $info = Booking::termino($this->search)
                        ->statuspayment($this->perStatusP);

                    if ($this->campo && $this->order) {
                        $info = $info->orderBy($this->campo, $this->order);

                    }
                        $info = $info->paginate($this->perPage);
        return view('livewire.bookings.bookings', [
            'info' =>  $info
        ]);
    }

    public function sortable($campo)
    {
        if($campo !== $this->campo ){
            $this->order = null;
        }
        switch ($this->order ) {
            case null:
                $this->order = 'asc';
                $this->icon = '-arrow-circle-up';
                break;
            case 'asc':
                $this->order = 'desc';
                $this->icon = '-arrow-circle-down';
                break;
            case 'desc':
                $this->order = null;
                $this->icon = '-circle';
                break;
            default:
                $this->order = null;
                $this->icon = '-circle';
                break;
        }
        $this->campo = $campo;
    }

    /** Busquedas con paginacion */

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function showModal(Booking $booking)
    {
        // dd($id);
        // $booking = Booking::findOrFail($booking);
        $this->emit('showModal', $booking);
    }

    /** Moverse entre ventanas */
    public function doAction($action)
    {
        $this->action = $action;
    }

    /** Limpiar propiedas */
    public function clear()
    {

        $this->reset();
        // $this->page = 1;
        // $this->order = null;
        // $this->campo = null;
        // $this->perStatusP = '';
        // $this->icon = '-circle';
        // $this->search = '';
    }

    /** Mostrar la info del registro  a editar */
    public function edit($id)
    {
        $record = Booking::findOrFail($id);
        $this->origin = $record->origin;
        $this->select_id = $record->id;
        $this->destiny = $record->destiny;
        $this->action = 2;
    }

    /** Crear registros / Actualizar  */
    public  function StoreOrUpdate()
    {
        //Validaciones
        $this->validate([
            'origin' => 'required',
            'destiny' => 'required',
        ]);

        //Validar si existe otro registro  con el mismo nombre
        if ($this->select_id > 0) {
            $existe = Booking::where('id', $this->select_id)
                            ->where('id', '<>', $this->select_id)
                            ->select('origen')
                            ->get();
                if ($existe->count() > 0) {
                    session()->flash('info', 'Ya existe un registro con el mismo id');
                    $this->resetInput();
                    return;
                }
        }else{
            $existe = Booking::where('id', $this->select_id)
                            ->select('origen')
                            ->get();
                if ($existe->count() > 0) {
                    session()->flash('info', 'Ya existe un registro con el mismo id');
                    $this->resetInput();
                    return;
                }
        }

        if($this->select_id <= 0){
            //Se crea el registro
            $record = Booking::create([
                'origin' => $this->origin,
                'destiny' => $this->destiny
            ]);
        }else{
            $record = Booking::findOrFail($this->select_id);
            $record->update([
                'origin' => $this->origin,
                'destiny' => $this->destiny
            ]);
        }

        if($this->select_id){
            session()->flash('update', 'Registro Actualizado');
        }else{
            session()->flash('success', 'Registro Creado');
        }

    }

    public function destroy($id)
    {
        if($id){
            $record = Booking::find($id);
            $record->delete();
        }
    }

}
