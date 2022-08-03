<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class calculatorController extends Controller
{
    // GET
    public function calculator(){
        return view('calculator');
    }

    // POST
    public function sum(Request $request){
        $data = $request->all();
    
        return $data['a']+$data['b'];
    }
}
