<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class postController extends Controller
{
    private $posts = [
        ["id" => 1, "title" => 'Learn PHP', "postedBy" => 'Esraa', "createdAt" => '2018-04-01'],
        ["id" => 2, "title" => 'Learn HTML', "postedBy" => 'Ahmed', "createdAt" => '2018-04-12'],
        ["id" => 3, "title" => 'Design Patterns', "postedBy" => 'Adham', "createdAt" => '2018-04-15']
    ];


    public function index()
    {
        return view('index', ["posts" => $this->posts]);
    }

    public function create()
    {
        return view('create');
    }


    public function show(string $id)
    {
        $post = array_filter($this->posts, function ($post) use ($id) {
            return $post['id'] == $id;
        });

        if ($post) {
            return view('show', ["post" => $post]);
        } else {
            abort(404);
        }
    }

    public function edit(string $id)
    {
        return view('edit');
    }
}
