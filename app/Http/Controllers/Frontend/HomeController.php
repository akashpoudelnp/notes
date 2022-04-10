<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $blogs= Blog::all();
        return view('home.index',compact('blogs'));
    }

}
