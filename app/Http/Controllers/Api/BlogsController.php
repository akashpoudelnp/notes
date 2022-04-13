<?php

namespace App\Http\Controllers\Api;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Blog as BlogResource;

class BlogsController extends BaseController
{
    // public function __construct()
    // {
    //     $this->middleware('auth_api',['except'=>['show','index']]);
    // }

    public function index()
    {

        $blogs = Blog::all();

        return $this->handleResponse(BlogResource::collection($blogs), 'Blogs have been retrived');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->handleError($validator->errors());
        }

        $blog = Blog::create($input);

        return $this->handleResponse(new BlogResource($blog), 'Blogs Created');
    }

    public function show($id)
    {
        $blog = Blog::find($id);
        if (is_null($blog)) {
            return $this->handleError('Blogs not Found');
        }
        return $this->handleResponse($blog, 'Blogs Retrived');
    }

    public function update(Request $request, Blog $blog)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'string',
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'description' => 'string'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $err = ['success' => false];
            $message =  json_encode(array_merge($err, json_decode($errors, true)));
            return $message;
        }

        $blog->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Blogs Edited Sucessfully',
            'blog_id' => $blog->id,
        ]);
    }

    public function destroy(Blog $blog)
    {

        $blog->delete();

        return [
            'success' => true,
            'message' => 'Blog Deleted Sucessfully',
            'id' => $blog->id
        ];
    }
}
