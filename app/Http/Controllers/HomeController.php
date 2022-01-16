<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addmission;
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
        $admission = Addmission::where('user_id', Auth::user()->id)->first();
        if ($admission) {
        $merit = $admission->merit;
            return view('home',compact('merit'));
        } else {
            $merit = '0';
            return view('home',compact('merit'));
        }
        // return view('home');
    }
}
