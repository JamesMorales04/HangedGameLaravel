<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WinController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }



    public function index()
    {
        $points=Auth::user()->points+1;
        $expresion ="update users set points = {$points} where email = ?";
        $affected = DB::update($expresion, [Auth::user()->email]);
        return view('win');
    }
}
