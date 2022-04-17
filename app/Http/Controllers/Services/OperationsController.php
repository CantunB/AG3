<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class OperationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            if(!empty($request->from_date))
            {
                $registers = Register::with(['Agency','Type_service', 'isAssigned'])->orderBy('date')
                                    ->whereBetween('date', array(
                                        $request->from_date, $request->to_date))
                                    ->orderBy('pickup');

            }else{
                $date = Carbon::today();
                $date = $date->format('Y-m-d');
                $registers = Register::with(['Agency','Type_service', 'isAssigned'])
                                    ->whereDate('date', $date)
                                    ->orderBy('date')->orderBy('pickup');
            }
            return DataTables::of($registers)
            ->addIndexColumn()
            ->editColumn('date', function($registers){
                return $registers->date;

            })
            ->editColumn('pickup', function($registers){
                return Carbon::createFromFormat('H:i:s',$registers->pickup)->format('H:i');
            })
            ->editColumn('origin', function($registers){
                $origin = '';

                if($registers->origin === "Aeropuerto Internacional de Cancun"){
                    $origin .= '<span class="text-center"> AEROPUERTO   <br>  '.$registers->flight_number.' </span>   <br> <span class="text-danger">'.$registers->zo.'</span> ';
                }else{
                    $origin .='<span class="text-center"> '.$registers->origin.'  <br> <span class="text-danger"> '.$registers->zo.' </span></span> ';
                }
                return $origin;
            })
            ->editColumn('destiny', function($registers){
                $destiny = '';

                if($registers->destiny === "Aeropuerto Internacional de Cancun"){
                    $destiny .= '<span class="text-center"> AEROPUERTO  <br>  '.$registers->flight_number.' </span> <br><span class="text-danger">'.$registers->zd.'</span> ';
                }else{
                    $destiny .= '<span class="text-center"> '.$registers->destiny.'  <br>  <span class="text-danger">'.$registers->zd.'</span> </span> ';
                }
                return $destiny;
            })
            ->addColumn('agencia', function($registers){
                return $registers->Agency->name_agency;
            })->filterColumn('agencia', function($query, $keyword) {
                $query->whereHas('Agency', function($query) use ($keyword) {
                 //   $query->whereRaw("CONCAT(nombre, paterno, materno) like ?", ["%{$keyword}%"]);
                    $query->whereRaw("name like ?", ["%{$keyword}%"]);
                });
            })
            ->addColumn('service', function($registers){
                return $registers->Type_service->name;
            })->filterColumn('service', function($query, $keyword) {
                $query->whereHas('Type_service', function($query) use ($keyword) {
                 //   $query->whereRaw("CONCAT(nombre, paterno, materno) like ?", ["%{$keyword}%"]);
                    $query->whereRaw("name like ?", ["%{$keyword}%"]);
                });
            })
            ->editColumn('status', function($registers){
                $status = '';
                if(!isset($registers->isAssigned)){
                    $status = '<div class="text-center button-list">
                                    <a href="'. route('assign.show', $registers->id) .'" class="btn btn-xs btn-soft-secondary waves-effect waves-light">Asignar</a>
                            </div>';
                }
                else{
                    $status = '<div class="text-center button-list">
                                    <a href="javascript: void(0);" class="btn btn-xs btn-primary waves-effect waves-light">Asignada</a>
                                </div>';
                }
                return $status;
            })
            ->editColumn('requested_unit', function($registers){
                if ($registers->requested_unit == 1) {
                    return 'SUBURBAN';
                }else{
                    return 'VAN';
                }
            })
            ->addColumn('options', function ($registers){
                $opciones = '';
                if (Auth::user()->can('read_registers')){
                    $opciones .= '<button type="button" onclick="btnInfo('.$registers->id.')"  data-toggle="modal" data-target="#myModal" class="btn btn-sm action-icon icon-dual-info"><i class="mdi mdi-alert-rhombus-outline"></i></button>';
                    // return ' <button onclick="btonLider('.$sympathizers->id.')" data-toggle="modal" data-target="#modalInfoLider" class="btn btn-sm btn-xs btn-info"><i class="mdi mdi-check"></i> LIDER</button>';
                }
                if (Auth::user()->can('update_registers')) {
                    if(!isset($registers->isAssigned)){
                        $opciones .= '<button  type="button" class="btn action-icon icon-dual-warning"> <i class="mdi mdi-pencil-outline"></i></button>';
                        // $opciones .= '<a href="'. route('assign.show', $registers->id) .'"  class="btn btn-sm action-icon getInfo icon-dual-primary"><i class="mdi mdi-book-account-outline"></i></a>';
                    }
                }
                if (Auth::user()->can('delete_registers')) {
                    if(!isset($registers->isAssigned)){
                        $opciones .= '<button type="button" onclick="btnDelete('.$registers->id.')" class="btn action-icon icon-dual-danger "> <i class="mdi mdi-trash-can-outline"></i></button>';
                    }
                }
                return $opciones;
            })
            ->rawColumns(['origin','destiny','status','options'])
            ->toJson();

        }
        //$registers = Register::with(['Agency','Type_service','Airline', 'isAssigned'])->get();
        return view('all_services.registers.index');
        return view('all_services.operations.index');
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
        //
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
