<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:create_roles')->only(['create','store']);
        $this->middleware('role_or_permission:read_roles')->only(['index','show']);
        $this->middleware('role_or_permission:update_roles')->only(['edit','update']);
        $this->middleware('role_or_permission:delete_roles')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $roles = Role::all();
            return DataTables::of($roles)
            ->addIndexColumn()
            ->editColumn('name', function($roles){
                return '<strong style="text-transform: uppercase;">'.$roles->name.'</strong>';
            })
           /* ->addColumn('usuarios', function($roles){
                return $roles = RoleUser::where('role_id',$roles->id)->count();
            })*/
            /*->addColumn('permisos', function($roles){
                return $permisos = RolePermission::where('role_id',$roles->id)->count();
            })*/
            ->addColumn('options', function ($roles){
                $opciones = '';
                // if (Auth::user()->can('read_roles')){
                //     $opciones .= '<button onclick="btnRolInfo('.$roles->id.')" type="button" class="btn btn-sm action-icon getInfo icon-dual-blue" data-toggle="modal" data-target="#modal_roles_permissions"><i class="mdi mdi-account-circle"></i></button>';
                // }
                if (Auth::user()->can('update_roles')){
                    //$opciones .= '<a href=" '.route('Sympathizers.edit', $tocados->tocado_id).' " class="action-icon icon-dual-warning"><i class="mdi mdi-account-cog"></i></a>';
                    $opciones .= '<a href="'. route('roles.edit', $roles->id).'" class="btn btn-sm action-icon  icon-dual-warning"><i class="mdi mdi-account-cog"></i></a>';
                }
                if (Auth::user()->can('delete_roles')){
                    //$opciones .= '<a href=" '.route('Sympathizers.edit', $tocados->tocado_id).' " class="action-icon icon-dual-warning"><i class="mdi mdi-account-cog"></i></a>';
                    $opciones .= '<button type="button"  onclick="btnDeleteRol('.$roles->id.')" class="btn btn-sm action-icon icon-dual-secondary"><i class="mdi mdi-trash-can"></i></button>';
                }
                return $opciones;
            })
            ->rawColumns(['name','options'])
            ->toJson();
        }
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
        $rol = Role::create($request->all());
        return response()->json(['data' => 'Rol creado correctamente'], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = Role::findOrFail($id);
        $permisos_cat = Permission::groupBy('category')
            ->orderBy('created_at')
            ->get();
        $permisos = Permission::all();
        return response()->json([
            'category' => $permisos_cat,
            'permisos' => $permisos
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::findOrFail($id);
        $permisos_cat = Permission::groupBy('category')
                    ->orderBy('created_at')
                    ->get();
        $permisos = Permission::all();
        return view('settings.roles.edit', compact('roles','permisos_cat','permisos'));
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
        $role = Role::findOrFail($id);
        $role->permissions()->sync($request->get('permission'));
        Artisan::call('optimize:clear');
        return redirect()->route('settings.index')->with('update','Role actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id)->delete();
        if ($role == true){
            $success = true;
            $message = "Rol eliminado";
        } else {
            $success = true;
            $message = "No se pudo eliminar el rol";
        }
        return response()->json([
            'success' => $success,
            'message' => $message
        ]);
    }
}
