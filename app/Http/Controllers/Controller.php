<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
       // $this->middleware('role_or_permission:create_administrador')->only(['create','store']);
       // $this->middleware('role_or_permission:read_administrador')->only(['index','show']);
       // $this->middleware('role_or_permission:update_administrador')->only(['edit','update']);
       // $this->middleware('role_or_permission:delete_administrador')->only(['destroy']);
    }

    public function users(Request $request){
        if ($request->ajax()){
            $users = User::all();
            return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('name', function ($users){
                return '<strong style="text-transform: uppercase;">'. $users->name .' '. $users->paterno .' '. $users->materno.'</strong>';
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
            ->addColumn('options', function ($users){
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

        return view('settings.index');
    }

    public function roles(Request $request){
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
                if (Auth::user()->can('read_roles')){
                    $opciones .= '<button type="button" class="btn btn-sm action-icon getInfo icon-dual-blue"><i class="mdi mdi-account-circle"></i></button>';
                }
                if (Auth::user()->can('update_roles')){
                    //$opciones .= '<a href=" '.route('Sympathizers.edit', $tocados->tocado_id).' " class="action-icon icon-dual-warning"><i class="mdi mdi-account-cog"></i></a>';
                    $opciones .= '<a href="" class="btn btn-sm action-icon btnModalEdit icon-dual-warning"><i class="mdi mdi-account-cog"></i></a>';
                }
                return $opciones;
            })
            ->rawColumns(['name','options'])
            ->toJson();
        }
    }

    public function permissions(Request $request){
        if ($request->ajax()) {
            $permissions = Permission::all();
            return DataTables::of($permissions)
                ->addIndexColumn()
                ->editColumn('name', function ($permissions){
                    return $permissions->name;
                })
            /*    ->addColumn('rol', function ($user){
                    return '<span class="badge badge-blue"> '.$user->getRoleNames()->first().' </span>';
                })
                ->addColumn('options', function ($user) {
                    $actions = '';
                    $auth = Auth::user();
                    if ($auth->can('read_permisos')) {
                        return $actions .= '<a href=""
                           class="waves-effect waves-light action-icon icon-dual-warning">
                            <i class="mdi mdi-alert-rhombus-outline"></i></a>';
                    }
                    return $actions;
                })  */
                ->rawColumns(['name'])
                ->make(true);
        }
    }
}
