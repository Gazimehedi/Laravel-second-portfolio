<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;

class PortfolioController extends Controller
{
    public function index(){
        $portfolios = Portfolio::latest()->paginate(10);
        return view('backend.portfolio.index',compact('portfolios'));
    }
    public function create(){
        return view('backend.portfolio.create');
    }
    public function insert(Request $request){
        $request->validate([
            'title'=>'required',
            'description'=>'required|min:50',
            'image'=>'required|image|mimes:png,jpg,jpeg',
            'category'=>'required',
            'project_date'=>'required',
        ]);
        $img = $request->file('image');
        $path = 'storage/portfolio/';
        $ext = $img->getClientOriginalExtension();
        $file_name = 'portfolio_'.time().'.'.$ext;
        $image = $path.$file_name;
        $img->move($path,$file_name);
        Portfolio::insert([
            'image'=>$image,
            'title'=>$request->title,
            'description'=>$request->description,
            'category'=>$request->category,
            'client'=>$request->client,
            'project_url'=>$request->project_url,
            'project_date'=>$request->project_date,
            'project_type'=>$request->project_type,
            'created_at'=> Carbon::now()
        ]);
        return redirect()->route('admin.portfolio')->with('success','Portfolio Insert Successfully');
    }
    public function edit($id){
        $portfolio = Portfolio::find($id);
        return view('backend.portfolio.edit',compact('portfolio'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'title'=>'required',
            'description'=>'required|min:50',
            'image'=>'image|mimes:png,jpg,jpeg',
            'category'=>'required',
            'project_date'=>'required',
        ]);
        $portfolio = Portfolio::find($id);
        if($request->hasFile('image')){
            if(File::exists($portfolio->image)){
                File::delete($portfolio->image);
            }
            $img = $request->file('image');
            $path = 'storage/portfolio/';
            $ext = $img->getClientOriginalExtension();
            $file_name = 'portfolio_'.time().'.'.$ext;
            $image = $path.$file_name;
            $img->move($path,$file_name);
            $portfolio->image = $image;
        }
        $portfolio->title = $request->title;
        $portfolio->description = $request->description;
        $portfolio->category = $request->category;
        $portfolio->client = $request->client;
        $portfolio->project_url = $request->project_url;
        $portfolio->project_date = $request->project_date;
        $portfolio->project_type = $request->project_type;
        $portfolio->updated_at = Carbon::now();
        $portfolio->save();
        return redirect()->route('admin.portfolio')->with('success','Portfolio Update Successfully');
    }
    public function delete($id){
        $portfolio = Portfolio::find($id);
        if(File::exists($portfolio->image)){
            File::delete($portfolio->image);
        }
        $portfolio->delete();
        return redirect()->route('admin.portfolio')->with('success','Portfolio Delete Successfully');
    }
}
