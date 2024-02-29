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
        <label for="description">Create car post</label><br>
        <textarea id="description" name="description" rows="4" cols="50"></textarea>
        <!--<input type="file" name="carImg" id="carImg">-->
        <input type="submit" value="Add car">
    </form>
</body>

<div>
    @if (isset($posts) && !$posts->isEmpty())
    @foreach ($posts as $post)
    <div id="post">
        <p>{{ $post->user->name }}:</p>
        <p>{{ $post->description }}</p>
    </div>
    @endforeach
    @else
    <p>No posts available.</p>
    @endif
</div>