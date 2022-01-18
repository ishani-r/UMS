<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addmission;
use App\Models\College;
use App\Models\MeritRound;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $admission = Addmission::with('user')->with('course')->where('user_id', Auth::user()->id)->first();
        $college = College::where('id',$admission->college_id[0])->first();
        $meritround = MeritRound::first();
        $date_now = date("Y-m-d");
        if ($admission) {
        $merit = $admission->merit;
            return view('home',compact('merit','admission','meritround','date_now','college'));
        } else {
            $merit = '0';
            return view('home',compact('merit','admission'));
        }
        // return view('home');
    }
}
