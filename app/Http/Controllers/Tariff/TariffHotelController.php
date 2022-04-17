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
        $zonas = TariffAgency::groupBy('zona')->pluck('zona');
        return view('tariff.tariff_hotel.index', compact(
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
