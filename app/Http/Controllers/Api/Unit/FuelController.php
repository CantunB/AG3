<?php

namespace App\Http\Controllers\Api\Unit;

use App\Http\Controllers\Controller;
use App\Models\FuelLoad;
use Illuminate\Http\Request;

class FuelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $operation = FuelLoad::create($request->all());
        return response()->json(['data' => 'Carga registrada'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FuelLoad  $fuelLoad
     * @return \Illuminate\Http\Response
     */
    public function show(FuelLoad $fuelLoad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FuelLoad  $fuelLoad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FuelLoad $fuelLoad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FuelLoad  $fuelLoad
     * @return \Illuminate\Http\Response
     */
    public function destroy(FuelLoad $fuelLoad)
    {
        //
    }
}
