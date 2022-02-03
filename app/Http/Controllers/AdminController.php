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
        $notification = array(
            'message'=>'User Logout',
            'alert-type'=>'success'
        );
        return redirect()->route('login')->with($notification);
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
            $notification = array(
                'message'=>'User Password Changed',
                'alert-type'=>'info'
            );
            return redirect()->route('login')->with($notification);
        }else{
            $notification = array(
                'message'=>'Your password is wrong!',
                'alert-type'=>'error'
            );
            return redirect()->route('user.password.reset')->with($notification);
        }
    }
    public function profile(){
        return view('backend.profile.profile');
    }
    public function profileupdate(Request $request){
        $request->validate([
            'image'=>'image|mimes:png,jpg,jpeg',
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

        $notification = array(
            'message'=>'Your Profile Is Updated!',
            'alert-type'=>'info'
        );
        return redirect()->route('user.profile')->with($notification);
    }
}
