<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditpostController extends Controller
{
    public function edit(\App\Models\Post $post)
    {
        return view('editPost', ['post' => $post]);
    }
}
