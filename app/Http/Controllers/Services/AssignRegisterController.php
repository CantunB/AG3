<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\AssingRegister;
use App\Models\Operator;
use App\Models\Register;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class AssignRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:create_registers')->only(['create','store']);
        $this->middleware('role_or_permission:read_registers')->only(['index','show']);
        $this->middleware('role_or_permission:update_registers')->only(['edit','update']);
        $this->middleware('role_or_permission:delete_registers')->only(['destroy']);
    }
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
                $registers = Register::with(['Agency','Type_service', 'isAssigned'])
                                    ->whereBetween('date', array(
                                        $request->from_date, $request->to_date))
                                    ->orderBy('date')
                                    ->orderBy('pickup');
            }else{
                $date = Carbon::today();
                $date = $date->format('Y-m-d');
                $registers = Register::with(['Agency','Type_service', 'isAssigned'])
                                    ->whereDate('date', $date)
                                    ->orderBy('date')
                                    ->orderBy('pickup');
            }
            return DataTables::of($registers)
            ->addIndexColumn()
            ->addColumn('hora', function($registers){
                return Carbon::createFromFormat('H:i:s',$registers->pickup)->format('H:i');
            })
            ->addColumn('service', function($registers){
                return $registers->Type_service->name;
            })
            ->editColumn('origin', function($registers){
                $origin = '';

                if($registers->origin === "Aeropuerto Internacional de Cancun"){
                    $origin .= '<span class="text-center"> AEROPUERTO   <br>  '.$registers->flight_number.' </span> <br> <span class="text-danger">'.$registers->zo.' </span> ';
                }else{
                    $origin .='<span class="text-center"> '.$registers->origin.'  <br>  <span class="text-danger">'.$registers->zo.'</span> </span> ';
                }
                return $origin;
            })
            ->editColumn('destiny', function($registers){
                $destiny = '';

                if($registers->destiny === "Aeropuerto Internacional de Cancun"){
                    $destiny .= '<span class="text-center"> AEROPUERTO  <br>  '.$registers->flight_number.' </span>  <br> <span class="text-danger">'.$registers->zd.' </span> ' ;
                }else{
                    $destiny .= '<span class="text-center"> '.$registers->destiny.'  <br> <span class="text-danger"> '.$registers->zd.'</span> </span> ';
                }
                return $destiny;
            })
            ->editColumn('requested_unit', function($registers){
                if ($registers->requested_unit == 1) {
                    return 'SUBURBAN';
                }else{
                    return 'VAN';
                }

            })
            ->addColumn('unit', function($registers){
                // return 'Sin unidad';
                $select_unit = '';
                $units = Unit::all();
                if(!isset($registers->isAssigned)){
                $select_unit .= '<select name="id_unit" id="id_unit'.$registers->id.'" disabled class="form-control select2"> <option selected disabled>Unidad</option>';
                    foreach ($units as $unit) {
                        $select_unit .= '<option value="' . $unit->id . '">' . $unit->unit . '</option>';
                    }
                $select_unit .= '</select>';
                }else{
                    $select_unit .= '<select name="id_unit" id="id_unit'.$registers->id.'" disabled class="form-control select2"> <option value="' . $registers->isAssigned->id_unit . '">' . $registers->isAssigned->unit->unit . '</option>';
                    foreach ($units as $unit) {
                        $select_unit .= '<option value="' . $unit->id . '">' . $unit->unit . '</option>';
                    }
                    $select_unit .= '</select>';
                }
                return $select_unit;

            })
            ->addColumn('operators', function($registers){
                // return 'Sin operador';
                $select_operator = '';
                $operators = Operator::all();

                if(!isset($registers->isAssigned)){
                    $select_operator .='<select name="id_operator" id="id_operator'.$registers->id.'" disabled class="form-control select2">  <option selected disabled>Operador</option>';
                        foreach ($operators as $operator) {
                            $select_operator .= '<option value="' . $operator->id . '">' . $operator->name . '</option>';
                        }
                    $select_operator .= '</select>';
                }else{
                    $select_operator .='<select name="id_operator" id="id_operator'.$registers->id.'" disabled class="form-control select2"> <option value="' . $registers->isAssigned->id_operator . '">' . $registers->isAssigned->Operator->name . '</option>';
                        foreach ($operators as $operator) {
                            $select_operator .= '<option value="' . $operator->id . '">' . $operator->name . '</option>';
                        }
                    $select_operator .= '</select>';
                }
                return $select_operator;
            })
            ->addColumn('options', function ($registers){
                $opciones = '';
                if (Auth::user()->can('update_registers')) {
                    if(isset($registers->isAssigned)){
                        if(!isset($registers->isAssigned->status)) {
                            $opciones .= '<button  type="button" class="btn action-icon icon-dual-warning btnassign_update"> <i class="mdi mdi-account-cog"></i></button>';
                     /* Creating a button with the id of btnsuccess_up and btncancel_up. */
                            $opciones .= '<button  id="btnsuccess_up'.$registers->id.'" type="button" class="btn action-icon icon-dual-success btnsuccess_update divOculto"> <i class="mdi mdi-check-bold"></i></button>';
                            $opciones .= '<button  id="btncancel_up'.$registers->id.'" type="button" class="btn action-icon icon-dual-danger btncancel_update divOculto"> <i class="mdi mdi-close"></i></button>';
                            $opciones .= '<button   onclick="btndelete('.$registers->isAssigned->id.')" id="btndelete'.$registers->id.'" type="button" class="btn action-icon icon-dual-secondary "> <i class="mdi mdi-trash-can"></i></button>';
                        }
                    }else{
                        $opciones .= '<button  type="button" class="btn btn-sm action-icon icon-dual-primary btnassign"> <i class="mdi mdi-account-arrow-right"></i></button>';
                        $opciones .= '<button id="btnsuccess'.$registers->id.'" type="button" class="btn btn-sm action-icon icon-dual-success btnsuccess divOculto"> <i class="mdi mdi-check-bold"></i></button>';
                        $opciones .= '<button   id="btncancel'.$registers->id.'"  type="button" class="btn btn-sm action-icon icon-dual-danger btncancel divOculto"> <i class="mdi mdi-close"></i></button>';

                    }
                }
                return $opciones;
            })
            ->rawColumns(['origin','destiny','status','options','unit','operators'])
            ->toJson();
        }
        return view('all_services.assignments.index');
    }

    public function getSubs(Request $request){
        if ($request->ajax()){
            if(!empty($request->from_date1))
            {
                $registers = Register::with(['Agency','Type_service', 'isAssigned'])
                                    ->whereBetween('date', array(
                                        $request->from_date1, $request->to_date1))
                                    ->where('requested_unit', 1)
                                    ->orderBy('date')
                                    ->orderBy('pickup');
            }else{
                $date = Carbon::today();
                $date = $date->format('Y-m-d');
                $registers = Register::with(['Agency','Type_service', 'isAssigned'])
                                    ->whereDate('date', $date)
                                    ->where('requested_unit', 1)
                                    ->orderBy('date')
                                    ->orderBy('pickup');
            }
            return DataTables::of($registers)
            ->addIndexColumn()
            ->addColumn('hora', function($registers){
                return Carbon::createFromFormat('H:i:s',$registers->pickup)->format('h:i');
            })
            ->addColumn('service', function($registers){
                return $registers->Type_service->name;
            })
            ->editColumn('origin', function($registers){
                $origin = '';

                if($registers->origin === "Aeropuerto Internacional de Cancun"){
                    $origin .= '<span class="text-center"> AEROPUERTO   <br>  '.$registers->flight_number.' </span> <br> <span class="text-danger">'.$registers->zo.' </span> ';
                }else{
                    $origin .='<span class="text-center"> '.$registers->origin.'  <br>  <span class="text-danger">'.$registers->zo.'</span> </span> ';
                }
                return $origin;
            })
            ->editColumn('destiny', function($registers){
                $destiny = '';

                if($registers->destiny === "Aeropuerto Internacional de Cancun"){
                    $destiny .= '<span class="text-center"> AEROPUERTO  <br>  '.$registers->flight_number.' </span>  <br> <span class="text-danger">'.$registers->zd.' </span> ' ;
                }else{
                    $destiny .= '<span class="text-center"> '.$registers->destiny.'  <br> <span class="text-danger"> '.$registers->zd.'</span> </span> ';
                }
                return $destiny;
            })
            ->editColumn('requested_unit', function($registers){
                if ($registers->requested_unit == 1) {
                    return 'SUBURBAN';
                }else{
                    return 'VAN';
                }
            })
            ->addColumn('unit', function($registers){
                // return 'Sin unidad';
                $select_unit = '';
                $units = Unit::all();
                if(!isset($registers->isAssigned)){
                $select_unit .= '<select name="id_unit" id="id_unit'.$registers->id.'" disabled class="form-control select2"> <option selected disabled>Unidad</option>';
                    foreach ($units as $unit) {
                        $select_unit .= '<option value="' . $unit->id . '">' . $unit->unit . '</option>';
                    }
                $select_unit .= '</select>';
                }else{
                    $select_unit .= '<select name="id_unit" id="id_unit'.$registers->id.'" disabled class="form-control select2"> <option value="' . $registers->isAssigned->id_unit . '">' . $registers->isAssigned->unit->unit . '</option>';
                    foreach ($units as $unit) {
                        $select_unit .= '<option value="' . $unit->id . '">' . $unit->unit . '</option>';
                    }
                    $select_unit .= '</select>';
                }
                return $select_unit;

            })
            ->addColumn('operators', function($registers){
                // return 'Sin operador';
                $select_operator = '';
                $operators = Operator::all();

                if(!isset($registers->isAssigned)){
                    $select_operator .='<select name="id_operator" id="id_operator'.$registers->id.'" disabled class="form-control select2">  <option selected disabled>Operador</option>';
                        foreach ($operators as $operator) {
                            $select_operator .= '<option value="' . $operator->id . '">' . $operator->name . '</option>';
                        }
                    $select_operator .= '</select>';
                }else{
                    $select_operator .='<select name="id_operator" id="id_operator'.$registers->id.'" disabled class="form-control select2"> <option value="' . $registers->isAssigned->id_operator . '">' . $registers->isAssigned->Operator->name . '</option>';
                        foreach ($operators as $operator) {
                            $select_operator .= '<option value="' . $operator->id . '">' . $operator->name . '</option>';
                        }
                    $select_operator .= '</select>';
                }
                return $select_operator;
            })
            ->addColumn('options', function ($registers){
                $opciones = '';
                if (Auth::user()->can('update_registers')) {
                    if(isset($registers->isAssigned)){
                        $opciones .= '<button  type="button" class="btn action-icon icon-dual-warning btnassign_update_sub"> <i class="mdi mdi-account-cog"></i></button>';
                        $opciones .= '<button  id="btnsuccess_up_sub'.$registers->id.'" type="button" class="btn action-icon icon-dual-success btnsuccess_update_sub divOculto"> <i class="mdi mdi-check-bold"></i></button>';
                        $opciones .= '<button  id="btncancel_up_sub'.$registers->id.'"  onclick="btncancel_up('.$registers->id.')" type="button" class="btn action-icon icon-dual-danger  divOculto"> <i class="mdi mdi-cancel"></i></button>';
                    }else{
                        $opciones .= '<button  type="button" class="btn btn-sm action-icon icon-dual-primary btnassign_sub"> <i class="mdi mdi-account-arrow-right"></i></button>';
                        $opciones .= '<button id="btnsuccess_sub'.$registers->id.'" type="button" class="btn btn-sm action-icon icon-dual-success btnsuccess_sub divOculto"> <i class="mdi mdi-check-bold"></i></button>';
                        $opciones .= '<button id="btncancel_sub'.$registers->id.'"  type="button" class="btn btn-sm action-icon icon-dual-danger btncancel_sub divOculto"> <i class="mdi mdi-cancel"></i></button>';
                    }
                }
                return $opciones;
            })
            ->rawColumns(['origin','destiny','status','options','unit','operators'])
            ->toJson();
        }
    }


    public function getVans(Request $request){
        if ($request->ajax()){
            if(!empty($request->from_date2))
            {
                $registers = Register::with(['Agency','Type_service', 'isAssigned'])
                                    ->whereBetween('date', array(
                                        $request->from_date2, $request->to_date2))
                                    ->where('requested_unit', 2)
                                    ->orderBy('date')
                                    ->orderBy('pickup');
            }else{
                $date = Carbon::today();
                $date = $date->format('Y-m-d');
                $registers = Register::with(['Agency','Type_service', 'isAssigned'])
                                    ->whereDate('date', $date)
                                    ->where('requested_unit', 2)
                                    ->orderBy('date')
                                    ->orderBy('pickup');
            }
            return DataTables::of($registers)
            ->addIndexColumn()
            ->addColumn('hora', function($registers){
                return Carbon::createFromFormat('H:i:s',$registers->pickup)->format('h:i');
            })
            ->addColumn('service', function($registers){
                return $registers->Type_service->name;
            })
            ->editColumn('origin', function($registers){
                $origin = '';

                if($registers->origin === "Aeropuerto Internacional de Cancun"){
                    $origin .= '<span class="text-center"> AEROPUERTO   <br>  '.$registers->flight_number.' </span> <br> <span class="text-danger">'.$registers->zo.' </span> ';
                }else{
                    $origin .='<span class="text-center"> '.$registers->origin.'  <br>  <span class="text-danger">'.$registers->zo.'</span> </span> ';
                }
                return $origin;
            })
            ->editColumn('destiny', function($registers){
                $destiny = '';

                if($registers->destiny === "Aeropuerto Internacional de Cancun"){
                    $destiny .= '<span class="text-center"> AEROPUERTO  <br>  '.$registers->flight_number.' </span>  <br> <span class="text-danger">'.$registers->zd.' </span> ' ;
                }else{
                    $destiny .= '<span class="text-center"> '.$registers->destiny.'  <br> <span class="text-danger"> '.$registers->zd.'</span> </span> ';
                }
                return $destiny;
            })
            ->editColumn('requested_unit', function($registers){
                if ($registers->requested_unit == 1) {
                    return 'SUBURBAN';
                }else{
                    return 'VAN';
                }

            })
            ->addColumn('unit', function($registers){
                // return 'Sin unidad';
                $select_unit = '';
                $units = Unit::all();
                if(!isset($registers->isAssigned)){
                $select_unit .= '<select name="id_unit" id="id_unit'.$registers->id.'" disabled class="form-control select2"> <option selected disabled>Unidad</option>';
                    foreach ($units as $unit) {
                        $select_unit .= '<option value="' . $unit->id . '">' . $unit->unit . '</option>';
                    }
                $select_unit .= '</select>';
                }else{
                    $select_unit .= '<select name="id_unit" id="id_unit'.$registers->id.'" disabled class="form-control select2"> <option value="' . $registers->isAssigned->id_unit . '">' . $registers->isAssigned->unit->unit . '</option>';
                    foreach ($units as $unit) {
                        $select_unit .= '<option value="' . $unit->id . '">' . $unit->unit . '</option>';
                    }
                    $select_unit .= '</select>';
                }
                return $select_unit;
            })
            ->addColumn('operators', function($registers){
                // return 'Sin operador';
                $select_operator = '';
                $operators = Operator::all();

                if(!isset($registers->isAssigned)){
                    $select_operator .='<select name="id_operator" id="id_operator'.$registers->id.'" disabled class="form-control select2">  <option selected disabled>Operador</option>';
                        foreach ($operators as $operator) {
                            $select_operator .= '<option value="' . $operator->id . '">' . $operator->name . '</option>';
                        }
                    $select_operator .= '</select>';
                }else{
                    $select_operator .='<select name="id_operator" id="id_operator'.$registers->id.'" disabled class="form-control select2"> <option value="' . $registers->isAssigned->id_operator . '">' . $registers->isAssigned->Operator->name . '</option>';
                        foreach ($operators as $operator) {
                            $select_operator .= '<option value="' . $operator->id . '">' . $operator->name . '</option>';
                        }
                    $select_operator .= '</select>';
                }
                return $select_operator;
            })
            ->addColumn('options', function ($registers){
                $opciones = '';
                if (Auth::user()->can('update_registers')) {
                    if(isset($registers->isAssigned)){
                        $opciones .= '<button  type="button" class="btn action-icon icon-dual-warning btnassign_update"> <i class="mdi mdi-account-cog"></i></button>';
                        $opciones .= '<button  id="btnsuccess_up'.$registers->id.'" type="button" class="btn action-icon icon-dual-success btnsuccess_update divOculto"> <i class="mdi mdi-check-bold"></i></button>';
                        $opciones .= '<button  id="btncancel_up'.$registers->id.'" type="button" class="btn action-icon icon-dual-danger btncancel_update divOculto"> <i class="mdi mdi-cancel"></i></button>';
                    }else{
                        $opciones .= '<button  type="button" class="btn btn-sm action-icon icon-dual-primary btnassign"> <i class="mdi mdi-account-arrow-right"></i></button>';
                        $opciones .= '<button id="btnsuccess'.$registers->id.'" type="button" class="btn btn-sm action-icon icon-dual-success btnsuccess divOculto"> <i class="mdi mdi-check-bold"></i></button>';
                        $opciones .= '<button id="btncancel'.$registers->id.'"  type="button" class="btn btn-sm action-icon icon-dual-danger btncancel divOculto"> <i class="mdi mdi-cancel"></i></button>';
                    }
                }
                return $opciones;
            })
            ->rawColumns(['origin','destiny','status','options','unit','operators'])
            ->toJson();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $assign = AssingRegister::create($request->all());
        // return redirect()->route('assign.index');
        return response()->json(['data' => $assign], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $register = Register::findOrFail($id);
        $units = Unit::Active();
        $operators = Operator::all();

        return view('all_services.assignments.show', compact(['register','units', 'operators']));

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
        $assign = AssingRegister::where('id_register', $id)->firstOrFail();
        $assign = $assign->update($request->all());
        // return redirect()->route('assign.index');
        return response()->json(['data' => $assign], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assign = AssingRegister::findOrFail($id);
        $delete = $assign->delete();
        if ($delete == 1){
            $success = true;
            $message = "Asignación eliminada";
        } else {
            $success = true;
            $message = "No se pudo eliminar la asignación";
        }
        return response()->json([
            'success' => $success,
            'message' => $message
        ],200);
    }
}
