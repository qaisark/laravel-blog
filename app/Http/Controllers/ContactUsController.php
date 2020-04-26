<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ContactUs;

class ContactUsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $messages= ContactUs::where('status','new')->get();
        return view('contact.index')->with('messages',$messages);
    }

    public function show($id)
    {
        $message = ContactUs::find($id);
        return view('contact.show')->with('message',$message);
    }
    public function show_seen($tag)
    {
        $messages= ContactUs::where('status',$tag)->get();
        return view('contact.show_seen')->with('messages',$messages); 
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);
        
        $msg = new ContactUs;
        $msg->email = $request->input('email');
        $msg->subject = $request->input('subject');
        $msg->message = $request->input('message');
        $msg->status = "new";
        $msg->save();

        return redirect('/contact_us')->with('success','Message Send');
    }

    public function destroy($id)
    {
        $message = ContactUs::find($id);
        $message->status = "seen";
        $message->save();
        return redirect('/contact')->with('success','Message Seen');
    }
}
