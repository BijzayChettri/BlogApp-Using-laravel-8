<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Post;
class PostController extends Controller
{
    public function index()
    {  
        $post = new Post();
        $posts = Post::with('user')->where('is_approved',1)
               ->orderBy('created_at')
               ->take(10)
               ->get();
        return view('welcome',compact('posts'));
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);
        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = $request->title;
        $post->body = $request->body;
        $post->save();
        Toastr::success('Post Successfully Saved :)','Success');
        return redirect('/');
    }
}
