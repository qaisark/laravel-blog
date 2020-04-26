<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\article;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    { 
        if(auth()->user()->id == 1)
        {
            $articles = article::all();
            return view('dashboard')->with('articles',$articles);
        }
        else{
            return "Un-athourized";
            
        }   
    }
}
