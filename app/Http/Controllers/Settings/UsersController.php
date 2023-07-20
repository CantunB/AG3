<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Yajra\DataTables\DataTables;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Image;
class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role_or_permission:create_users')->only(['create','store']);
        // $this->middleware('role_or_permission:read_users')->only(['index','show']);
        // $this->middleware('role_or_permission:update_users')->only(['edit','update']);
        // $this->middleware('role_or_permission:delete_users')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()){
            if(Auth::user()->hasrole('Super-Admin')){
                $users = User::withTrashed()->get();
            }else{
                $users = User::where('status', 1 )->get();
            }
            return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('name', function ($users){
                return '<img src="'.asset($users->photo_user).'" alt="table-user" class="mr-2 avatar-xs rounded-circle">
                <strong style="text-transform: uppercase;">'. $users->FullName .'</strong>';
            })
            ->addColumn('rol', function ($usuarios){
                $roles = $usuarios->getRoleNames();
                $rol = '<ul>';
                for( $i = 0; $i < count($roles); $i++){
                    $rol .= '<li>'.'<strong style="text-transform: uppercase;">'.$roles[$i].'</strong></li>';
                }
                $rol .= '</ul>';
                return $rol;
            })
            ->addColumn('options', function ($users){
                $opciones = '';
                if ($users->trashed()) {
                    $opciones .= '<button  onclick="btnRestore('.$users->id.')" class="btn btn-sm action-icon icon-dual-warning"><i class="mdi mdi-restore"></i></button>';
                }else{
                    if (Auth::user()->can('read_usuarios')){
                        $opciones .= '<a href="'.route('users.show', $users->id).'" class="btn btn-sm action-icon getInfo icon-dual-info"><i class="mdi mdi-account-settings"></i></a>';
                    }
                    if (Auth::user()->can('delete_usuarios')){
                        $opciones .= '<button type="button" onclick="btnDeleteUser('.$users->id.')" class="btn btn-sm action-icon icon-dual-secondary"><i class="mdi mdi-trash-can"></i></button>';
                    }
                }
                return $opciones;
            })
            ->rawColumns(['name','rol','options'])
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
    public function store(StoreUserRequest $request)
    {
        $avatar = 'user-profile.png';
        $user = new User($request->all());
        if ($request->has('photo_user')) {
            $photo = $request->file('photo_user');
            $avatar =  $user->email.'.'.$photo->getClientOriginalExtension();
            $path = public_path('/assets/images/users/');
            $photo_user = $path . $avatar;
            Image::make($photo)->resize(150, 150)->save($photo_user);
        }
        $user->photo_user = '/assets/images/users/'.$avatar;
        $user->password = bcrypt($request->password);
        $user->save();
        $user->syncRoles($request->rol);
        Artisan::call('optimize:clear');
        return response()->json(['data' => 'Usuario registrado correctamente'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('settings.users.show', compact('user','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $user = User::findOrFail($id);
        if (Auth::user()->can('update', $user)) {
            $user->syncRoles($request->rol);
            $user->update($request->all());
            if($user->isDirty('photo_user')){
                if ($request->has('photo_user')) {
                    $photo = $request->file('photo_user');
                    $name =  $user->email.'.'.$photo->getClientOriginalExtension();
                    $path = public_path('/assets/images/users/');
                    $photo_user = $path . $name;
                    Image::make($photo)->resize(150, 150)->save($photo_user);
                    $image = Image::make(Storage::get($photo_user))
                            ->widen(600)
                            ->limitColors(255)
                            ->encode();

                    Storage::put($photo_user, $image);
                }
                $user->photo_user = '/assets/images/users/'.$name;
            }
            $user->save();
            Artisan::call('optimize:clear');
            return response()->json(['data' => 'Usuario actualizado correctamente'], 201);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $delete = $user->delete();
        if ($delete == true){
            $success = true;
            $message = "Usuario eliminado";
        } else {
            $success = true;
            $message = "No se pudo eliminar el usuario";
        }
        return response()->json([
            'success' => $success,
            'message' => $message
        ]);
    }

     /**
     * Restore the specified resource from storage.
     *
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)
    {
        $user = User::withTrashed()->findOrFail($request->id);
        $restore = $user->restore();
        if ($restore == 1){
            $success = true;
            $message = "Usuario restaurado";
        } else {
            $success = true;
            $message = "No se pudo restaurar el usuario";
        }
        return response()->json([
            'success' => $success,
            'message' => $message
        ]);
    }
}
