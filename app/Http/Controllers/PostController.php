<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response; // import the request class
use Illuminate\Http\Request;
use App\Models\Post; // connect the model / DB to the controller

class PostController extends Controller
{
    // implement some controller logic
    // 1. get data
    public function index(){
        $posts = Post::all(); // retreive all posts from the DB
        return response()->json($posts, Response::HTTP_OK); // return data in json

    }

    // 2. post
    public function store(Request $request){
        $validateData = $request->validate([
            "title" => "required|max:255",
            "content" => "required",
        ]);

        // next after validating -> create a new post instance
        $post = new Post([
            "title" => $validateData["title"],
            "content" => $validateData["content"],
        ]);

        $post->save(); // save the new post in the database

        return response()->json($post, Response::HTTP_CREATED); // returns the new post as JSON
    }

    // 3. delete
    public function destroy($id){
        // first - find the id
        $post = Post::find($id);

        if (!$post){
            return response()->json(['message' => 'Post not Found !!!'],
            Response::HTTP_NOT_FOUND);
        }

        // if found
        $post->delete();
        return response()->json(['message' => 'Post deleted'], Response::HTTP_OK);
    }
}
