<?php

namespace App\Http\Controllers;

use App\Models\Airline;
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
}
