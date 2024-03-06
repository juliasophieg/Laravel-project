@extends('layouts.app')
<header class="w-full h-20 flex justify-around items-center shadow">
    <div class="text-xl">
        @auth<p class="">Hello {{ Auth::user()->name }}!</p>@endauth
    </div>
    <div class="text-4xl">
        <h2>AutoHub</h2>
    </div>
    <div class="text-xl hover:text-2xl font-Karla">
        <p><a href="{{ route('logout') }}">Log out</a>
        </p>
    </div>
</header>

<body>
    <div class="bg-beige-100">
        <form method="POST" action="/posts" enctype="multipart/form-data">
            @csrf
            <label for="title">Title</label><br>
            <input type="text" id="title" name="title" placeholder="Write a little title here.."><br>

            <label for="brand">Brand</label><br>
            <input type="text" id="brand" name="brand" placeholder="Ford"><br>

            <label for="model">Model</label><br>
            <input type="text" id="model" name="model" placeholder="Mustang"><br>

            <label for="model_year">Model year</label><br>
            <input type="number" id="model_year" name="model_year" min="1900" max="2024" step="1"
                placeholder="Year" /><br> <!-- CHANGE TO YEAR PICKER WITH JS-->

            <label for="description">Description</label><br>
            <textarea id="description" name="description" placeholder="Why do you love this car?" rows="4" cols="50"></textarea>

            <label for="car_img">Picture</label>
            <input type="file" name="car_img" id="car_img">
            <br>
            <input type="submit" value="Add car">
        </form>
</body>

<div>
    @if (isset($posts) && !$posts->isEmpty())
        @foreach ($posts as $post)
            <div id="post"
                class="w-full bg-white border border-solid rounded-sm shadow-xl p-10 mb-20 ml-auto mr-auto flex flex-col">
                <div class="flex flex-row justify-between mr-10 ml-10">
                    <h2 class="text-4xl font-semibold text-gray-800">{{ $post->user->name }} - {{ $post->title }}</h2>
                    <div class="flex flex-row">
                        <a class="mr-6" href="{{ route('posts.edit', ['id' => $post->id]) }}">Edit</a>
                        <form method="POST" action="{{ route('post.destroy', $post) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                </div>
                <div class="flex flex-row-reverse justify-between mt-8">
                    <img class="max-w-lg mr-10 mt-4" src="{{ asset('storage/' . $post->car_img) }}">

                    <div class="flex flex-col justify-center ml-10 ">
                        <h3 class="text-2xl font-medium text-gray-700 mt-2">Brand:</h3>
                        <p class="text-gray-600">{{ $post->brand }}</p>
                        <h3 class="text-2xl font-medium text-gray-700 mt-2">Model:</h3>
                        <p class="text-gray-600">{{ $post->model }}, {{ $post->model_year }}</p>
                        <h3 class="text-2xl font-medium text-gray-700 mt-2">Description:</h3>
                        <p class="text-gray-600">{{ $post->description }}</p>
                    </div>
                </div>
                <div class=" mt-14 mr-10 flex justify-end text-slate-400">
                    <?php if ($post->updated_at != $post->created_at) {
                        echo $post->updated_at;
                    } else {
                        echo $post->created_at;
                    }
                    ?>

                </div>
            </div>
        @endforeach
    @else
        <p>No posts available.</p>
    @endif

</div>
</div>
