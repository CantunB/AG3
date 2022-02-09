<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
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
        //
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
        $user = User::create($request->all());
        if ($request->has('photo_user')) {
            $photo = $request->file('photo_user');
            $name =  $user->email.'.'.$photo->getClientOriginalExtension();
            $path = public_path('/assets/images/users/');
            $photo_user = $path . $name;
            Image::make($photo)->resize(150, 150)->save($photo_user);
        }
        $user->photo_user = '/assets/images/users/'.$name;
        $user->password = bcrypt($request->paterno . Carbon::now()->format('Y'));
        $user->save();
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
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        if($user->isDirty('photo_user')){
            if ($request->has('photo_user')) {
                $photo = $request->file('photo_user');
                $name =  $user->email.'.'.$photo->getClientOriginalExtension();
                $path = public_path('/assets/images/users/');
                $photo_user = $path . $name;
                Image::make($photo)->resize(150, 150)->save($photo_user);
            }
            $user->photo_user = '/assets/images/users/'.$name;
        }
        $user->save();
        return response()->json(['data' => 'Usuario actualizado correctamente'], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id);
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
}
