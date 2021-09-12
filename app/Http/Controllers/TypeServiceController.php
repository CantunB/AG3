<?php

namespace App\Http\Controllers;

use App\Models\TypeService;
use Illuminate\Http\Request;

class TypeServiceController extends Controller
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
    public function index()
    {
        $typeService = new TypeService;
        return view('services.index');
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
    public function store(Request $request)
    {
        TypeService::create($request->all());
        return redirect()->route('services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeService  $typeService
     * @return \Illuminate\Http\Response
     */
    public function show(TypeService $typeService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeService  $typeService
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeService $typeService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeService  $typeService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeService $typeService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeService  $typeService
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeService $typeService)
    {
        //
    }
}
