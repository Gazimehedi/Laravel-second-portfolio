<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AboutController extends Controller
{
    public function index(){
        $about = About::first();
        return view('backend.about.index',compact('about'));
    }
    public function update(Request $request){
        About::updateOrInsert(
            ['id'=>$request->id],
            [
            'title'=>$request->title,
            'sort_desc'=>$request->sort_desc,
            'long_desc'=>$request->long_desc,
            'updated_at'=> Carbon::now()
        ]);
        return redirect()->route('admin.about')->with('success','About Updated Successfully');
    }
}
