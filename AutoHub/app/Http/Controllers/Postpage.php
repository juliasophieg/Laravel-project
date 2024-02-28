<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Facades\Auth;

class Postpage extends Controller
{
    public function __invoke(Request $request)
    {
        //
    }
}

    /* public function index(Request $request)
    {
        $posts = Post::all();

        return view('postpage', ['posts' => $posts]);
    } */
