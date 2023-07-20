<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\Zone;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role_or_permission:create_hoteles')->only(['create','store']);
        // $this->middleware('role_or_permission:read_hoteles')->only(['index','show']);
        // $this->middleware('role_or_permission:update_hoteles')->only(['edit','update']);
        // $this->middleware('role_or_permission:delete_hoteles')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $hotel = Hotel::all();
            return DataTables::of($hotel)
            ->addIndexColumn()
            ->addColumn('zona', function ($hotel){
                return  'Z'.$hotel->id_zona;
            })
            ->addColumn('raitings', function($hotel){
                return '<i class="mdi mdi-star text-warning"></i> 0.0';
            })
            ->addColumn('options', function ($hotel){
                $opciones = '';
                if (Auth::user()->can('read_registers')){
                    $opciones .= '<button type="button" onclick="btnInfo('.$hotel->id.')"  data-toggle="modal" data-target="#myModal" class="btn btn-sm action-icon icon-dual-info"><i class="mdi mdi-alert-rhombus-outline"></i></button>';
                    // return ' <button onclick="btonLider('.$sympathizers->id.')" data-toggle="modal" data-target="#modalInfoLider" class="btn btn-sm btn-xs btn-info"><i class="mdi mdi-check"></i> LIDER</button>';
                }
                if (Auth::user()->can('update_registers')) {
                    if(!isset($hotel->isAssigned)){
                        $opciones .= '<a href=" '.route('hoteles.show', $hotel->id).' " type="button" class="btn action-icon icon-dual-warning"> <i class="mdi mdi-pencil-outline"></i></a>';
                        // $opciones .= '<a href="'. route('assign.show', $registers->id) .'"  class="btn btn-sm action-icon getInfo icon-dual-primary"><i class="mdi mdi-book-account-outline"></i></a>';
                    }
                }
                if (Auth::user()->can('delete_registers')) {
                    if(!isset($hotel->isAssigned)){
                        $opciones .= '<button type="button" onclick="btnDelete('.$hotel->id.')" class="btn action-icon icon-dual-danger "> <i class="mdi mdi-trash-can-outline"></i></button>';
                    }
                }
                return $opciones;
            })
            ->rawColumns(['options','raitings'])
            ->toJson();

        }
        return view('hoteles.index');
    }

    public function create()
    {
        $zonas = Zone::all();
        // $data['countries'] = Country::get(["name","id"]);
        $countries = Country::where('id','142')->get(['id','name']);

        return view('hoteles.create', compact('zonas','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $rol = Hotel::create($request->all());
        // return response()->json(['data' => 'Hotel creado correctamente'], 201);
        return redirect()->route('hoteles.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotel = Hotel::findOrFail($id);
        $zonas = Zone::all();
        $countries = Country::where('id','142')->get(['id','name']);
        // $data['countries'] = Country::get(["name","id"]);

        return view('hoteles.show', compact('hotel','zonas','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
