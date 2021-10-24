<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use File;

use Illuminate\Support\Str;

class UnitController extends Controller
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
        //$units = Unit::with('isAssigned')->Active();
        if ($request->ajax()){
            $operators = Unit::with('isAssigned')->Active();
            return DataTables::of($operators)
            ->addIndexColumn()
            ->addColumn('status', function($operator){
                $status = '';
                if ($operator->isAssigned) {
                    $status .= '<span class="badge badge-primary">Unidad Asignada</span>';
                }else{
                    $status .= '<span class="badge badge-success">Unidad Disponible</span>';
                }
                return $status;
            })
            ->addColumn('options', function ($operators){
                $opciones = '';
                if (Auth::user()->can('read_units')){
                    $opciones .= '<button type="button"  onclick="btnInfo('.$operators->id.')" class="btn btn-sm action-icon getInfo icon-dual-info"><i class="mdi mdi-car-info"></i></button>';
                    // return ' <button onclick="btonLider('.$sympathizers->id.')" data-toggle="modal" data-target="#modalInfoLider" class="btn btn-sm btn-xs btn-info"><i class="mdi mdi-check"></i> LIDER</button>';
                }
                if (Auth::user()->can('update_units')){
                    $opciones .= '<button type="button" class="btn btn-soft btn-sm action-icon action-icon icon-dual-blue"><i class="mdi mdi-car-door-lock"></i></button>';
                }
                return $opciones;
            })
            ->rawColumns(['status','options'])
            ->toJson();
        }

        return view('units.index');
        //return view('units.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('units.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $units = Unit::all();
        $last = $units->last();
        if($last === null) {
            $units = new Unit();
            $count = $units->id = 1;
        }else {
            $count = $last->id + 1;
        }
          //  return $count;
        $unit = Str::upper(Str::substr($request->type, 0, 3));
        $slug_unit = $unit . $count ;

        $directory = '/documents/units/'. $request->email .'/';


        if ($request->has('file_invoice_unit')) {
            $request_invoice = $request->file('file_invoice_unit');
            $req_inv = $slug_unit. '_ factura' . '.'. $request_invoice->getClientOriginalExtension();
            $req_invPath = public_path($directory);
            $request_invoice->move($req_invPath, $req_inv);
        }
        if ($request->has('file_permission_sct')) {
            $request_permission = $request->file('file_permission_sct');
            $req_per =  $slug_unit . '_permiso' . '.' .$request_permission->getClientOriginalExtension();
            $req_perPath = public_path($directory);
            $request_permission->move($req_perPath, $req_per);
        }
        if ($request->has('file_plate_sct')) {
            $req_plate = $request->file('file_plate_sct');
            $req_pla = $slug_unit . '_placas' . '.' . $req_plate->getClientOriginalExtension();
            $req_plaPath = public_path($directory);
            $req_plate->move($req_plaPath, $req_pla);
        }
        if ($request->has('file_contract')) {
            $contract = $request->file('file_contract');
            $cont_name = $slug_unit . '_contrato' . '.' . $contract->getClientOriginalExtension();
            $cont_Path = public_path($directory);
            $contract->move($cont_Path, $cont_name);
        }
        if ($request->has('file_car_insurance')) {
            $insurance = $request->file('file_car_insurance');
            $insurance_name = $slug_unit . '_seguro' . '.' . $insurance->getClientOriginalExtension();
            $insurance_path = public_path($directory);
            $insurance->move($insurance_path, $insurance_name);
        }
        if ($request->has('file_circulation_card')) {
            $circulation = $request->file('file_circulation_card');
            $circulation_name = $slug_unit . '_circulacion' . '.' . $circulation->getClientOriginalExtension();
            $circulation_path = public_path($directory);
            $circulation->move($circulation_path, $circulation_name);
        }

        Unit::create([
            'unit' => $slug_unit,
            'type' => $request->type,
            'plate_number' => $request->plate_number,
            'file_invoice_unit' => $directory . $req_inv,
            'file_permission_sct' => $directory . $req_per,
            'file_contract' => $directory . $cont_name,
            'circulation_card' => $request->circulation_card,
            'car_insurance' => $request->car_insurance,
            'file_plate_number' => $directory . $req_pla,
            'file_circulation_card' => $directory . $circulation_name,
            'file_car_insurance' =>  $directory . $insurance_name,
        ]);

        return redirect()->route('units.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        $files = [
            'Seguro' => $unit->file_car_insurance,
            'TarjetaCirculacion' => $unit->file_circulation_card,
            'Contrato' => $unit->file_contract,
            'Factura' => $unit->file_invoice_unit,
            'PermisoSCT' => $unit->file_permission_sct,
            'PlacasSCT' => $unit->file_plate_number,
            ];
        foreach ($files as $key => $file) {
            $archivos[] = '<div class="p-1">
            <div class="row align-items-center">
                <div class="col-auto">
                    <div class="avatar-sm">
                        <span class="avatar-title badge-soft-primary text-primary rounded">
                        '. pathinfo(storage_path($file), PATHINFO_EXTENSION).'
                        </span>
                    </div>
                </div>
                <div class="col pl-0">
                    <a href="'.$file.'" class="text-muted font-weight-bold">'.$key.' </a>
                    <p class="mb-0 font-12">'.   round(File::size(public_path($file)) / 1024 ) . 'KB'.'</p>
                </div>
                <div class="col-auto">
                    <!-- Button -->
                    <a href="'.$file.'" class="btn btn-link font-16 text-muted" download>
                        <i class="dripicons-download"></i>
                    </a>
                </div>
            </div>
        </div>';
        }

        return response()->json([
            'data' => $unit,
            'files' => $archivos,

        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        //
    }
}
