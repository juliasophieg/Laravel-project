<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeletepostController extends Controller
{
    public function destroy(\App\Models\Post $post)
    {
        $post->delete();

        return redirect()->intended('postpage');
    }
}
