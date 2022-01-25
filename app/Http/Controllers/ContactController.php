<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    public function profile(){
        $contact = Contact::first();
        return view('backend.contact.profile',compact('contact'));
    }
    public function profileupdate(Request $request){
        Contact::updateOrInsert(
            ['id'=>$request->id],
            [
            'address'=>$request->address,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'updated_at'=> Carbon::now()
        ]);
        return redirect()->route('admin.contact.profile')->with('success','Contact Profile Updated Successfully');
    }
    public function message(){
        $messages = ContactMessage::latest()->get();
        return view('backend.contact.message',compact('messages'));
    }
    public function messagedelete($id){
        ContactMessage::findOrFail($id)->delete();
        return redirect()->route('admin.contact.message')->with('success','Contact Message Deleted Successfully');
    }
}
