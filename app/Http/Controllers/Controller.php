<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use App\Models\Hotel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getCodeIATA(Request $request)
    {
        $data['code'] = Airline::select("iata_code")->where("airline",$request->airline)
                            ->orWhere('airline', 'like', '%' . $request->airline . '%')
                            ->first();
        return response()->json($data);
    }
    public function getTariffAgency(Request $request)
    {
        // $data = $request->all();
        if($request->service === "1"){
            $search_zone = Hotel::where('hotel', $request->origen)
            ->orWhere('hotel', 'like', '%' . $request->origen . '%')
            ->first();

            $search_tariff = DB::table('tariff_agencies')
                                    ->where('zona', $search_zone->zona)
                                    ->where('id_agency', $request->agency)
                                    ->where('type_unit', $request->request_unit)
                                    ->get();
            return $data = $search_tariff;
        }elseif ($request->service === "2"){
            $search_zone = Hotel::where('hotel', $request->destiny)
            ->orWhere('hotel', 'like', '%' . $request->destiny . '%')
            ->first();

            $search_tariff = DB::table('tariff_agencies')
                                    ->where('zona', $search_zone->zona)
                                    ->where('id_agency', $request->agency)
                                    ->where('type_unit', $request->request_unit)
                                    ->get();
            return $data = $search_tariff;
        }
        // if ($request->services == "1")  { //Aeropuerto a Hotel (Origen - Destino)
        //     $search_destino = Hotel::where('hotel', $request->destino)
        // ->orWhere('hotel', 'like', '%' . $request->destino . '%')->first();
        // }
        // return response()->json($data);
    }
}
