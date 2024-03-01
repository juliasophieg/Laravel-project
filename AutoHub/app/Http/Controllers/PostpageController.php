<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostpageController extends Controller
{

    public function __invoke(Request $request)
    {

        $posts = Post::all(); // Fetch all posts from the database
        return view('postpage', ['posts' => $posts]);
    }
}
