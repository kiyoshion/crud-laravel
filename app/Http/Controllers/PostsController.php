<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Post;
use App\Comment;
use App\Http\Requests;
use Auth;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')
            ->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts/index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        return view('posts/create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = $request->user()->id;

        $file_path = 'img/' . Auth::user()->id . '/';
        if (!file_exists(public_path() . '/' . $file_path)) {
            mkdir(public_path() . '/' . $file_path, 666, true);
        }
        if ($request->thumbnail) {
            $file = $request->file('thumbnail');
            $file_name = date('YmdHis') . "-" . $file->getClientOriginalName();
            $thumbnail = Image::make($file->getRealPath())
            ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbnail->save(public_path() . '/' . $file_path . $file_name);
            $post->thumbnail = $file_path . $file_name;
        }

        $post->save();

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $comments = Comment::where('post_id', $id)->get();
        $post->comments_count = $post->comments()->count();
        $post->likes_count = $post->likesCount()->count();
        return view('posts/show')->with(['post' => $post, 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('posts/edit', compact('post'));
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
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = $request->user()->id;
        $file_path = 'img/' . Auth::user()->id . '/';
        if (!file_exists(public_path() . '/' . $file_path)) {
            mkdir(public_path() . '/' . $file_path, 666, true);
        }
        if ($request->thumbnail) {
            $file = $request->file('thumbnail');
            $file_name = date('YmdHis') . "-" . $file->getClientOriginalName();
            $thumbnail = Image::make($file->getRealPath())
            ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbnail->save(public_path() . '/' . $file_path . $file_name);
            $post->thumbnail = $file_path . $file_name;
        }
        $post->save();

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('/posts');
    }
    
}
