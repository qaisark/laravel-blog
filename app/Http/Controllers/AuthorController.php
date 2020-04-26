<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\author;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = author::all();
        return view('author.index')->with('authors',$authors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create');
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
            'name' => 'required',
            'age' => 'required',
            'current_org' => 'required',
            'nationality' => 'required',
            'bio' => 'required',
            'author_image' => 'image|nullable|max:1999'
        ]);
          
        //Handle File Upload
        if ($request->hasFile('author_image')) {
            //Get Filename with Ext
            $fileNameWithExt = $request->file('author_image')->getClientOriginalName();
            //Get just Filename
            $fileName = pathinfo($fileNameWithExt , PATHINFO_FILENAME );
            //Get just extension
            $extension = $request->file('author_image')->getClientOriginalExtension();
            //File to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('author_image')->storeAs('public/author_image',$fileNameToStore);
        
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $author = new author;
        $author->name = $request->input('name');
        $author->age = $request->input('age');
        $author->current_org = $request->input('current_org');
        $author->nationality = $request->input('nationality');
        $author->bio = $request->input('bio');
        $author->author_image = $fileNameToStore;
        $author->save();
    
        return redirect('/dashboard')->with('success','Author Created!');
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
        $author = author::find($id);
        return view('author.edit')->with('author',$author);
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
            'name' => 'required',
            'age' => 'required',
            'current_org' => 'required',
            'nationality' => 'required',
            'bio' => 'required',
            'author_image' => 'image|nullable|max:1999'
        ]);
          
        //Handle File Upload
        if ($request->hasFile('author_image')) {
            //Get Filename with Ext
            $fileNameWithExt = $request->file('author_image')->getClientOriginalName();
            //Get just Filename
            $fileName = pathinfo($fileNameWithExt , PATHINFO_FILENAME );
            //Get just extension
            $extension = $request->file('author_image')->getClientOriginalExtension();
            //File to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('author_image')->storeAs('public/author_image',$fileNameToStore);
        
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $author = author::find($id);
        $author->name = $request->input('name');
        $author->age = $request->input('age');
        $author->current_org = $request->input('current_org');
        $author->nationality = $request->input('nationality');
        $author->bio = $request->input('bio');
        if ($request->hasFile('author_image')) {
            Storage::delete('public/author_image/'.$author->author_image);
            $author->author_image = $fileNameToStore;
        }
        $author->save();
    
        return redirect('/dashboard')->with('success','Author Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
