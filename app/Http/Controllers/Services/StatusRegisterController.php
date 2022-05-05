<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\AssignRegisterStatus;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\AssingRegister;
use Carbon\Carbon;

use function PHPUnit\Framework\isNull;

class StatusRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            // if(!empty($request->from_date))
            // {
            //     $registers = Register::with(['Agency','Type_service', 'isAssigned'])->orderBy('date')
            //                         ->whereBetween('date', array(
            //                             $request->from_date, $request->to_date))
            //                         ->orderBy('pickup');

            // }else{
            //     $date = Carbon::today();
            //     $date = $date->format('Y-m-d');
            //     $registers = Register::with(['Agency','Type_service', 'isAssigned'])
            //                         ->whereDate('date', $date)
            //                         ->orderBy('date')->orderBy('pickup');
            // }
            $assigned = AssingRegister::with(['register','operator','unit','status'])->get();
            return DataTables::of($assigned)
            ->addIndexColumn()
            ->addColumn('origin', function($assigned){
                $origin = '';
                if($assigned->register->origin === "Aeropuerto Internacional de Cancun"){
                    $origin .= '<span class="text-center"> AEROPUERTO   <br>  '.$assigned->register->flight_number.' </span> <br> <span class="text-danger">'.$assigned->register->zo.' </span> ';
                }else{
                    $origin .='<span class="text-center"> '.$assigned->register->origin.'  <br>  <span class="text-danger">'.$assigned->register->zo.'</span> </span> ';
                }
                return $origin;
            })
            ->addColumn('destiny', function($assigned){
                $destiny = '';

                if($assigned->register->destiny === "Aeropuerto Internacional de Cancun"){
                    $destiny .= '<span class="text-center"> AEROPUERTO  <br>  '.$assigned->register->flight_number.' </span>  <br> <span class="text-danger">'.$assigned->register->zd.' </span> ' ;
                }else{
                    $destiny .= '<span class="text-center"> '.$assigned->register->destiny.'  <br> <span class="text-danger"> '.$assigned->register->zd.'</span> </span> ';
                }
                return $destiny;
            })
            ->addColumn('pax_bag', function($assigned){
                $pax_bag = '';
                if(isset($assigned->status->passenger_number)){
                    $pax_bag .=  '<span class="text-center"> PAX: '.$assigned->status->passenger_number .' <br>  MAL: '.$assigned->status->bag_number  .'</span>';
                }else{
                    $pax_bag .= '0';
                }
                return $pax_bag;
            })
            ->addColumn('unit_operator', function($assigned){
                return '<span class="text-center">'.$assigned->unit->unit .' <br> '.$assigned->operator->name.'</span>' ;
            })
            ->addColumn('status', function($assigned){
                $status = '';
                if(isset($assigned->status->status)){
                    if($assigned->status->status === "SHOW"){
                        $status .= '<span class=" badge badge-success text-center">'.$assigned->status->status.' </span> ' ;
                    }elseif($assigned->status->status === "NO SHOW"){
                        $status .= '<span class=" badge badge-outline-danger text-center">'.$assigned->status->status.' </span> ' ;
                    }
                }else{
                    $status .= '<span class=" badge badge-secondary text-center"> Esperando al operador... </span> ' ;
                }

                return $status;
            })
            ->addColumn('aware', function($assigned){
                $aware = '';
                    if(isset($assigned->status->aware)){
                        $aware = '<p class="text-center text-success"> '. Carbon::createFromFormat('H:i:s',$assigned->status->aware)->format('H:i').'</p>';
                    }else{
                        if(isset($assigned->status->status) && $assigned->status->status === 'NO SHOW'){
                            $aware .= '<p class="text-center text-danger"> No show </p> ' ;
                        }else{
                            $aware .= '<p class="text-secondary text-center"> Esperando... </p> ' ;
                        }
                    }
                return $aware;
            })
            ->addColumn('slope', function($assigned){
                $slope = '';
                if(isset($assigned->status->slope)){
                    $slope = '<p class="text-center text-success"> '. Carbon::createFromFormat('H:i:s',$assigned->status->slope)->format('H:i').'</p>';
                }else{
                    if(isset($assigned->status->status) && $assigned->status->status === 'NO SHOW'){
                        $slope .= '<p class="text-center text-danger"> No show </p> ' ;
                    }else{
                        $slope .= '<p class="text-secondary text-center"> Esperando... </p> ' ;
                    }
                }
                return $slope;

            })
            ->addColumn('on_board', function($assigned){
                $on_board = '';
                if(isset($assigned->status->on_board)){
                    $on_board = '<p class="text-center text-success"> '. Carbon::createFromFormat('H:i:s',$assigned->status->on_board)->format('H:i').'</p>';
                }else{
                    if(isset($assigned->status->status) && $assigned->status->status === 'NO SHOW'){
                        $on_board .= '<p class="text-center text-danger"> No show </p> ' ;
                    }else{
                        $on_board .= '<p class="text-secondary text-center"> Esperando... </p> ' ;
                    }
                }
                return $on_board;
            })
            ->addColumn('finalized', function($assigned){
                $finalized = '';
                if(isset($assigned->status->finalized)){
                    $finalized = Carbon::createFromFormat('H:i:s',$assigned->status->finalized)->format('H:i');
                }else{
                    if(isset($assigned->status->status) && $assigned->status->status === 'NO SHOW'){
                        $finalized .= '<p class="text-center text-danger"> No show </p> ' ;
                    }else{
                        $finalized .= '<p class="text-secondary text-center"> Esperando... </p> ' ;
                    }
                }
                return $finalized;
            })
            ->addColumn('observations', function($assigned){
                // return $assigned->status->observations;
            })
            ->rawColumns(['origin','destiny','status','aware','slope','on_board','finalized','pax_bag','unit_operator'])

            ->toJson();

        }
        return view('all_services.status.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
