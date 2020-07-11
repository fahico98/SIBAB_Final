<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\asistencia_semanal;
use Carbon\Carbon;

class asistencia_saviaController extends Controller
{
    
    public function index(){
    	$carbon = new Carbon();
    	return view ('asistenciaSavia.index',compact('carbon'));
    }

    public function create(Request $request){


    }
}
