<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Services\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{

    public function index()
    {
        $blogs = Blog::all();

        return view('home.index', compact('blogs'));
    }
    public function upload()
    {
        return view('home.upload');
    }
    // public function supload(Request $request)
    // {
    //     $data = UploadService::upload($request->image);
    //     dd($data);
    // }
}
