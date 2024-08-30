<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::paginate(2);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posts = Post::all();
        return view('posts.create', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate data
        $request->validate([
            "title" => "required|unique:posts| max:255",
            "postedBy" => "required",
            "description" => "required",
            "createdAt" => "required"
        ],
    [
        "title.required"=>"Please Enter a title for the post"
    ]);

    # save image  --> inside public path
        $image_path= null;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_path=$image->store("images", 'posts_images');
        }
        $request_data= request()->all();
        $request_data['image']=$image_path; # replace image object with image_uploaded path

        //save data to DB using mass assignment
        $post = Post::create($request_data);
        return to_route('posts.show', $post);
    }


    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
