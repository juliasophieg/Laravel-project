@extends('layouts.app')
<div class="h-screen flex items-center justify-center">
    <form method="POST" action="{{ route('register.store') }}" class="w-1/3 bg-white shadow-md rounded px-8 py-8">
        @csrf
        <div class=" mb-4">
            <label for="name">Name...</label>
            <input type="name" id="name" name="name"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class=" mb-4">
            <label for="email">Email...</label>
            <input type="email" id="email" name="email"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class=" mb-4">
            <label for="password">Password...</label>
            <input type="password" id="password" name="password"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class=" mb-4">
            <label for="password_confirmation">Repeat password..</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <button type="submit"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Register
        </button>

        <a href="{{ route('login') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Back to login
        </a>

    </form>
</div>
