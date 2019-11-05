<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParticipationController extends Controller
{
    public function submit (Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'adress' => 'required',
            'city' => 'required',
            'email' => 'required'
        ]);
        
        $clientIP = request()->ip();
        
        return $clientIP;
    }
}
