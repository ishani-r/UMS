<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addmission;
use App\Models\AddmissionConfiram;
use App\Models\College;
use App\Models\CollegeMerit;
use App\Models\MeritRound;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        // dd(1);
        $admission = Addmission::with('user')->with('course')->where('user_id', Auth::user()->id)->first();
        $meritround = MeritRound::where('status', 1)->first();
        $date_now = date("Y-m-d");
        if ($admission) {
            if ($date_now >= $meritround->merit_result_declare_date) {
                // dd(1);
                $college_merit = CollegeMerit::whereIn('college_id', $admission->college_id)->where('merit', '<=', $admission->merit)->pluck('college_id')->toArray();
                $colleges = College::whereIn('id',$college_merit)->get();
                $admission_c = AddmissionConfiram::where('addmission_id',$admission->id)->select('confirm_college_id')->first();
                // dd($admission_c);
                return view('home', compact('colleges', 'admission','admission_c'));
            } elseif($date_now >= $meritround->end_date) {
                return view('home', compact('admission','meritround'));
            } else {
                return view('home',compact('admission','meritround'));
            }
        } else {
            return view('home', compact('admission'));
        }
        // if ($admission) {
        //     $merit = $admission->merit;
        //     return view('home', compact('merit'));
        // } else {
        //     $merit = '0';
        //     return view('home', compact('merit'));
        // }
    }
}
