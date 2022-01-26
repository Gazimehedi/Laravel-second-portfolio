<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success','User Logout');
    }
    public function passwordreset(){
        return view('backend.resetpassword.resetpassword');
    }
    public function passwordupdate(Request $request){
        $request->validate([
            'current_password'=>'required',
            'password'=>'required|min:8|confirmed',
            'password_confirmation'=>'required'
        ]);
        $user = User::find(Auth::id());
        if(Hash::check($request->current_password,$user->password)){
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('success','User Password Changed');
        }else{
            return redirect()->route('user.password.reset')->with('warning','Your password is wrong!');
        }
    }
    public function profile(){
        return view('backend.profile.profile');
    }
    public function profileupdate(Request $request){
        $request->validate([
            'image'=>'required|image|mimes:png,jpg,jpeg',
            'name'=>'required',
            'email'=>'required|email'
        ]);
        $user = User::find(Auth::id());
        if($request->hasFile('image')){
            $img = $request->file('image');
            $path = 'storage/profile/';
            $ext = $img->getClientOriginalExtension();
            $file_name = 'profile_'.time().'.'.$ext;
            $image = $path.$file_name;
            $img->move($path,$file_name);
            $user->profile_photo_path = $image;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('user.profile')->with('success','Your Profile Is Updated!');
    }
}
