<?php

namespace App\Http\Controllers\Units;

use App\Http\Controllers\Controller;
use App\Http\Requests\Units\StoreUnitsServicesRequest;
use App\Models\Unit;
use App\Models\UnitService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;


class UnitServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        if ($request->ajax()){
            $unit = UnitService::where('unit_id', $id)->get();
            //$unit = Unit::with('bitacora')->findOrFail($id)->Active();
            return DataTables::of($unit)
            ->addIndexColumn()
            ->editColumn('date', function($unit){
                return $unit->date; 
            })
            ->editColumn('mileage', function($unit){
                return $unit->mileage . ' KM'; 
            })
            ->editColumn('cost', function($unit){
                return  '$ '.$unit->cost; 
            })
            ->addColumn('options', function ($unit){
                $opciones = '';
                if (Auth::user()->can('delete_units')) {
                    $opciones .= '<button type="button" onclick="btnDelete('.$unit->id.')" class="btn btn-sm action-icon icon-dual-danger"><i class="mdi mdi-trash-can-outline"></i></button>';
                }
                return $opciones;
            })
            ->rawColumns(['options'])
            ->toJson();
        }



        $unit =  Unit::with(['bitacora', 'galery'])->findOrFail($id);
        $color= sprintf('#%06X', mt_rand(0, 0xFFFFFF));

        return view('units.bitacora.show', compact('unit','color'));
    }

    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUnitsServicesRequest $request, $id)
    {
        UnitService::create($request->all());
        return response()->json(['data' => 'Se agrego un nuevo servicio a la unidad'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        
    }

    public function edit()
    {
        return 'HOLA ESTOY EN LA BITACORA';
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
        $unit = UnitService::findOrFail($id);
        $delete = $unit->delete();
        if ($delete == 1){
            $success = true;
            $message = "Servicio de unidad correctamente";
        } else {
            $success = true;
            $message = "No se elimino el servicio de la unidad";
        }

        return response()->json([
            'success' => $success,
            'message' => $message
        ]);
    }
}
