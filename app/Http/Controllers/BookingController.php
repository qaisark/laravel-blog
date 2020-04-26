<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\booking;
use DB;
use App\ContactUs;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.book_now');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
    }
    public function show($id)
    {
        if ($id == "new") {
          $bookings = booking::where('status','new')->get();
          return view('online_booking.new')->with('bookings',$bookings);
        }
        elseif($id == "confirmed"){
            $bookings = booking::where('status','confirmed')->get();
            return view('online_booking.confirm')->with('bookings',$bookings);
        }
        elseif($id == "messages"){
            $messages = ContactUs::orderBy('created_at','desc')->get();
            return view('online_booking.messages')->with('messages',$messages);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'from' => 'required',
            'to' => 'required',
            'type' => 'required',
            'no_rooms' => 'required',
            'name' => 'required',
            'phone_number' => 'required|digits:11',
        ]);
        
        $book = new booking;
        $book->from = $request->input('from');
        $book->to = $request->input('to');
        $book->room_type = $request->input('type');
        $book->no_of_rooms  = $request->input('no_rooms');
        $book->name = $request->input('name');
        $book->ph = $request->input('phone_number');
        $book->save();
        return redirect('/booking');
    }
    public function update(Request $request, $id)
    {
        $booking = booking::find($id);
        $booking->status = "confirmed";
        $booking->save();
        return redirect('/booking/new')->with('success','Request Done!');
    }
    public function destroy($id)
    {
        $message = ContactUs::find($id);
        $message->delete(); 
        return redirect('/booking/messages')->with('success','Message Deleted!');
    }
}
