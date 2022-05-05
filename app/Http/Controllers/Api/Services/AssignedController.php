<?php

namespace App\Http\Controllers\Api\Services;

use App\Http\Controllers\Controller;
use App\Models\AssingRegister;
use Illuminate\Http\Request;
use App\Http\Resources\OperatorCollection as OperatorCollection;
use App\Models\AssignRegisterStatus;
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
        $services = AssingRegister::with(['register','unit'])->where('id_operator',auth()->guard('driver')->user()->id)->get();
        return new OperatorCollection($services);
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
                'aware' => $request->aware,
                'slope' => $request->slope,
                'on_board' => $request->on_board,
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

}
