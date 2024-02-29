@extends('layouts.app')
<div class="w-screen h-screen flex justify-center items-center flex-col">
    <p class="text-2xl pb-5">Login error: failed</p>
    <p class="text-xl pb-1">Return to login page:</p>
    <a href="{{ route('login') }}"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded
        focus:outline-none focus:shadow-outline">Back</a>
</div>
</div>
