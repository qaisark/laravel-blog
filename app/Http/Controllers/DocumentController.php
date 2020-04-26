<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\document;
use App\article;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show','show_document']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $documents= document::orderBy('views','desc')->paginate(10);
        return view('documents.index')->with('documents',$documents);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documents = document::all();
       // $cats = article::lists('name', 'id');
        return view('documents.create')->with('documents',$documents);
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
            'title' => 'required',
            'body' => 'required',
            'document_file' => 'mimes:doc,pdf,docx,zip,xls,xlsx,rar | max:30000 |nullable'
        ]);
         
        //Handle File Upload
        if ($request->hasFile('document_file')) {
            //Get Filename with Ext
            $fileNameWithExt = $request->file('document_file')->getClientOriginalName();
            //Get just Filename
            $fileName = pathinfo($fileNameWithExt , PATHINFO_FILENAME );
            //Get just extension
            $extension = $request->file('document_file')->getClientOriginalExtension();
            //File to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('document_file')->storeAs('public/documents',$fileNameToStore);
        
        } else {
            $fileNameToStore = 'nodoc';
        }

        $document = new document;
        $document->title = $request->input('title');
        $document->body = $request->input('body');
        $document->tag = $request->input('tag');
        $document->views = 0;
        $document->document_file = $fileNameToStore;
        $document->save();

        return redirect('/documents')->with('success','Document Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($tag)
    {
        $title = $tag;
        $documents = document::where('tag',$tag)->get();
        $newdocuments = document::where('tag',$tag)->orderBy('views','desc')->get();
        $articles= article::orderBy('views','desc')->get();
        $newarticles = article::orderBy('created_at','desc')->get();
        return view('documents.show')->with('documents',$documents)->with('title',$title)->with('newdocuments',$newdocuments);
    }
    public function show_document($id)
    {
        $documentview = document::find($id);
        $documentview->views = $documentview->views + 1;
        $documentview->save();
        
        $document = document::find($id);
        return view('documents.show_document')->with('document',$document);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $document = document::find($id);
        return view('documents.edit')->with('document',$document);
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
        $document = document::find($id);

         //Handle File Upload
         if ($request->hasFile('document_file')) {
            //Get Filename with Ext
            $fileNameWithExt = $request->file('document_file')->getClientOriginalName();
            //Get just Filename
            $fileName = pathinfo($fileNameWithExt , PATHINFO_FILENAME );
            //Get just extension
            $extension = $request->file('document_file')->getClientOriginalExtension();
            //File to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('document_file')->storeAs('public/documents',$fileNameToStore);
        
        }   

        $document->title = $request->input('title');
        $document->body = $request->input('body');
        if ($request->hasFile('document_file')) {
            Storage::delete('public/documents'.$document->document_file);
            $document->document_file = $fileNameToStore;
        }
        $document->save();

        return redirect('/documents')->with('success','Document Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = document::find($id);
        if ($document->document_file != 'nodoc') {
            //Delete Cover Image
            Storage::delete('public/documnets/'.$document->document_file);
        }
        $document->delete();
        return redirect('/documents')->with('success','Document Deleted');
    }
}
