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
            'email' => 'required',
            'code' => 'required'
        ]);
        
        $participant = new Participate;
        
        if (Participate::where('code', $request->code)->first()) {
            return redirect('')->with('successful', 'Deze code is al gebruikt.');
        }
        else {
            $participant->name = $request->input('name');
            $participant->adress = $request->input('adress');
            $participant->city = $request->input('city');
            $participant->email = $request->input('email');
            $participant->code = $request->input('code');
            $participant->ip = $clientIP;

            $participant->save();

            if ($participant->code == 12345) {
                
                $participant->isWinner = 1;
                $participant->save();
                
                return redirect('')->with('successful', 'We hebben een winnaar! We nemen contact met je op nadat de wedstrijd verlopen is.');
            }
            else {
                return redirect('')->with('successful', 'Helaas, je hebt niets gewonnen.');
            }
        }
        
        
        
    }

    
    public function getParticipants () {
        $participants = Participate::all();
        
        return view('participants')->with('participants', $participants);
    }
    
        
    public function disqualify (Request $request, $id) {
        

        $disq = Participate::find($id);
        $disq->isDeleted = 1;
        $disq->save();
        
        return redirect('participants')->with('successful', 'Deelname verwijderd!');
    }
    
    public function validateCode (Request $request, $id) {
        
        
    }
}





