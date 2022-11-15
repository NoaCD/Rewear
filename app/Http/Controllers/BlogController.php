<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $posts = Post::latest()->paginate(4);
        return view('rewear.blog.index',compact('posts'));
    }

    public function show(Post $post){
        $posts = Post::latest()->paginate(4);
        return view('rewear.blog.articulo',compact('post','posts'));
    }
}
