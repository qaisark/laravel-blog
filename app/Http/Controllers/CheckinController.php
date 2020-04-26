<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\check_in;
use App\room;
use App\category;
use App\room_check_in;
use App\customer;
class CheckinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = room::where('status','available')->get();
        $cats = category::all();
        $check_ins = check_in::orderBy('created_at','desc')->where('status','checked_in')->get();
        return view('check_in.index')->with('rooms',$rooms)->with('cats',$cats)->with('check_ins',$check_ins);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $rooms = room::where('status','available')->get();
        return view('check_in.create')->with('rooms',$rooms);
    }

    public function add_more()
    {
        $rooms = room::where('status','available')->get();
        return view('check_in.add_more')->with('rooms',$rooms);
    }
    public function show_check_ins()
    {
        $check_ins = check_in::all();
        $room_check_ins = room_check_in::all();
        $customers = customer::all();
        return view('check_in.show_check_ins')->with('check_ins',$check_ins)->with('room_check_ins',$room_check_ins)->with('customers',$customers);
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
            'cnic' => 'required|digits:13',
            'name' => 'required',
            'fname' => 'required',
            'age' => 'required',
            'room_no' => 'required',
        ]);
       $check_in = new check_in;
       $customer = new customer;
       $room_check_in = new room_check_in;
       $name = $request->input('name');
       $fname = $request->input('fname');
       $cnic = $request->input('cnic');
       $age = $request->input('age');
       $cat_id = $request->input('cat_id');
       $room_id = $request->input('room_no');
       $customer->name = $name;
       $customer->fname = $fname;
       $customer->cnic = $cnic;
       $customer->age = $age;
       $customer->save();
       $check_in->cus_id = $customer->id;
       $check_in->status = "checked_in";
       $check_in->save();
       $room_check_in->check_in_id = $check_in->id;
       $room_check_in->room_id = $room_id;
       $room_check_in->save();
       $room = room::find($room_id);
       $room->status = "booked";
       $room->save();
       return redirect('/check_in')->with('success','Room Booked');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      if($id == 1){
        $check_ins = check_in::all();
        $room_check_ins = room_check_in::all();
        $customers = customer::all();
        return view('check_in.show_check_ins')->with('check_ins',$check_ins)->with('room_check_ins',$room_check_ins)->with('customers',$customers);
      } 
      elseif($id == "bill"){
        $check_ins = check_in::all();
        $room_check_ins = room_check_in::all();
        $customers = customer::all();
        $rooms = room::where('status','booked')->get();
        return view('check_in.bill')->with('check_ins',$check_ins)->with('room_check_ins',$room_check_ins)->with('customers',$customers)->with('rooms',$rooms);
      }  
      else{
          return 0;
      }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'room_no' => 'required',
        ]);
       $room_check_in = new room_check_in;
       $cat_id = $request->input('cat_id');
       //$id = $request->input('id');
       $room_id = $request->input('room_no');

       $room_check_in->check_in_id = $id;

       $room_check_in->room_id = $room_id;

       $room_check_in->save();

       $room = room::find($room_id);
       $room->status = "booked";
       $room->save();

       return redirect('/check_in')->with('success','Room Added to Existing Check In!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
