<?php

namespace App\Http\Controllers\Tariff;

use App\Http\Controllers\Controller;
use App\Models\TariffAgency;
use App\Models\TariffHotel;
use Illuminate\Http\Request;

class TariffHotelController extends Controller
{
    /**
    * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tarifas =TariffHotel::all();
        $zonas = TariffHotel::groupBy('id_zona')->pluck('id_zona');
        return view('tariff.tariff_web.index', compact(
            'tarifas',
            'zonas'
        ));

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
    public function show($zona)
    {
        $zona = $zona;
        $tarifas_sub = TariffHotel::where('id_zona',$zona)->where('type_unit_id',1)->get();
        $tarifas_van = TariffHotel::where('id_zona',$zona)->where('type_unit_id',2)->get();

        return view('tariff.tariff_web.show', compact('zona','tarifas_sub','tarifas_van'));
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
    public function update(Request $request, $zona)
    {
        $sencillo_suburban = TariffHotel::where("id_zona", $zona)
            ->where('type_unit_id', $request->subsencillo_unit)
            ->where('type_trip_id', $request->subsencillo_trip)
            ->update(["MXN" => $request->subsencillo_tarifa ]);

        $redondo_suburban = TariffHotel::where("id_zona", $zona)
            ->where('type_unit_id', $request->subredondo_unit)
            ->where('type_trip_id', $request->subredondo_trip)
            ->update(["MXN" => $request->subredondo_tarifa ]);

        $van_sencillo = TariffHotel::where("id_zona", $zona)
            ->where('type_unit_id',$request->vansencillo_unit)
            ->where('type_trip_id', $request->vansencillo_trip)
            ->update(["MXN" => $request->vansencillo_tarifa ]);

        $redondo_van = TariffHotel::where("id_zona", $zona)
            ->where('type_unit_id', $request->vanredondo_unit)
            ->where('type_trip_id', $request->vanredondo_trip)
            ->update(["MXN" => $request->vanredondo_tarifa ]);

        return redirect()->route('taf_hotels.index');
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

// @foreach ($zonas as $z => $zona)
// <tbody>
//     <td class="text-center text-black"> Z{{$zona}} </td>
//     @foreach ($tarifas as $t =>  $item)
//     @if($zona == $item->id_zona )
//     <td class="text-center">
//         ${{$item->MXN}}
//     </td>
//     @endif
//     @endforeach
// </tbody>
// @endforeach
