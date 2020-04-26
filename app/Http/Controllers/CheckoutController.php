<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\room;
use App\check_in;
use App\room_check_in;
use App\customer;
class CheckoutController extends Controller
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
        $check_ins = check_in::where('status','checked_in')->get();
        return view('check_out.index')->with('check_ins',$check_ins);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check_in = check_in::find($request->input('id'));
        $check_in->status = "checked_out";
        $room_check_ins = room_check_in::where('check_in_id',$check_in->id)->get();
        foreach ($room_check_ins as $room_check_in) {
            $room = room::find($room_check_in->room_id);
            $room->status = "available";
            $room->save();
        }
        $check_in->save();
        return redirect('/check_out')->with('success','Check out Successfully done!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($id == 2){
            $check_ins = check_in::all();
            $room_check_ins = room_check_in::all();
            $customers = customer::all();
            return view('check_out.show')->with('check_ins',$check_ins)->with('room_check_ins',$room_check_ins)->with('customers',$customers);
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
        //
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
