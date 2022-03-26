<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\App;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class SettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
       // $this->middleware('role_or_permission:create_administrador')->only(['create','store']);
       // $this->middleware('role_or_permission:read_administrador')->only(['index','show']);
       // $this->middleware('role_or_permission:update_administrador')->only(['edit','update']);
       // $this->middleware('role_or_permission:delete_administrador')->only(['destroy']);
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

    public function lang($locale)
    {
        if ($locale) {
            App::setLocale($locale);
            Session::put('lang', $locale);
            Session::save();
            return redirect()->back()->with('locale', $locale);
        } else {
            return redirect()->back();
        }
    }

}
