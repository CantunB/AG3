<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        if ($request->ajax()){
            $bookings = Booking::all();
            return DataTables::of($bookings)
            ->addIndexColumn()
            ->addColumn('slug', function($bookings){
                return $bookings->slug;
                // ->created_at->toFormattedDateString();
            })
            // ->editColumn('created_at', function($bookings){
            //     // $fecha = Carbon::parse($bookings->created_at);
            //     return ' '.$bookings->created_at->Format('jS F Y').' <small class="text-muted">'.$bookings->created_at->isoFormat('h:mm a').'</small>';
            //     //$bookings->created_at->toFormattedDateString();
            // })
            // ->editColumn('origin', function($bookings){
            //     return $bookings->origin;
            // })
            // ->editColumn('destiny', function($bookings){
            //     return $bookings->destiny;
            // })
            ->editColumn('total', function($bookings){
                return  '<span class="badge badge-secondary">$ '.$bookings->price_mx.' MXN</span>' . '</br>' . '<span class="badge badge-outline-secondary">$ '.$bookings->price .' '. $bookings->divisa .'</span>';
            })
            ->editColumn('payment_method', function($bookings){
                return $bookings->type_payment;
            })
            ->editColumn('payment_status', function($bookings){
                $opciones = '';
                if ($bookings->status_payment == null ) {
                    $opciones .= '<h5><span class="badge badge-outline-warning"><i class="mdi mdi-timer-sand"></i> ESPERANDO PAGO</span></h5>';
                }
                elseif($bookings->status_payment == 1) {
                    $opciones .= '<h5><span class="badge bg-soft-success text-success"><i class="mdi mdi-coin"></i> PAGADO</span></h5>';
                }
                // '<h5><span class="badge bg-soft-success text-success"><i class="mdi mdi-coin"></i> Paid</span></h5>
                // <h5><span class="badge bg-soft-warning text-warning"><i class="mdi mdi-timer-sand"></i> Awaiting Authorization</span></h5>
                // <h5><span class="badge bg-soft-danger text-danger"><i class="mdi mdi-cancel"></i> Payment Failed</span></h5>
                // <h5><span class="badge bg-soft-info text-info"><i class="mdi mdi-cash"></i> Cash on Delivery</span></h5>
                return $opciones;
            })
            ->editColumn('booking_status', function($bookings){
                $opciones = '';
                if ($bookings->status_booking == null ) {
                    $opciones .= '<h5><span class="badge badge-outline-warning">PROCESANDO</span></h5>';
                }
                elseif($bookings->status_booking == 1) {
                    $opciones .= '<h5><span class="badge badge-info">Shipped</span></h5>';
                }
                elseif($bookings->status_booking == 2) {
                    $opciones .= '<h5><span class="badge badge-success">En servicio</span></h5>';
                }
                elseif($bookings->status_booking == 4) {
                    $opciones .= ' <h5><span class="badge badge-danger">Cancelado</span></h5>';
                }
                return $opciones;
            })
            ->addColumn('options', function ($bookings){
                $opciones = '';
                // if (Auth::user()->can('read_agencies')) {
                    $opciones .= '<button type="button" onclick="btnInfo('.$bookings->id.')" class="btn action-icon icon-dual-primary"> <i class="mdi mdi-eye"></i></button>';
                // }
                // if (Auth::user()->can('delete_agencies')) {
                    $opciones .= '<button type="button" onclick="btnDelete('.$bookings->id.')" class="btn action-icon icon-dual-danger"> <i class="mdi mdi-delete"></i></button>';
                // }
                return $opciones;
            })
            ->rawColumns(['created_at', 'payment_status','total','booking_status','options'])
            ->toJson();
        }
        return view('bookings.index');
    }

    public function show(Booking $booking){
    }

    public function edit(Booking $booking){
    }

    public function update(Request $request, Booking $booking){
    }

    public function destroy(Booking $booking){
    }
}
