<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addmission;
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
        // dd(2);
        // $college = College::where('id', $admission->college_id[0] ?? '')->first();
        // $college_merit = CollegeMerit::where('college_id', $admission->college_id[0])->first();
        // $meritround = MeritRound::where('status', '1')->first();
        // $date_now = date("Y-m-d");
        // if ($admission) {
        //     $merit = $admission->merit;
        //     return view('home', compact('merit', 'admission', 'meritround', 'date_now', 'college', 'college_merit'));
        // } else {
        //     $merit = '0';
        //     return view('home', compact('merit', 'admission', 'meritround', 'date_now', 'college', 'college_merit'));
        // }
        // return view('home');

        // dd($admission);
        // foreach ($admission['college_id'] as $result) {
        //     $college_merit = CollegeMerit::where('college_id', $result)->select('merit')->first();
        //     // dd($college_merit);
        //     if ($admission) {
        //         if ($admission->merit >= $college_merit->merit) {
        //             // dd(1);
        //             $merit = $admission->merit;
        //             $college = College::where('id', $result)->first();
        //             // dd($college);
        //             return view('home', compact('merit', 'admission', 'meritround', 'date_now', 'college', 'college_merit'));
        //         }
        //     } else {
        //         $merit = '0';
        //         return view('home', compact('merit', 'admission', 'meritround', 'date_now', 'college', 'college_merit'));
        //     }
        // }

        $admission = Addmission::with('user')->with('course')->where('user_id', Auth::user()->id)->first();
        $meritround = MeritRound::where('status', 1)->first();
        $date_now = date("Y-m-d");
        if ($admission) {
            // dd(2);
            if ($date_now >= $meritround->merit_result_declare_date) {
                $college_merit = CollegeMerit::whereIn('college_id', $admission->college_id)->where('merit', '<=', $admission->merit)->pluck('college_id')->toArray();
                $colleges = College::whereIn('id',$college_merit)->get();
                return view('home', compact('colleges', 'admission'));
                // foreach ($admission['college_id'] as $result) {
                //     $college_merit = CollegeMerit::where('college_id', $result)->select('merit')->get();
                //     if ($admission->merit >= $college_merit->merit) {
                //         $college = College::where('id', $result)->get();
                //         return view('home', compact('college', 'admission'));
                //     }
                // }
            }
        } else {
            // dd(1);
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
