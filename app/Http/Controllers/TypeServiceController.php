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
     //$se = TypeService::where('id','type_service_id')->get();
        // $services = TypeService::query()
        //     ->with('quantity')
        //     ->paginate(3);
    $services = TypeService::query()
                ->with(['quantity'])
                ->Active();

        return view('type_services.index', compact('services'));
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
        return redirect()->route('typp_services.index');
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
    public function destroy(Request $request)
    {
        $typeService = TypeService::findOrFail($request->id);
        $delete = $typeService->delete();
        //return response()->json(['data' => $typeService], 200);

       // $delete = Tocados::findOrFail($id)->delete();
        //return $delete;
        //return back();
        if ($delete == true){
            $success = true;
            $message = "Servicio eliminado correctamente";
        } else {
            $success = true;
            $message = "No se elimino el servicio";
        }

        return response()->json([
            'success' => $success,
            'message' => $message
        ]);

    }
}
