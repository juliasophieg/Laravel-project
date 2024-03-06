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
                'description' => 'required|string|min:10',
                'car_img' => 'required|file'
            ]
        );

        $post = new Post;
        $post->description = $request->input('description');
        $post->title = $request->input('title');
        $post->brand = $request->input('brand');
        $post->model = $request->input('model');
        $post->model_year = $request->input('model_year');
        $post->user_id = Auth::id();
        if ($request->hasFile('car_img')) {
            $post->car_img = $request->file('car_img')->store('imgs', 'public');
        } else {
            echo 'no pic';
        }
        $post->save();
        return redirect('/postpage');
    }

}
