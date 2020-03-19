<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller
{
    public function index()
    {
        $posts = Post::limit(5)->get();

        return view('index', ['posts' => $posts]);
    }
}
