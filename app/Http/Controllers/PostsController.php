<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function store(Request $request)
    {
    	// create and return the post
        $post = Post::create([
            'user_id' => Auth::id(),
            'content' => $request->content
        ]);

        return response()->json(['user'=> Auth::user() , 'post'=>$post]);
    }
}
