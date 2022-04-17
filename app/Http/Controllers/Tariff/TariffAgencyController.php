<?php

namespace App\Http\Controllers\Tariff;

use App\Http\Controllers\Controller;
use App\Models\TariffAgency;
use App\odel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class TariffAgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if ($request->ajax()){
        //     $tarifas = TariffAgency::with('agency','unit');
        //     return DataTables::of($tarifas)
        //     // ->addIndexColumn()
        //     ->editColumn('id_agency', function($tarifas){
        //         if($tarifas->agency->name === ''){
        //             return $tarifas->agency->business_name;
        //         }else{
        //             return $tarifas->agency->name;
        //         }
        //     })
        //     ->editColumn('type_unit', function($tarifas){
        //         return $tarifas->unit->type_units;
        //         })
        //     ->toJson();
        // }
        $agencies = TariffAgency::with('agency','unit')->groupBy('id_agency')->get();
        $zonas = TariffAgency::groupBy('zona')->pluck('zona');
        $tarifas = TariffAgency::all();
        return view('tariff.tariff_agency.index', compact('agencies','zonas','tarifas'));
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
     * @param  \App\odel  $odel
     * @return \Illuminate\Http\Response
     */
    public function show(odel $odel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\odel  $odel
     * @return \Illuminate\Http\Response
     */
    public function edit(odel $odel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\odel  $odel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, odel $odel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\odel  $odel
     * @return \Illuminate\Http\Response
     */
    public function destroy(odel $odel)
    {
        //
    }
}
