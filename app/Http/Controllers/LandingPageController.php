<?php

namespace App\Http\Controllers;

use App\Models\Content;
use carbon\Carbon;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(){
        $todayContent = Content::all();
        $todayNews = $todayContent->where('created_at', '>=', date('Y-m-d').' 00:00:00')->count();
        $todayRegister = $todayContent->where('created_at', '>=', date('Y-m-d').' 00:00:00')->where('type_id',2)->count();
        $todayLoker = $todayContent->where('created_at', '>=', date('Y-m-d').' 00:00:00')->where('type_id',3)->count();        

        return view('landingPage',[
            'title' => 'PPIT.KU',
            'todayNews' => $todayNews,
            'todayRegister' => $todayRegister,
            'todayLoker' => $todayLoker
        ]);
    }
}
