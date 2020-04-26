<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\article;
use App\category;
use App\author;

class ArticlesController extends Controller
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
        
        //$posts= Post::orderBy('views','desc')->paginate(10);
        //return view('posts.index')->with('posts',$posts);
        return "Article Home";
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = category::all();
        $authors = author::all();
       // $cats = article::lists('name', 'id');
        return view('articles.create')->with('cats',$cats)->with('authors',$authors);
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
            'name' => 'required',
            'article_image' => 'image|nullable|max:1999'
        ]);
         
        //Handle File Upload
        if ($request->hasFile('article_image')) {
            //Get Filename with Ext
            $fileNameWithExt = $request->file('article_image')->getClientOriginalName();
            //Get just Filename
            $fileName = pathinfo($fileNameWithExt , PATHINFO_FILENAME );
            //Get just extension
            $extension = $request->file('article_image')->getClientOriginalExtension();
            //File to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('article_image')->storeAs('public/article_images',$fileNameToStore);
        
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $article = new article;
        $article->title = $request->input('title');
        $article->body = $request->input('body');
        $article->views = 0;
        $article->author_id = $request->input('author_id');
        $article->tags = $request->input('tags');
        $article->cat_name = $request->input('cat_name');
        $article->article_image = $fileNameToStore;
        $article->save();

        return redirect('/dashboard')->with('success','Article Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $addview = article::find($id);
        $addview->views = $addview->views + 1;
        $addview->save();

        $article = article::find($id);

        $articles= article::orderBy('views','desc')->get();
        $newarticles = article::orderBy('created_at','desc')->get();
        return view('articles.show')->with('article',$article)->with('articles',$articles)->with('newarticles',$newarticles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = article::find($id);
        return view('articles.edit')->with('article',$article);
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
        $article = article::find($id);

         //Handle File Upload
         if ($request->hasFile('article_image')) {
            //Get Filename with Ext
            $fileNameWithExt = $request->file('article_image')->getClientOriginalName();
            //Get just Filename
            $fileName = pathinfo($fileNameWithExt , PATHINFO_FILENAME );
            //Get just extension
            $extension = $request->file('article_image')->getClientOriginalExtension();
            //File to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('article_image')->storeAs('public/article_images',$fileNameToStore);
        
        } 

        $article->title = $request->input('title');
        $article->body = $request->input('body');
        if ($request->hasFile('article_image')) {
            Storage::delete('public/article_images/'.$article->article_image);
            $article->article_image = $fileNameToStore;
        }
        $article->save();

        return redirect('/dashboard')->with('success','Article Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = article::find($id);
        if ($article->article_image != 'noimage.jpg') {
            //Delete Cover Image
            Storage::delete('public/article_images/'.$article->article_image);
        }
        $article->delete();
        return redirect('/dashboard')->with('success','Article Deleted');
    }
}
