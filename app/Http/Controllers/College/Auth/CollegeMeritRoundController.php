<?php

namespace App\Http\Controllers\College\Auth;

use App\Http\Controllers\Controller;
use App\Models\MeritRound;
use Illuminate\Http\Request;

class CollegeMeritRoundController extends Controller
{
    public function showMeritRound()
    {
        $meritround = MeritRound::all();
        return view('College.Merit-Round.edit',compact('meritround'));
    }
}
