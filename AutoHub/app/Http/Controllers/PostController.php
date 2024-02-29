<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Facades\Auth;

class PostController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:30',
            'message' => 'required|string|max:255'
        ]);

        Post::create([
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        $posts = Post::all();

        return view('postpage', ['posts' => $posts]);

        return redirect()->route('postpage');
    }
}

    /* public function index(Request $request)
    {
        $posts = Post::all();

        return view('postpage', ['posts' => $posts]);
    } */
