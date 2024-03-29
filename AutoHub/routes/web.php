<?php

use App\Http\Controllers\EditpostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostpageController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});


//Register and login
Route::get('/login', function () {  // Skapar väg till Loginsida
    return view('login');
})->name('login');

Route::get('/register', function () {  // Skapar väg till Loginsida
    return view('register');
})->name('register');

Route::get('/LoginError', function () {  // Skapar väg till Loginsida
    return view('LoginError');
});

Route::post('/register', [RegisterController::class, 'register'])->name('register.store'); // Aktiverar register class
Route::post('login', LoginController::class); // Aktiverar loginfunctionen/classen
Route::get('/logout', LogoutController::class)->name('logout'); // Aktiverar logout


//Postpage
Route::get('/postpage', function () { //Routing till postpage
    return view('postpage');
})->middleware('auth'); // Kräver inlogg för att besöka sida, utloggad användare får error

Route::get('postpage', PostpageController::class)->middleware('auth');
Route::post('posts', PostController::class)->middleware('auth');


//Delete
Route::delete('/post/{post}', [\App\Http\Controllers\DeletepostController::class, 'destroy'])->name('post.destroy');


//Edit and update
Route::get('/edit', function () {  // Route till edit
    return view('edit');
})->name('edit');

Route::get('/posts/{id}/edit', 'App\Http\Controllers\PostController@edit')->name('posts.edit');

Route::put('/posts/{id}', 'App\Http\Controllers\PostController@update')->name('posts.update');
