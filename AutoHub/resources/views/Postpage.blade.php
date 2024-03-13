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

<style>
    .border-with-shadow {
        position: relative;
    }

    .border-with-shadow::after {
        content: '';
        position: absolute;
        bottom: -2px;
        /* Adjust this value to control the distance of the shadow from the border */
        left: 0;
        width: 100%;
        height: 2px;
        /* Adjust this value to control the thickness of the shadow */
        background-color: rgba(0, 0, 0, 0.2);
        /* Adjust the color and opacity of the shadow */
        filter: blur(4px);
        /* Adjust the blur radius of the shadow */
    }
</style>

<body>
    <div class="bg-sky-50 flex flex-col items-center w-screen">
        <div class="text-xl mt-10 mb-5">
            <h2>Add post</h2>
        </div>
        <form class="flex flex-col max-w-md" method="POST" action="/posts" enctype="multipart/form-data">
            @csrf
            <div>
                <label class="font-bold" for="title">Title</label><br>
                <input class="w-full p-2 mb-3 bg-white rounded" type="text" id="title" name="title"
                    placeholder="Write a little title here..">
            </div>

            <div class="flex gap-5">
                <div class="w-1/2">
                    <label class="font-bold" for="brand">Brand</label><br>
                    <input class="w-full p-2 mb-3 bg-white rounded" type="text" id="brand" name="brand"
                        placeholder="Ford">
                </div>
                <div class="w-1/2">
                    <label class="font-bold" for="model">Model</label><br>
                    <input class="w-full p-2 mb-3 bg-white rounded" type="text" id="model" name="model"
                        placeholder="Mustang">
                </div>
            </div>
            <div class="flex gap-5">
                <div class="w-1/2">
                    <label class="font-bold" for="model_year">Model year</label>
                    <input class="w-full p-2 mb-3 bg-white rounded" type="number" id="model_year" name="model_year"
                        min="1900" max="2024" step="1" placeholder="2024" />
                    <!-- CHANGE TO YEAR PICKER WITH JS-->
                </div>
                <div class="w-1/2">
                    <label class="font-bold" for="car_img">Picture</label>
                    <input class="w-full" type="file" name="car_img" id="car_img">
                </div>
            </div>
            <div>
                <label class="font-bold" for="description">Description</label>
                <textarea class="w-full p-2 mb-3 bg-white rounded" id="description" name="description" rows="4" cols="50"
                    placeholder="Why do you love this car?"></textarea>
            </div>
            <div class="flex w-full justify-center">
                <input class="font-semibold text-white w-1/4 p-2 bg-sky-500 rounded-lg hover:bg-sky-600 cursor-pointer"
                    type="submit" value="Add car">
            </div>

        </form>
    </div>


    <div>
        @if (isset($posts) && !$posts->isEmpty())
            @foreach ($posts as $post)
                <div id="post"
                    class="w-11/12 bg-white border border-solid rounded-sm shadow-xl p-10 mb-20 mt-10 ml-auto mr-auto flex flex-col
                    lg:w-2/3">
                    <div class="flex flex-row justify-between mr-5 ml-5 border-b-2 border-black border-with-shadow">
                        <h2 class="text-2xl font-semibold text-gray-800">{{ $post->user->name }} - {{ $post->title }}
                        </h2>
                        <div class="flex flex-row">
                            <a class="mr-6" href="{{ route('posts.edit', ['id' => $post->id]) }}">Edit</a>
                            <form method="POST" action="{{ route('post.destroy', $post) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row-reverse justify-between mt-8">
                        <img class="w-full md:max-w-xs lg:max-w-sm mr-5 mt-2 md:mt-0"
                            src="{{ asset('storage/' . $post->car_img) }}">

                        <div class="flex flex-col justify-center ml-5 ">
                            <h3 class="text-ml font-medium text-gray-700 mt-2">Brand:</h3>
                            <p class="text-gray-600">{{ $post->brand }}</p>
                            <h3 class="text-ml font-medium text-gray-700 mt-2">Model:</h3>
                            <p class="text-gray-600">{{ $post->model }}, {{ $post->model_year }}</p>
                            <h3 class="text-ml font-medium text-gray-700 mt-2">Description:</h3>
                            <p class="text-gray-600">{{ $post->description }}</p>
                        </div>
                    </div>
                    <div class=" mt-14 mr-5 flex justify-end text-slate-400">
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
</body>
