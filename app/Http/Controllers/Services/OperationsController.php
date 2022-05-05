<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\ServiceOperation;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class OperationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // $operations = ServiceOperation::with(['unit']);

        if ($request->ajax()){
            // if(!empty($request->from_date))
            // {
            //     $registers = Register::with(['Agency','Type_service', 'isAssigned'])->orderBy('date')
            //                         ->whereBetween('date', array(
            //                             $request->from_date, $request->to_date))
            //                         ->orderBy('pickup');

            // }else{
            //     $date = Carbon::today();
            //     $date = $date->format('Y-m-d');
            //     $registers = Register::with(['Agency','Type_service', 'isAssigned'])
            //                         ->whereDate('date', $date)
            //                         ->orderBy('date')->orderBy('pickup');
            // }
                $operations = ServiceOperation::groupBy(['id_unit']);
            return DataTables::of($operations)
            ->addIndexColumn()
            ->addColumn('unit', function($operations){
                return $operations->unit->unit;
            })
            ->addColumn('start', function($operations){
                $op = $operations->getStart($operations->id_unit);
                // return
                //     '<table>
                //     <tr><td> holaholaholaholaholahola </td></tr>
                //     <tr><td> holaholaholahola </td></tr>
                //     </table>';

                // $roles = $users->getRoleNames();
                // $rol = '<ul>';
                // for( $i = 0; $i < count($roles); $i++){
                //     $rol .= '<li>'.$roles[$i].'</li>';
                // }
                // $rol .= '</ul>';
                // return $rol;
                $start = '';
                    $start .= '<table>';
                                for($i = 0; $i < count($op); $i++){
                                    $start .= '<tr >';
                                        $start .= '<td>'.$op[$i]['time'].'</td>';
                                    $start .= '</tr>';
                                }
                    $start .= '</table>';
                return $start;
            })
            ->addColumn('start_mileage', function($operations){
                $op = $operations->getStart($operations->id_unit);
                $start = '';
                    $start .= '<table>';
                                for($i = 0; $i < count($op); $i++){
                                    $start .= '<tr>';
                                        $start .= '<td>'.$op[$i]['mileage'].' Km</td>';
                                    $start .= '</tr>';
                                }
                    $start .= '</table>';
                return $start;

            })
            ->addColumn('finish', function($operations){
                $op = $operations->getFinish($operations->id_unit);
                $start = '';
                    $start .= '<table>';
                                for($i = 0; $i < count($op); $i++){
                                    $start .= '<tr>';
                                        $start .= '<td>'.$op[$i]['time'] .'</td>';
                                    $start .= '</tr>';
                                }
                    $start .= '</table>';
                return $start;
            })
            ->addColumn('finish_mileage', function($operations){
                $op = $operations->getFinish($operations->id_unit);
                $start = '';
                    $start .= '<table>';
                                for($i = 0; $i < count($op); $i++){
                                    $start .= '<tr>';
                                        $start .= '<td>'.$op[$i]['mileage'].' Km</td>';
                                    $start .= '</tr>';
                                }
                    $start .= '</table>';
                return $start;
            })
            ->rawColumns(['start','start_mileage','finish','finish_mileage'])
            ->toJson();

        }
        //$registers = Register::with(['Agency','Type_service','Airline', 'isAssigned'])->get();
        return view('all_services.operations.index');
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
        //
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
