@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<header class="w-full h-20 flex justify-around items-center shadow">
    <div class="text-xl">
        <a href="">Go back</a>
    </div>
    <div class="text-4xl">
        <h1>AutoHub</h1>
    </div>
    <div class="text-xl">
        <p><a href="{{ route('logout') }}">Log out</a></p>
    </div>
</header>

<body class="flex flex-col items-center">
    <div class="text-xl mt-10 mb-5">
        <h2>Update post</h2>
    </div>

    <form class="flex flex-col max-w-md" method="POST" action="{{ route('posts.update', ['id' => $post->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label class="font-bold" for="title">Title</label><br>
            <input class="w-full p-1 mb-3 bg-slate-100 rounded" type="text" id="title" name="title" value="{{$post->title}}">
        </div>

        <div class="flex gap-5">
            <div class="w-1/2">
                <label class="font-bold" for="brand">Brand</label><br>
                <input class="w-full p-1 mb-3 bg-slate-100 rounded" type="text" id="brand" name="brand" value="{{$post->brand}}">
            </div>
            <div class="w-1/2">
                <label class="font-bold" for="model">Model</label><br>
                <input class="w-full p-1 mb-3 bg-slate-100 rounded" type="text" id="model" name="model" value="{{$post->model}}">
            </div>
        </div>
        <div class="flex gap-5">
            <div class="w-1/2">
                <label class="font-bold" for="model_year">Model year</label>
                <input class="w-full p-1 mb-3 bg-slate-100 rounded" type="number" id="model_year" name="model_year" min="1900" max="2024" step="1" value="{{$post->model_year}}" /> <!-- CHANGE TO YEAR PICKER WITH JS-->
            </div>
            <div class="w-1/2">
                <label class="font-bold" for="car_img">Picture</label>
                <input class="w-full" type="file" name="car_img" id="car_img">
            </div>
        </div>
        <div>
            <label class="font-bold" for="description">Description</label>
            <textarea class="w-full p-1 mb-3 bg-slate-100 rounded" id="description" name="description" rows="4" cols="50">{{$post->description}}</textarea>
        </div>
        <div class="flex w-full justify-center">
            <input class="font-semibold text-white w-1/4 p-2 bg-sky-500 rounded-lg hover:bg-sky-600 cursor-pointer" type="submit" value="Update">
        </div>
    </form>
</body>

</html>