<?php

namespace App\Http\Controllers;

use App\Http\Requests\Registers\StoreRegistersRequest;
use App\Models\Agency;
use App\Models\Airline;
use App\Models\Hotel;
use App\Models\OriginDestiny;
use App\Models\Register;
use App\Models\TypeService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $registers = Register::with(['Agency','Type_service', 'isAssigned']);
//          $registers = Register::with(['Agency','Type_service','Airline', 'isAssigned'])->get();
            return DataTables::of($registers)
            ->addIndexColumn()
            ->editColumn('date', function($registers){
                return $registers->date;
            })
            ->editColumn('agencia', function($registers){
                return $registers->Agency->business_name;
            })
            ->editColumn('service', function($registers){
                return $registers->Type_service->name;
            })
            ->editColumn('status', function($registers){
                $status = '';
                if(!isset($registers->isAssigned)){
                    $status = '<div class="text-center button-list">
                                    <a href="'. route('assign.show', $registers->id) .'" class="btn btn-xs btn-soft-secondary waves-effect waves-light">Asignar</a>
                            </div>';
                }
                else{
                    $status = '<div class="text-center button-list">
                                    <a href="javascript: void(0);" class="btn btn-xs btn-primary waves-effect waves-light">Asignada</a>
                                </div>';
                }
                return $status;
            })
            ->editColumn('requested_unit', function($registers){
                if ($registers->requested_unit == 1) {
                    return 'SUBURBAN';
                }else{
                    return 'VAN';
                }

            })
            ->addColumn('options', function ($registers){
                $opciones = '';
                if (Auth::user()->can('read_operators')){
                    $opciones .= '<button type="button"  onclick="btnInfo('.$registers->id.')" class="btn btn-sm action-icon getInfo icon-dual-blue"><i class="mdi mdi-menu-right-outline"></i></button>';
                    // return ' <button onclick="btonLider('.$sympathizers->id.')" data-toggle="modal" data-target="#modalInfoLider" class="btn btn-sm btn-xs btn-info"><i class="mdi mdi-check"></i> LIDER</button>';
                }
                return $opciones;
            })
            ->rawColumns(['status','options'])
            ->toJson();
        }
        //$registers = Register::with(['Agency','Type_service','Airline', 'isAssigned'])->get();
        return view('registers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agencies = Agency::all();
        $services = TypeService::all();
        $airlines = Airline::groupBy('airline')->get();

        $hotels = Hotel::all();
        return view('registers.create', compact(
                'agencies',
            'services',
            'airlines',
            'hotels'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegistersRequest $request)
    {
        $registro = Register::create($request->all());
        return response()->json(['data' => 'Servicio Registrado'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $register = Register::with(['Agency','Type_service', 'isAssigned'])
                    ->findOrFail($request->id);
        //$f_r = $register->created_at->isoFormat('MMMM Do YYYY, h:mm:ss a');
        $f_r = $register->created_at->isoFormat('MMMM Do YYYY, h:mm:ss a');

        return response()->json([
            'data' => $register,
            'reg' => $f_r
        ], 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function edit(Register $register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Register $register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function destroy(Register $register)
    {
        //
    }
}
