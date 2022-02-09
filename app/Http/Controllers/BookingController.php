<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()){
            $bookings = Booking::all();
            return DataTables::of($bookings)
            ->addIndexColumn()
            // ->editColumn('contact', function($agencies){
            //      return $agencies->contact ?? 'Sin contacto';
            // })
            // ->addColumn('services', function($agencies){
            //     return $contador = '<span class="badge badge-blue">'.$agencies->services->count().'</span>';
            // })
            ->addColumn('booking_id', function($bookings){
                return $bookings->id;
                // ->created_at->toFormattedDateString();
            })
            ->editColumn('created_at', function($bookings){
                // $fecha = Carbon::parse($bookings->created_at);
                return ' '.$bookings->created_at->Format('jS F Y').' <small class="text-muted">'.$bookings->created_at->isoFormat('h:mm a').'</small>';
                //$bookings->created_at->toFormattedDateString();
            })
            ->editColumn('origin', function($bookings){
                return $bookings->origin;
            })
            ->editColumn('destiny', function($bookings){
                return $bookings->destiny;
            })
            ->editColumn('total', function($bookings){
                return $bookings->price;
            })
            ->editColumn('payment_method', function($bookings){
                return $bookings->type_payment;
            })
            ->editColumn('payment_status', function($bookings){
                $opciones = '';
                if ($bookings->status_payment === null ) {
                    $opciones .= '<h5><span class="badge bg-soft-warning text-warning"><i class="mdi mdi-timer-sand"></i> ESPERANDO PAGO</span></h5>';
                }
                elseif($bookings->status_payment === 1) {
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
                if ($bookings->status_booking === null ) {
                    $opciones .= '<h5><span class="badge badge-warning">PROCESANDO</span></h5>';
                }
                elseif($bookings->status_booking === 1) {
                    $opciones .= '<h5><span class="badge badge-info">Shipped</span></h5>';
                }
                elseif($bookings->status_booking === 2) {
                    $opciones .= '<h5><span class="badge badge-success">En servicio</span></h5>';
                }
                elseif($bookings->status_booking === 4) {
                    $opciones .= ' <h5><span class="badge badge-danger">Cancelado</span></h5>';
                }
                return $opciones;

        // <h5><span class="badge badge-info">Shipped</span></h5>
        // <h5><span class="badge badge-success">Delivered</span></h5>
        // <h5><span class="badge badge-warning">Processing</span></h5>
        // <h5><span class="badge badge-danger">Cancelled</span></h5>

            })
            // ->addColumn('options', function ($agencies){
            //     $opciones = '';
            //     if (Auth::user()->can('read_agencies')) {
            //         $opciones .= '<button type="button" onclick="btnInfo('.$agencies->id.')" class="btn action-icon icon-dual-primary"> <i class="mdi mdi-chevron-right"></i></button>';
            //     }
            //     if (Auth::user()->can('delete_agencies')) {
            //         // $opciones .= '<button type="button" onclick="btnDelete('.$agencies->id.')" class="btn action-icon icon-dual-danger"> <i class="mdi mdi-delete"></i></button>';
            //     }
            //     return $opciones;
            // })
             ->rawColumns(['created_at', 'payment_status','booking_status'])
            ->toJson();
        }
        return view('bookings.index');
    }
}
