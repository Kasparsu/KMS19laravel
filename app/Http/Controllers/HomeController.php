<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $posts = Post::orderBy('created_at', 'desc')->paginate();
        return view('home', compact('posts'));
    }
    public function post(Post $post){
        return view('post', compact('post'));
    }
}
