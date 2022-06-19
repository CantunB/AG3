<?php

namespace App\Http\Controllers\Api\Services;

use App\Http\Controllers\Controller;
use App\Models\AssingRegister;
use Illuminate\Http\Request;
use App\Http\Resources\OperatorCollection as OperatorCollection;
use App\Models\AssignRegisterStatus;
use App\Models\AssignRegisterCharges;
use App\Models\ServiceOperation;

class AssignedController extends Controller
{
    public function __construct()
    {
        auth()->guard('driver')->user();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = AssingRegister::with(['register','unit','status'])->where('id_operator',auth()->guard('driver')->user()->id)->get();
        return new OperatorCollection($services);
        //return $services;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = AssingRegister::with(['register'])->findOrFail($id);
        return response()->json(['data' => $service], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $status = AssignRegisterStatus::create($request->all());
        $status = AssignRegisterStatus::updateOrCreate(
            [ 'id_assigned' => $request->id_assigned],
            [
                'status' => $request->status,
                'comment' => $request->comment,
                'aware' => $request->aware,
                'coordinates_aware' => $request->coordinates_aware,
                'slope' => $request->slope,
                'coordinates_slope' => $request->coordinates_slope,
                'on_board' => $request->on_board,
                'coordinates_onboard' => $request->coordinates_onboard,
                'passenger_number' => $request->passenger_number,
                'bag_number' => $request->bag_number,
                'finalized' => $request->start,
                'finalized' => $request->finalized,
            ]
        );
        return response()->json(['data' => 'Servicio actualizado'], 201);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function new(Request $request)
    {
        $operation = ServiceOperation::create($request->all());
        return response()->json(['data' => 'Operatividad registrada'], 201);

    }

    public function aware(Request $request)
    {

        $status = AssignRegisterStatus::updateOrCreate(
            [ 'id_assigned' => $request->id_assigned],
            [
                'aware' => $request->aware,
                
                'status' => 'Enterado'
            ]
        );        
        //return redirect()-> route('Desperfectos.index');
        return response()->json(['data' => 'Servicio actualizado'], 201);
    }
    public function slope(Request $request)
    {
        $status = AssignRegisterStatus::updateOrCreate(
            [ 'id_assigned' => $request->id_assigned],
            [                
                'slope' => $request->slope,
                
                'status' => 'En espera'
            ]
        );
        return response()->json(['data' => 'Servicio actualizado'], 201);
    }
    public function onboard(Request $request)
    {
        $status = AssignRegisterStatus::updateOrCreate(
            [ 'id_assigned' => $request->id_assigned],
            [
                'on_board' => $request->on_board,
                
                'status' => 'Abordo'
            ]
        );
        return response()->json(['data' => 'Servicio actualizado'], 201);
    }
    public function noshow(Request $request)
    {
        $status = AssignRegisterStatus::updateOrCreate(
            [ 'id_assigned' => $request->id_assigned],
            [
                'noshow' => $request->noshow,
                'status' => 'No show'
            ]
        );
        return response()->json(['data' => 'Servicio actualizado'], 201);
    }
    public function save(Request $request)
    {
        //return $request;
        $status = AssignRegisterStatus::updateOrCreate(
            [ 'id_assigned' => $request->id_assigned],
            [
                'status' => 'Iniciado',
                'comment' => $request->comment,
                'coupon' => $request->coupon,
                'passenger_number' => $request->passenger_number,                
                'bag_number' => $request->bag_number,
                'start' => $request->start
            ]
        );
        //return redirect()-> route('Desperfectos.index');
        return response()->json(['data' => 'Servicio actualizado'], 201);
    }
    public function finalized(Request $request)
    {
        $status = AssignRegisterStatus::updateOrCreate(
            [ 'id_assigned' => $request->id_assigned],
            [
                'finalized' => $request->finalized,
                'status' => 'Finalizado'
            ]
        );
        return response()->json(['data' => 'Servicio actualizado'], 201);
    }   
    public function charges(Request $request)
    {
        //return $request;
        $operation = AssignRegisterCharges::create($request->all());
        return response()->json(['data' => 'Operatividad registrada'], 201);

    } 

}
