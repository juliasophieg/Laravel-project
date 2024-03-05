<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate(
            $request,
            [
                'description' => 'required | string | min:10'
            ]
        );

        $post = new Post;
        $post->description = $request->input('description');
        $post->title = $request->input('title');
        $post->brand = $request->input('brand');
        $post->model = $request->input('model');
        $post->model_year = $request->input('model_year');
        $post->user_id = Auth::id();
        $post->save();
        return redirect('/postpage');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->description = $request->input('description');
        $post->title = $request->input('title');
        $post->brand = $request->input('brand');
        $post->model = $request->input('model');
        $post->model_year = $request->input('model_year');

        $post->save();
        return redirect('/postpage')->with('success', 'post updated successfully');
    }
}
