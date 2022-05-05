<?php

namespace App\Http\Controllers\Units;

use App\Http\Controllers\Controller;
use App\Http\Requests\Units\StoreUnitsRequest;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use Haruncpi\LaravelIdGenerator\IdGenerator;


use function PHPUnit\Framework\isEmpty;

class UnitController extends Controller
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
    public function index(Request $request)
    {
        //$units = Unit::with('isAssigned')->Active();
        if ($request->ajax()){
            $unit = Unit::with(['bitacora', 'galery'])->Active();
            return DataTables::of($unit)
            ->addIndexColumn()
            ->addColumn('status', function($unit){
                $status = '';
                if ($unit->isAssigned) {
                    $status .= '<span class="badge badge-primary">Unidad Asignada </span>';
                }else{
                    $status .= '<span class="badge badge-success">Unidad Disponible</span>';
                }
                return $status;
            })
            ->addColumn('options', function ($unit){
                $opciones = '';
                if (Auth::user()->can('read_units')){
                    $opciones .= '<button type="button"  onclick="btnInfo('.$unit->id.')" class="btn btn-sm action-icon getInfo icon-dual-info"><i class="mdi mdi-car-info"></i></button>';
                    // return ' <button onclick="btonLider('.$sympathizers->id.')" data-toggle="modal" data-target="#modalInfoLider" class="btn btn-sm btn-xs btn-info"><i class="mdi mdi-check"></i> LIDER</button>';
                }
                if (Auth::user()->can('update_units')){
                    $opciones .= '<a href="'.route('bitacora.index', $unit->id).'" class="btn btn-soft btn-sm action-icon action-icon icon-dual-blue"><i class="mdi mdi-car-door-lock"></i></a>';
                }
                if (Auth::user()->can('delete_units')) {
                    $opciones .= '<button type="button" onclick="btnDelete('.$unit->id.')" class="btn btn-sm action-icon icon-dual-danger"><i class="mdi mdi-trash-can-outline"></i></button>';
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
    public function store(StoreUnitsRequest $request)
    {
        $contrato = null;
        $factura = null;
        $carta_factura = null;
        $permiso_sct = null;
        $placas_sct = null;
        $poliza_seguro =null;
        $tarjeta_circulacion = null;
        $tag = null;

        if ($request->type == 'suburban') {
            $slug_unit = IdGenerator::generate(['table' => 'units','field'=>'unit', 'length' => 5, 'prefix' =>'SUB']);
        }
        if($request->type == 'van'){
            $slug_unit = IdGenerator::generate(['table' => 'units','field'=>'unit', 'length' => 5, 'prefix' =>'VAN']);
        }
        // $units = Unit::where('type',$request->type)->latest('created_at')->first();
       // $units = Unit::where('type',$request->type)->get();
        // return $units;
        // $slug = Str::upper(Str::substr($request->type, 0, 3));
        // if (isEmpty($units) || $units > 1) {
        //     $slug_unit = $slug . 1 ;
        // }else{
        //     $c = count($units);
        //     $slug_unit = $slug . strval($c) + 1;
        // }
        // return $slug_unit;
        //return $slug_unit;
        $directory = '/documents/units/'. $slug_unit .'/';

        /** Condicional para contratos */
        if ($request->has('file_contract')) {
            $contract = $request->file('file_contract');
            $cont_name = $slug_unit . '_contrato' . '.' . $contract->getClientOriginalExtension();
            $cont_Path = public_path($directory);
            $contract->move($cont_Path, $cont_name);

            $contrato = $directory . $cont_name;
        }

        /** Condicional para factura */
        if ($request->has('file_invoice_unit')) {
            $request_invoice = $request->file('file_invoice_unit');
            $req_inv = $slug_unit. '_ factura' . '.'. $request_invoice->getClientOriginalExtension();
            $req_invPath = public_path($directory);
            $request_invoice->move($req_invPath, $req_inv);

            $factura = $directory . $req_inv;
        }

        /** Condicional para carta factura */
        if ($request->has('file_invoice_letter')) {
            $request_letter = $request->file('file_invoice_letter');
            $carta_fac = $slug_unit. '_ carta_factura' . '.'. $request_letter->getClientOriginalExtension();
            $letterPath = public_path($directory);
            $request_letter->move($letterPath, $carta_fac);

            $carta_factura = $directory . $carta_fac;
        }

        /** Condicional para permiso sct */
        if ($request->has('file_permission_sct')) {
            $request_permission = $request->file('file_permission_sct');
            $req_per =  $slug_unit . '_permiso' . '.' .$request_permission->getClientOriginalExtension();
            $req_perPath = public_path($directory);
            $request_permission->move($req_perPath, $req_per);

            $permiso_sct = $directory . $req_per;
        }

        /** Condicional para placas sct */
        if ($request->has('file_sct_plate_number')) {
            $req_plate = $request->file('file_sct_plate_number');
            $req_pla = $slug_unit . '_placas' . '.' . $req_plate->getClientOriginalExtension();
            $req_plaPath = public_path($directory);
            $req_plate->move($req_plaPath, $req_pla);

            $placas_sct = $directory . $req_pla;
        }

        /** Condicional para poliza de seguro */
        if ($request->has('file_insurance_policy')) {
            $insurance = $request->file('file_insurance_policy');
            $insurance_name = $slug_unit . '_poliza_seguro' . '.' . $insurance->getClientOriginalExtension();
            $insurance_path = public_path($directory);
            $insurance->move($insurance_path, $insurance_name);

            $poliza_seguro = $directory . $insurance_name;
        }

        /** Condicional para tarjeta de circulacion */
        if ($request->has('file_circulation_card')) {
            $circulation = $request->file('file_circulation_card');
            $circulation_name = $slug_unit . '_tarjeta_circulacion' . '.' . $circulation->getClientOriginalExtension();
            $circulation_path = public_path($directory);
            $circulation->move($circulation_path, $circulation_name);

            $tarjeta_circulacion = $directory . $circulation_name;
        }

        /** Condicional para tarjeta de circulacion */
        if ($request->has('file_tag')) {
            $file_tag = $request->file('file_tag');
            $tag_req = $slug_unit . '_tag' . '.' . $file_tag->getClientOriginalExtension();
            $tia_path = public_path($directory);
            $file_tag->move($tia_path, $tag_req);

            $tag = $directory . $tag_req;
        }

        Unit::create([
            'unit' => $slug_unit,
            'type' => $request->type,
            'brand' => $request->brand,
            'model' => $request->model,
            'frame' => $request->frame,
            'engines' => $request->engines,
            'total_price' => $request->total_price,
            'sct_permission' => $request->sct_permission,
            'sct_plate_number' => $request->sct_plate_number,
            'sct_validity' => $request->sct_validity,
            'insurance_carrier' => $request->insurance_carrier,
            'insurance_policy' => $request->insurance_policy,
            'insurance_start_validity' => $request->insurance_start_validity,
            'insurnace_end_validity' => $request->insurance_end_validity,
            'circulation_card_number' => $request->circulation_card_number,
            'tia_number' => $request->tia_number,
            //Aqui se llaman los archivos
            'file_contract' => $contrato,
            'file_invoice_unit' => $factura,
            'file_invoice_letter' => $carta_factura,
            'file_permission_sct' => $permiso_sct,
            'file_sct_plate_number' => $placas_sct,
            'file_insurance_policy' => $poliza_seguro,
            'file_circulation_card' => $tarjeta_circulacion,
            'file_tag' => $tag
        ]);

        return response()->json(['data' => 'Unidad Almacenada'],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $unit = Unit::with(['galery', 'bitacora'])->findOrFail($request->id);
        $files = [
            'Contrato' => $unit->file_contract == null ? " " : $unit->file_contract,
            'Factura' => $unit->file_invoice_unit == null ? "" : $unit->file_invoice_unit,
            'Carta Factura' => $unit->file_invoice_letter == null ? "" : $unit->file_invoice_letter,
            'Permisos SCT' => $unit->file_permission_sct == null ? " " : $unit->file_permission_sct,
            'Placas SCT' => $unit->file_sct_plate_number == null ? "" : $unit->file_sct_plate_number,
            'Poliza seguro' => $unit->file_insurance_policy == null ? "" : $unit->file_insurance_policy,
            'Tarjeta circulacion' => $unit->file_circulation_card == null ? "" : $unit->file_circulation_card,
            // 'TIA' => $unit->file_tia == null ? "" : $unit->file_tia,
            ];
           // $longitud = length($unit->galery);
           // return $longitud;
        // if ((count($files) > 0) ) {
        //     foreach ($files as $key => $file) {
        //         $archivos[] = '<div class="p-1">
        //         <div class="row align-items-center">
        //             <div class="col-auto">
        //                 <div class="avatar-sm">
        //                     <span class="avatar-title badge-soft-primary text-primary rounded">
        //                     '.pathinfo(storage_path($file), PATHINFO_EXTENSION).'
        //                     </span>
        //                 </div>
        //             </div>
        //             <div class="col pl-0">
        //                 <a href="'.$file .'" class="text-muted font-weight-bold">'.$key.' </a>
        //                 <p class="mb-0 font-12">'.round(File::size(public_path($file)) / 1024 ) . 'KB' .'</p>
        //             </div>
        //             <div class="col-auto">
        //                 <!-- Button -->
        //                 <a href="'.$file.'" class="btn btn-link font-16 text-muted" download>
        //                     <i class="dripicons-download"></i>
        //                 </a>
        //             </div>
        //         </div>
        //     </div>';
        //     }
        // }else{
        // }
            $archivos = "Sin archivos";
            if(is_null($unit->galery)){
                $galery = '<img class="d-flex mr-3 rounded-circle avatar-lg" src="" alt="Generic placeholder image">';
            }else{
                foreach ($unit->galery as $key => $image) {
                    $galery[] = '<img class="d-flex mr-3 rounded-circle avatar-lg" src="'. asset($image->images).'" alt="Generic placeholder image">';
                }
            }


        return response()->json([
            'data' => $unit,
            'files' => $archivos,
            'galery' => $galery
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
    public function destroy(Request $request)
    {
        $unit = Unit::findOrFail($request->id);
        $directory = '/documents/units/'. $unit->unit;
       // if(File::exists(public_path($directory))){
            File::deleteDirectory(public_path($directory));
        //}
        $delete = $unit->delete();
        if ($delete == 1){
            $success = true;
            $message = "Unidad eliminada correctamente";
        } else {
            $success = true;
            $message = "No se elimino la unidad";
        }

        return response()->json([
            'success' => $success,
            'message' => $message
        ]);
    }
}
