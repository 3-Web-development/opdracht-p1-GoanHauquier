<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participate;

class ParticipationController extends Controller
{
    public function submit (Request $request) {
        $clientIP = request()->ip();
        $this->validate($request, [
            'name' => 'required',
            'adress' => 'required',
            'city' => 'required',
            'email' => 'required'
        ]);
        
        $participant = new Participate;
        $participant->name = $request->input('name');
        $participant->adress = $request->input('adress');
        $participant->city = $request->input('city');
        $participant->email = $request->input('email');
        $participant->ip = $clientIP;
        
        $participant->save();
        
        return redirect('')->with('successful', 'Deelname geregistreerd!');
    }
    
    public function getParticipants () {
        $participants = Participate::all();
        
        return view('participants')->with('participants', $participants);
    }
}
