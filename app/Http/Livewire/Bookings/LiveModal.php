<?php

namespace App\Http\Livewire\Bookings;

use App\Models\Booking;
use Livewire\Component;

class LiveModal extends Component
{
    public $showModal = '';
    public $origin, $destiny, $fullname;
    protected $listeners = [
        'showModal'
    ];

    public function render()
    {
        return view('livewire.bookings.live-modal');
    }

    public function showModal(Booking $booking)
    {
        // dd($booking);
        $this->fullname = $booking->FullName;
        $this->origin = $booking->origin;
        $this->destiny = $booking->destiny;
        $this->showModal = 'fade';
    }

    public function closeModal()
    {
        $this->showModal = '';
    }
}
