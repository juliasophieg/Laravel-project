@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>AutoHub</title>
</head>

<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="text-center">
        <h1 class="text-4xl font-bold mb-4">Welcome to AutoHub</h1>
        <h2 class="text-lg mb-8">A car-post application in Laravel by William and Julia</h2>

        <a href="{{ route('login') }}"
            class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Login
        </a>
    </div>
</body>

</html>
