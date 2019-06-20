<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Photo;
use Session;
use Auth;
use App\Http\Requests\CreatePostRequest;

class AdminPostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(5);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $input  = $request->all();

        if($file = $request->file('file')) {
            $name = time().$file->getClientOriginalName();
            $file->move('images/posts', $name);
            $image = Photo::create(['filename' => $name]);

            $input['photo_id'] = $image->id;
        }

        $input['user_id'] = Auth::user()->id;

        Post::create($input);
        Session::flash('flash_admin', 'The post has been created.');

        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $input = $request->all();

        if($file =$request->file('file')) {
            $name = time().$file->getClientOriginalName();
            $file->move('images/posts', $name);
            $image = Photo::create(['filename' => $name]);

            $input['photo_id'] = $image->id;
        }

        $post->update($input);

        Session::flash('flash_admin', 'The post has been updated.');

        return redirect('admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id)->delete();

        Session::flash('flash_admin', 'The post has been deleted.');

        return redirect('admin/posts');
    }
}
