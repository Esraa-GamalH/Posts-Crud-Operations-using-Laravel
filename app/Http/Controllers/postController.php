<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Post;

class postController extends Controller
{

    public function index()
    {
        // $post = DB::table('posts')->get();
        $posts = Post::all();
        return view('index', ["posts" => $posts]);
    }

    
    public function create()
    {
        $posts = DB::table('posts')->get();
        return view('create', ["posts" => $posts]);
    }


    public function show($id)
    {
        $post = Post::find($id);
        if ($post) {
            return view('show', ["post" => $post]);
        }
        abort(404);
    }


    public function edit($id)
    {

        return view('edit');
    }


    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->delete();
            return to_route("posts.index");
        } 
        abort(404);
    }


    public function store() {
    //Validation
    $valid_data=request()->validate([
        "title" => "required|unique:posts| max:255",
        "creator" => "required",
        "description" => "required",
        "createdAt" => "required"
    ]);

    # if form is not valid  --> redirect to the html page
    $requested_data = request()->all();
    $post = new Post();
    $post->title = $requested_data['title'];
    $post->createdAt = $requested_data['createdAt'];
    $post->description = $requested_data['description'];
    $post->postedBy = $requested_data['creator'];
    $post->save();
    return to_route("posts.show", $post->id);
    }
}
