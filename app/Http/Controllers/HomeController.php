<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addmission;
use App\Models\College;
use App\Models\CollegeMerit;
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
        // dd($admission);
        foreach ($admission['college_id'] as $result) {
            $college_merit = CollegeMerit::where('college_id', $result)->select('merit')->first();
            // dd($college_merit);
            if ($admission) {
                if ($admission->merit >= $college_merit->merit) {
                    // dd(1);
                    $merit = $admission->merit;
                    $college = College::where('id', $result)->first();
                    // dd($college);
                    return view('home', compact('merit', 'admission', 'meritround', 'date_now', 'college', 'college_merit'));
                }
            } else {
                $merit = '0';
                return view('home', compact('merit', 'admission', 'meritround', 'date_now', 'college', 'college_merit'));
            }
        }

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
    }
}
