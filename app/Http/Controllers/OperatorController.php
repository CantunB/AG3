<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

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
        //$operators = Operator::paginate(15);
        if ($request->ajax()){
            $operators = Operator::all();
            return DataTables::of($operators)
            ->addIndexColumn()
            ->addColumn('name', function ($operators){
                return ' <img src="'.$operators->operator_photo.'" alt="table-user" class="mr-2 rounded-circle avatar-xs">
                <a href="javascript:void(0);" class="text-body font-weight-normal">'. $operators->name .' '. $operators->paterno .' '. $operators->materno.'</a>';
            })
           /* ->addColumn('rol', function ($usuarios){
                $roles = $usuarios->getRoleNames();
                $rol = '<ul>';
                for( $i = 0; $i < count($roles); $i++){
                    $rol .= '<li>'.'<strong style="text-transform: uppercase;">'.$roles[$i].'</strong></li>';
                }
                $rol .= '</ul>';
                return $rol;
            })*/
            ->addColumn('options', function ($operators){
                $opciones = '';
                if (Auth::user()->can('read_usuarios')){
                    $opciones .= '<button type="button" class="btn btn-sm action-icon getInfo icon-dual-blue"><i class="mdi mdi-account-circle"></i></button>';
                }
                if (Auth::user()->can('update_usuarios')){
                    $opciones .= '<button type="button" class="btn btn-sm action-icon btnModalEdit icon-dual-warning"><i class="mdi mdi-account-cog"></i></button>';
                }
                return $opciones;
            })
            ->rawColumns(['name','options'])
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
    public function store(Request $request)
    {
        //Operator::create($request->all());
        if ($request->has('driver_license')) {
            $driver = $request->file('driver_license');
            $driverLicense = time() . '.' . $driver->getClientOriginalExtension();
            $driverPath = public_path('/images/driver_licenses/');
            $driver->move($driverPath, $driverLicense);
        }
        if ($request->has('operator_photo')) {
            $operator = $request->file('operator_photo');
            $operatorPhoto = time() . '.' . $operator->getClientOriginalExtension();
            $operatorPath = public_path('/images/operators/');
            $operator->move($operatorPath, $operatorPhoto);
        }

        Operator::create([
            'name' => $request['name'],
            'paterno' => $request['paterno'],
            'materno' => $request['materno'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'birthday_date' => $request['birthday_date'],
            'address' => $request['address'],
            'cp' => $request['cp'],
            'driver_license' => "/images/driver_licenses" . $driverLicense,
            'operator_photo' => "/images/operators" . $operatorPhoto,
        ]);
        return redirect()->route('operators.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function show(Operator $operator)
    {
        //
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
    public function destroy(Operator $operator)
    {
        //
    }
}
