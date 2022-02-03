<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function index(){
        $sliders = Slider::latest()->get();
        return view('backend.slider.index',compact('sliders'));
    }
    public function create(){
        return view('backend.slider.create');
    }
    public function insert(Request $request){
        $request->validate([
            'title'=>'required|max:255',
            'description'=>'required',
            'image'=>'required|image|mimes:png,jpg,jpeg',
        ],
        [
            'title.required'=>'Please Enter Slider Title.',
        ]);
        $image = $request->image;
        $ext = $image->getClientOriginalExtension();
        $path = 'storage/slider/';
        $img_name = 'slider_'.time().'.'.$ext;
        Image::make($image->getRealPath())->resize(1920,1088)->save($path.$img_name);
        Slider::insert([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$path.$img_name,
            'created_at'=>Carbon::now()
        ]);
        $notification = array(
            'message'=>'Slider Inserted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('admin.slider')->with($notification);
    }
    public function edit($id){
        $slider = Slider::find($id);
        return view('backend.slider.edit',compact('slider'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'title'=>'max:255',
            'image'=>'image|mimes:png,jpg,jpeg',
        ]);
        $slider = Slider::find($id);
        $slider->title = $request->title;
        $slider->description = $request->description;
        if($request->hasFile('image')){
            if(File::exists($slider->image)){
                File::delete($slider->image);
            }
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $path = 'storage/slider/';
            $img_name = 'slider_'.time().'.'.$ext;
            Image::make($image->getRealPath())->resize(1920,1088)->save($path.$img_name);
            $slider->image = $path.$img_name;
        }
        $slider->save();
        $notification = array(
            'message'=>'Slider Updated Successfully',
            'alert-type'=>'info'
        );
        return redirect()->route('admin.slider')->with($notification);
    }
    public function delete($id){
        $slider = Slider::find($id);
        if(File::exists($slider->image)){
            File::delete($slider->image);
        }
        $slider->delete();
        $notification = array(
            'message'=>'Slider Deleted Successfully',
            'alert-type'=>'warning'
        );
        return redirect()->route('admin.slider')->with($notification);
    }
}
