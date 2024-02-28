@extends('layouts.app');
<header class="w-full h-11 flex justify-around items-center">
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
