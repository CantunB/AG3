<?php

namespace App\Http\Livewire\Bookings;

use App\Models\Booking;
use Livewire\Component;

class LiveModal extends Component
{
    public $showModal = '';
    public $book_id, $slug, $fullname, $email, $phone, $country, $state, $type_service,
        $type_trip, $origin, $destiny, $passengers, $airline_arrival, $flight_number_arrival,
        $date_arrival, $time_arrival, $comments_arrival, $round_service, $airline_departure,
        $flight_number_departure, $date_departure, $time_departure, $comments_departure, $request_unit, $price,
        $divisa, $type_payment, $status_payment, $status_booking, $creado;
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
        $this->book_id = $booking->id;
        $this->slug = $booking->slug;
        $this->fullname = $booking->full_name;
        $this->email = $booking->email;
        $this->phone = $booking->phone;
        $this->country = $booking->Country->name;
        $this->state = $booking->State->name;
        $this->type_service = $booking->type_service;
        $this->origin = $booking->origin;
        $this->destiny = $booking->destiny;
        $this->passengers = $booking->passengers;
        $this->airline_arrival = $booking->airline_arrival;
        $this->flight_number_arrival = $booking->flight_number_arrival;
        $this->date_arrival = $booking->date_arrival;
        $this->time_arrival = $booking->time_arrival;
        $this->comments_arrival = $booking->comments_arrival;
        $this->airline_departure = $booking->airline_departure;
        $this->flight_number_departure = $booking->flight_number_departure;
        $this->date_departure = $booking->date_departure;
        $this->time_departure = $booking->time_departure;
        $this->comments_departure = $booking->comments_departure;
        $this->request_unit = $booking->request_unit;
        $this->price = $booking->price;
        $this->divisa = $booking->divisa;
        $this->type_payment = $booking->type_payment;
        $this->status_booking = $booking->status_booking;
        $this->status_payment = $booking->status_payment;
        $this->creado = $booking->created_at;
        $this->showModal = 'fade';
    }

    public function closeModal()
    {
        $this->showModal = '';
    }
}
