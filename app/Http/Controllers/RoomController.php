<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\room;

use App\category;

class RoomController extends Controller
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
        $rooms = room::all();
        return view('room.index')->with('rooms',$rooms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = category::all();
        return view('room.create')->with('cats',$cats);
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
            'cat_id' => 'required',
            'room_no' => 'required',
            'price' => 'required'
        ]);
        $room = new room;
        $room->cat_id = $request->input('cat_id');   
        $room->room_no = $request->input('room_no');   
        $room->price = $request->input('price');
        $room->status = "available";   
        $room->save();
        return redirect('/room')->with('success','Room Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_room($tag)
    {
        $rooms = room::where('status',$tag)->get();
        $title = $tag;
        return view('room.show')->with('rooms',$rooms)->with('title',$title);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = room::find($id); 
        return view('room.edit')->with('room',$room);
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
            'price' => 'required',
        ]);
        $room = room::find($id);   
        $room->price = $request->input('price');
        $room->save();
        return redirect('/room')->with('success','Room Details Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = room::find($id);
        $room->delete();
        return redirect('/room')->with('success','Room Deleted');
    }
}
