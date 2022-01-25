<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Illuminate\Support\Carbon;
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
    public function contact(){
        $contact = DB::table('contacts')->first();
        return view('pages.contact',compact('contact'));
    }
    public function messagesent(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required'
        ]);
        $contact = ContactMessage::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'created_at'=>Carbon::now(),
        ]);
        return redirect()->route('contact')->with('success','Your message has been sent. Thank you!');
    }
}
