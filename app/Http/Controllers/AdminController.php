<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Post;
class AdminController extends Controller
{
    public function index()
    {  
        $posts = Post::with('user')
               ->orderBy('created_at')
               ->get();
        return view('admin',compact('posts'));
    }
    public function postUpdate(Request $request)
    {  
        if($request->statusVal == 1){
         $posts = Post::where('id', '=', $request->postId)->update(array('is_approved' => 0));
        }else{
           $posts = Post::where('id', '=', $request->postId)->update(array('is_approved' => 1));   
        }
        return redirect('/');

    }
    
}
