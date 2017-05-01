<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function manageposts()
    {
        $posts = DB::table('posts')->where('user_id', '=', Auth::id())->orderBy('id', 'desc')->paginate(5);
    	return view('posts/manage_posts')->with('posts',$posts);
    }

    public function editPost($id)
    {
        $post = Post::find($id);
        return view('posts.edit_post')->with('post',$post);
    }

    public function updatePost(Request $request, $id)
    {
        $post = Post::find($id);

        $this->validate($request, array(
                    'content'  => 'required'
                ));
        $post->content = $request->input('content');

        $post->save();

        return redirect('/home');
    }

    public function deletePost($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('/home');
    }
}
