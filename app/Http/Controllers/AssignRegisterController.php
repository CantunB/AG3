<?php

namespace App\Http\Controllers;

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
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $registers = Register::with(['Agency','Type_service', 'isAssigned'])
                ->orderBy('pickup');
            return DataTables::of($registers)
            ->addIndexColumn()
            ->addColumn('hora', function($registers){
                return Carbon::createFromFormat('H:i:s',$registers->pickup)->format('h:i');
            })
            ->addColumn('service', function($registers){
                return $registers->Type_service->name;
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
                            $select_operator .= '<option value="' . $operator->id . '">' . $operator->fullname . '</option>';
                        }
                    $select_operator .= '</select>';
                }else{
                    $select_operator .='<select name="id_operator" id="id_operator'.$registers->id.'" disabled class="form-control select2"> <option value="' . $registers->isAssigned->id_operator . '">' . $registers->isAssigned->Operator->fullname . '</option>';
                        foreach ($operators as $operator) {
                            $select_operator .= '<option value="' . $operator->id . '">' . $operator->fullname . '</option>';
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
                        $opciones .= '<button  id="btncancel_up'.$registers->id.'" onclick="btncancel_up('.$registers->id.')" type="button" class="btn action-icon icon-dual-danger btncancel_update divOculto"> <i class="mdi mdi-cancel"></i></button>';
                    }else{
                        $opciones .= '<button  type="button" class="btn btn-sm action-icon icon-dual-primary btnassign"> <i class="mdi mdi-account-arrow-right"></i></button>';
                        $opciones .= '<button id="btnsuccess'.$registers->id.'" type="button" class="btn btn-sm action-icon icon-dual-success btnsuccess divOculto"> <i class="mdi mdi-check-bold"></i></button>';
                        $opciones .= '<button id="btncancel'.$registers->id.'"  type="button" class="btn btn-sm action-icon icon-dual-danger btncancel divOculto"> <i class="mdi mdi-cancel"></i></button>';
                    }
                }
                // if (Auth::user()->can('delete_registers')) {
                //     if(!isset($registers->isAssigned)){
                //         $opciones .= '<button type="button" onclick="btnDelete('.$registers->id.')" class="btn action-icon icon-dual-danger "> <i class="mdi mdi-trash-can-outline"></i></button>';
                //     }else{
                //         $opciones .= '<button type="button" onclick="btnDelete('.$registers->id.')" class="btn action-icon icon-dual-danger "> <i class="mdi mdi-trash-can-outline"></i></button>';
                //     }
                // }
                return $opciones;
            })
            ->rawColumns(['status','options','unit','operators'])
            ->toJson();
        }
        // if ($request->ajax()){
        //     $seguimientos = AssingRegister::with(['Operator','register','unit']);
        //     return DataTables::of($seguimientos)
        //     ->addColumn('unidad', function($seguimientos){
        //         return $seguimientos->unit->unit ;
        //     })
        //     ->addColumn('agency', function($seguimientos){
        //         return $seguimientos->register->Agency->business_name ;
        //     })
        //     ->addColumn('services', function($seguimientos){
        //         return $seguimientos->register->Type_service->name;
        //     })
        //     ->addColumn('operator', function($seguimientos){
        //         return $seguimientos->Operator->FullName;
        //     })
        //     ->editColumn('price', function($seguimientos){
        //         return '$'.$seguimientos->price;
        //     })
        //     ->editColumn('status', function($seguimientos){
        //         $status = '';
        //         // if(!isset($seguimientos->isAssigned)){
        //             $status = '<div class="text-center button-list">
        //                             <span class="badge btn-sm btn-soft-primary waves-effect waves-light">Asignado</span>
        //                     </div>';
        //         // }
        //         // else{
        //         //     $status = '<div class="text-center button-list">
        //         //                     <a href="javascript: void(0);" class="btn btn-xs btn-primary waves-effect waves-light">Asignada</a>
        //         //                 </div>';
        //         // }
        //         return $status;
        //     })
        //     ->addColumn('options', function ($seguimientos){
        //         $opciones = '';
        //         // if (Auth::user()->can('read_registers')){
        //         //     $opciones .= '<button type="button" onclick="btnInfo('.$seguimientos->id.')"  data-toggle="modal" data-target="#myModal" class="btn btn-sm action-icon icon-dual-info"><i class="mdi mdi-alert-rhombus-outline"></i></button>';
        //         //     // return ' <button onclick="btonLider('.$sympathizers->id.')" data-toggle="modal" data-target="#modalInfoLider" class="btn btn-sm btn-xs btn-info"><i class="mdi mdi-check"></i> LIDER</button>';
        //         // }
        //         if (Auth::user()->can('update_registers')) {
        //             if(!isset($seguimientos->isAssigned)){
        //                 $opciones .= '<button  type="button" class="btn action-icon icon-dual-warning"> <i class="mdi mdi-pencil-outline"></i></button>';
        //             }
        //         }
        //         if (Auth::user()->can('delete_registers')) {
        //             if(!isset($seguimientos->isAssigned)){
        //                 $opciones .= '<button type="button" onclick="btnDelete('.$seguimientos->id.')" class="btn action-icon icon-dual-danger "> <i class="mdi mdi-trash-can-outline"></i></button>';
        //             }
        //         }
        //         return $opciones;
        //     })
        //     ->rawColumns(['status','options'])
        //     ->toJson();
        // }
        return view('assignments.index');
    }

    public function getSubs(Request $request){
        if ($request->ajax()){
            $registers = Register::with(['Agency','Type_service', 'isAssigned'])
                ->where('requested_unit', 1)
                ->orderBy('pickup');
            return DataTables::of($registers)
            ->addIndexColumn()
            ->addColumn('hora', function($registers){
                return Carbon::createFromFormat('H:i:s',$registers->pickup)->format('h:i');
            })
            ->addColumn('service', function($registers){
                return $registers->Type_service->name;
            })
            ->editColumn('requested_unit', function($registers){
                if ($registers->requested_unit == 1) {
                    return 'SUBURBAN';
                }else{
                    return 'VAN';
                }
            })
            ->addColumn('unit', function($registers){
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
                $select_operator = '';
                $operators = Operator::all();

                if(!isset($registers->isAssigned)){
                    $select_operator .='<select name="id_operator" id="id_operator'.$registers->id.'" disabled class="form-control select2">  <option selected disabled>Operador</option>';
                        foreach ($operators as $operator) {
                            $select_operator .= '<option value="' . $operator->id . '">' . $operator->fullname . '</option>';
                        }
                    $select_operator .= '</select>';
                }else{
                    $select_operator .='<select name="id_operator" id="id_operator'.$registers->id.'" disabled class="form-control select2"> <option value="' . $registers->isAssigned->id_operator . '">' . $registers->isAssigned->Operator->fullname . '</option>';
                        foreach ($operators as $operator) {
                            $select_operator .= '<option value="' . $operator->id . '">' . $operator->fullname . '</option>';
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
                        $opciones .= '<button  id="btncancel_up'.$registers->id.'"  onclick="btncancel_up('.$registers->id.')" type="button" class="btn action-icon icon-dual-danger  divOculto"> <i class="mdi mdi-cancel"></i></button>';
                    }else{
                        $opciones .= '<button  type="button" class="btn btn-sm action-icon icon-dual-primary btnassign"> <i class="mdi mdi-account-arrow-right"></i></button>';
                        $opciones .= '<button id="btnsuccess'.$registers->id.'" type="button" class="btn btn-sm action-icon icon-dual-success btnsuccess divOculto"> <i class="mdi mdi-check-bold"></i></button>';
                        $opciones .= '<button id="btncancel'.$registers->id.'"  type="button" class="btn btn-sm action-icon icon-dual-danger btncancel divOculto"> <i class="mdi mdi-cancel"></i></button>';
                    }
                }
                // if (Auth::user()->can('delete_registers')) {
                //     if(!isset($registers->isAssigned)){
                //         $opciones .= '<button type="button" onclick="btnDelete('.$registers->id.')" class="btn action-icon icon-dual-danger "> <i class="mdi mdi-trash-can-outline"></i></button>';
                //     }else{
                //         $opciones .= '<button type="button" onclick="btnDelete('.$registers->id.')" class="btn action-icon icon-dual-danger "> <i class="mdi mdi-trash-can-outline"></i></button>';
                //     }
                // }
                return $opciones;
            })
            ->rawColumns(['status','options','unit','operators'])
            ->toJson();
        }
    }


    public function getVans(Request $request){
        if ($request->ajax()){
            $registers = Register::with(['Agency','Type_service', 'isAssigned'])
                ->where('requested_unit', 2)
                ->orderBy('pickup');
            return DataTables::of($registers)
            ->addIndexColumn()
            ->addColumn('hora', function($registers){
                return Carbon::createFromFormat('H:i:s',$registers->pickup)->format('h:i');
            })
            ->addColumn('service', function($registers){
                return $registers->Type_service->name;
            })
            ->editColumn('requested_unit', function($registers){
                if ($registers->requested_unit == 1) {
                    return 'SUBURBAN';
                }else{
                    return 'VAN';
                }

            })
            ->addColumn('unit', function($registers){
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
                $select_operator = '';
                $operators = Operator::all();

                if(!isset($registers->isAssigned)){
                    $select_operator .='<select name="id_operator" id="id_operator'.$registers->id.'" disabled class="form-control select2">  <option selected disabled>Operador</option>';
                        foreach ($operators as $operator) {
                            $select_operator .= '<option value="' . $operator->id . '">' . $operator->fullname . '</option>';
                        }
                    $select_operator .= '</select>';
                }else{
                    $select_operator .='<select name="id_operator" id="id_operator'.$registers->id.'" disabled class="form-control select2"> <option value="' . $registers->isAssigned->id_operator . '">' . $registers->isAssigned->Operator->fullname . '</option>';
                        foreach ($operators as $operator) {
                            $select_operator .= '<option value="' . $operator->id . '">' . $operator->fullname . '</option>';
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
                // if (Auth::user()->can('delete_registers')) {
                //     if(!isset($registers->isAssigned)){
                //         $opciones .= '<button type="button" onclick="btnDelete('.$registers->id.')" class="btn action-icon icon-dual-danger "> <i class="mdi mdi-trash-can-outline"></i></button>';
                //     }else{
                //         $opciones .= '<button type="button" onclick="btnDelete('.$registers->id.')" class="btn action-icon icon-dual-danger "> <i class="mdi mdi-trash-can-outline"></i></button>';
                //     }
                // }
                return $opciones;
            })
            ->rawColumns(['status','options','unit','operators'])
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

        return view('assignments.show', compact(['register','units', 'operators']));

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
        //
    }
}
