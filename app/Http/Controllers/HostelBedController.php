<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bed;

use App\hostel_room;
use App\prev_bed_detail;
use App\student;
class HostelBedController extends Controller
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
        $beds = bed::all();
        return view('hostel_bed.index')->with('beds',$beds);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = hostel_room::all();
        return view('hostel_bed.create')->with('rooms',$rooms);
    }
    public function show($tag){
        if($tag == "allot"){
            $beds =bed::where('status','available')->get();
            return view('hostel_bed.allot')->with('beds',$beds);
        }
        elseif($tag == "discharge"){
            $beds =bed::where('status','booked')->get();
            return view('hostel_bed.discharge')->with('beds',$beds);
        }
        elseif($tag == "available"){
            $title = $tag;
            $beds =bed::where('status','available')->get();
            return view('hostel_bed.show')->with('beds',$beds)->with('title',$title);
        }
        elseif($tag == "booked"){
            $title = $tag;
            $beds =bed::where('status','booked')->get();
            return view('hostel_bed.show')->with('beds',$beds)->with('title',$title);
        }
        elseif($tag == "bed_current"){
            $details =Student::all();
            return view('hostel_bed.bed_current')->with('details',$details);
        }
        elseif($tag == "prev_bed"){
            $details =prev_bed_detail::all();
            return view('hostel_bed.prev_bed')->with('details',$details);
        }
        else{
            return 0;
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
            'room_id' => 'required',
            'bed_no' => 'required',
            'price' => 'required'
        ]);
        $bed = new bed;
        $bed->room_id = $request->input('room_id');   
        $bed->bed_no = $request->input('bed_no');   
        $bed->price = $request->input('price');
        $bed->status = "available";   
        $bed->save();
        return redirect('/hostel_bed')->with('success','Bed Added');
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
        $bed = bed::find($id); 
        return view('hostel_bed.edit')->with('bed',$bed);
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
        $bed = bed::find($id);   
        $bed->price = $request->input('price');
        $bed->save();
        return redirect('/hostel_bed')->with('success','Bed Details Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bed = hostel_bed::find($id);
        $bed->delete();
        return redirect('/hostel_bed')->with('success','Bed Deleted');
    }
}
