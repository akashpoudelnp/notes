<?php

namespace App\Http\Controllers\Api;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BlogsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth_api',['except'=>['show','index']]);
    // }

    public function index()
    {

        $blogs= Blog::all();

        return response()->json($blogs);
    }
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'user_id' => ['required','integer','exists:users,id'],
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $err= ['success'=>false];
           $message=  json_encode(array_merge($err,json_decode($errors,true)));
            return $message;
        }

        $blog = Blog::create([
            'name'=>$request->name,
            'user_id'=>$request->user_id,
            'description'=>$request->description
        ]);

        return response()->json([
            'success'=>true,
            'message'=>'Blogs Created Sucessfully',
            'blog_id'=> $blog->id,
        ]);
    }

    public function show(Blog $blog)
    {

        return response()->json($blog);
    }

    public function update(Request $request, Blog $blog)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'string',
            'user_id' => ['required','integer','exists:users,id'],
            'description' => 'string'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $err= ['success'=>false];
           $message=  json_encode(array_merge($err,json_decode($errors,true)));
            return $message;
        }

        $blog->update($request->all());

        return response()->json([
            'success'=>true,
            'message'=>'Blogs Edited Sucessfully',
            'blog_id'=> $blog->id,
        ]);

    }

    public function destroy(Blog $blog)
    {

        $blog->delete();

        return [
            'success'=>true,
            'message'=>'Blog Deleted Sucessfully',
            'id'=>$blog->id
        ];
    }
}
