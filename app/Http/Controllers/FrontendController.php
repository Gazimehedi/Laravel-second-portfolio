<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function home(){
        $about = DB::table('abouts')->first();
        $services = DB::table('services')->latest()->get();
        $portfolios = DB::table('portfolios')->latest()->get();
        $brands = DB::table('brands')->latest()->get();
        return view('index',compact(['about','services','portfolios','brands']));
    }
}
