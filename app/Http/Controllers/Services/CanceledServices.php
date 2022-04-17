<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CanceledServices extends Controller
{
    public function index(Request $request){
        return 'Servicios Cancelados';
    }
}
