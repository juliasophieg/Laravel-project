@extends('layouts.app')

<div class="w-screen h-screen flex justify-center items-center">
    <div class="w-14 h-14 p-5 bg-slate-500 shadow justify-center items-center flex-col">
        <p class="text-2xl pb-5">Login error: failed</p>
        <p class="text-xl mt-2">Return to login page:</p>
        <a href="{{ route('login') }}" class="btn btn-primary">Back</a>
    </div>
</div>
