<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;
use App\bed;
class StudentController extends Controller
{
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
            'cnic' => 'required|digits:13',
            'name' => 'required',
            'fname' => 'required',
            'age' => 'required',
            'bed_no' => 'required',
        ]);
        $student = new Student;
        $name = $request->input('name');
        $fname = $request->input('fname');
        $cnic = $request->input('cnic');
        $age = $request->input('age');
        $bed_id = $request->input('bed_no');
        $student->name = $name;
        $student->fname = $fname;
        $student->cnic = $cnic;
        $student->age = $age;
        $student->bed_id = $bed_id;
        $bed = bed::find($bed_id);
        $bed->status = "booked";
        $bed->save();
        $student->save();
        return redirect('/hostel_bed')->with('success','Bed Alloted');

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
