<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getHome () {
        return view('home');
    }
    
    public function getContest () {
        return view('contest');
    }
    
    public function getBackEnd () {
        return view('participants');
    }
}
