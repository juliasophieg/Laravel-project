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

<div class="mt-10">
    <form action="{{ route('post.store') }}" method="POST">
        @csrf
        <label for="subject">subject</label>
        <input type="subject" name="subject" id="subject">

        <label for="message">message</label>
        <input type="message" name="message" id="message">
        <button type="submit">Send</button>

    </form>

    <div>
        {{-- @foreach ($posts as $post)
            <h2>{{ $post->subject }}</h2>
            <p>{{$post->message</p>
@endforeach --}}
    </div>







    {{-- @foreach ($collection as $item)
    @endforeach --}}
</div>
