<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::latest()->paginate(10);
        return view('backend.brand.brand',compact('brands'));
    }
    public function insert(Request $request){
        $request->validate([
            'name'=>'required|max:150',
            'image'=>'required|image|mimes:png,jpg,jpeg',
        ]);
        $name = $request->name;
        $img = $request->file('image');
        $path = 'storage/brand/';
        $ext = $img->getClientOriginalExtension();
        $file_name = 'brand_'.time().'.'.$ext;
        $image = $path.$file_name;
        $img->move($path,$file_name);
        Brand::create(compact('name','image'));
        $notification = array(
            'message'=>'Brand Insert Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('admin.brand')->with($notification);
    }
    public function edit($id){
        $brand = Brand::find($id);
        return view('backend.brand.edit',compact('brand'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'name'=>'required|max:150',
            'image'=>'image|mimes:png,jpg,jpeg',
        ]);
        $brand = Brand::find($id);
        $brand->name = $request->name;
        if($request->hasFile('image')){
            if(File::exists($brand->image)){
                File::delete($brand->image);
            }
            $img = $request->file('image');
            $path = 'storage/brand/';
            $ext = $img->getClientOriginalExtension();
            $file_name = 'brand_'.time().'.'.$ext;
            $image = $path.$file_name;
            $img->move($path,$file_name);
            $brand->image = $image;
        }
        $brand->save();
        $notification = array(
            'message'=>'Brand Update Successfully',
            'alert-type'=>'info'
        );
        return redirect()->route('admin.brand')->with($notification);
    }
    public function delete($id){
        $brand = Brand::find($id);
        if(File::exists($brand->image)){
            File::delete($brand->image);
        }
        $brand->delete();
        $notification = array(
            'message'=>'Brand Delete Successfully',
            'alert-type'=>'warning'
        );
        return redirect()->route('admin.brand')->with($notification);
    }

}
