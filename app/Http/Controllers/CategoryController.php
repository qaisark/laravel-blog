<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\category;
use App\article;
use App\User;
class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function index()
    {
        $cats = category::all();
        return view('category.index')->with('cats',$cats);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'cat_name' => 'required',
        ]);
        $cat = new category;
        $cat->cat_name = $request->input('cat_name');   
        $cat->save();
        return redirect('/category')->with('success','Category Created');
    }
    public function show($cat_name)
    {
        $articles = article::where('cat_name',$cat_name)->paginate(10);
        $newarticles = article::orderBy('created_at','desc')->get();
        $title = $cat_name;
        return view('category.show')->with('articles',$articles)->with('newarticles',$newarticles)->with('title',$title);
    }
    public function destroy($id)
    {
        $category = category::find($id);
        $category->delete();
        return redirect('/category')->with('success','Category Deleted with all articles associaed');
    }
}
