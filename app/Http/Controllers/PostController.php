<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $allPosts = Post::all();
        return view("posts/index", ["posts" => $allPosts]);
    }

    public function show(Post $post)
    {
        return view("posts.show", ["post" => $post]);
    }

    public function create()
    {
        $allUsers = User::all();
        return view("posts.create", ["users" => $allUsers]);
    }

    public function store()
    {
        request()->validate([
            "title" => ["required", "min:5"],
            "description" => ["required", "min:10"],
            "post_creator" => ["required", "exists:users,id"]
        ]);

        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;

        $newPost = new Post;
        $newPost->title = $title;
        $newPost->description = $description;
        $newPost->user_id = $postCreator;
        $newPost->save();

        return to_route(route: "posts.index");
    }
    public function edit($postid)
    {
        $post = Post::find($postid);
        $allUsers = User::all();
        return view("posts.edit", ["users" => $allUsers, "post" => $post]);
    }

    public function update($postid)
    {
        request()->validate([
            "title" => ["required", "min:5"],
            "description" => ["required", "min:10"],
            "post_creator" => ["required", "exists:users,id"]
        ]);

        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;

        $post = Post::find($postid);
        $post->update([
            "title" => $title,
            "description" =>$description,
            "user_id" => $postCreator
        ]);
        return to_route('posts.show', $post);
    }
    public function destroy(Post $post)
    {
        $post->Delete();
        return to_route(route: "posts.index");
    }
}
