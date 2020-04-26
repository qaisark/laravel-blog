<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\article;

class PagesController extends Controller
{
    public function index()
    {
        $articles = article::orderBy('views','desc')->paginate(9);
        $newarticleseng = article::orderBy('created_at','desc')->get();
        $newarticlesurdu = article::orderBy('created_at','desc')->get();
        return view('pages.index')->with('articles',$articles)->with('newarticleseng',$newarticleseng)->with('newarticlesurdu',$newarticlesurdu);
    }
    public function about()
    {
        return view('pages.about');
    }
    public function contact()
    {
        return view('pages.contact');
    }
}
