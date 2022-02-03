<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::latest()->get();
        return view('backend.service.index',compact('services'));
    }
    public function create(){
        return view('backend.service.create');
    }
    public function insert(Request $request){
        $request->validate([
            'icon'=>'required|max:255',
            'title'=>'required|max:255',
            'description'=>'required',
        ],
        [
            'title.required'=>'Please Enter Service Title.',
        ]);
        Service::insert([
            'icon'=>$request->icon,
            'title'=>$request->title,
            'description'=>$request->description,
            'created_at'=>Carbon::now()
        ]);
        $notification = array(
            'message'=>'Service Inserted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('admin.service')->with($notification);
    }
    public function edit($id){
        $service = Service::find($id);
        return view('backend.service.edit',compact('service'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'icon'=>'max:255',
            'title'=>'max:255',
        ]);
        $service = Service::find($id)->update([
        'icon' => $request->icon,
        'title' => $request->title,
        'description' => $request->description,
        'created_at'=>Carbon::now()
        ]);
        $notification = array(
            'message'=>'Service Updated Successfully',
            'alert-type'=>'info'
        );
        return redirect()->route('admin.service')->with($notification);
    }
    public function delete($id){
        Service::find($id)->delete();
        $notification = array(
            'message'=>'Service Deleted Successfully',
            'alert-type'=>'warning'
        );
        return redirect()->route('admin.service')->with($notification);
    }
}
