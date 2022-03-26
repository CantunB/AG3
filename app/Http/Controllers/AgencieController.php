<?php

namespace App\Http\Controllers;

use AgencieSeeder;
use App\Http\Requests\Agencies\StoreAgenciesRequest;
use App\Models\Agency;
use App\Models\Register;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AgencieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:create_agencies')->only(['create','store']);
        $this->middleware('role_or_permission:read_agencies')->only(['index','show']);
        $this->middleware('role_or_permission:update_agencies')->only(['edit','update']);
        $this->middleware('role_or_permission:delete_agencies')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $agencies = Agency::with(['services'])->orderBy('business_name','asc');
            return DataTables::of($agencies)
            ->addIndexColumn()
            ->editColumn('contact', function($agencies){
                 return $agencies->contact ?? 'Sin contacto';
            })
            ->addColumn('services', function($agencies){
                return $contador = '<span class="badge badge-blue">'.$agencies->services->count().'</span>';
            })
            ->addColumn('created', function($agencies){
                return $created = $agencies->created_at->toFormattedDateString();
            })
            ->addColumn('options', function ($agencies){
                $opciones = '';
                if (Auth::user()->can('read_agencies')) {
                    $opciones .= '<button type="button" onclick="btnInfo('.$agencies->id.')" class="btn action-icon icon-dual-primary"> <i class="mdi mdi-chevron-right"></i></button>';
                }
                if (Auth::user()->can('delete_agencies')) {
                    // $opciones .= '<button type="button" onclick="btnDelete('.$agencies->id.')" class="btn action-icon icon-dual-danger"> <i class="mdi mdi-delete"></i></button>';
                }
                return $opciones;
            })
            ->rawColumns(['contact','services','options'])
            ->toJson();
        }
        return view('agencies.index');
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
    public function store(StoreAgenciesRequest $request)
    {
        //return $request->all();
        $agency = Agency::create($request->all());
        if ($request->has('fiscal_situation')) {
            $sf = $request->file('fiscal_situation');
            $file = 'SituacionFiscal'. '.' . $sf->getClientOriginalExtension();
            $path = public_path('/documents/agencies/'. $request->rfc .'/');
            $sf->move($path, $file);
            $agency->fiscal_situation = '/documents/agencies/'. $request->rfc .'/' . $file;
            $agency->save();
        }
        if ($request->has('current_rate')) {
            $cr = $request->file('current_rate');
            $file = 'TarifaVigente'. '.' . $cr->getClientOriginalExtension();
            $path = public_path('/documents/agencies/'. $request->rfc .'/');
            $cr->move($path, $file);
            $agency->current_rate = '/documents/agencies/'. $request->rfc .'/' . $file;
            $agency->save();
        }
        if ($request->has('proof_address')) {
            $pf = $request->file('proof_address');
            $file = 'ComprobanteDomicilio'. '.' . $pf->getClientOriginalExtension();
            $path = public_path('/documents/agencies/'. $request->rfc .'/');
            $pf->move($path, $file);
            $agency->proof_address = '/documents/agencies/'. $request->rfc .'/' . $file;
            $agency->save();
        }
        if ($request->has('covenants')) {
            $cv = $request->file('covenants');
            $file = 'Convenios'. '.' . $cv->getClientOriginalExtension();
            $path = public_path('/documents/agencies/'. $request->rfc .'/');
            $cv->move($path, $file);
            $agency->covenants = '/documents/agencies/'. $request->rfc .'/' . $file;
            $agency->save();
        }

        return response()->json(['data' => 'Agencia registrada correctamente'], 201);
        //return redirect()->route('agencies.index');

        //Role::create($request->all());
        //return redirect()->route('admin.index')->with('status_success', 'ROLE CREADO CORRECTAMENTE');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agencie  $agencie
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $agencie = Agency::findOrFail($request->id);
        return response()->json([
            'data' => $agencie,
        ], 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agencie  $agencie
     * @return \Illuminate\Http\Response
     */
    public function edit(Agencie $agencie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agencie  $agencie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agencie $agencie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agencie  $agencie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $agency = Agency::findOrFail($request->id);
        $directory = '/documents/agencies/'. $agency->rfc;
        File::deleteDirectory(public_path($directory));

        $delete = $agency->delete();
        if ($delete == 1){
            $success = true;
            $message = "Agencia eliminada correctamente";
        } else {
            $success = true;
            $message = "No se elimino la agencia";
        }
        return response()->json([
            'success' => $success,
            'message' => $message
        ]);
    }
}
