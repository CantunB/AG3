<?php

namespace App\Http\Controllers;

use App\Models\AssingRegister;
use App\Models\Operator;
use App\Models\Register;
use App\Models\Unit;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class AssignRegisterController extends Controller
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
            $seguimientos = AssingRegister::with(['Operator','register','unit']);
            return DataTables::of($seguimientos)
            ->addColumn('agency', function($seguimientos){
                return $seguimientos->register->Agency->business_name ;
            })
            ->addColumn('services', function($seguimientos){
                return $seguimientos->register->Type_service->name;
            })
            ->addColumn('operator', function($seguimientos){
                return $seguimientos->Operator->FullName;
            })
            ->editColumn('price', function($seguimientos){
                return '$'.$seguimientos->price;
            })
            ->toJson();
        }
        return view('assignments.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        AssingRegister::create($request->all());
        return redirect()->route('registers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $register = Register::findOrFail($id);
        $units = Unit::Active();
        $operators = Operator::all();

        return view('assignments.show', compact(['register','units', 'operators']));

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
