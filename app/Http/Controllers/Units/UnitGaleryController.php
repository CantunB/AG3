<?php

namespace App\Http\Controllers\Units;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Units\StoreUnitsGaleryRequest;
use App\Models\Unit;
use App\Models\UnitGalery;

class UnitGaleryController extends Controller
{
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
    public function store(StoreUnitsGaleryRequest $request, $id)
    {
        $unit = Unit::findOrFail($id);
        $directory = '/images/units/'. $unit->unit .'/';

        if ($request->has('photo_front_unit')) {
            $photo_front = $request->file('photo_front_unit');
            $name_front = $unit->unit. '_frontal' . '.'. $photo_front->getClientOriginalExtension();
            $path_front = public_path($directory);
            $photo_front->move($path_front, $name_front);
        }
        if ($request->has('photo_rear_unit')) {
            $photo_rear = $request->file('photo_rear_unit');
            $name_rear =  $unit->unit. '_trasera' . '.' .$photo_rear->getClientOriginalExtension();
            $path_rear = public_path($directory);
            $photo_rear->move($path_rear, $name_rear);
        }
        if ($request->has('photo_right_unit')) {
            $photo_right = $request->file('photo_right_unit');
            $name_right = $unit->unit. '_lateral_derecho' . '.' . $photo_right->getClientOriginalExtension();
            $path_right = public_path($directory);
            $photo_right->move($path_right, $name_right);
        }
        if ($request->has('photo_left_unit')) {
            $photo_left = $request->file('photo_left_unit');
            $name_left = $unit->unit . '_lateral_izquierdo' . '.' . $photo_left->getClientOriginalExtension();
            $path_left = public_path($directory);
            $photo_left->move($path_left, $name_left);
        }
        if ($request->has('photo_inside_unit_1')) {
            $photo_inside_one = $request->file('photo_inside_unit_1');
            $name_inside_one = $unit->unit . '_interior_1' . '.' . $photo_inside_one->getClientOriginalExtension();
            $path_inside_one = public_path($directory);
            $photo_inside_one->move($path_inside_one, $name_inside_one);
        }
        if ($request->has('photo_inside_unit_2')) {
            $photo_inside_two = $request->file('photo_inside_unit_2');
            $name_inside_two= $unit->unit . '_interior_2' . '.' . $photo_inside_two->getClientOriginalExtension();
            $path_inside_two = public_path($directory);
            $photo_inside_two->move($path_inside_two, $name_inside_two);
        }
        if ($request->has('photo_inside_unit_3')) {
            $photo_inside = $request->file('photo_inside_unit_3');
            $name_inside = $unit->unit . '_interior_3' . '.' . $photo_inside->getClientOriginalExtension();
            $path_inside = public_path($directory);
            $photo_inside->move($path_inside, $name_inside);
        }


        UnitGalery::create([
            'unit_id' => $id,
            'photo_front_unit' => $directory . $name_front,
            'photo_rear_unit' =>  $directory . $name_rear,
            'photo_right_unit' => $directory . $name_right ,
            'photo_left_unit' => $directory . $name_left,
            'photo_inside_unit_1' => $directory . $name_inside_one,
            'photo_inside_unit_2' => $directory . $name_inside_two,
            'photo_inside_unit_3' => $directory . $name_inside,
        ]);

        return response()->json(['data' => 'Imagenes de unidad almacenadas'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
