@extends('layouts.app')
<header class="w-full h-20 flex justify-around items-center shadow">
    <div class="text-xl">
        @auth<p class="">Hello {{ Auth::user()->name }}!</p>@endauth
    </div>
    <div class="text-4xl">
        <h2>AutoHub</h2>
    </div>
    <div class="text-xl">
        <p><a href="{{ route('logout') }}">Log out</a></p>
    </div>
</header>

<body>
    <form method="POST" action="/posts" enctype="multipart/form-data">
        @csrf
        <label for="title">Title</label><br>
        <input type="text" id="title" name="title" placeholder="Write a little title here.."><br>

        <label for="brand">Brand</label><br>
        <input type="text" id="brand" name="brand" placeholder="Ford"><br>

        <label for="model">Model</label><br>
        <input type="text" id="model" name="model" placeholder="Mustang"><br>

        <label for="model_year">Model year</label><br>
        <input type="number" id="model_year" name="model_year" min="1900" max="2024" step="1" placeholder="Year" /><br> <!-- CHANGE TO YEAR PICKER WITH JS-->

        <label for="description">Description</label><br>
        <textarea id="description" name="description" placeholder="Why do you love this car?" rows="4" cols="50"></textarea>

        <!--<input type="file" name="car_img" id="car_img">--> <!-- NOT WORKING YET-->
        <br>
        <input type="submit" value="Add car">
    </form>
</body>

<div>
    @if (isset($posts) && !$posts->isEmpty())
    @foreach ($posts as $post)
    <div id="post">
        <h2>{{ $post->user->name }} says: {{ $post->title }}</h2>
        <h3>Brand:</h3>
        <p>{{ $post->brand }}</p>
        <h3>Model:</h3>
        <p>{{ $post->model }}, {{ $post->model_year }}</p>
        <h3>Description:</h3>
        <p>{{ $post->description }}</p>
    </div>
    @endforeach
    @else
    <p>No posts available.</p>
    @endif
</div>