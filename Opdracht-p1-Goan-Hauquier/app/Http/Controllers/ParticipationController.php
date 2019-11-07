<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participate;
use App\Winners;
use App\Archive;
use App\Codes;
use App\Admin;

class ParticipationController extends Controller
{
    public function submit (Request $request) {
        $clientIP = request()->ip();
        
        // VALIDATIE
        $this->validate($request, [
            'name' => 'required',
            'adress' => 'required',
            'city' => 'required',
            'email' => 'required',
            'code' => 'required'
        ]);
        
        $participant = new Participate;
        $archive = new Archive; 
        $code = Codes::find(1);
        
        // CHECK OF CODE AL IS GEBRUIKT
        if (Participate::where('code', $request->code)->first()) {
            return redirect('contest')->with('successful', 'Deze code is al gebruikt.');
        }
        // ZO NIET DATA IN DATABASE STOPPEN
        else {
            $participant->name = $request->input('name');
            $participant->adress = $request->input('adress');
            $participant->city = $request->input('city');
            $participant->email = $request->input('email');
            $participant->code = $request->input('code');
            $participant->ip = $clientIP;

            $participant->save();
            
            $archive->name = $request->input('name');
            $archive->adress = $request->input('adress');
            $archive->city = $request->input('city');
            $archive->email = $request->input('email');
            $archive->ip = $clientIP;
            
            $archive->save();

            // ALS DE CODE OVEREENKOMT MET DE WINNENDE CODE DATA OOK IN WINNAARSTABEL STOPPEN
            
            if ($participant->code == $code->code) {
                
                $participant->isWinner = 1;
                $participant->save();
                
                $winner = new Winners;
                $winner->name = $request->input('name');
                $winner->adress = $request->input('adress');
                $winner->city = $request->input('city');
                $winner->email = $request->input('email');
                $winner->ip = $clientIP;
                
                $winner->save();
                
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
    
    public function getWinners () {
        $winners = Winners::all();
        
        return view('home')->with('winners', $winners);
    }
    
    
        
    public function disqualify (Request $request, $id) {
        

        $disq = Participate::find($id);
        $disq->isDeleted = 1;
        $disq->save();
        
        return redirect('participants')->with('successful', 'Deelname verwijderd!');
    }
    
    public function admin (Request $request) {
        $admin = new Admin;
        
        $this->validate($request, [
            'email' => 'required'
        ]);
        
        $admin->email = $request->input('email');
        $admin->save();
        
        return redirect('participants')->with('successful', 'email toegevoegd');
    }
    

}





