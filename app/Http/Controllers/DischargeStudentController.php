<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\bed;

use App\prev_bed_detail;
use App\student;
class DischargeStudentController extends Controller
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
        //
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
        $this->validate($request,[
            'bed_no' => 'required',
        ]);
        $id = $request->input('bed_no');
        $bed = bed::find($id);
        $student = student::where('bed_id',$id)->first();
        $prev = new prev_bed_detail;
        $prev->name = $student->name;
        $prev->fname = $student->fname;
        $prev->cnic = $student->cnic;
        $prev->age = $student->age;
        $prev->bed_no = $student->bed_id;
        $prev->save();
        $student->delete();
        $bed->status = "available";
        $bed->save();
        return redirect('/hostel_bed')->with('success','Bed Discharged');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
