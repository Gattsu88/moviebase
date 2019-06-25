<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $postsSliders = Post::orderBy('id', 'desc')->take(8)->get();
        $posts = Post::orderBy('id', 'desc')->take(15)->skip(4)->get();
        $topPosts = Post::orderBy('views', 'desc')->take(6)->get();

        return view('home', compact('postsSliders', 'posts', 'topPosts'));
    }
}
