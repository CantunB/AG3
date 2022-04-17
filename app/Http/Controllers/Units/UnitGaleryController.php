<?php

namespace App\Http\Controllers\Units;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Units\StoreUnitsGaleryRequest;
use App\Models\Unit;
use App\Models\UnitGalery;

class UnitGaleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:create_unit')->only(['create','store']);
        $this->middleware('role_or_permission:read_unit')->only(['index','show']);
        $this->middleware('role_or_permission:update_unit')->only(['edit','update']);
        $this->middleware('role_or_permission:delete_unit')->only(['destroy']);
    }
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
    public function store(StoreUnitsGaleryRequest $request, $id)
    {
        $unit = Unit::findOrFail($id);
        $directory = '/images/units/'. $unit->unit .'/';
        if($request->hasFile('galery')){
        foreach ($request->galery as $item => $v ) {
                $filename = $unit->unit . $item .  $request->galery[$item]->getClientOriginalExtension();
                $data2=array(
                    //'quote_file' => $request->quote_file[$item],
                    'unit_id' => $request->unit_id,
                    'images' => $filename,
                    //'quantity' => $request->quantity[$item],
                );
                $request->galery[$item]->move(public_path('images/units/' . $unit->unit . '/'), $filename);
                UnitGalery::insert($data2);
            }
        }
        return response()->json(['data' => 'Imagen(s) de unidad almacenada(s)'],200);
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
