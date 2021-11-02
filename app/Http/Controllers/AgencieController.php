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
class AgencieController extends Controller
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
            $agencies = Agency::with(['services'])->orderBy('business_name','asc');
            return DataTables::of($agencies)
            ->addIndexColumn()
            ->editColumn('contact', function($agencies){
                 return $contact = '<img src="'.$agencies->agency_logo.'" alt="table-user" class="mr-2 rounded-circle avatar-xs">
                <a href="javascript:void(0);" class="text-body font-weight-semibold">'.$agencies->contact.'</a>';
            })
            ->addColumn('services', function($agencies){
                return $contador = $agencies->services->count();
            })
            ->addColumn('created', function($agencies){
                return $created = $agencies->created_at->toFormattedDateString();
            })
            ->addColumn('options', function ($agencies){
                $opciones = '';
                if (Auth::user()->can('read_agencies')) {
                    $opciones .= '<a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>';
                }
                if (Auth::user()->can('edit_column')) {
                    $opciones .= '<button type="button" onclick="btnInfo('.$agencies->id.')" class="btn action-icon"> <i class="mdi mdi-delete"></i></button>';
                }
                return $opciones;
            })
            ->rawColumns(['contact','options'])
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
        Agency::create($request->all());
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
    public function show(Agencie $agencie)
    {
        //
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
    public function destroy(Agencie $agencie)
    {
        //
    }
}
