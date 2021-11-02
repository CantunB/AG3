<?php

namespace App\Http\Controllers;

use App\Http\Requests\Operators\StoreOperatorsRequest;
use App\Models\Operator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use File;
use Yajra\DataTables\DataTables;
// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

class OperatorController extends Controller
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
            $operators = Operator::with('isAssigned')->withTrashed();
//          $registers = Register::with(['Agency','Type_service','Airline', 'isAssigned'])->get();
            return DataTables::of($operators)
            ->addIndexColumn()
            ->addColumn('name', function ($operators){
                return ' <img src="'.$operators->operator_photo.'" alt="table-user" class="mr-2 rounded-circle avatar-xs">'.
                $operators->name .' '. $operators->paterno .' '. $operators->materno;
            })
            ->addColumn('status', function($operator){
                $status = '';
                if ($operator->isAssigned) {
                    $status .= '<span class="badge badge-primary">Asignado</span>';
                }elseif ($operator->deleted_at != null) {
                    $status .= '<span class="badge badge-danger">Inactivo</span>';
                }
                else{
                    $status .= '<span class="badge badge-success">Disponible</span>';
                }
                return $status;
            })
            ->addColumn('options', function ($operators){
                $opciones = '';
                if (Auth::user()->can('read_operators')){
                    $opciones .= '<button type="button"  onclick="btnInfo('.$operators->id.')" class="btn btn-sm action-icon getInfo icon-dual-blue"><i class="mdi mdi-account-circle"></i></button>';
                    // return ' <button onclick="btonLider('.$sympathizers->id.')" data-toggle="modal" data-target="#modalInfoLider" class="btn btn-sm btn-xs btn-info"><i class="mdi mdi-check"></i> LIDER</button>';
                }
                if (Auth::user()->can('update_operators')){
                    $opciones .= '<button type="button" class="btn btn-sm action-icon btnModalEdit icon-dual-warning"><i class="mdi mdi-account-cog"></i></button>';
                }
                if (Auth::user()->can('delete_operators')){
                    $opciones .= '<button type="button" onclick="btnDelete('.$operators->id.')" class="btn btn-sm action-icon icon-dual-danger"><i class="mdi mdi-delete-empty"></i></button>';

                }
                return $opciones;
            })
            ->rawColumns(['name','status','options'])
            ->toJson();
        }

        return view('operators.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('operators.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOperatorsRequest $request)
    {
        //Operator::create($request->all());
        $directory = '/documents/operators/'. $request->email .'/';
        if ($request->has('birth_certificate')) {
            $bc = $request->file('birth_certificate');
            $birthC = 'ActaNacimiento'. '.' . $bc->getClientOriginalExtension();
//            $birthC = time()  . '.' . $bc->getClientOriginalExtension();
            $birthCPath = public_path($directory);
            $bc->move($birthCPath, $birthC);
        }
        if ($request->has('proof_address')) {
            $proof = $request->file('proof_address');
            $proof_address = 'ComprobanteDomicilio' . '.' . $proof->getClientOriginalExtension();
            $proofPath = public_path($directory);
            $proof->move($proofPath, $proof_address);
        }
        if ($request->has('nss')) {
            $nss = $request->file('nss');
            $nss_file = 'NSS' . '.' . $nss->getClientOriginalExtension();
            $nssPath = public_path($directory);
            $nss->move($nssPath, $nss_file);
        }
        if ($request->has('curp')) {
            $curp = $request->file('curp');
            $curpFile = 'CURP' . '.' . $curp->getClientOriginalExtension();
            $curpPath = public_path($directory);
            $curp->move($curpPath, $curpFile);
        }
        if ($request->has('rfc')) {
            $rfc = $request->file('rfc');
            $rfcFile = 'RFC'. '.' . $rfc->getClientOriginalExtension();
            $rfcPath = public_path($directory);
            $rfc->move($rfcPath, $rfcFile);
        }
        if ($request->has('ine')) {
            $ine = $request->file('ine');
            $ineFile = 'INE' . '.' . $ine->getClientOriginalExtension();
            $inePath = public_path($directory);
            $ine->move($inePath, $ineFile);
        }
        if ($request->has('driver_license')) {
            $driver = $request->file('driver_license');
            $driverLicense = 'LicenciaConductor' . '.' . $driver->getClientOriginalExtension();
            $driverPath = public_path($directory);
            $driver->move($driverPath, $driverLicense);
        }
        if ($request->has('operator_photo')) {
            $operator = $request->file('operator_photo');
            $operatorPhoto = $request['name'] . $request['paterno']. '.' . $operator->getClientOriginalExtension();
            $operatorPath = public_path($directory);
            // resizing an uploaded file
          //  Image::make($operator)->resize(300, 200)->save('/documents/'.$request->email.'/'. $operatorPhoto);
            $operator->move($operatorPath, $operatorPhoto);
        }

        Operator::create([
            'name' => $request['name'],
            'paterno' => $request['paterno'],
            'materno' => $request['materno'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'password' => Hash::make('contraseña1234'),
            'birthday_date' => $request['birthday_date'],
            'address' => $request['address'],
            'cp' => $request['cp'],
            'birth_certificate' =>  $directory . $birthC,
            'proof_address' => $directory . $proof_address,
            'nss' =>  $directory . $nss_file,
            'curp' => $directory . $curpFile,
            'rfc' => $directory . $rfcFile,
            'ine' => $directory . $ineFile,
            'driver_license' => $directory . $driverLicense ,
            'operator_photo' => $directory . $operatorPhoto,
        ]);

        //return redirect()->route('operators.index');
        return response()->json(['data' => 'Operador registrado correctamente'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function show(Operator $operator)
    {
        $fullname = $operator->name .' '. $operator->paterno .' '. $operator->materno;
        if ($operator->isAssigned) {
            $status = '<a href="javascript: void(0);" class="btn- btn-xs btn-primary"> ASIGNADO </a>';
        }else{
            $status = '<a href="javascript: void(0);" class="btn- btn-xs btn-success"> DISPONIBLE </a>';
        }

        $files = [
            'ActaNacimiento' => $operator->birth_certificate,
            'Comprobante' => $operator->proof_address,
            'NSS' => $operator->nss,
            'CURP' => $operator->curp,
            'RFC' => $operator->rfc,
            'INE' => $operator->ine,
            'Licencia' => $operator->driver_license,
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
            'data' => $operator,
            'fullname' => $fullname,
            'status' => $status,
            'files' => $archivos,
        ], 200);
      //  return 'estoy en mi controlador listo para traer la informacion del lider';
       // $lider = Leader::with(['getInfo','getUser'])->findOrFail($request->id);
    //    $lider = Leader::with(['getInfo','getUser'])->where('leader_id',$request->id)->first();
    //    $nombre = $lider->getInfo->nombre .' '.  $lider->getInfo->paterno .' '.  $lider->getInfo->materno;
    //    $movilizadores = Leader::getMovilizadores($request->id)->count();
    //    $btndelete = '<button onclick="deleteConfirmationLider('.$lider->id.')"
    //    data-id=" '.$lider->id.' "
    //    type="button"
    //    class="btn btn-outline-danger">Eliminar</button>';
    //    return response()->json([
    //        'lider_nombre' => $nombre,
    //        'lider_user' => $lider->getUser->nombre,
    //        'lider_create' => $lider->getInfo->created_at->format('Y-m-d H:i'),
    //        'lider_movilizadores' => $movilizadores,
    //        'lider_btndelete' => $btndelete
    //    ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function edit(Operator $operator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operator $operator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $operator = Operator::findOrFail($request->id);
        $delete = $operator->delete();
        if ($delete == 1){
            $success = true;
            $message = "Operador eliminado correctamente";
        } else {
            $success = true;
            $message = "No se elimino el operador";
        }
        return response()->json([
            'success' => $success,
            'message' => $message
        ]);
    }
}
