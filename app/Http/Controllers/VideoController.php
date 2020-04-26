<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\video;
use App\article;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show','show_video']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos= video::orderBy('views','desc')->paginate(10);
        return view('videos.index')->with('videos',$videos);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $videos = video::all();
       // $cats = article::lists('name', 'id');
        return view('videos.create')->with('videos',$videos);
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
            'tag' => 'required',
            'document_video' => 'mimes:mp4,mov,ogg,qt | max:20000 |nullable'
        ]);
         
        //Handle File Upload
        if ($request->hasFile('document_video')) {
            //Get Filename with Ext
            $fileNameWithExt = $request->file('document_video')->getClientOriginalName();
            //Get just Filename
            $fileName = pathinfo($fileNameWithExt , PATHINFO_FILENAME );
            //Get just extension
            $extension = $request->file('document_video')->getClientOriginalExtension();
            //File to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('document_video')->storeAs('public/videos',$fileNameToStore);
        
        } else {
            $fileNameToStore = 'novideo';
        }

        $video = new video;
        $video->title = $request->input('title');
        $video->body = $request->input('body');
        $video->views = 0;
        $video->tag = $request->input('tag');
        $video->document_video = $fileNameToStore;
        $video->save();

        return redirect('/dashboard')->with('success','Video Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($tag)
    {
        if ($tag == "general") {
            $videos= video::all();

            return view('videos.show')->with('videos',$videos);
        }
        else
        {
            return "Invalid";
        }
        
    }

    public function show_video($id)
    {
        $addview = video::find($id);
        $addview->views = $addview->views + 1;
        $addview->save();

        $video= video::find($id);
        $articles= article::orderBy('views','desc')->get();
        $newarticles = article::orderBy('created_at','desc')->get();
        return view('videos.show_video')->with('video',$video)->with('articles',$articles)->with('newarticles',$newarticles); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = video::find($id);
        return view('videos.edit')->with('video',$video);
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
        $video = video::find($id);

         //Handle File Upload
         if ($request->hasFile('document_video')) {
            //Get Filename with Ext
            $fileNameWithExt = $request->file('document_video')->getClientOriginalName();
            //Get just Filename
            $fileName = pathinfo($fileNameWithExt , PATHINFO_FILENAME );
            //Get just extension
            $extension = $request->file('document_video')->getClientOriginalExtension();
            //File to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('document_video')->storeAs('public/videos',$fileNameToStore);
        
        }   

        $video->title = $request->input('title');
        $video->body = $request->input('body');
        if ($request->hasFile('document_video')) {
            Storage::delete('public/videos'.$video->document_video);
            $video->document_video = $fileNameToStore;
        }
        $video->save();

        return redirect('/dashboard')->with('success','Video Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = video::find($id);
        if ($video->document_video != 'novideo') {
            //Delete Cover Image
            Storage::delete('public/videos/'.$video->document_video);
        }
        $video->delete();
        return redirect('/dashboard')->with('success','Video Deleted');
    }
}
