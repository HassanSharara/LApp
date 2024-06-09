<?php

namespace App\Http\Controllers;

use App\Models\System\Category\Category;
use App\Models\System\City\City;
use App\Models\System\Country\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        
        return view('royal_layout.main_dash.index');
    }





    protected   $cities=[
        "اربيل",
        "دهوك",
        "الموصل",
        "السليمانية",
        "كركوك",
        "تكريت",
        "الانبار",
        "بغداد",
        "ديالى",
        "كربلاء",
        "واسط",
        "بابل",
        "النجف",
        "القادسية",
        "المثنى",
        "ذي قار",
        "ميسان",
        "البصرة",
    ];
}
